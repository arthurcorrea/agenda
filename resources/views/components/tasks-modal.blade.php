@props([
    'name',
    'show' => false,
    'maxWidth' => 'xl',
    'tasks' => []
])

@php
$maxWidth = [
    'sm' => 'sm:max-w-sm',
    'md' => 'sm:max-w-md',
    'lg' => 'sm:max-w-lg',
    'xl' => 'sm:max-w-4xl',
    '2xl' => 'sm:max-w-2xl',
    '3xl' => 'sm:max-w-3xl',
][$maxWidth];
@endphp

<div
    x-data="{
        show: {{ $show ? 'true' : 'false' }},
        tasks: @json($tasks),
        formatTime(time) {
            const date = new Date(time);
            const hours = date.getHours(); // Hora no formato 24h
            const minutes = date.getMinutes(); // Minutos

            const formattedHours = hours < 10 ? '0' + hours : hours;
            const formattedMinutes = minutes < 10 ? '0' + minutes : minutes;

            return `${formattedHours}:${formattedMinutes}`;
        }
    }"
    x-init="
        $watch('show', value => {
            if (value) {
                document.body.classList.add('overflow-y-hidden');
            } else {
                document.body.classList.remove('overflow-y-hidden');
            }
        })
    "
    x-on:open-modal.window="$event.detail.name === '{{ $name }}' && (show = true, tasks = $event.detail.tasks)"
    x-on:close-modal.window="$event.detail.name === '{{ $name }}' && (show = false)"
    x-show="show"
    class="fixed inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50"
    style="display: {{ $show ? 'block' : 'none' }};"
>
    <div
        x-show="show"
        class="fixed inset-0 transform transition-all"
        x-on:click="show = false"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
    >
        <div class="absolute inset-0 bg-gray-500 dark:bg-gray-900 opacity-90"></div>
    </div>

    <div
        x-show="show"
        class="mb-6 bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full {{ $maxWidth }} sm:mx-auto"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
    >
        <div class="px-6 py-4">
            <h3 class="text-xl font-semibold mb-4 text-gray-300">Tarefas do dia</h3>
            <div x-show="tasks.length > 0">
                <ul class="space-y-2">
                    <template x-for="task in tasks" :key="task.id">
                        <li class=" border-gray-300 py-2">
                            <div class="p-6 bg-gray-700 rounded-lg">
                                <strong x-text="task.title" class="text-gray-300 mb-4"></strong>
                                <div x-text="task.description" class="text-gray-400"></div>
                                <div x-text="task.time" class="text-gray-400"></div>
                            </div>
                        </li>
                    </template>
                </ul>
            </div>
            <div x-show="tasks.length === 0" class="text-gray-400">Não há tarefas para este dia.</div>
        </div>
    </div>
</div>
