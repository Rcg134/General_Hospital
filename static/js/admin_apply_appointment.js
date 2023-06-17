$(function () {
    

  $('#calendar').fullCalendar({
    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'month,agendaWeek,agendaDay'
    },
    defaultView: 'month',
    editable: false,
    eventStartEditable: false,
    eventDurationEditable: false,
    events: [
      {
        title: 'Event 1 - 10:00 AM',
        start: '2023-05-20T10:00:00',
        end: '2023-05-20T12:00:00'
      },
      {
        title: 'Event 2 - 2:00 PM',
        start: '2023-05-21T14:00:00',
        end: '2023-05-21T16:00:00'
      },
      {
        title: 'Event 3 - 8:00 AM',
        start: '2023-05-22T08:00:00',
        end: '2023-05-22T10:00:00'
      }
    ]
  });



  
});


$("#appointmentform").submit(function(event) {
    event.preventDefault();
    var appdate = $("#appdate").val();
    var apptime = $("#apptime").val();
    var selectdoctorid = $("#selectdoctorid").val();
    var appmessage = $("#appmessage").val();
    
    
    
    sendappoitnment('../PHP/HospitalappController/appointment_insert.php',
                   appdate,
                   apptime,
                   selectdoctorid,
                   appmessage);
  
  
  });
  




function sendappoitnment(PHP,
    appdate,
    apptime,
    selectdoctorid,
    appmessage)
{
      var form_data = new FormData();

        form_data.append("Appdate", appdate)  
        form_data.append("Apptime", apptime)
        form_data.append("Selectdoctorid", selectdoctorid)  
        form_data.append("Appmessage", appmessage)  



        $.ajax({
        url: PHP,
        type: "POST",
        data: form_data,
        contentType: false,
        processData: false,
        cache: false,
        success: function(dataResult){
        if(dataResult == true){
        alert("Successfully updated")
        location.reload();
        }
        else{
        alert(dataResult)
        }
        
        },
        error: function (xhr, ajaxOptions, thrownError){

        alert(thrownError);
        } 

});

}


