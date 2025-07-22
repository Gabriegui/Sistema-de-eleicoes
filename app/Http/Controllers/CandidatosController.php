<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Candidato;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class CandidatosController extends Controller
{
    public function create(): Response{
        return Inertia::render('register/register-candidato');
    }

    public function store(Request $request): RedirectResponse{
        $request->validate([
            'Nome' => 'required',
            'Email' => 'required',
            'Telefone' => 'required',
            'Titulo_eleitor' => 'required',
            
        ]);
        Candidato::create([
            'Nome' => $request->Nome,
            'Email' => $request->Email,
            'Telefone' => $request->Telefone,
            'Titulo_eleitor' => $request->Titulo_eleitor,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return to_route('lista/lista-candidatos')->with('success', 'Candidato registrado com sucesso.');
    }

    public function show(){
        $candidatos = Candidato::all();

        return Inertia::render('lista/lista-candidatos', [
            'candidatos' => $candidatos,
        ]);
    }

    public function edit($id){
        $candidato = Candidato::findOrFail($id);
        return Inertia::render('edit/edit-candidato', [
            'candidato' => $candidato,
        ]);
    }

    public function update(Request $request, $id){

        $candidato = Candidato::findOrFail($id);

        $validated = $request->validate([
            'Nome' => 'required',
            'Email' => 'required',
            'Telefone' => 'required',
            'Titulo_eleitor' => 'required'
        ]);

        $candidato->update($validated);
        
        return to_route('lista/lista-candidatos')->with('success', 'Candidato editado com sucesso.');
    }

    public function destroy($id){
        $candidato = Candidato::findOrFail($id);
        $candidato->delete();
        return to_route('lista/lista-candidatos')->with('success', 'Candidato deletado com sucesso.');
    }
}