$(document).on('click', '#btncancel', function () {
    var appointmentid = $(this).closest("tr").find('td:eq(0)').text();
    $("#lblappointmentid").text(appointmentid)
    $("#cancelmodal").modal("show");   
 });



 // APPROVE
 $('#submitcancel').click(function() {
    let appointmentid = $("#lblappointmentid").text();
    cancelyes('../PHP/HospitalappController/my_appointment_cancel_status_update.php' ,appointmentid);

  });






  
  function cancelyes(PHP,id) {
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
        showerror(thrownError)
      },
    });
  }
