<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booking;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

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

    public function adminIndex()
    {
        $user = Auth::user();
        $hotel = $user->hotel;
        $title = "Bookings for {$hotel->name}";
        $description = "Bookings for {$hotel->name}";
        $bookings = $hotel->bookings()->with(['room'])->latest()->paginate();
        $users = User::all();
        $rooms = $hotel->rooms;
        return view('real.bookings.adminIndex', compact('title', 'description', 'bookings', 'users', 'rooms'));
    }

    public function invoice(Booking $booking)
    {
        $user = Auth::user();
        if ($booking->user_id !== $user->id) abort(403);
        $title = "Invoice for {$user->name}";
        $description = "Invoice for {$user->name}";
        return view('real.bookings.invoice', compact('title', 'description', 'booking'));
    }

    public function adminInvoice(Booking $booking)
    {
        $user = Auth::user();
        $hotel = $user->hotel;
        if ($booking->hotel_id !== $hotel->id) abort(403);
        $title = "Invoice for {$hotel->name}";
        $description = "Invoice for {$hotel->name}";
        return view('real.bookings.adminInvoice', compact('title', 'description', 'booking'));
    }

    public function transactions()
    {
        $user = Auth::user();
        $isHotel = $user->hotel !== null;
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

    public function create(Request $request)
    {
        $user = Auth::user();
        $hotel = $user->hotel;
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'checkOut' => 'required|date',
            'checkIn' => 'required|date',
            'user_id' => 'required|exists:users,id',
        ]);
        $userid = $request->user_id;
        $room = $hotel->rooms()->where('id', $request->room_id)->first();
        if ($room === null) abort(403);
        $check_in = Date::parse($request->checkIn);
        $check_out = Date::parse($request->checkOut);
        $price = $room->price;
        $days = $check_in->diffInDays($check_out);
        $total = $price * $days;
        $booking = Booking::create([
            'user_id' => $userid,
            'hotel_id' => $hotel->id,
            'room_id' => $room->id,
            'check_in' => $check_in,
            'check_out' => $check_out,
            'total_price' => $total,
        ]);

        // create transaction
        Transaction::create([
            'hotel_id' => $hotel->id,
            'user_id' => $userid,
            'booking_id' => $booking->id,
            'room_id' => $room->id,
            'currency' => 'NGN', // 'USD
            'payment_reference' => $request->reference,
            'status' => 1,
            'amount' => $total,
        ]);
        return redirect("/admin/invoice/{$booking->id}")->with('success', 'Booking created successfully');
    }

}
