@extends('layouts.app')

@section('content')
    <div class="pt-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="flex items-center text-center justify-between">
                <div class="p-6 text-gray-900 dark:text-gray-100 font-semibold">
                    {{ __("Verifique abaixo sua agenda atual.") }}
                </div>
                <div class="p-6">
                    <a href="{{ route('tasks.create') }}">
                        <x-primary-button>{{ __('Adicionar Tarefa') }}</x-primary-button>
                    </a>
                </div>
            </div>

            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 md:p-6 lg:px-8">
        @include('components.tasks-table', ['tasks' => $tasks])
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 md:p-6 lg:px-8">
        <x-calendar />
        <x-tasks-modal name="tasks-modal" :show="false" :tasks="[]" />
    </div>

@endsection
