/** @format */



$("#selectdoctorid").change(function() {

  var Iid = $(this).val();
  
  getDoctorSchedule("../PHP/HospitalappController/doctor_schedule_appointment_get.php",
                    Iid)
});




$("#appointmentform").submit(function (event) {
  event.preventDefault();
  var appdate = $("#appdate").val();
  var apptime = $("#apptime").val();
  var selectdoctorid = $("#selectdoctorid").val();
  var appmessage = $("#appmessage").val();
  const currentDate = new Date();
  // Get the individual components of the current date
  const currentYear = currentDate.getFullYear();
  const currentMonth = String(currentDate.getMonth() + 1).padStart(2, '0'); // Add leading zero if needed
  const currentDay = String(currentDate.getDate()).padStart(2, '0'); // Add leading zero if needed

  // Construct the full date in the format "YYYY-MM-DD"
  const fullDate = `${currentYear}-${currentMonth}-${currentDay}`;
  const currentMilitaryTime = currentDate.toLocaleTimeString("en-US", {
    hour12: false,
    hour: "2-digit",
    minute: "2-digit",
  });
  

  if (appdate == fullDate && apptime < currentMilitaryTime) {
    showerror("Your time is not valid");
  } else {
    sendappoitnment(
      "../PHP/HospitalappController/appointment_insert.php",
      appdate,
      apptime,
      selectdoctorid,
      appmessage
    );
  }
});

function sendappoitnment(PHP, appdate, apptime, selectdoctorid, appmessage) {
  var form_data = new FormData();

  form_data.append("Appdate", appdate);
  form_data.append("Apptime", apptime);
  form_data.append("Selectdoctorid", selectdoctorid);
  form_data.append("Appmessage", appmessage);

  $.ajax({
    url: PHP,
    type: "POST",
    data: form_data,
    contentType: false,
    processData: false,
    cache: false,
    success: function (dataResult) {
      if (dataResult == true) {
        showsuccess("Appointment has been send , Waiting for approval");
        location.reload();
      } else if (dataResult == false) {
        showerror(
          "Your selected doctor has been reached its maximum patients per day"
        );
        return;
      } else if (dataResult.trim() === "NO") {
        showerror("Doctor is not available , Select different Time and Date");
        return;
      } else {
        showerror(dataResult);
      }
    },
    error: function (xhr, ajaxOptions, thrownError) {
      showerror(thrownError);
    },
  });
}




function getDoctorSchedule(PHP, Iid) {
  var form_data = new FormData();

  form_data.append("Iid", Iid);

  $.ajax({
    url: PHP,
    type: "POST",
    data: form_data,
    contentType: false,
    processData: false,
    cache: false,
    success: function (dataResult) {
      if (dataResult != null) {
          $('#lblSchedule').text(dataResult)
      } else {
        showerror(dataResult);
      }
    },
    error: function (xhr, ajaxOptions, thrownError) {
      showerror(thrownError);
    },
  });
}