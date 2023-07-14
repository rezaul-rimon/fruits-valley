<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\backend\BackendController;
use App\Http\Controllers\products\ProductsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('frontend.index');
// });

Route::get('/',[FrontendController::class, 'index'])->name('index');
// Route::get('/admin', [BackendController::class, 'admin'])->name('admin');

//Product Related Route
// Route::post('/store_product', [ProductsController::class, 'store'])->name('store_product');
// Route::get('/actoin/{id}', [ProductsController::class, 'actoin'])->name('actoin');
// Route::get('/intoac/{id}', [ProductsController::class, 'intoac'])->name('intoac');

Route::controller(ProductsController::class)->group(function(){
    Route::post('/store_product', 'store')->name('store_product');
    Route::get('/actoin/{id}', 'actoin')->name('actoin');
    Route::get('/intoac/{id}', 'intoac')->name('intoac');
    Route::get('/delproduct/{id}', 'delproduct')->name('delproduct');
    Route::get('/editproduct/{id}', 'editproduct')->name('editproduct');
    Route::post('/updateproduct/{id}', 'updateproduct')->name('updateproduct');
});

// Route::get('/dashboard', function () {
//     return view('backend.admin');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [BackendController::class, 'admin'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
