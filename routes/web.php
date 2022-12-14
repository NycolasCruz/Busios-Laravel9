<?php

use App\Http\Controllers\CurriculumController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;

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
    return view('auth.login');
});

Route::middleware(['auth'])->group(function () {
    // shop
    Route::get('/dashboard', [ShopController::class, 'index'])->name('dashboard.index');
    Route::post('/dashboard', [ShopController::class, 'store'])->name('dashboard.store');
    Route::get('/dashboard/getAllData', [ShopController::class, 'getAllData'])->name('dashboard.getAllData');
    Route::get('/dashboard/show/{shop_id}', [ShopController::class, 'show'])->name('dashboard.show');
    Route::post('/dashboard/update/{shop_id}', [ShopController::class, 'update'])->name('dashboard.update');

    // curriculum
    Route::post('/dashboard/curriculum/{shop_id}', [CurriculumController::class, 'store'])->name('curriculum.store');
});

require __DIR__ . '/auth.php';
