<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    public function run()
    {
        foreach (range(1, 5) as $i) {
            Item::factory(1)->create([
                'category_id' => $i
            ]);
        }

        Item::factory(50)->create();
    }
}
