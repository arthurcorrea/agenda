@extends('layouts.app')

@section('content')
    <div class="container pt-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

            <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-4">{{ __('Editar Tarefa') }}</h2>

            <form action="{{ route('tasks.update', $task) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="title" class="block text-gray-400">{{ __('Título') }}</label>
                    <input type="text" name="title" id="title" class="dark:bg-gray-900 text-white mt-2 p-2 w-full border border-gray-800 rounded" value="{{ $task->title }}" required>
                    @error('title')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-gray-400">{{ __('Descrição') }}</label>
                    <textarea name="description" id="description" class="dark:bg-gray-900 text-white mt-2 p-2 w-full border border-gray-800 rounded"">{{ $task->description }}</textarea>
                    @error('description')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="date" class="block text-gray-400">{{ __('Data') }}</label>
                    <input type="date" name="date" id="date" class="dark:bg-gray-900 text-white mt-2 p-2 w-full border border-gray-800 rounded" value="{{ $task->date }}" required>
                    @error('date')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="time" class="block text-gray-400">{{ __('Hora') }}</label>
                    <input type="time" name="time" id="time" class="dark:bg-gray-900 text-white mt-2 p-2 w-full border border-gray-800 rounded" value="{{ $task->time }}" required>
                    @error('time')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <x-primary-button>{{ __('Atualizar') }}</x-primary-button>
                </div>
            </form>
        </div>
    </div>
@endsection
