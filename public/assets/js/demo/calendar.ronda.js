document.addEventListener('DOMContentLoaded', function () {
  var calendarElm = document.getElementById('calendar');

  // Ambil data dari API
  fetch('http://127.0.0.1:8000/api/ronda-jadwal')
      .then(response => response.json())
      .then(data => {
          // Proses data ke format events
          var events = data.map(item => {
              return item.wargas.map(warga => ({
                  title: warga.nama, // Nama warga
                  start: item.tanggal_ronda, // Tanggal ronda
              }));
          }).flat(); // Gabungkan array nested menjadi satu array

          // Inisialisasi kalender
          var calendar = new FullCalendar.Calendar(calendarElm, {
              headerToolbar: {
                  left: 'dayGridMonth,timeGridWeek,timeGridDay',
                  center: 'title',
                  right: 'prev,next today'
              },
              buttonText: {
                  today: 'Today',
                  month: 'Month',
                  week: 'Week',
                  day: 'Day'
              },
              initialView: 'dayGridMonth',
              editable: true,
              droppable: true,
              themeSystem: 'bootstrap',
              events: events // Masukkan events dari API
          });

          calendar.render();
      })
      .catch(error => console.error('Error fetching ronda data:', error));
});
