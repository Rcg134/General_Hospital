function submitprofileupdate(event){
    var firstname = $("#proffn").val();
    var lastname = $("#profln").val();
    var email = $("#profemail").val();
    var birthdate = $("#profbdate").val();
    var contactnumber = $("#profcn").val();
    var bio = $("#profdesc").val();
    var usertypeid = $("#lblusrtypeid").text();
    var iid = $("#lblid").text();
    var specialized = $("#selectspecialized").text();
    


    
    profileupdate('../PHP/LoginController/admin_profile_insert.php',
                   firstname,
                   lastname,
                   email,
                   birthdate,
                   contactnumber,
                   bio,
                   usertypeid,
                   iid,
                   specialized);
}




function profileupdate(PHP,
                       firstname,
                       lastname,
                       email,
                       birthdate,
                       contactnumber,
                       bio,
                       usertypeid,
                       iid,
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
    form_data.append("Iid", iid)
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
                   $("#loading").hide();
                 }
                 else{
                    alert('Wrong Credentials');
                    $("#login-form").show();
                    $("#loading").hide();
                 }
                     
            },
            error: function (xhr, ajaxOptions, thrownError){
              
                alert(thrownError);
               } 
                 
       });

}


