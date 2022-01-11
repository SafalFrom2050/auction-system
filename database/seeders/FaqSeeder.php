<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run()
    {
        collect($this->getFaqs())->each(
            function ($faq) {
                Faq::create($faq);
            }
        );
    }

    public function getFaqs(): array
    {
        return [
            [
                'question' => 'Track your bids',
                'answer' => "All you need to do is log into your account and view your current bids on the `User Dashboard`.",
                'category_id' => 2
            ],
            [
                'question' => 'Check current highest bid amount',
                'answer' => "You’ll find this information in the item's description page below the `Bid` button.

                Please remember that the highest amount is not in real time. Make sure you refresh the page manually to check current highest bid.",
                'category_id' => 2,
            ],
            [
                'question' => "I cannot access the website",
                'answer' => "Please check your internet connection. If other sites are working fine, you can check our social pages for notice regarding outages.",
                'category_id' => 2,
            ],
        ];
    }
}
