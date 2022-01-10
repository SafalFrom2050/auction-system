<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    public function definition(): array
    {
        $classifications = ['landscape', 'seascape', 'portrait', 'figure', 'still', 'life', 'nude', 'animal', 'abstract'];
        return [
            'lot_no' => $this->faker->unique(true)->randomNumber(8),
            'artist' => $this->faker->name,
            'classification' => $this->faker->randomElement($classifications),
            'production_date' => $this->faker->date,
            'title' => ucfirst($this->faker->words(5, true)),
            'est_price' => $this->faker->randomNumber(5),
            'description' => ucfirst($this->faker->words(55, true)),
            'image_url' => 'https://picsum.photos/400/300.webp?random=' . $this->faker->unique(true)->numberBetween(1, 20),
            'category_id' => $this->faker->randomElement([1, 2, 3, 4, 5]),
            'auction_id' => $this->faker->randomElement([1, 2, 3, 4, 5]),
        ];
    }
}
