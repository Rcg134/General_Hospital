/** @format */

$("#appointmentform").submit(function (event) {
  event.preventDefault();
  var appdate = $("#appdate").val();
  var apptime = $("#apptime").val();
  var selectdoctorid = $("#selectdoctorid").val();
  var appmessage = $("#appmessage").val();

  sendappoitnment(
    "../PHP/HospitalappController/appointment_insert.php",
    appdate,
    apptime,
    selectdoctorid,
    appmessage
  );
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
        alert("Appointment has been send , Waiting for approval");
        location.reload();
      } else if (dataResult == false) {
        showerror("Your selected doctor has been reached its maximum patients per day")
        return;
      } else {
        showerror(dataResult)
      }
    },
    error: function (xhr, ajaxOptions, thrownError) {
      showerror(thrownError)
    },
  });
}
