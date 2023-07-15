/** @format */

$(document).on("click", "#btncancel", function () {
  var appointmentid = $(this).closest("tr").find("td:eq(0)").text();
  $("#lblappointmentid").text(appointmentid);
  $("#cancelmodal").modal("show");
});

$(document).on("click", "#btnresched", function () {
  var reschedid = $(this).closest("tr").find("td:eq(0)").text();
  var Idate = $(this).closest("tr").find("td:eq(5)").text().trim();
  var timeStart = $(this).closest("tr").find("td:eq(6)").text().trim();
  $("#lblreschedid").text(reschedid);
  $("#rescheddate").val(Idate);
  $("#reschedTimeStart").val(timeStart);
  $("#reschedmodal").modal("show");
});

// APPROVE
$("#submitcancel").click(function () {
  let appointmentid = $("#lblappointmentid").text();
  cancelyes(
    "../PHP/HospitalappController/my_appointment_cancel_status_update.php",
    appointmentid
  );
});

// Resched
$("#submitresched").click(function () {
  let appointmentid = $("#lblreschedid").text();
  let reschedtime = $("#reschedTimeStart").val();
  let rescheddate = $("#rescheddate").val();
  const currentDate = new Date();
  const currentMilitaryTime = currentDate.toLocaleTimeString("en-US", {
    hour12: false,
    hour: "2-digit",
    minute: "2-digit",
  });

  if (reschedtime < currentMilitaryTime) {
    showerror("Your time is not valid");
  } else {
    reschedyes(
      "../PHP/HospitalappController/my_appointment_time_reSched.php",
      appointmentid,
      reschedtime,
      rescheddate
    );
  }
});

function cancelyes(PHP, id) {
  var form_data = new FormData();

  form_data.append("Id", id);

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
      showerror(thrownError);
    },
  });
}

function reschedyes(PHP, id, timereschedule, idate) {
  var form_data = new FormData();

  form_data.append("Id", id);
  form_data.append("Time", timereschedule);
  form_data.append("Idate", idate);

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
      showerror(thrownError);
    },
  });
}
