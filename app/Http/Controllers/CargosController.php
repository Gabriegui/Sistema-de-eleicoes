<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cargo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class CargosController extends Controller
{
    public function create(): Response{
        return Inertia::render('register-cargo');
    }

    public function store(Request $request): RedirectResponse{
        $request->validate([
            'Descricao' => 'required'
        ]);

        Cargo::create([
            'Descricao' => $request->Descricao,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return to_route('lista-cargos')->with('success', 'Cargo registrado com sucesso.');
    }

    public function show(){
        $cargos = Cargo::all();

        return Inertia::render('lista-cargos', [
            'cargos' => $cargos,
        ]);
    }

    public function edit($id){
        $cargo = Cargo::findOrFail($id);
        return Inertia::render('edit-cargo', [
            'cargo' => $cargo,
        ]);
    }

    public function update(Request $request, $id){

        $cargo = Cargo::findOrFail($id);

        $validated = $request->validate([
            'Descricao' => 'required'
        ]);

        $cargo->update($validated);
        
        return to_route('lista-cargos')->with('success', 'Cargo editado com sucesso.');
    }

    public function destroy($id){
        $cargo = Cargo::findOrFail($id);
        $cargo->delete();
        return to_route('lista-cargos')->with('success', 'Cargo deletado com sucesso.');
    }
}