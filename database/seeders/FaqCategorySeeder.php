<?php

namespace Database\Seeders;

use App\Models\FaqCategory;
use Illuminate\Database\Seeder;

class FaqCategorySeeder extends Seeder
{
    public function run()
    {
        collect($this->getFaqCategories())->each(
            function ($faqCategory) {
                FaqCategory::create($faqCategory);
            }
        );
    }

    public function getFaqCategories(): array
    {
        return [
            [
                'name' => 'Delivery',
                'is_parent' => 1,
                'parent_cat_id' => null
            ],
            [
                'name' => 'How to place a Bid?',
                'is_parent' => 0,
                'parent_cat_id' => 1
            ],
            [
                'name' => 'How can I check my bid status?',
                'is_parent' => 1,
                'parent_cat_id' => null
            ],
            [
                'name' => 'Can I cancel my request after winning?',
                'is_parent' => 0,
                'parent_cat_id' => 3
            ],
        ];
    }
}
