<?php

namespace Database\Factories;

use App\Models\Auction;
use Illuminate\Database\Eloquent\Factories\Factory;

class AuctionFactory extends Factory
{

    public function definition(): array
    {
        return [
            'heading' => ucwords($this->faker->unique(true)->words($nb=5, $asText=true)),
            'description' => $this->faker->unique(true)->words($nb=50, $asText=true),
            'image_url' => 'https://picsum.photos/400/300.webp?random=' . $this->faker->unique(true)->numberBetween(1, 20),
            'location' => $this->faker->address,
            'period' => $this->faker->randomElement(['Morning', 'Afternoon', 'Evening','Night']),
            'date_time' => $this->faker->dateTime,
            'end_date' => $this->faker->dateTimeBetween('now', '+1 months')
        ];
    }
}
