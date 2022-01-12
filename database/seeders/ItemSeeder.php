<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    public function run()
    {
        Item::factory(1)->create([
            'lot_no' => '92',
            'title' => 'Emergent Wealth',
            'artist' => ' Charles Bellender',
            'classification' => 'Minimalist',
            'description' => 'An exceptionally fine contemporary painting capturing the lust for wealth that exemplified the early part of the century within the capitalist financial markets of the world.',
            'est_price' => '10000',
            'category_id' => 2,
            'auction_id' => 1,
            'seller_id' => 1
        ]);

        foreach (range(1, 5) as $i) {
            Item::factory(1)->create([
                'category_id' => $i,
                'seller_id' => $i
            ]);
        }

        Item::factory(49)->create();
    }
}
