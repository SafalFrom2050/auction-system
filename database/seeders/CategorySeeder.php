<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = ['Drawings', 'Paintings', 'Photographic Images', 'Sculptures', 'Carvings'];

        foreach ($categories as $category) {
            Category::create(['name'=>$category]);
        }
    }
}
