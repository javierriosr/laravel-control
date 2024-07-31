<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IncomeController extends Controller
{
    public function index()
    {
        // Obtener los ingresos del usuario autenticado
        $incomes = Income::where('user_id', Auth::id())->get();
        return view('incomes.index', compact('incomes'));
    }

    public function create()
    {
        return view('incomes.create');
    }

    public function store(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'amount' => 'required|numeric',
            'description' => 'required|string',
            'date' => 'required|date',
        ]);

        // Crear un nuevo ingreso
        Income::create([
            'amount' => $request->amount,
            'description' => $request->description,
            'user_id' => Auth::id(),
            'date' => $request->date,
        ]);

        return redirect()->route('incomes.index')->with('success', 'Ingreso registrado correctamente.');
    }

    public function show($id)
    {
        // Obtener un ingreso específico
        $income = Income::findOrFail($id);
        return view('incomes.show', compact('income'));
    }

    public function edit($id)
    {
        // Obtener un ingreso específico para edición
        $income = Income::findOrFail($id);
        return view('incomes.edit', compact('income'));
    }

    public function update(Request $request, $id)
    {
        // Validar los datos de entrada
        $request->validate([
            'amount' => 'required|numeric',
            'description' => 'required|string',
            'date' => 'required|date',
        ]);

        // Obtener y actualizar el ingreso
        $income = Income::findOrFail($id);
        $income->update($request->all());

        return redirect()->route('incomes.index')->with('success', 'Ingreso actualizado correctamente.');
    }

    public function destroy($id)
    {
        // Obtener y eliminar el ingreso
        $income = Income::findOrFail($id);
        $income->delete();

        return redirect()->route('incomes.index')->with('success', 'Ingreso eliminado correctamente.');
    }
}
