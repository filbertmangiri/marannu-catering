<?php

namespace App\Http\Controllers\Foodstuff;

use Illuminate\Http\Request;
use App\Models\Foodstuff\Foodstuff;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Foodstuff\StoreFoodstuffRequest;
use App\Http\Requests\Foodstuff\UpdateFoodstuffRequest;

class FoodstuffController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Foodstuff::class, 'foodstuff');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foodstuffs = Foodstuff::all();

        return view('pages.foodstuff.index', compact('foodstuffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.foodstuff.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Foodstuff\StoreFoodstuffRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFoodstuffRequest $request)
    {
        $validated = $request->validated();

        Foodstuff::create($validated);

        return Redirect::route('foodstuff.index')->with('alert', [
            'success' => true,
            'message' => 'Bahan makanan berhasil ditambahkan'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Foodstuff  $foodstuff
     * @return \Illuminate\Http\Response
     */
    public function show(Foodstuff $foodstuff)
    {
        return view('pages.foodstuff.show', compact('foodstuff'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Foodstuff  $foodstuff
     * @return \Illuminate\Http\Response
     */
    public function edit(Foodstuff $foodstuff)
    {
        return view('pages.foodstuff.edit', [
            'foodstuff' => $foodstuff
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Foodstuff\UpdateFoodstuffRequest  $request
     * @param  \App\Models\Foodstuff  $foodstuff
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFoodstuffRequest $request, Foodstuff $foodstuff)
    {
        $validated = $request->validated();

        $foodstuff->update($validated);

        return Redirect::route('foodstuff.index')->with('alert', [
            'success' => true,
            'message' => "Bahan makanan <b>$foodstuff->name</b> berhasil diperbarui",
        ]);
    }

    public function patch(Request $request, Foodstuff $foodstuff)
    {
        $request->validate([
            'price' => ['required', 'numeric', 'min:0', 'not_in:0']
        ]);

        $foodstuff->price = $request->price;

        $foodstuff->save();

        return Redirect::back()->with('alert', [
            'success' => true,
            'message' => "Harga <b>$foodstuff->name</b> berhasil diperbarui",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Foodstuff  $foodstuff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Foodstuff $foodstuff)
    {
        $foodstuff->delete();

        return Redirect::route('foodstuff.index')->with('alert', [
            'success' => true,
            'message' => "Bahan makanan <b>$foodstuff->name</b> berhasil dihapus",
        ]);
    }
}
