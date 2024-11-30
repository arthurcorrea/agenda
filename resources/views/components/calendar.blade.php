<div id="calendar" class="p-6 bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"></div>

<style>
    :root {
        --fc-border-color: #4A5160;
        --fc-neutral-text-color: #fff;
    }

    .fc {
        color: #fff;
    }

    .fc-day.fc-day-today {
        background-color: #2C3E50 !important;
        color: white !important;
    }

    .fc-daygrid-event:hover {
        background-color: #45698C !important; 
        border-color: #45698C !important;    
        color: white !important;              
    }

</style>

<script>
    import { Calendar } from '@fullcalendar/core';
    import dayGridPlugin from '@fullcalendar/daygrid';
    import interactionPlugin from '@fullcalendar/interaction';
    import ptBR from '@fullcalendar/core/locales/pt-br';

    document.addEventListener('DOMContentLoaded', function () {
        const calendarEl = document.getElementById('calendar');
        const calendar = new Calendar(calendarEl, {
            plugins: [dayGridPlugin, interactionPlugin],
            initialView: 'dayGridMonth',
            events: "{{ route('tasks.calendar') }}",
            locale: 'pt-br',
            dateClick: function (info) {
                fetch(`/tasks/day/${info.dateStr}`)
                    .then(response => response.json())
                    .then(data => {
                        // Exibir modal com tarefas do dia
                        showModal(data);
                    });
            },
        });
        calendar.render();
    });

    function showModal(tasks) {
        let modalContent = '<ul>';
        tasks.forEach(task => {
            modalContent += `<li>${task.time}: ${task.title}</li>`;
        });
        modalContent += '</ul>';
        // Aqui você implementa o modal com JavaScript ou com Alpine.js/Laravel UI
        alert(modalContent); // Apenas para demonstrar
    }
</script>
