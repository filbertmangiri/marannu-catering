<?php

namespace App\Http\Controllers\Foodstuff;

use App\Enums\MeasurementUnit;
use App\Http\Controllers\Controller;
use App\Models\Foodstuff\Foodstuff;
use App\Models\Foodstuff\FoodstuffPurchase;
use App\Models\Foodstuff\FoodstuffPurchaseHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Enum;

class FoodstuffPurchaseController extends Controller
{
    public function index()
    {
        $purchases = FoodstuffPurchaseHistory::withCount('purchases')
            ->orderBy('purchased_at', 'desc')
            ->orderBy('id', 'desc')
            ->get();

        return view('pages.foodstuff.purchase.index', compact('purchases'));
    }

    public function show(FoodstuffPurchaseHistory $purchaseHistory)
    {
        $purchaseHistory = $purchaseHistory->load(['purchases', 'purchases.foodstuff:id,slug,price']);

        return view('pages.foodstuff.purchase.show', compact('purchaseHistory'));
    }

    public function create()
    {
        $foodstuffs = Foodstuff::all();

        return view('pages.foodstuff.purchase.create', compact('foodstuffs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'rows_count' => ['required', 'numeric', 'min:1'],

            'label' => ['nullable', 'string'],
            'purchased_at' => ['required', 'date'],

            'foodstuff_id' => ['array'],
            'foodstuff_id.*' => ['required', 'numeric', 'min:1'],

            'quantity' => ['array'],
            'quantity.*' => ['required', 'numeric', 'min:0', 'not_in:0'],

            'price' => ['array'],
            'price.*' => ['required', 'numeric', 'min:0'],
        ], [
            'rows_count' => 'Harus ada minimal satu :attribute yang dipilih'
        ], [
            'rows_count' => 'bahan makanan',

            'label' => 'label',
            'purchased_at' => 'tanggal pembelian',

            'foodstuff_id.*' => 'bahan makanan',
            'quantity.*' => 'kuantitas',
            'price.*' => 'harga',
        ]);

        $history = FoodstuffPurchaseHistory::create([
            'label' => $request->label,
            'purchased_at' => $request->purchased_at,
        ]);

        foreach (range(0, $request->rows_count - 1) as $i) {
            $foodstuff = Foodstuff::find($request->foodstuff_id[$i]);

            $purchases[] = [
                'history_id' => $history->id,
                'foodstuff_id' => $foodstuff->id,
                'name' => $foodstuff->name,
                'quantity' => $request->quantity[$i],
                'price' => $request->price[$i],
                'measurement_unit' => $foodstuff->measurement_unit,
            ];

            $foodstuff->quantity += $request->quantity[$i];

            $foodstuff->save();
        }

        FoodstuffPurchase::insert($purchases);

        return Redirect::route('foodstuff.purchase.index')->with('alert', [
            'success' => true,
            'message' => 'Pembelian baru berhasil ditambahkan'
        ]);
    }
}
