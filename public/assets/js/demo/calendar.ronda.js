var handleCalendarDemo = function() {
  var d = new Date();
	var month = d.getMonth() + 1;
	    month = (month < 10) ? '0' + month : month;
	var year = d.getFullYear();
	var day = d.getDate();
	var today = moment().startOf('day');
  var calendarElm = document.getElementById('calendar');
	var calendar = new FullCalendar.Calendar(calendarElm, {
    headerToolbar: {
      left: 'dayGridMonth,timeGridWeek,timeGridDay',
      center: 'title',
      right: 'prev,next today'
    },
    buttonText: {
    	today:    'Today',
			month:    'Month',
			week:     'Week',
			day:      'Day'
    },
    initialView: 'dayGridMonth',
    editable: true,
    droppable: true,
  	themeSystem: 'bootstrap',
    events: [
      {
        title: 'Pak Teguh',
        start: year + '-' + month + '-19'
      },
      {
        title: 'Abdul Dilan',
        start: year + '-' + month + '-20'
      },
    ]
  });

	calendar.render();
};

var Calendar = function () {
	"use strict";
	return {
		//main function
		init: function () {
			handleCalendarDemo();
		}
	};
}();

$(document).ready(function() {
	Calendar.init();
});
