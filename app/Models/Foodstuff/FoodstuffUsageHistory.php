<?php

namespace App\Models\Foodstuff;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodstuffUsageHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'label',
        'used_at',
    ];

    public function usages()
    {
        return $this->hasMany(FoodstuffUsage::class, 'history_id');
    }
}
