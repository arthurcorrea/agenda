import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';
import ptLocale from '@fullcalendar/core/locales/pt'; // Importar o locale em português

document.addEventListener('DOMContentLoaded', function () {
    const calendarEl = document.getElementById('calendar');
    const calendar = new Calendar(calendarEl, {
        plugins: [dayGridPlugin, interactionPlugin],
        initialView: 'dayGridMonth',
        events: "/tasks/calendar",
        fixedWeekCount: false,
        locale: ptLocale,
        contentHeight: 600,
        eventMouseEnter: function(){

        },
        headerToolbar: {
            center: 'title',
            left: 'dayGridMonth,dayGridWeek,dayGridDay',
            right: 'prev,next'
        },
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
    alert(modalContent);
}
