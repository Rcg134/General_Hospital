$(function () {

    getcalendarsched('../PHP/HospitalappController/patient_calendar_get.php')
   
   
   });
   
   
   
   function icalendar(data){
   
     $("#calendar").fullCalendar({
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
       icalendar(eventData);
     },
     error: function (xhr, ajaxOptions, thrownError){
       showerror(thrownError);
        } 
          
});

}