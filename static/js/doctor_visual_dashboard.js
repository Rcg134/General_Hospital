/** @format */

$(function () {

 getcalendarsched('../PHP/HospitalappController/admin_calendar_get.php')
 getichart('../PHP/HospitalappController/doctor_chart_dashboard_get.php');


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



function ichart(day , count){

    var data = {
    chart: {
      type: 'bar'
    },
    series: [{
      name: 'Appointments',
      data: count
    }],
    xaxis: {
      categories: day
    }
  }

  var chart = new ApexCharts(document.querySelector("#chart"), data);

  chart.render();

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




function getichart(PHP){
     
  $.ajax({
   url: PHP,
   type: "get",
   contentType: false,
   processData: false,
   cache: false,
   success: function(dataResult){
     let chartData = JSON.parse(dataResult);
     let arrday = [];
     let arrcount = [];
      chartData.forEach((element) =>{
        arrday.push(element[0]);
        arrcount.push(element[1]);
      });
      ichart(arrday ,arrcount );
   },
   error: function (xhr, ajaxOptions, thrownError){
     showerror(thrownError);
      } 
        
});

}





