<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $casts = [
        'check_in' => 'datetime',
        'check_out' => 'datetime',
    ];

    protected $guarded = [];

    protected $appends = ['days'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }

    public function getDaysAttribute()
    {
        $checkIn = \Carbon\Carbon::parse($this->check_in);
        $checkOut = \Carbon\Carbon::parse($this->check_out);
        return $checkIn->diffInDays($checkOut);
    }
}
