/** @format */

$(function () {
  var arraydata = [
    {
      title: "Event 1 - 10:00 AM",
      start: "2023-06-20T10:00:00",
      end: "2023-06-20T12:00:00",
    },
    {
      title: "Event 2 - 2:00 PM",
      start: "2023-06-21T14:00:00",
      end: "2023-06-21T16:00:00",
    },
    {
      title: "Event 3 - 8:00 AM",
      start: "2023-06-22T08:00:00",
      end: "2023-06-22T10:00:00",
    },
  ];

  $("#calendar").fullCalendar({
    header: {
      left: "prev,next today",
      center: "title",
      right: "month,agendaWeek,agendaDay",
    },
    defaultView: "month",
    editable: false,
    eventStartEditable: false,
    eventDurationEditable: false,
    events: arraydata,
  });
});
