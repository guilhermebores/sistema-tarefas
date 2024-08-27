<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarefa;

class TarefaController extends Controller
{
    public function index()
    {
        $tarefas = Tarefa::all();
        return view('tarefas', compact('tarefas'));
    }

    public function create()
    {
        return view('create-tarefa');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:255',
            'descricao' => 'nullable',
            'status' => 'required',
        ]);

        Tarefa::create($request->all());

        return redirect()->route('tarefas.index')
                         ->with('success', 'Tarefa criada com sucesso!');
    }

    public function edit($id)
    {
        $tarefa = Tarefa::find($id);
        return view('edit-tarefa', compact('tarefa'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|max:255',
            'descricao' => 'nullable',
            'status' => 'required',
        ]);

        $tarefa = Tarefa::find($id);
        $tarefa->update($request->all());

        return redirect()->route('tarefas.index')
                         ->with('success', 'Tarefa atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $tarefa = Tarefa::find($id);
        $tarefa->delete();

        return redirect()->route('tarefas.index')
                         ->with('success', 'Tarefa excluída com sucesso!');
    }
}
