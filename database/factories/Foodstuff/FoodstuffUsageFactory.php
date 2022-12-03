<?php

namespace Database\Factories\Foodstuff;

use App\Models\Foodstuff\Foodstuff;
use App\Models\Foodstuff\FoodstuffPurchaseHistory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FoodstuffUsage>
 */
class FoodstuffUsageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $history_id = FoodstuffPurchaseHistory::inRandomOrder()->first()->id;
        $foodstuff = Foodstuff::find(mt_rand(1, Foodstuff::count()));

        return [
            'history_id' => $history_id,
            'foodstuff_id' => $foodstuff->id,
            'name' => $foodstuff->name,
            'quantity' => mt_rand(1, 10),
            'measurement_unit' => $foodstuff->measurement_unit,
        ];
    }
}
