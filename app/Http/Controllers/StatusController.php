<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Status;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class StatusController extends Controller
{
    public function create(): Response{
        return Inertia::render('register-status');
    }

    public function store(Request $request): RedirectResponse{
        $request->validate([
            'Descricao' => 'required'
        ]);

        Status::create([
            'Descricao' => $request->Descricao,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return to_route('lista-status')->with('success', 'Status registrado com sucesso.');
    }

    public function show(){
        $status = Status::all();

        return Inertia::render('lista-status', [
            'status' => $status,
        ]);
    }

    public function edit($id){
        $status = Status::findOrFail($id);
        return Inertia::render('edit-status', [
            'status' => $status,
        ]);
    }

    public function update(Request $request, $id){

        $status = Status::findOrFail($id);

        $validated = $request->validate([
            'Descricao' => 'required'
        ]);

        $status->update($validated);
        
        return to_route('lista-status')->with('success', 'Status editado com sucesso.');
    }

    public function destroy($id){
        $status = Status::findOrFail($id);
        $status->delete();
        return to_route('lista-status')->with('success', 'Status deletado com sucesso.');
    }
}