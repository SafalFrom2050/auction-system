<?php

namespace Database\Seeders;

use App\Models\AdditionalDetail;
use Illuminate\Database\Seeder;

class AdditionalDetailSeeder extends Seeder
{
    public function run()
    {
        $this->forDrawings();
        $this->forPaintings();
        $this->forImages();
        $this->forSculptures();
        $this->forCarvings();
    }

    private function forDrawings()
    {
        AdditionalDetail::create([
            'value' => 'pencil',
            'category_specific_detail_id' => 1,
            'item_id' => 1
        ]);

        AdditionalDetail::create([
            'value' => '0',
            'category_specific_detail_id' => 2,
            'item_id' => 1
        ]);

        AdditionalDetail::create([
            'value' => '50*100 cm',
            'category_specific_detail_id' => 3,
            'item_id' => 1
        ]);
    }

    private function forPaintings()
    {
        AdditionalDetail::create([
            'value' => 'acrylic',
            'category_specific_detail_id' => 4,
            'item_id' => 2
        ]);

        AdditionalDetail::create([
            'value' => '0',
            'category_specific_detail_id' => 5,
            'item_id' => 2
        ]);

        AdditionalDetail::create([
            'value' => '50*100 cm',
            'category_specific_detail_id' => 6,
            'item_id' => 2
        ]);
    }

    private function forImages()
    {
        AdditionalDetail::create([
            'value' => 'Colour',
            'category_specific_detail_id' => 7,
            'item_id' => 3
        ]);

        AdditionalDetail::create([
            'value' => '50*100 cm',
            'category_specific_detail_id' => 8,
            'item_id' => 3
        ]);
    }

    private function forSculptures()
    {
        AdditionalDetail::create([
            'value' => 'Bronze',
            'category_specific_detail_id' => 9,
            'item_id' => 4
        ]);

        AdditionalDetail::create([
            'value' => '50*100 cm',
            'category_specific_detail_id' => 10,
            'item_id' => 4
        ]);

        AdditionalDetail::create([
            'value' => '10',
            'category_specific_detail_id' => 11,
            'item_id' => 4
        ]);
    }

    private function forCarvings()
    {
        AdditionalDetail::create([
            'value' => 'Oak',
            'category_specific_detail_id' => 12,
            'item_id' => 5
        ]);

        AdditionalDetail::create([
            'value' => '50*100 cm',
            'category_specific_detail_id' => 13,
            'item_id' => 5
        ]);

        AdditionalDetail::create([
            'value' => '10',
            'category_specific_detail_id' => 14,
            'item_id' => 5
        ]);
    }
}
