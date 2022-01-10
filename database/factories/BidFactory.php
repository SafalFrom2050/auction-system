<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BidFactory extends Factory
{
    public function definition(): array
    {
        return [
            'price' => $this->faker->numberBetween(1000, 1000000),
            'user_id' => $this->faker->numberBetween(1, 10),
            'item_id' => $this->faker->numberBetween(1, 50)
        ];
    }
}
