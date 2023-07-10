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
	Route::group(['prefix' => 'dashboard'], function () {
		Route::get('/', [ShopController::class, 'index'])->name('dashboard.index');
		Route::post('/', [ShopController::class, 'store'])->name('dashboard.store');
		Route::get('/getAllData', [ShopController::class, 'getAllData'])->name('dashboard.getAllData');
		Route::get('/show/{shop_id}', [ShopController::class, 'show'])->name('dashboard.show');
		Route::post('/update/{shop_id}', [ShopController::class, 'update'])->name('dashboard.update');
	});
});

require __DIR__ . '/auth.php';
