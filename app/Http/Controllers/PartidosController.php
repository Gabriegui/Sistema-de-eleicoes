<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Partido;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PartidosController extends Controller
{
    public function create(): Response{
        return Inertia::render('register/register-partido');
    }

    public function store(Request $request): RedirectResponse{
        $request->validate([
            'Nome' => 'required',
            'Sigla' => 'required',
        ]);

        Partido::create([
            'Nome' => $request->Nome,
            'Sigla' => $request->Sigla,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return to_route('lista/lista-partidos')->with('success', 'Partido registrado com sucesso.');
    }

    public function show(){
        $partidos = Partido::all();

        return Inertia::render('lista/lista-partidos', [
            'partidos' => $partidos,
        ]);
    }

    public function edit($id){
        $partido = Partido::findOrFail($id);
        return Inertia::render('edit/edit-partido', [
            'partido' => $partido,
        ]);
    }

    public function update(Request $request, $id){

        $partido = Partido::findOrFail($id);

        $validated = $request->validate([
            'Nome' => 'required',
            'Sigla' => 'required'
        ]);

        $partido->update($validated);
        
        return to_route('lista/lista-partidos')->with('success', 'Partido editado com sucesso.');
    }

    public function destroy($id){
        $partido = Partido::findOrFail($id);
        $partido->delete();
        return to_route('lista/lista-partidos')->with('success', 'Partido deletado com sucesso.');
    }
}