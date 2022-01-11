<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BidFactory extends Factory
{
    public function definition(): array
    {
        $price = $this->faker->numberBetween(1000, 1000000);
        $commission = (0.1 * $price);
        $tax_amount = (0.13 * $price);
        $total_price = $price + $commission + $tax_amount;

        return [
            'price' => $price,
            'commission' => $commission,
            'tax_amount' => $tax_amount,
            'total_price' => $total_price,
            'user_id' => $this->faker->numberBetween(1, 10),
            'item_id' => $this->faker->numberBetween(1, 50)
        ];
    }
}
