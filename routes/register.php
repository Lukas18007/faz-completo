<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GastosController;

Route::get('/register_gastos', function () {
    return view('register_gasto');
})->name('register_gastos');

Route::post('/register_gastos/gasto', [GastosController::class, 'store'])->name('register_gastos.gasto');
