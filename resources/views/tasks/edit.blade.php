@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-4">{{ __('Editar Tarefa') }}</h2>

        <form action="{{ route('tasks.update', $task) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block text-gray-700">{{ __('Título') }}</label>
                <input type="text" name="title" id="title" class="mt-2 p-2 w-full border border-gray-300 rounded" value="{{ $task->title }}" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700">{{ __('Descrição') }}</label>
                <textarea name="description" id="description" class="mt-2 p-2 w-full border border-gray-300 rounded">{{ $task->description }}</textarea>
            </div>

            <div class="mb-4">
                <label for="date" class="block text-gray-700">{{ __('Data') }}</label>
                <input type="date" name="date" id="date" class="mt-2 p-2 w-full border border-gray-300 rounded" value="{{ $task->date }}" required>
            </div>

            <div class="mb-4">
                <label for="time" class="block text-gray-700">{{ __('Hora') }}</label>
                <input type="time" name="time" id="time" class="mt-2 p-2 w-full border border-gray-300 rounded" value="{{ $task->time }}" required>
            </div>

            <div class="mb-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">{{ __('Atualizar Tarefa') }}</button>
            </div>
        </form>
    </div>
@endsection
