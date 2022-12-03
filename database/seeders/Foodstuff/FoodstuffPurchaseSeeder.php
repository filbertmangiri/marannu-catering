<?php

namespace Database\Seeders\Foodstuff;

use App\Models\Foodstuff\FoodstuffPurchase;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodstuffPurchaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FoodstuffPurchase::factory(35)->create();
    }
}
