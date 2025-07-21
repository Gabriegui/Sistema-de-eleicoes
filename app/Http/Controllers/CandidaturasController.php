<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Candidatura;
use App\Models\Candidato;
use App\Models\Cargo;
use App\Models\Partido;
use App\Models\Status;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class CandidaturasController extends Controller
{
    public function create(): Response{
        return Inertia::render('register-candidatura');
    }

    public function store(Request $request): RedirectResponse{
        $request->validate([
            'Candidato' => 'required',
            'Partido' => 'required',
            'Apelido' => 'required',
            'Urna' => 'required',
            'Cargo' => 'required',
            'Status' => 'required'
        ]);
        
        $candidato = Candidato::where('Nome', $request->Candidato)->first();
        if (!$candidato) {
            return back()->withErrors([
                'Nome' => 'Candidato não registrado. Vá até a tela de registro de candidatos.',
            ])->withInput();
        } 

        $partido = Partido::where('Nome', $request->Partido)->first();
        if (!$partido) {
            return back()->withErrors([
                'Nome' => 'Partido não registrado. Vá até a tela de registro de partidos.',
            ])->withInput();
        } 

        $cargo = Cargo::where('Descricao', $request->Cargo)->first();
        if (!$cargo) {
            return back()->withErrors([
                'Descricao' => 'Cargo não registrado. Vá até a tela de registro de cargos.',
            ])->withInput();
        } 
        
        $status = Status::where('Descricao', $request->Status)->first();
        if (!$status) {
            return back()->withErrors([
                'Descricao' => 'Status não registrado. Vá até a tela de registro de status.',
            ])->withInput();
        } 

        Candidatura::create([
            'candidato_id' => $candidato->id,
            'partido_id' => $partido->id,
            'Numero_urna' => $request->Urna,
            'Nome_urna' => $request->Apelido,
            'cargo_id' => $cargo->id,
            'status_id' => $status->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return to_route('lista-candidaturas')->with('success', 'Candidatura registrada com sucesso.');
    }

    public function show(){
        $candidaturas = Candidatura::query()
            ->with(['candidato', 'partido', 'cargo', 'status'])
            ->get();

        return Inertia::render('lista-candidaturas', [
            'candidaturas' => $candidaturas,
        ]);
    }
    
    public function edit($id){
        $candidatura = Candidatura::findOrFail($id);
        return Inertia::render('edit-candidatura', [
            'candidatura' => $candidatura,
        ]);
    }

    public function update(Request $request, $id){

        $candidatura = Candidatura::findOrFail($id);

        $validated = $request->validate([
            'Nome_guerra' => 'required',
            'numero_urna' => 'required',
            'partido' => 'required',
            'ano_eleicao' => 'required'
        ]);

        
        $candidatura->update($validated);
        
        return to_route('lista-candidaturas')->with('success', 'Candidatura editada com sucesso.');
    }

    public function destroy($id){
        $candidatura = Candidatura::findOrFail($id);
        $candidatura->delete();
        return to_route('lista-candidaturas')->with('success', 'Candidatura deletada com sucesso.');
    }
}