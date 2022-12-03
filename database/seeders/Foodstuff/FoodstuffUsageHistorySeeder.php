<?php

namespace Database\Seeders\Foodstuff;

use App\Models\Foodstuff\FoodstuffUsageHistory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodstuffUsageHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FoodstuffUsageHistory::factory(5)->create();
    }
}
