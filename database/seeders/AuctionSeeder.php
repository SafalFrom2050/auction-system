<?php

namespace Database\Seeders;

use App\Models\Auction;
use Illuminate\Database\Seeder;

class AuctionSeeder extends Seeder
{
    public function run()
    {
        Auction::factory(1)->create([
            'heading' => '21st Century English Paintings from Emergent Artist – The Blast Collection',
            'description' => 'An exceptionally fine contemporary painting capturing the lust for wealth that exemplified the early part of the century within the capitalist financial markets of the world.',
            'location' => 'London',
            'date_time' => '29-10-2017',
            'period' => 'Afternoon'
        ]);
        Auction::factory(9)->create();
    }
}
