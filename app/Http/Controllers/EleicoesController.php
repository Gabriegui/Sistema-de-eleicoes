<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Eleicao;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class EleicoesController extends Controller
{
    public function create(): Response{
        return Inertia::render('register-eleicao');
    }

    public function store(Request $request): RedirectResponse{
        $request->validate([
            'Ano' => 'required',
            'Descricao' => 'required',
        ]);

        Eleicao::create([
            'Ano' => $request->Ano,
            'Descricao' => $request->Descricao,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return to_route('lista-eleicoes')->with('success', 'Eleição registrada com sucesso.');
    }

    public function show(){
        $eleicoes = Eleicao::all();

        return Inertia::render('lista-eleicoes', [
            'eleicoes' => $eleicoes,
        ]);
    }

    public function edit($id){
        $eleicao = Eleicao::findOrFail($id);
        return Inertia::render('edit-eleicao', [
            'eleicao' => $eleicao,
        ]);
    }

    public function update(Request $request, $id){

        $eleicao = Eleicao::findOrFail($id);

        $validated = $request->validate([
            'Ano' => 'required',
            'Descricao' => 'required'
        ]);

        $eleicao->update($validated);
        
        return to_route('lista-eleicoes')->with('success', 'Eleição editada com sucesso.');
    }

    public function destroy($id){
        $eleicao = Eleicao::findOrFail($id);
        $eleicao->delete();
        return to_route('lista-eleicoes')->with('success', 'Eleição deletada com sucesso.');
    }
}