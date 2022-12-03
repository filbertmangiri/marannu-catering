<?php

use App\Models\Foodstuff\Foodstuff;
use App\Models\Foodstuff\FoodstuffPurchaseHistory;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foodstuff_purchases', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(FoodstuffPurchaseHistory::class, 'history_id');
            $table->foreignIdFor(Foodstuff::class, 'foodstuff_id')->nullable()->constrained()->nullOnDelete();
            $table->string('name');
            $table->float('quantity')->unsigned();
            $table->integer('price')->unsigned();
            $table->string('measurement_unit');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foodstuff_purchases');
    }
};
