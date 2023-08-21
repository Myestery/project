<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Hotel;
use App\Models\HotelAdmin;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HotelAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hotel::all()->each(function ($hotel) {
            $adminUser = User::factory()->create();
            HotelAdmin::create([
                'user_id' => $adminUser->id,
                'hotel_id' => $hotel->id,
                'role' => 'admin'
            ]);
        });

        HotelAdmin::create([
            'user_id' => 2,
            'hotel_id' => 1,
            'role' => 'admin'
        ]);
    }
}
