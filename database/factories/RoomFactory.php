<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $images = [
            'https://www.usatoday.com/gcdn/-mm-/05b227ad5b8ad4e9dcb53af4f31d7fbdb7fa901b/c=0-64-2119-1259/local/-/media/USATODAY/USATODAY/2014/08/13/1407953244000-177513283.jpg',
            'https://static.independent.co.uk/2023/03/24/09/Best%20New%20York%20boutique%20hotels.jpg?width=1200',
            'https://q-xx.bstatic.com/xdata/images/hotel/max500/68955174.jpg?k=97655e2e14e5464e659ba11c457e2241112d6a9aeac4d55f846467c481bfe490&o=',
            'https://images.trvl-media.com/hotels/10000000/9220000/9215600/9215515/135ef2a5_b.jpg',
            'https://cf.bstatic.com/xdata/images/hotel/max1024x768/370564672.jpg?k=4f37af06c05a6f5dfc7db5e8e71d2eb66cae6eec36af7a4a4cd7a25d65ceb941&o=&hp=1',
            'https://media-cdn.tripadvisor.com/media/photo-m/1280/23/8f/c3/3e/laur-hotels.jpg',
            'https://cf.bstatic.com/xdata/images/hotel/max1024x768/370564580.jpg?k=bc74e178596941fae76c2438afa6cb7619fad161439b7352e29ae671ab006391&o=&hp=1',
            'https://dcontent.inviacdn.net/shared/img/web-800x600/2020/2/8/d23/24075875-laur-hotels-experience-elegance-ex-didim-beach.jpg'
        ];
        $roomType = $this->faker->randomElement(['Single', 'Double', 'Hall']);
        return [
            'hotel_id' => $this->faker->numberBetween(1, 10),
            'number' => $this->faker->numerify('R###'),
            'type' => $roomType,
            'price' => $this->faker->numberBetween(12_000, 500_000),
            'capacity' => match ($roomType) {
                'Single' => 1,
                'Double' => 2,
                'Hall' => $this->faker->numberBetween(10, 100),
            },
            'description' => $this->faker->sentence,
            'image' => $this->faker->randomElement($images),
            'is_available' => $this->faker->boolean(80), // 80% chance of being available
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
