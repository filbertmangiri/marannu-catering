<?php

namespace Database\Seeders\Foodstuff;

use App\Models\Foodstuff\Foodstuff;
use Illuminate\Support\Str;
use App\Enums\MeasurementUnit;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FoodstuffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = now();

        Foodstuff::insert([
            [
                'name' => 'Wortel',
                'slug' => Str::slug('Wortel', '-'),
                'quantity' => 20,
                'price' => 10000,
                'measurement_unit' => MeasurementUnit::Kilogram->value,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'name' => 'Cabai Merah',
                'slug' => Str::slug('Cabai Merah', '-'),
                'quantity' => 14,
                'price' => 35000,
                'measurement_unit' => MeasurementUnit::Kilogram->value,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'name' => 'Kaldu Sapi',
                'slug' => Str::slug('Kaldu Sapi', '-'),
                'quantity' => 17,
                'price' => 30000,
                'measurement_unit' => MeasurementUnit::Liter->value,
                'created_at' => $now,
                'updated_at' => $now,
            ]
        ]);
    }
}
