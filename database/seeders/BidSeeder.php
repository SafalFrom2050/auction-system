<?php

namespace Database\Seeders;

use App\Models\Bid;
use Illuminate\Database\Seeder;

class BidSeeder extends Seeder
{
    public function run()
    {
        foreach (range(1, 50) as $itemId) {
            Bid::factory(4)->create([
                'item_id' => $itemId,
            ]);
        }

    }
}
