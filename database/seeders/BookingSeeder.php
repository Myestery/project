<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Hotel;
use App\Models\Booking;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hotels = Hotel::all();

        foreach ($hotels as $hotel) {
            for ($i = 0; $i < 5; $i++) {
                $user_id = rand(1, 10); // 250 is the number of hotels (see HotelSeeder.php
                Booking::factory()->create([
                    'user_id' => $user_id,
                    'hotel_id' => $hotel->id,
                    'room_id' => $hotel->rooms->random()->id,
                ]);
            }
        }

        // ensure bookings for rooms 11, 12 and 13 are booked by user 1
        Booking::factory()->create([
            'user_id' => 1,
            'hotel_id' => 1,
            'room_id' => 11,
        ]);

        Booking::factory()->create([
            'user_id' => 1,
            'hotel_id' => 1,
            'room_id' => 12,
        ]);

        Booking::factory()->create([
            'user_id' => 1,
            'hotel_id' => 1,
            'room_id' => 13,
        ]);
    }
}
