<?php

namespace Database\Factories;

use App\Models\Room;
use App\Models\User;
use App\Models\Hotel;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => function () {
                return \App\Models\User::factory()->create()->id;
            },
            'hotel_id' => function () {
                return \App\Models\Hotel::factory()->create()->id;
            },
            'room_id' => function () {
                return \App\Models\Room::factory()->create()->id;
            },
            'check_in' => Carbon::now(),
            'check_out' => Carbon::now()->addDays(3),
            'total_price' => $this->faker->numberBetween(10_000, 90_000),
            'created_at' => Carbon::now()->subDays($this->faker->numberBetween(1, 100)),
        ];
    }
}
