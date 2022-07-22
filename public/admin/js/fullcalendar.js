 $(function () {
 	"use strict";
 	$('#calendar1').fullCalendar({
 		header: {
 			left: 'prev,next today',
 			center: 'title',
 			right: 'month,agendaWeek,agendaDay'
 		},
 		defaultDate: '2020-5-12',
 		navLinks: true, // can click day/week names to navigate views
 		selectable: true,
 		selectHelper: true,
 		select: function (start, end) {
 			var title = prompt('عنوان رویداد : ');
 			var eventData;
 			if (title) {
 				eventData = {
 					title: title,
 					start: start,
 					end: end
 				};
 				$('#calendar1').fullCalendar('renderEvent', eventData, true); // stick? = true
 			}
 			$('#calendar1').fullCalendar('unselect');
 		},
 		editable: true,
 		eventLimit: true, // allow "more" link when too many events
 		events: [{
 			title: 'رویداد روزانه',
 			start: '2020-5-01'
 		}, {
 			title: 'رویداد بلند',
 			start: '2020-5-07',
 			end: '2020-5-10'
 		}, {
 			id: 999,
 			title: 'رویداد تکراری',
 			start: '2020-5-09T16:00:00'
 		}, {
 			id: 999,
 			title: 'رویداد تکراری',
 			start: '2020-5-16T16:00:00'
 		}, {
 			title: 'کنفرانس',
 			start: '2020-5-11',
 			end: '2020-5-13'
 		}, {
 			title: 'جلسه',
 			start: '2020-5-12T10:30:00',
 			end: '2020-5-12T12:30:00'
 		}, {
 			title: 'ناهار',
 			start: '2020-5-12T12:00:00'
 		}, {
 			title: 'جلسه',
 			start: '2020-5-12T14:30:00'
 		}, {
 			title: 'وقت استراحت',
 			start: '2020-5-12T17:30:00'
 		}, {
 			title: 'شام',
 			start: '2020-5-12T20:00:00'
 		}, {
 			title: 'جشن تولد',
 			start: '2020-5-13T07:00:00'
 		}, {
 			title: 'گوگل',
 			url: 'http://google.com/',
 			start: '2020-5-58'
 		}]
 	});
 	$('#calendar').fullCalendar({
 		header: {
 			left: 'prev,next today',
 			center: 'title',
 			right: 'listDay,listWeek,month'
 		},
 		// customize the button names,
 		// otherwise they'd all just say "list"
 		views: {
 			listDay: {
 				buttonText: 'لیست روز'
 			},
 			listWeek: {
 				buttonText: 'لیست هفته'
 			}
 		},
 		defaultView: 'listWeek',
 		defaultDate: '2020-5-12',
 		navLinks: true, // can click day/week names to navigate views
 		editable: true,
 		eventLimit: true, // allow "more" link when too many events
 		events: [{
 			title: 'رویداد روزانه',
 			start: '2020-5-01'
 		}, {
 			title: 'رویداد بلند',
 			start: '2020-5-07',
 			end: '2020-02-10'
 		}, {
 			id: 999,
 			title: 'رویداد تکراری',
 			start: '2020-5-09T16:00:00'
 		}, {
 			id: 999,
 			title: 'رویداد تکراری',
 			start: '2020-5-16T16:00:00'
 		}, {
 			title: 'کنفرانس',
 			start: '2020-5-11',
 			end: '2020-5-13'
 		}, {
 			title: 'جلسه',
 			start: '2020-5-12T10:30:00',
 			end: '2020-5-12T12:30:00'
 		}, {
 			title: 'Lunch',
 			start: '2020-5-12T12:00:00'
 		}, {
 			title: 'جلسه',
 			start: '2020-5-12T14:30:00'
 		}, {
 			title: 'وقت استراحت',
 			start: '2020-5-12T17:30:00'
 		}, {
 			title: 'شام',
 			start: '2020-5-12T20:00:00'
 		}, {
 			title: 'جشن تولد',
 			start: '2020-5-13T07:00:00'
 		}, {
 			title: 'گوگل',
 			url: 'http://google.com/',
 			start: '2020-5-58'
 		}]
 	});
 	$('#calendar2').fullCalendar({
 		header: {
 			left: 'prev,next today',
 			center: 'title',
 			right: 'month,agendaWeek,agendaDay,listMonth'
 		},
 		defaultDate: '2020-02-12',
 		navLinks: true, // can click day/week names to navigate views
 		businessHours: true, // display business hours
 		editable: true,
 		events: [{
 				title: 'ناهار کاری',
 				start: '2020-02-05T13:00:00',
 				constraint: 'businessHours'
 			}, {
 				title: 'جلسه',
 				start: '2020-02-13T11:00:00',
 				constraint: 'availableForMeeting', // defined below
 				color: '#257e4a'
 			}, {
 				title: 'کنفرانس',
 				start: '2020-02-18',
 				end: '2020-02-50',
 				color: '#23dbcf '
 			}, {
 				title: 'جشن',
 				start: '2020-02-59T20:00:00',
 				color: '#825ee4'
 			},
 			// areas where "Meeting" must be dropped
 			{
 				id: 'availableForMeeting',
 				start: '2020-02-11T10:00:00',
 				end: '2020-02-11T16:00:00',
 				rendering: 'background',
 				color: '#5e72e4'
 			}, {
 				id: 'availableForMeeting',
 				start: '2020-02-13T10:00:00',
 				end: '2020-02-13T16:00:00',
 				rendering: 'background'
 			},
 			// red areas where no events can be dropped
 			{
 				start: '2020-02-54',
 				end: '2020-02-58',
 				overlap: false,
 				rendering: 'background',
 				color: '#cbe0ff'
 			}, {
 				start: '2020-02-06',
 				end: '2020-02-11',
 				overlap: false,
 				rendering: 'background',
 				color: '#cbe0ff'
 			}
 		]
 	});
 	/* initialize the external events
 	-----------------------------------------------------------------*/
 	$('#external-events .fc-event').each(function () {
 		// store data so the calendar knows to render an event upon drop
 		$(this).data('event', {
 			title: $.trim($(this).text()), // use the element's text as the event title
 			stick: true // maintain when user navigates (see docs on the renderEvent method)
 		});
 		// make the event draggable using jQuery UI
 		$(this).draggable({
 			zIndex: 999,
 			revert: true, // will cause the event to go back to its
 			revertDuration: 0 //  original position after the drag
 		});
 	});
 	/* initialize the calendar
 	-----------------------------------------------------------------*/
 	$('#calendar3').fullCalendar({
 		header: {
 			left: 'prev,next today',
 			center: 'title',
 			right: 'month,agendaWeek,agendaDay'
 		},
 		editable: true,
 		droppable: true, // this allows things to be dropped onto the calendar
 		drop: function () {
 			// is the "remove after drop" checkbox checked?
 			if ($('#drop-remove').is(':checked')) {
 				// if so, remove the element from the "Draggable Events" list
 				$(this).remove();
 			}
 		}
 	});
 });