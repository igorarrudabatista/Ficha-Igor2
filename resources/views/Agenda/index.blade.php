@extends('base.base')
@section('content')

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.4/index.global.min.js"></script>

<script>

    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        editable: true,
        selectable: true,
        selectMirror: true,
        select: function(arg) {
        var title = prompt('Cadastrar novo evento:');
        if (title) {
          calendar.addEvent({
            title: ($events),
            start: arg.start,
            end: arg.end,
            allDay: arg.allDay
          })
        }
        calendar.unselect()
      },
      eventClick: function(arg) {
        if (confirm('Gostaria de deletar este evento?')) {
          arg.event.remove()
        }
      },
      editable: true,
      dayMaxEvents: true, // allow "more" link when too many events
        businessHours: true,
        dayMaxEvents: true, // allow "more" link when too many events
        events: @json($events),
      });
      calendar.render();
    });

  </script>

</head>
<body>
  <div id='calendar'></div>
</body>
@endsection