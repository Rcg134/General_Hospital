/** @format */

$(document).on("click", "#btncancel", function () {
  var appointmentid = $(this).closest("tr").find("td:eq(0)").text();
  $("#lblappointmentid").text(appointmentid);
  $("#cancelmodal").modal("show");
});

$(document).on("click", "#btnresched", function () {
  var reschedid = $(this).closest("tr").find("td:eq(0)").text();
  var timeStart = $(this).closest("tr").find("td:eq(6)").text().trim();
  $("#lblreschedid").text(reschedid);
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
  reschedyes(
    "../PHP/HospitalappController/my_appointment_time_reSched.php",
    appointmentid,
    reschedtime
  );
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

function reschedyes(PHP, id, timereschedule) {
  var form_data = new FormData();

  form_data.append("Id", id);
  form_data.append("Time", timereschedule);

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
