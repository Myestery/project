<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $casts = [
        'images' => 'array'
    ];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function admins()
    {
        return $this->hasManyThrough(User::class, HotelAdmin::class, 'hotel_id', 'id', 'id', 'user_id');
    }
}
