<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;

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
    Route::get('/dashboard', [StoreController::class, 'index'])->name('dashboard.get');
    Route::post('/dashboard', [StoreController::class, 'store'])->name('dashboard.post');
    Route::get('/dashboard/getAllData', [StoreController::class, 'getAllData'])->name('dashboard.getAllData');
});

require __DIR__.'/auth.php';
