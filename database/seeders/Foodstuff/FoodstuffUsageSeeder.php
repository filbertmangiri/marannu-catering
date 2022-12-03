<?php

namespace Database\Seeders\Foodstuff;

use App\Models\Foodstuff\FoodstuffUsage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodstuffUsageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FoodstuffUsage::factory(20)->create();
    }
}
