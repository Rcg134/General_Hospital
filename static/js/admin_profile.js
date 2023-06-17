

$(function() {


});



$("#profileform").submit(function(event) {
  event.preventDefault();
  var firstname = $("#proffn").val();
  var lastname = $("#profln").val();
  var email = $("#profemail").val();
  var birthdate = $("#profbdate").val();
  var contactnumber = $("#profcn").val();
  var bio = $("#profdesc").val();
  var usertypeid = $("#usertypeid").text().trim();
  var specialized = $("#selectspecialized").val();
  
  if (specialized == 0){
    alert("input all fields")
    return;
  }

  
  profileupdate('../PHP/HospitalappController/admin_profile_insert.php',
                 firstname,
                 lastname,
                 email,
                 birthdate,
                 contactnumber,
                 bio,
                 usertypeid,
                 specialized);


});





// REQUEST TO SERVER ----------------------------------------



function profileupdate(PHP,
                       firstname,
                       lastname,
                       email,
                       birthdate,
                       contactnumber,
                       bio,
                       usertypeid,
                       specialized)
{
    var form_data = new FormData();

    form_data.append("Firstname", firstname)  
    form_data.append("Lastname", lastname)
    form_data.append("Email", email)  
    form_data.append("Birthdate", birthdate)  
    form_data.append("Contactnumber", contactnumber)  
    form_data.append("Bio", bio)  
    form_data.append("Usertypeid", usertypeid)  
    form_data.append("Specialized", specialized)  


       
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


