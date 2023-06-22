<?php

use App\Http\Controllers\PlansController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\MovementController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\RouteCompiler;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/plans', [PlansController::class, 'index'])->name('view_plans');

Route::get('/stock/create', [StockController::class, 'create'])->name('stock.create');
Route::get('/stock', [StockController::class, 'index'])->name('view_stock');
Route::post('/stock/store', [StockController::class, 'store'])->name('stock.store');
Route::put('/products/update/{id}', [StockController::class, 'update']);
Route::delete('/products/delete/{id}', [StockController::class, 'destroy']);

Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
Route::delete('/category/delete/{id}', [CategoryController::class, 'destroy']);

Route::post('/supplier/store', [SupplierController::class, 'store'])->name('supplier.store');

Route::get('/movements', [MovementController::class, 'index'])->name('movements.index');
Route::get('/movements/create', [MovementController::class, 'create'])->name('movements.create');
Route::post('/movements/store', [MovementController::class, 'store'])->name('movements.store');
Route::delete('/movements/delete/{id}', [MovementController::class, 'destroy']);

require __DIR__.'/auth.php';
