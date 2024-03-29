<?php

use App\Http\Controllers\AuctionsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ItemsController;
use App\Http\Livewire\User\UserNavComponent;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [AuctionsController::class, 'index'])->name('home');

Route::prefix('auction')->name('auction.')->group(function () {
    Route::get('{auction}', [AuctionsController::class, 'show'])->name('details');
    Route::get('{auction}/search', [AuctionsController::class, 'search'])->name('search');
});

Route::prefix('category')->name('category.')->group(function () {
    Route::get('{category}', [CategoriesController::class, 'show'])->name('details');
    Route::get('{category}/search', [CategoriesController::class, 'search'])->name('search');
});

Route::prefix('item')->name('item.')->group(function () {
    Route::get('category/{slug}', function () {
        return view('items-list');
    })->name('list');
    Route::get('{item}', [ItemsController::class, 'show'])->name('details');
    Route::post('{item}/bid', [ItemsController::class, 'bid'])->name('bid');
    Route::post('{item}/rate', [ItemsController::class, 'rate'])->name('rate');

});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::middleware(['auth'])->prefix('user')
    ->name('user.')->group(function () {

        Route::get('/{navLink?}', UserNavComponent::class)
            ->name('dashboard');

    });


Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('index');
});

require __DIR__.'/auth.php';
