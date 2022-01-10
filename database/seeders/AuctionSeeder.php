<?php

namespace Database\Seeders;

use App\Models\Auction;
use Illuminate\Database\Seeder;

class AuctionSeeder extends Seeder
{
    public function run()
    {
        Auction::factory(10)->create();
    }
}
