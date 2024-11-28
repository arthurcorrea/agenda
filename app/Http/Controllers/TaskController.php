<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    // Listar tarefa para user logado
    public function index()
    {
        $tasks = Auth::user()->tasks()->orderBy('date')->orderBy('time')->get();

        return view('dashboard', compact('tasks'));
    }

    // Criar tarefa
    public function create()
    {
        return view('tasks.create');
    }

    // Salvar tarefa
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'time' => 'required',
        ]);

        // Verificar se existe uma tarefa no mesmo dia e horário
        $exists = Auth::user()->tasks()
            ->where('date', $request->date)
            ->where('time', $request->time)
            ->exists();

        if ($exists) {
            return back()->withErrors(['time' => 'Já existe uma tarefa para este horário.']);
        }

        Auth::user()->tasks()->create($request->all());

        return redirect()->route('tasks.index')->with('success', 'Tarefa criada com sucesso!');
    }

    // Editar a tarefa se for necessário
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }


    // Salvar a edição
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'time' => 'required',
        ]);

        // Verificar se existe uma tarefa no mesmo dia e horário
        $exists = Auth::user()->tasks()
            ->where('date', $request->date)
            ->where('time', $request->time)
            ->where('id', '!=', $task->id)
            ->exists();

        if ($exists) {
            return back()->withErrors(['time' => 'Já existe uma tarefa para este horário.']);
        }

        $task->update($request->all());

        return redirect()->route('tasks.index')->with('success', 'Tarefa atualizada com sucesso!');
    }

    // Função para deletar uma tarefa
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Tarefa excluída com sucesso!');
    }
}