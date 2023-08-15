<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $user = User::first();
        $title = "Bookings for {$user->name}";
        $description = "Bookings for {$user->name}";
        $bookings = $user->bookings()->with(['hotel','room'])->paginate();
        return view('real.bookings.index', compact('title', 'description', 'bookings'));
    }
}
