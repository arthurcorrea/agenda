<div class="p-6 bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    @if ($tasks->isEmpty())
        <div class="p-3 text-center text-gray-900 dark:text-gray-100 font-semibold">
            {{ __("Ainda não existem tarefas para você.") }}
        </div>
    @else
        <table class="table-auto w-full border-collapse">
            <thead>
                <tr>
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
                                <x-secondary-button>
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
