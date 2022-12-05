<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Database\Seeders\Foodstuff\FoodstuffSeeder;
use Database\Seeders\Foodstuff\FoodstuffPurchaseSeeder;
use Database\Seeders\Foodstuff\FoodstuffPurchaseHistorySeeder;
use Database\Seeders\Foodstuff\FoodstuffUsageSeeder;
use Database\Seeders\Foodstuff\FoodstuffUsageHistorySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (env('APP_DEBUG', false)) {
            $this->call([
                AdminSeeder::class,
                UserSeeder::class,
                FoodstuffSeeder::class,
                FoodstuffPurchaseHistorySeeder::class,
                FoodstuffPurchaseSeeder::class,
                FoodstuffUsageHistorySeeder::class,
                FoodstuffUsageSeeder::class,
            ]);
        }
    }
}
