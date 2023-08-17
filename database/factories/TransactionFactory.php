<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
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
            'booking_id' => function () {
                return \App\Models\Booking::factory()->create()->id;
            },
            'room_id' => function () {
                return \App\Models\Room::factory()->create()->id;
            },
            'amount' => $this->faker->numberBetween(2_000, 90_000),
            'currency' => 'NGN',
            'payment_reference' => $this->faker->unique()->uuid,
            'flw_ref' => $this->faker->unique()->uuid,
            'flw_transaction_id' => $this->faker->unique()->uuid,
            'status' => false,
        ];
    }
}
