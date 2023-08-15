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
        $hotels = Hotel::all();

        foreach ($users as $user) {
            foreach ($hotels as $hotel) {
                Booking::factory()->create([
                    'user_id' => $user->id,
                    'hotel_id' => $hotel->id,
                    'room_id' => $hotel->rooms->random()->id,
                ]);

                // You can also associate a room to the booking here
                // $room = $hotel->rooms->random();
                // $booking->room_id = $room->id;
                // $booking->save();
            }
        }
    }
}
