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
}
