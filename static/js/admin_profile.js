/** @format */

$(function () {
  $("#profcn").keypress(function (event) {
    if ($(this).val().length === 0 && event.key === "0") {
      event.preventDefault(); // Prevent the entry of '0' as the first character
    }
  });
});

$("#profileform").submit(function (event) {
  event.preventDefault();
  var firstname = $("#proffn").val();
  var lastname = $("#profln").val();
  var email = $("#profemail").val();
  var birthdate = $("#profbdate").val();
  var contactnumber = $("#profcn").val();
  var bio = $("#profdesc").val();
  var usertypeid = $("#usertypeid").text().trim();
  var specialized = $("#selectspecialized").val();
  var valuepatient = $("#profvalueday").val();

  if (specialized == 0) {
    showerror("Input all fields");
    return;
  }

  profileupdate(
    "../PHP/HospitalappController/admin_profile_insert.php",
    firstname,
    lastname,
    email,
    birthdate,
    contactnumber,
    bio,
    usertypeid,
    specialized,
    valuepatient
  );
});

// REQUEST TO SERVER ----------------------------------------

function profileupdate(
  PHP,
  firstname,
  lastname,
  email,
  birthdate,
  contactnumber,
  bio,
  usertypeid,
  specialized,
  valuepatient
) {
  var form_data = new FormData();

  form_data.append("Firstname", firstname);
  form_data.append("Lastname", lastname);
  form_data.append("Email", email);
  form_data.append("Birthdate", birthdate);
  form_data.append("Contactnumber", contactnumber);
  form_data.append("Bio", bio);
  form_data.append("Usertypeid", usertypeid);
  form_data.append("Specialized", specialized);
  form_data.append("Valuepatient", valuepatient);

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
