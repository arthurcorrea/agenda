@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-4">Minha Agenda</h2>

        <!-- Botão para adicionar nova tarefa -->
        <a href="{{ route('tasks.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Adicionar Tarefa</a>

        <!-- Exibindo a tabela com tarefas -->
        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 p-2">Título</th>
                    <th class="border border-gray-300 p-2">Descrição</th>
                    <th class="border border-gray-300 p-2">Data</th>
                    <th class="border border-gray-300 p-2">Hora</th>
                    <th class="border border-gray-300 p-2">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <td class="border border-gray-300 p-2">{{ $task->title }}</td>
                        <td class="border border-gray-300 p-2">{{ $task->description }}</td>
                        <td class="border border-gray-300 p-2">{{ $task->date }}</td>
                        <td class="border border-gray-300 p-2">{{ $task->time }}</td>
                        <td class="border border-gray-300 p-2">
                            <a href="{{ route('tasks.edit', $task->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Editar</a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
