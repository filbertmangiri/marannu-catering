<?php

use App\Enums\Role;
use App\Models\Foodstuff\Foodstuff;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Foodstuff\FoodstuffController;
use App\Http\Controllers\Foodstuff\FoodstuffUsageController;
use App\Http\Controllers\Foodstuff\FoodstuffPurchaseController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('pages.dashboard');
    })->name('dashboard')->middleware('can:viewDashboard');

    Route::resource('user', UserController::class)->parameters([
        'user' => 'user:username'
    ])->except(['create', 'store']);

    Route::middleware('can:viewAny,' . Foodstuff::class)->group(function () {
        Route::controller(FoodstuffPurchaseController::class)->prefix('/foodstuff/purchase')->name('foodstuff.purchase.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/create', 'store')->name('store');
            Route::get('/{purchaseHistory}', 'show')->name('show');
        });

        Route::controller(FoodstuffUsageController::class)->prefix('/foodstuff/usage')->name('foodstuff.usage.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/create', 'store')->name('store');
            Route::get('/{usageHistory}', 'show')->name('show');
        });
    });

    Route::patch('/foodstuff/{foodstuff}/patch', [FoodstuffController::class, 'patch'])->name('foodstuff.patch')->middleware('can:patch,foodstuff');

    Route::resource('foodstuff', FoodstuffController::class)->parameters([
        'foodstuff' => 'foodstuff:slug'
    ]);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
