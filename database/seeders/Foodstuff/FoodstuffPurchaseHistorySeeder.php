<?php

namespace Database\Seeders\Foodstuff;

use App\Models\Foodstuff\FoodstuffPurchaseHistory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodstuffPurchaseHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FoodstuffPurchaseHistory::factory(7)->create();
    }
}
