

 
$(document).on('click', '#btnapp', function () {
    var patientid = $(this).closest("tr").find('td:eq(0)').text();
    // var patientname = $(this).closest("tr").find('td:eq(0)').text();
    var timestart = $(this).closest("tr").find('td:eq(6)').text().trim();


      $("#assignmodal").modal("show");
      $("#lblpatientid").text(patientid)
      $("#assigntimestart").val(timestart)

    });



$(document).on('click', '#btndis', function () {
     var patientid = $(this).closest("tr").find('td:eq(0)').text();
     $("#lblpatientiddis").text(patientid)
    $("#dismodal").modal("show");   
  });




// APPROVE
  $('#submitappointmentupdate').click(function() {
    var timeend = $("#assigntimeend").val();
    var patientid = $("#lblpatientid").text();
    var timestart = $("#assigntimestart").val();
    var status = 4;

    if  (timestart !== "" && timeend !== ""  ){
        timesetapprove("../PHP/HospitalappController/doctor_dashboard_time_approve.php",
        patientid,
        timestart, 
        timeend,
        status);
    }
    else{
      showerror("Fill up all neccesary fields")
    }


  });


// DISAPPROVE
  $('#submitappointmentupdatedisapprove').click(function() {
  var patientid = $("#lblpatientiddis").text();
  var remarks = $("#remarksdisaprove").val();

  if (remarks !== "" ){
      timesetdisapprove("../PHP/HospitalappController/doctor_dashboard_time_disapprove.php",
      patientid,
      remarks);
  }
  else{
    showerror("Fill up all neccesary fields")
  }


});




  function timesetapprove(PHP, patientid, timestart,timeend,status) {
    var form_data = new FormData();
  
    form_data.append("Patientid", patientid);
    form_data.append("Timefrom", timestart);
    form_data.append("Timeto", timeend);
    form_data.append("Status", status);
  
    $.ajax({
      url: PHP,
      type: "POST",
      data: form_data,
      contentType: false,
      processData: false,
      cache: false,
      success: function (dataResult) {
        if (dataResult == true) {
           location.reload();
        } else {
          showerror(dataResult);
        }
      },
      error: function (xhr, ajaxOptions, thrownError) {
        showerror(thrownError)
      },
    });
  }



  
  function timesetdisapprove(PHP, patientid,remarks) {
    var form_data = new FormData();
  
    form_data.append("Patientid", patientid);
    form_data.append("Remarks", remarks);

  
    $.ajax({
      url: PHP,
      type: "POST",
      data: form_data,
      contentType: false,
      processData: false,
      cache: false,
      success: function (dataResult) {
        if (dataResult == true) {
           location.reload();
        } else {
          showerror(dataResult);
        }
      },
      error: function (xhr, ajaxOptions, thrownError) {
        showerror(thrownError)
      },
    });
  }
  
  