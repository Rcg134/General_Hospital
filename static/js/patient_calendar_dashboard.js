

$(function () {

    getcalendarsched('../PHP/HospitalappController/patient_calendar_get.php')
    
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


