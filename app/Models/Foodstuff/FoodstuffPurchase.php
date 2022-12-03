<?php

namespace App\Models\Foodstuff;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodstuffPurchase extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'history_id',
        'foodstuff_id',
        'name',
        'quantity',
        'price',
        'measurement_unit',
    ];

    public function history()
    {
        return $this->belongsTo(FoodstuffHistory::class);
    }

    public function foodstuff()
    {
        return $this->belongsTo(Foodstuff::class, 'foodstuff_id');
    }
}
