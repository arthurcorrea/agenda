<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Verifique abaixo sua agenda atual.") }}
                </div>
            </div>
        </div>
    </div>

    <!-- Exibindo a tabela com tarefas -->
    <div class="p-12">
        <div class="max-w-7xl mx-auto sm:px-6 md:p-6 lg:px-8">

            <div class="p-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <table class=" table-auto w-full border-collapse border border-gray-300 ">
                    <thead>
                        <tr class="bg-gray-700 ">
                            <th class="border border-gray-300 p-2 dark:text-gray-200">Título</th>
                            <th class="border border-gray-300 p-2 dark:text-gray-200">Descrição</th>
                            <th class="border border-gray-300 p-2 dark:text-gray-200">Data</th>
                            <th class="border border-gray-300 p-2 dark:text-gray-200">Hora</th>
                        </tr>
                    </thead>
                    <tbody class="d-flex">
                        @foreach($tasks as $task)
                            <tr>
                                <td class="border border-gray-300 p-2 dark:text-gray-200 text-center">{{ $task->title }}</td>
                                <td class="border border-gray-300 p-2 dark:text-gray-200 text-center">{{ $task->description }}</td>
                                <td class="border border-gray-300 p-2 dark:text-gray-200 text-center">{{ $task->date }}</td>
                                <td class="border border-gray-300 p-2 dark:text-gray-200 text-center">{{ $task->time }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
