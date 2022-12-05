<?php

namespace App\Http\Controllers\Foodstuff;

use Illuminate\Http\Request;
use App\Enums\MeasurementUnit;
use App\Models\Foodstuff\Foodstuff;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules\Enum;
use App\Models\Foodstuff\FoodstuffUsage;
use Illuminate\Support\Facades\Redirect;
use App\Models\Foodstuff\FoodstuffUsageHistory;

class FoodstuffUsageController extends Controller
{
    public function index()
    {
        $usages = FoodstuffUsageHistory::withCount('usages')
            ->orderBy('used_at', 'desc')
            ->orderBy('id', 'desc')
            ->get();

        return view('pages.foodstuff.usage.index', compact('usages'));
    }

    public function show(FoodstuffUsageHistory $usageHistory)
    {
        $usageHistory = $usageHistory->load(['usages', 'usages.foodstuff:id,slug']);

        return view('pages.foodstuff.usage.show', compact('usageHistory'));
    }

    public function create()
    {
        $foodstuffs = Foodstuff::all();

        return view('pages.foodstuff.usage.create', compact('foodstuffs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'rows_count' => ['required', 'numeric', 'min:1'],

            'label' => ['nullable', 'string'],
            'used_at' => ['required', 'date'],

            'foodstuff_id' => ['array'],
            'foodstuff_id.*' => ['required', 'numeric', 'min:1'],

            'quantity' => ['array'],
            'quantity.*' => ['required', 'numeric', 'min:0', 'not_in:0', function ($attribute, $value, $fail) {
                $foodstuff = Foodstuff::find(request()->foodstuff_id[(int) explode('.', $attribute)[1]]);

                if (!$foodstuff) {
                    $fail('Bahan makanan tidak ditemukan');
                    return;
                }

                $quantity = $foodstuff->quantity;
                $measurement_unit = $foodstuff->measurement_unit;

                if ($value > $quantity) {
                    $fail(':Attribute melebihi stok');
                }
            }],
        ], [
            'rows_count' => 'Harus ada minimal satu :attribute yang dipilih'
        ], [
            'rows_count' => 'bahan makanan', 'label' => 'label',
            'used_at' => 'tanggal pembelian',

            'foodstuff_id.*' => 'bahan makanan',
            'quantity.*' => 'kuantitas',
        ]);

        $history = FoodstuffUsageHistory::create([
            'label' => $request->label,
            'used_at' => $request->used_at,
        ]);

        foreach (range(0, $request->rows_count - 1) as $i) {
            $foodstuff = Foodstuff::find($request->foodstuff_id[$i]);

            $usages[] = [
                'history_id' => $history->id,
                'foodstuff_id' => $foodstuff->id,
                'name' => $foodstuff->name,
                'quantity' => $request->quantity[$i],
                'measurement_unit' => $foodstuff->measurement_unit,
            ];

            $foodstuff->quantity -= $request->quantity[$i];

            $foodstuff->save();
        }

        FoodstuffUsage::insert($usages);

        return Redirect::route('foodstuff.usage.index')->with('alert', [
            'success' => true,
            'message' => 'Pemakaian baru berhasil ditambahkan'
        ]);
    }
}
