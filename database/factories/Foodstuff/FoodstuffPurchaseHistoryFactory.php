<?php

namespace Database\Factories\Foodstuff;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FoodstuffPurchaseHistory>
 */
class FoodstuffPurchaseHistoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'purchased_at' => now()
        ];
    }
}
