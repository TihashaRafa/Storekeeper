<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/', [UserController::class,'index'])->name('');

Route::get('/dashboard', [AdminController::class,'admin'])->name('dashboard');



Route::group(['prefix' => 'product'], function () {
    Route::get('/', [ProductController::class, 'create'])->name('product.create');
    Route::post('/add', [ProductController::class, 'store'])->name('product.add');
    Route::get('/index', [ProductController::class, 'index'])->name('product.index');
   
    Route::get('/sale', [ProductController::class, 'sale'])->name('product.sale');
   
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::get('/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');
});

Route::post('/process-sale', [ProductController::class, 'processSale'])->name('product.processSale');
