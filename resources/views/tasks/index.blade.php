@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-4">Minha Agenda</h2>

        <!-- Botão para adicionar nova tarefa -->
        <a href="{{ route('tasks.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Adicionar Tarefa</a>

        <!-- Exibindo a tabela com tarefas -->
        <div class="p-12">
        <div class="max-w-7xl mx-auto sm:px-6 md:p-6 lg:px-8">
            <div class="p-6 bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @if ($tasks->isEmpty())
                    <div class="p-3 text-center text-gray-900 dark:text-gray-100 font-semibold">
                        {{ __("Ainda não existem tarefas para você.") }}
                    </div>
                @else
                    <table class="table-auto w-full border-collapse">
                        <thead>
                            <tr class="bg-gray-700">
                                <th class="border dark:border-gray-800 p-2 dark:text-gray-200">Título</th>
                                <th class="border dark:border-gray-800 p-2 dark:text-gray-200">Descrição</th>
                                <th class="border dark:border-gray-800 p-2 dark:text-gray-200">Data</th>
                                <th class="border dark:border-gray-800 p-2 dark:text-gray-200">Horário</th>
                                <th class="border dark:border-gray-800 p-2 dark:text-gray-200">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                                <tr>
                                    <td class="border dark:border-gray-800 p-2 dark:text-gray-200 text-center">{{ $task->title }}</td>
                                    <td class="border dark:border-gray-800 p-2 dark:text-gray-200 text-center">{{ $task->description }}</td>
                                    <td class="border dark:border-gray-800 p-2 dark:text-gray-200 text-center">
                                        {{ \Carbon\Carbon::parse($task->date)->format('d/m/Y') }}
                                    </td>
                                    <td class="border dark:border-gray-800 p-2 dark:text-gray-200 text-center">
                                        {{ \Carbon\Carbon::parse($task->time)->format('H:i') }}
                                    </td>
                                    <td class="flex justify-center border dark:border-gray-800 p-2">
                                        <a href="{{ route('tasks.edit', $task->id) }}">
                                            <x-secondary-button >
                                                {{ __('Editar') }}
                                            </x-secondary-button>
                                        </a>
                                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')


                                            <x-danger-button class="ms-3" onclick="return confirm('Tem certeza que deseja excluir?')">
                                                {{ __('Excluir') }}
                                            </x-danger-button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
    </div>
@endsection
