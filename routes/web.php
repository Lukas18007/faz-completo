<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GastosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [
    GastosController::class, 'index'
])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/register_gastos', function () {
    return view('register_gasto');
})->middleware(['auth', 'verified'])->name('register_gastos');

Route::post('/register_gastos/gasto', [
    GastosController::class, 'store'
])->middleware(['auth', 'verified'])->name('register_gastos.gasto');

Route::delete('/delete_gastos/', [
    GastosController::class, 'destroy'
])->middleware(['auth', 'verified'])->name('delete_gastos');

require __DIR__.'/auth.php';
