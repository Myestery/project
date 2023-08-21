<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $title = "Bookings for {$user->name}";
        $description = "Bookings for {$user->name}";
        $bookings = $user->bookings()->with(['hotel', 'room'])->latest()->paginate();
        return view('real.bookings.index', compact('title', 'description', 'bookings'));
    }

    public function invoice(Booking $booking)
    {
        $user = Auth::user();
        if ($booking->user_id !== $user->id) abort(403);
        $title = "Invoice for {$user->name}";
        $description = "Invoice for {$user->name}";
        return view('real.bookings.invoice', compact('title', 'description', 'booking'));
    }

    public function transactions()
    {
        $user = Auth::user();
        $isHotel = $user->hotel_id !== null;
        $hotel = $user->hotel;
        $title = $isHotel ? "Transactions for {$hotel?->name}" : "Transactions for {$user?->name}";
        $description = $isHotel ? "Transactions for {$hotel?->name}" : "Transactions for {$user?->name}";
        $transactions = $isHotel ? $hotel?->transactions()->latest()->get() : $user->transactions()->latest()->get();
        return view('real.bookings.transactions', compact('title', 'description', 'transactions', 'isHotel'));
    }

    public function cancel(Booking $booking)
    {
        $user = Auth::user();
        if ($booking->user_id !== $user->id) abort(403);
        // if the booking check in isnt up to in 12 hours, dont cancel
        if ($booking->check_in->diffInHours(now()) < 12) {
           abort(403, 'You cannot cancel this booking, check in is less than 12 hours from now');
        }
        $booking->delete();
        return redirect('/bookings')->with('success', 'Booking cancelled successfully');
    }
}
