<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'ludwig.bruen@example.org',
        ]);
        \App\Models\User::factory(10)->create();
        \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.org',
            'hotel_id' => 1,
        ]);
        $this->call(StateSeeder::class);
        $this->call(HotelSeeder::class);
        $this->call(RoomSeeder::class);
        $this->call(BookingSeeder::class);
    }
}
