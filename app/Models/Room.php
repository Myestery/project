<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $appends = ['is_available','checkout_date'];
    protected $with = ['activeBooking'];

    public function getIsAvailableAttribute()
    {
        // check if there is a booking for this room
        $booking = Booking::where('room_id', $this->id)
            ->where('check_in', '<=', now())
            ->where('check_out', '>=', now())
            ->first();

        return $booking ? false : true;
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function activeBooking()
    {
        return $this->hasOne(Booking::class)
            ->where('check_in', '<=', now())
            ->where('check_out', '>=', now());
    }

    public function getCheckoutDateAttribute()
    {
        return $this->activeBooking?->check_out ?? now();
    }
}
