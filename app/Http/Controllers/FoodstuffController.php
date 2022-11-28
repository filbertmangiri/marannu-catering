<?php

namespace App\Http\Controllers;

use App\Models\Foodstuff;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\StoreFoodstuffRequest;
use App\Http\Requests\UpdateFoodstuffRequest;

class FoodstuffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foodstuffs = Foodstuff::all();

        return view('pages.foodstuff.index', [
            'foodstuffs' => $foodstuffs
        ]);
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
     * @param  \App\Http\Requests\StoreFoodstuffRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFoodstuffRequest $request)
    {
        $validated = $request->validated();

        dd($validated);

        // $validated['slug'] = Str::slug($validated['name'], '-');

        Foodstuff::create($validated);

        return Redirect::route('foodstuff.index')->with('message', 'Bahan makanan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Foodstuff  $foodstuff
     * @return \Illuminate\Http\Response
     */
    public function show(Foodstuff $foodstuff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Foodstuff  $foodstuff
     * @return \Illuminate\Http\Response
     */
    public function edit(Foodstuff $foodstuff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFoodstuffRequest  $request
     * @param  \App\Models\Foodstuff  $foodstuff
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFoodstuffRequest $request, Foodstuff $foodstuff)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Foodstuff  $foodstuff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Foodstuff $foodstuff)
    {
        //
    }
}
