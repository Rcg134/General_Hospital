var calendar;

$(function () {

    getcalendarsched('../PHP/HospitalappController/patient_calendar_get.php')
    
    calendar = $("#doctorcalendarschedule").fullCalendar({
      header: {
        left: "prev,next today",
        center: "title",
        right: "month,agendaWeek,agendaDay",
      },
      defaultView: "agendaDay",
      editable: false,
      eventStartEditable: false,
      eventDurationEditable: false,
      events: [], // Initially set to empty array
    });

   });
   
   
   $("#selectdoctorid").change(function () {
    var Iid = $(this).val();
     getdoctorcalendarsched('../PHP/HospitalappController/patient_doctor_schedule_calendar_get.php',Iid.trim())
  });
   
   
   function icalendar(data,calendarid){
   
     $("#" + calendarid).fullCalendar({
       header: {
         left: "prev,next today",
         center: "title",
         right: "month,agendaWeek,agendaDay",
       },
       defaultView: "agendaDay",
       editable: false,
       eventStartEditable: false,
       eventDurationEditable: false,
       events: data ,
     });
   
   }


   function getcalendarsched(PHP){
     
    $.ajax({
     url: PHP,
     type: "get",
     contentType: false,
     processData: false,
     cache: false,
     success: function(dataResult){
       var eventData = JSON.parse(dataResult);
       icalendar(eventData, "calendar");
     },
     error: function (xhr, ajaxOptions, thrownError){
       showerror(thrownError);
     } 
          
    });

   }


   function getdoctorcalendarsched(PHP, Iid){
    var form_data = new FormData();
    form_data.append("Iid",Iid);

    $.ajax({
     url: PHP,
     type: "POST",
     data: form_data,
     contentType: false,
     processData: false,
     cache: false,
     success: function(dataResult){
       var eventData = JSON.parse(dataResult);
      //  icalendar(eventData, "doctorcalendarschedule");
       updateFullCalendarEvents(eventData)
     },
     error: function (xhr, ajaxOptions, thrownError){
       showerror(thrownError);
     } 
          
    });

   }


   function updateFullCalendarEvents(eventsData) {
    calendar.fullCalendar("removeEvents");
    calendar.fullCalendar("addEventSource", eventsData);
  }