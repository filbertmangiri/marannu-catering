<?php

use App\Models\Foodstuff\Foodstuff;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Foodstuff\FoodstuffUsageHistory;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foodstuff_usages', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(FoodstuffUsageHistory::class, 'history_id');
            $table->foreignIdFor(Foodstuff::class, 'foodstuff_id')->nullable()->constrained()->nullOnDelete();
            $table->string('name');
            $table->float('quantity')->unsigned();
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
        Schema::dropIfExists('foodstuff_usages');
    }
};
