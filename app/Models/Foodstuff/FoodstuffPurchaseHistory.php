<?php

namespace App\Models\Foodstuff;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodstuffPurchaseHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'label',
        'purchased_at',
    ];

    public function purchases()
    {
        return $this->hasMany(FoodstuffPurchase::class, 'history_id');
    }
}
