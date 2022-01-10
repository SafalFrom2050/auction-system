<?php

namespace Database\Seeders;

use App\Models\CategorySpecificDetail;
use Illuminate\Database\Seeder;

class CategorySpecificDetailSeeder extends Seeder
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
        CategorySpecificDetail::create([
            'name' => 'Drawing Medium',
            'type' => 'string',
            'category_id' => 1
        ]);

        CategorySpecificDetail::create([
            'name' => 'Is Framed',
            'type' => 'boolean',
            'category_id' => 1
        ]);

        CategorySpecificDetail::create([
            'name' => 'Dimension',
            'type' => 'string',
            'category_id' => 1
        ]);
    }

    private function forPaintings()
    {
        CategorySpecificDetail::create([
            'name' => 'Medium',
            'type' => 'string',
            'category_id' => 2
        ]);

        CategorySpecificDetail::create([
            'name' => 'Is Framed',
            'type' => 'boolean',
            'category_id' => 2
        ]);

        CategorySpecificDetail::create([
            'name' => 'Dimension',
            'type' => 'string',
            'category_id' => 2
        ]);
    }

    private function forImages()
    {
        CategorySpecificDetail::create([
            'name' => 'Image Type',
            'type' => 'string',
            'category_id' => 3
        ]);

        CategorySpecificDetail::create([
            'name' => 'Dimension',
            'type' => 'string',
            'category_id' => 3
        ]);
    }

    private function forSculptures()
    {
        CategorySpecificDetail::create([
            'name' => 'Material Used',
            'type' => 'string',
            'category_id' => 4
        ]);

        CategorySpecificDetail::create([
            'name' => 'Dimension',
            'type' => 'string',
            'category_id' => 4
        ]);

        CategorySpecificDetail::create([
            'name' => 'Weight',
            'type' => 'number',
            'category_id' => 4
        ]);
    }

    private function forCarvings()
    {
        CategorySpecificDetail::create([
            'name' => 'Material Used',
            'type' => 'string',
            'category_id' => 5
        ]);

        CategorySpecificDetail::create([
            'name' => 'Dimension',
            'type' => 'string',
            'category_id' => 5
        ]);

        CategorySpecificDetail::create([
            'name' => 'Weight',
            'type' => 'number',
            'category_id' => 5
        ]);
    }
}
