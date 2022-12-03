<?php

use App\Enums\Role;
use App\Models\Foodstuff\Foodstuff;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Foodstuff\FoodstuffController;
use App\Http\Controllers\Foodstuff\FoodstuffUsageController;
use App\Http\Controllers\Foodstuff\FoodstuffPurchaseController;

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

Route::controller(PageController::class)->name('page.')->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/dashboard', 'dashboard')->name('dashboard')->middleware([
        'auth',
        'verified',
        'can:viewDashboard',
    ]);

    Route::get('/home', fn () => redirect(route('page.home')));
});

Route::controller(FoodstuffPurchaseController::class)->prefix('/foodstuff/purchase')->name('foodstuff.purchase.')->middleware('can:viewAny,' . Foodstuff::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/create', 'store')->name('store');
    Route::get('/{purchaseHistory}', 'show')->name('show');
});

Route::controller(FoodstuffUsageController::class)->prefix('/foodstuff/usage')->name('foodstuff.usage.')->middleware('can:viewAny,' . Foodstuff::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/create', 'store')->name('store');
    Route::get('/{usage}', 'show')->name('show');
});

Route::patch('/foodstuff/{foodstuff}/patch', [FoodstuffController::class, 'patch']);

Route::resource('foodstuff', FoodstuffController::class)->parameters([
    'foodstuff' => 'foodstuff:slug'
])->middleware('can:viewAny,' . Foodstuff::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
