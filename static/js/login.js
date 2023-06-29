

// LOG IN ------------------------------
function submitLoginForm(event) {
    event.preventDefault();
    $("#loading").show();
    $("#login-form").hide();
    
    var username = $("#logusername").val();
    var password = $("#logpass").val();
    
    if (username.trim() === '' || password.trim() === '') {
      showerror("Please enter both email and password.");
      $("#login-form").show();
      $("#loading").hide();
    }
    else{
        AuthUser('../PHP/LoginController/login.php',username,password)     
    }
  }



// SIGN UP ------------------------------
  function submitSignupForm(event) {
    event.preventDefault();
    $("#signup-form").hide();
    $("#loading").show();
    var firstname = $("#regfirstname").val();
    var lastname = $("#reglastname").val();
    var username = $("#regusername").val();
    var password = $("#regpass").val();
    var confirmPassword = $("#confirm-password").val();
    
    if (username.trim() === '' || password.trim() === '' || confirmPassword.trim() === '' || firstname.trim() === '' || lastname.trim() === '') {
      showerror("Please fill in all the required fields.");
      $("#signup-form").show();
      $("#loading").hide();
    }    
    else if (password !== confirmPassword) {
      showerror("Passwords do not match.");
      $("#signup-form").show();
      $("#loading").hide();
    }
    else{
        registeruser('../PHP/LoginController/Registration_Insert.php',username,password,firstname,lastname)
    }  
  }






  function submitForgotPasswordForm(event) {
    event.preventDefault();
    
    var email = $("#email").val();
    
    if (email.trim() === '') {
      showerror("Please enter your email.");
      return;
    }
    
    // Perform forgot password process here
    showerror("Password reset link sent to your email.");
    $("#forgot-password-form").hide();
    $("#login-form").show();
  }

  function showSignupForm() {
    $("#login-form").hide();
    $("#signup-form").show();
  }

  function showForgotPasswordForm() {
    $("#login-form").hide();
    $("#forgot-password-form").show();
  }

  function showLoginForm() {
    $("#signup-form").hide();
    $("#forgot-password-form").hide();
    $("#login-form").show();
  }




// Server side code ------------------------------------------------------




function AuthUser(PHP,username,password){
    var form_data = new FormData();

    form_data.append("Username", username)  
    form_data.append("Password", password)  


       
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
                   location.href = "Front_page.php"
                 }
                 else{
                    showerror('Wrong Credentials');
                    $("#login-form").show();
                    $("#loading").hide();
                 }
                     
            },
            error: function (xhr, ajaxOptions, thrownError){
                showerror(thrownError);
               } 
                 
       });

}








  function registeruser(PHP,username,password,firstname,lastname){
    var form_data = new FormData();

    form_data.append("Username", username)  
    form_data.append("Password", password)
    form_data.append("Firstname", firstname)  
    form_data.append("Lastname", lastname)  

       
           $.ajax({
            url: PHP,
            type: "POST",
            data: form_data,
            contentType: false,
            processData: false,
            cache: false,
            success: function(dataResult){
                 if(dataResult == true){
                    alert("Sign-up successful!"); 
                    $("#login-form").show();
                    $("#loading").hide();
                    $("#signup-form").hide();
                    $("#signup-form :input").val('');
                 }               
            },
            error: function (xhr, ajaxOptions, thrownError){
              
                alert(thrownError);
                $("#loading").hide();
               } 
                 
       });

}




