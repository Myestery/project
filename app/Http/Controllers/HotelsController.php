<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Hotel;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HotelsController extends Controller
{

    /**
     * Display basic form of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $title = "View Hotels in Nigeria";
        $description = "View Hotels in Nigeria";
        $hotels = Hotel::paginate();
        return view('real.home', compact('title', 'description', 'hotels'));
    }

    public function view(Hotel $hotel)
    {
        $title = $hotel->name;
        $description = $hotel->name;
        $rooms = $hotel->rooms()->paginate();
        return view('real.hotels.view', compact('title', 'description', 'hotel', 'rooms'));
    }

    public function dashboard()
    {
        $hotel = Hotel::first();
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
            ->select('rooms.number', DB::raw('count(*) as total'),'rooms.image',DB::raw('sum(bookings.total_price) as total_price'))
            ->groupBy('rooms.number','rooms.image')
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
}
