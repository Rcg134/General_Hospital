/** @format */

document.addEventListener("DOMContentLoaded", function () {
  showPasswordOnHold("logpass");
  showPasswordOnHold("regpass");
  showPasswordOnHold("confirm-password");
});

function showPasswordOnHold(elementId) {
  var mouseDownTime = 0;
  var passwordInput = document.getElementById(elementId);

  function handleMouseDown() {
    mouseDownTime = new Date().getTime();
  }

  function handleMouseUp() {
    var mouseUpTime = new Date().getTime();
    var duration = mouseUpTime - mouseDownTime;

    if (duration >= 1000) {
      passwordInput.type = "text";
      setTimeout(function () {
        passwordInput.type = "password";
      }, 2000); // Revert to password after 1 second
    }
  }

  passwordInput.addEventListener("mousedown", handleMouseDown);
  passwordInput.addEventListener("mouseup", handleMouseUp);
}

document.addEventListener("DOMContentLoaded", function () {
  showPasswordOnHold("password"); // Usage: showPasswordOnHold(elementId)
});

// LOG IN ------------------------------
function submitLoginForm(event) {
  event.preventDefault();
  $("#loading").show();
  $("#login-form").hide();

  var username = $("#logusername").val();
  var password = $("#logpass").val();

  if (username.trim() === "" || password.trim() === "") {
    showerror("Please enter both email and password.");
    $("#login-form").show();
    $("#loading").hide();
  } else {
    AuthUser("../PHP/LoginController/login.php", username, password);
  }
}

// SIGN UP ------------------------------
function submitSignupForm(event) {
  event.preventDefault();
  var firstname = $("#regfirstname").val();
  var lastname = $("#reglastname").val();
  var username = $("#regusername").val();
  var password = $("#regpass").val();
  var confirmPassword = $("#confirm-password").val();

  if (
    username.trim() === "" ||
    password.trim() === "" ||
    confirmPassword.trim() === "" ||
    firstname.trim() === "" ||
    lastname.trim() === ""
  ) {
    showerror("Please fill in all the required fields.");
    $("#signup-form").show();
    $("#loading").hide();
  } else if (password !== confirmPassword) {
    showerror("Passwords do not match.");
    $("#signup-form").show();
    $("#loading").hide();
  } else {
    registeruser(
      "../PHP/LoginController/Registration_Insert.php",
      username,
      password,
      firstname,
      lastname
    );
  }
}

function submitForgotPasswordForm(event) {
  event.preventDefault();

  var forgotusername = $("#forgotusername").val();
  var lblusername = $("#lblusername").text(forgotusername);

  if (forgotusername.trim() === "") {
    showerror("Please enter your username.");
    return;
  }

  forgotpassword("../PHP/LoginController/username_check.php", forgotusername);
}

function submitappointmentupdateForm(event) {
  event.preventDefault();

  var newpassword = $("#newpassword").val();
  var newconfirmpassword = $("#newconfirmpassword").val();
  var username = $("#lblusername").text();

  if (newpassword !== newconfirmpassword) {
    showerror("Password is mismatch");
  } else {
    updatepassword(
      "../PHP/LoginController/password_update.php",
      username,
      newpassword
    );
  }
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

function AuthUser(PHP, username, password) {
  var form_data = new FormData();

  form_data.append("Username", username);
  form_data.append("Password", password);

  $.ajax({
    url: PHP,
    type: "POST",
    data: form_data,
    contentType: false,
    processData: false,
    cache: false,
    success: function (dataResult) {
      if (dataResult == true) {
        $("#loading").hide();
        location.href = "Front_page.php";
      } else {
        showerror("Wrong Credentials");
        $("#login-form").show();
        $("#loading").hide();
      }
    },
    error: function (xhr, ajaxOptions, thrownError) {
      showerror(thrownError);
    },
  });
}

function registeruser(PHP, username, password, firstname, lastname) {
  var form_data = new FormData();
  $("#signup-form").hide();
  $("#loading").show();
  form_data.append("Username", username);
  form_data.append("Password", password);
  form_data.append("Firstname", firstname);
  form_data.append("Lastname", lastname);

  $.ajax({
    url: PHP,
    type: "POST",
    data: form_data,
    contentType: false,
    processData: false,
    cache: false,
    success: function (dataResult) {
      if (dataResult == true) {
        $("#login-form").show();
        $("#loading").hide();
        $("#signup-form").hide();
        $("#signup-form :input").val("");
      }
      else if (dataResult == false){
        showerror("Username already exists");
        $("#loading").hide();
        $("#signup-form").show();
      }
      else{
        showerror(dataResult);
        $("#loading").hide();
        $("#signup-form").show();
      }
    },
    error: function (xhr, ajaxOptions, thrownError) {
      alert(thrownError);
      $("#loading").hide();
    },
  });
}

function forgotpassword(PHP, username) {
  var form_data = new FormData();

  form_data.append("Username", username);

  $.ajax({
    url: PHP,
    type: "POST",
    data: form_data,
    contentType: false,
    processData: false,
    cache: false,
    success: function (dataResult) {
      if (dataResult == true) {
        $("#forgetpasswordmodal").modal("show");
      } else {
        showerror("Your Username Does not exist");
      }
    },
    error: function (xhr, ajaxOptions, thrownError) {
      showerror(thrownError);
    },
  });
}

function updatepassword(PHP, username, password) {
  var form_data = new FormData();

  form_data.append("Username", username);
  form_data.append("Password", password);

  $.ajax({
    url: PHP,
    type: "POST",
    data: form_data,
    contentType: false,
    processData: false,
    cache: false,
    success: function (dataResult) {
      if (dataResult == true) {
        $("#forgetpasswordmodal").modal("hide");
        $("#forgot-password-form").hide();
        $("#login-form").show();
      } else {
        showerror("There is something wrong please contact the developer");
      }
    },
    error: function (xhr, ajaxOptions, thrownError) {
      showerror(thrownError);
    },
  });
}
