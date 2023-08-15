<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Hotel::factory(250)->create();

        // create 25 rooms for each hotel
        \App\Models\Hotel::all()->each(function ($hotel) {
            $hotel->rooms()->saveMany(\App\Models\Room::factory(25)->make());
        });
    }
}
