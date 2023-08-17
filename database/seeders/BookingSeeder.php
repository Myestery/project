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
        $users = User::all();

        foreach ($users as $user) {
            for ($i = 0; $i < 5; $i++) {
                $hotel_id = rand(1, 250); // 250 is the number of hotels (see HotelSeeder.php
                Booking::factory()->create([
                    'user_id' => $user->id,
                    'hotel_id' => $hotel_id,
                    'room_id' => Hotel::find($hotel_id)->rooms->random()->id,
                ]);
            }
        }
    }
}
