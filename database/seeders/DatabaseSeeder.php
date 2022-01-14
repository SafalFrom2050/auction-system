<?php

namespace Database\Seeders;

use App\Models\CategorySpecificDetail;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1)->create([
            'email' => 'buyer@aa.aa',
            'password' => bcrypt('pass'),
            'client_type' => 'buyer',
            'is_approved' => true
        ]);
        User::factory(1)->create([
            'email' => 'seller@aa.aa',
            'password' => bcrypt('pass'),
            'client_type' => 'seller',
            'is_approved' => true
        ]);

        User::factory(10)->create();

        $this->call(AdminSeeder::class);
        $this->call(AuctionSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ItemSeeder::class);
        $this->call(ReviewSeeder::class);
        $this->call(CategorySpecificDetailSeeder::class);
        $this->call(AdditionalDetailSeeder::class);
        $this->call(BidSeeder::class);
        $this->call(FaqCategorySeeder::class);
        $this->call(FaqSeeder::class);

    }
}
