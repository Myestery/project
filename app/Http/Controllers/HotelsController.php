<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use App\Models\Hotel;
use App\Models\Booking;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HotelsController extends Controller
{

    /**
     * Display basic form of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $min_price = $request->input('min_price') ?? 0;
        $max_price = $request->input('max_price') ?? 100000;
        $selected_states = $request->input('states') ?? [];
        $selected_ratings = $request->input('ratings') ?? [];
        $search = $request->input('search') ?? '';

        $title = "View Hotels in Nigeria";
        $description = "View Hotels in Nigeria";
        $hotels = Hotel::where('min_price', '>=', $min_price)
            ->where('max_price', '<=', $max_price)
            ->where('name', 'LIKE', "%{$search}%")
            ->when(count($selected_states) > 0, function ($query) use ($selected_states) {
                return $query->whereIn('state_id', $selected_states);
            })
            ->when(count($selected_ratings) > 0, function ($query) use ($selected_ratings) {
                return $query->where('rating','>=', min($selected_ratings));
            })
            ->paginate();
        $states = State::withCount('hotels')->get();

        // get hotels by grouping the rating, above 4, above 3, above 2, above 1
        $hotels_with_5 = Hotel::where('rating', 5)->count();
        $hotels_above_4 = Hotel::where('rating', '>=', 4)->count();
        $hotels_above_3 = Hotel::where('rating', '>=', 3)->count();
        $hotels_above_2 = Hotel::where('rating', '>=', 2)->count();
        $hotels_above_1 = Hotel::where('rating', '>=', 1)->count();
        return view('real.home', compact(
            'title',
            'description',
            'hotels',
            'states',
            'hotels_with_5',
            'hotels_above_4',
            'hotels_above_3',
            'hotels_above_2',
            'hotels_above_1',

            // search params
            'min_price',
            'max_price',
            'selected_states',
            'selected_ratings',
            'search'
        ));
    }

    public function view(Hotel $hotel)
    {
        $title = $hotel->name;
        $description = $hotel->name;
        $rooms = $hotel->rooms()->paginate();
        // load is_booked attribute
        // $rooms->append('is_available');
        return view('real.hotels.view', compact('title', 'description', 'hotel', 'rooms'));
    }

    public function dashboard()
    {
        $hotel = auth()->user()->hotel;
        $title = $hotel->name;
        $description = $hotel->name;
        $rooms = $hotel->rooms()->paginate();
        // stats
        $total_sales = $hotel->bookings()->sum('total_price');
        $total_bookings = $hotel->bookings()->count();
        $total_rooms = $hotel->rooms()->count();
        $total_customers = $hotel->bookings()->distinct('user_id')->count('user_id');

        // return some data for graph
        // an array of prices for the last 7 days
        // [mon,tue,wed,thu,fri,sat,sun]
        /**
         * @var \Illuminate\Support\Collection
         */
        $total_bookings_weekly = $hotel->bookings()->whereBetween('created_at', [now()->subDays(7), now()])->get();
        $total_bookings_weekly = $total_bookings_weekly->groupBy(function ($item, $key) {
            return $item->created_at->format('D');
        });
        // foreach booked rooms, get the total price
        $total_bookings_weekly = $total_bookings_weekly->map(function ($item, $key) {
            return $item->sum('total_price');
        });
        // fill in the missing days
        $filler = ['Mon' => 0, 'Tue' => 0, 'Wed' => 0, 'Thu' => 0, 'Fri' => 0, 'Sat' => 0, 'Sun' => 0];
        if (count($total_bookings_weekly) == 0) {
            $total_bookings_weekly = collect([
                'Mon' => 0
            ]);
        }
        $total_bookings_weekly = $total_bookings_weekly->merge(collect($filler)->diffKeys($total_bookings_weekly));
        // ->sortKeys();
        $week_keys = $total_bookings_weekly->keys()->toArray();
        $week_vals = $total_bookings_weekly->values()->toArray();

        // same for monthly
        $total_bookings_monthly = $hotel->bookings()->whereBetween('created_at', [now()->subDays(30), now()])->get();
        $total_bookings_monthly = $total_bookings_monthly->groupBy(function ($item, $key) {
            return $item->created_at->format('d');
        });
        // foreach booked rooms, get the total price
        $total_bookings_monthly = $total_bookings_monthly->map(function ($item, $key) {
            return $item->sum('total_price');
        });
        // fill in the missing days
        $filler = [];
        for ($i = 1; $i <= 30; $i++) {
            $filler[$i] = 0;
        }
        if (count($total_bookings_monthly) == 0) {
            $total_bookings_monthly = collect([
                '1' => 0
            ]);
        }
        $total_bookings_monthly = $total_bookings_monthly->merge(collect($filler)->diffKeys($total_bookings_monthly));
        // ->sortKeys();
        $month_keys = $total_bookings_monthly->keys()->toArray();
        $month_vals = $total_bookings_monthly->values()->toArray();

        // yearly
        $total_bookings_yearly = $hotel->bookings()->whereBetween('created_at', [now()->subDays(365), now()])->get();
        $total_bookings_yearly = $total_bookings_yearly->groupBy(function ($item, $key) {
            return $item->created_at->format('M');
        });
        // foreach booked rooms, get the total price
        $total_bookings_yearly = $total_bookings_yearly->map(function ($item, $key) {
            return $item->sum('total_price');
        });
        // fill in the missing days
        $filler = ['Jan' => 0, 'Feb' => 0, 'Mar' => 0, 'Apr' => 0, 'May' => 0, 'Jun' => 0, 'Jul' => 0, 'Aug' => 0, 'Sep' => 0, 'Oct' => 0, 'Nov' => 0, 'Dec' => 0];
        if (count($total_bookings_yearly) == 0) {
            $total_bookings_yearly = collect([
                'Jan' => 0
            ]);
        }
        $total_bookings_yearly = $total_bookings_yearly->merge(collect($filler)->diffKeys($total_bookings_yearly));
        // ->sortKeys();
        $year_keys = $total_bookings_yearly->keys()->toArray();
        $year_vals = $total_bookings_yearly->values()->toArray();
        // join rooms and bookings, get bookings where type is single, double and hall
        $total_revenue_from_single =  DB::table('bookings')
            ->join('rooms', 'bookings.room_id', '=', 'rooms.id')
            ->where('rooms.type', '=', 'Single')
            ->where('rooms.hotel_id', '=', $hotel->id)
            ->sum('bookings.total_price');
        $total_revenue_from_double =  DB::table('bookings')
            ->join('rooms', 'bookings.room_id', '=', 'rooms.id')
            ->where('rooms.type', '=', 'Double')
            ->where('rooms.hotel_id', '=', $hotel->id)
            ->sum('bookings.total_price');
        $total_revenue_from_hall =  DB::table('bookings')
            ->join('rooms', 'bookings.room_id', '=', 'rooms.id')
            ->where('rooms.type', '=', 'Hall')
            ->where('rooms.hotel_id', '=', $hotel->id)
            ->sum('bookings.total_price');

        $percentage_from_single = ($total_revenue_from_single / $total_sales) * 100;
        $percentage_from_double = ($total_revenue_from_double / $total_sales) * 100;
        $percentage_from_hall = ($total_revenue_from_hall / $total_sales) * 100;

        // best selling rooms
        $best_selling_rooms = DB::table('bookings')
            ->join('rooms', 'bookings.room_id', '=', 'rooms.id')
            ->where('rooms.hotel_id', '=', $hotel->id)
            ->select('rooms.number', DB::raw('count(*) as total'), 'rooms.image', DB::raw('sum(bookings.total_price) as total_price'), 'rooms.id')
            ->groupBy('rooms.number', 'rooms.image', 'rooms.id')
            ->orderBy('total', 'desc')
            ->limit(5)
            ->get();

        // dd( $best_selling_rooms);


        return view('real.dashboard', compact(
            'title',
            'description',
            'hotel',
            'rooms',
            'total_customers',
            'total_sales',
            'total_rooms',
            'total_bookings',

            // graph
            'week_keys',
            'week_vals',
            'month_keys',
            'month_vals',
            'year_keys',
            'year_vals',

            // pie chart
            'total_revenue_from_single',
            'total_revenue_from_double',
            'total_revenue_from_hall',

            // percentages
            'percentage_from_single',
            'percentage_from_double',
            'percentage_from_hall',

            // best selling rooms
            'best_selling_rooms'
        ));
    }

    public function adminRooms()
    {
        $title = "View Hotels in Nigeria";
        $hotel = Hotel::first();
        $description = "View Hotels in Nigeria";
        $search = request()->query('search');
        if ($search) {
            $rooms = $hotel->rooms()->where('number', 'LIKE', "%{$search}%")->get();
        } else {
            $rooms = $hotel->rooms()->get();
        }
        $available_rooms = $rooms->filter(function ($room) {
            return $room->is_available;
        });
        $booked_rooms = $rooms->filter(function ($room) {
            return !$room->is_available;
        });

        return view('real.rooms.admin_list', compact('title', 'description', 'rooms', 'available_rooms', 'booked_rooms', 'search'));
    }

    public function room(Room $room)
    {
        $title = $room->number;
        $description = $room->number;
        $hotel  = $room->hotel;
        $bookings = $room->bookings()->where('check_out', '>=', now())->get();
        // now from these bookings get all the dates between the check and checkout, save to an array in the format 2023-08-15'
        $booked_dates = [];
        foreach ($bookings as $booking) {
            $check_in = $booking->check_in;
            $check_out = $booking->check_out;
            $dates = $this->getDatesFromRange($check_in, $check_out);
            $booked_dates = array_merge($booked_dates, $dates);
        }
        // dd($booked_dates);
        return view('real.rooms.view', compact('title', 'description', 'room', 'hotel', 'booked_dates'));
    }

    private function getDatesFromRange($start, $end)
    {
        $dates = [];
        $start = strtotime($start);
        $end = strtotime($end);
        while ($start <= $end) {
            $dates[] = date('Y-m-d', $start);
            $start = strtotime("+1 day", $start);
        }
        return $dates;
    }

    public function search(Request $request)
    {
        $title = "Search for Hotels";
        $description = "Search for Hotels";
        $search = $request->input('search');
        $hotels = Hotel::where('name', 'LIKE', "%{$search}%")->orWhere('address', 'LIKE', "%{$search}%")->get();
        return view('real.hotels.search_results', compact('title', 'description', 'hotels', 'search'));
    }
}
