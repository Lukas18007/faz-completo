<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gastos;
use Illuminate\Support\Facades\Auth;

class GastosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $gastos = $user->gastos;

        $sum = 0;

        foreach ($gastos as $gasto) {
            $sum += $gasto->value;
        }

        return view('dashboard', [
            'gastos' => $gastos,
            'sum' => $sum
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'descricao' => 'required|string',
            'valor' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'data_pagamento' => 'required|date',
            'forma_pagamento' => 'required|string',
        ]);

        Gastos::create([
            'description' => $request->descricao,
            'value' => $request->valor,
            'dt_payment' => $request->data_pagamento,
            'payment_type' => $request->forma_pagamento,
            'user_id' => $user->id
        ]);

        return redirect()->route('dashboard')->with('success', 'Pagamento registrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
