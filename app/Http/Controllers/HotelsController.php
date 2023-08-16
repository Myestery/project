<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Hotel;
use Illuminate\Http\Request;

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
        return view('real.dashboard', compact(
            'title',
            'description',
            'hotel',
            'rooms',
            'total_customers',
            'total_sales',
            'total_rooms',
            'total_bookings'
        ));
    }
}
