<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hotel>
 */
class HotelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'address' => $this->faker->address,
            'state_id' => $this->faker->numberBetween(1, 36), // Replace with your logic to generate state_id
            'country' => 'NGA',
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'rating' => $this->faker->randomFloat(1, 0, 5),
            'min_price' => $this->faker->numberBetween(1000, 10000),
            'max_price' => $this->faker->numberBetween(10000, 100000),
            'website' => $this->faker->url(),
            'images' => [
                $this->faker->imageUrl,
                $this->faker->imageUrl,
                $this->faker->imageUrl,
            ],
            'logo' => $this->faker->imageUrl,
            'description' => $this->faker->sentence,
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'city' => $this->faker->city,
        ];
    }
}
