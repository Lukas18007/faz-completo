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

    Route::get('/gastos', function () {
        return view('gastos');
    })->name('gastos');

    Route::post('/gastos/cadastrar', [
        GastosController::class, 'store'
    ])->name('gastos.cadastrar');

    Route::delete('/gastos/excluir/{id}', [
        GastosController::class, 'destroy'
    ])->name('gastos.excluir');
});


require __DIR__.'/auth.php';
