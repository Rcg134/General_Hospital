<!DOCTYPE html>
<html>

<head>
  <title>Dentist Website - Login</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <style>
    body {
      background: url('dentalbg.jpg') no-repeat center center fixed;
      background-size: cover;
    }
    
    .container {
      margin-top: 150px;
    }
    
    .card {
      background-color: rgba(255, 255, 255, 0.8);
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }
    
    .btn-pink {
      background-color: #ff69b4;
      color: #fff;
    }
    
    .loading {
      display: none;
      text-align: center;
    }
    
    .logo {
      text-align: center;
      margin-bottom: 20px;
    }
    
    .logo img {
      width: 150px;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="card">
          <div class="logo">
            <img src="teeth-login.png" alt="Dentist Website Logo">
          </div>
          <div id="login-form">
            <form id="login-form">
              <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" required>
              </div>
              <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" placeholder="Enter password" required>
              </div>
              <button type="submit" class="btn btn-pink btn-block" onclick="submitLoginForm(event)">Login</button>
              <p class="text-center mt-3">Forgot password? <a href="#" onclick="showForgotPasswordForm()">Click here</a></p>
              <p class="text-center">Don't have an account? <a href="#" onclick="showSignupForm()">Sign up</a></p>
            </form>
          </div>
          <div id="signup-form" style="display: none;">
            <h3 class="text-center">Sign Up</h3>
            <form id="signup-form">
              <div class="form-group">
                <label for="name">Full Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter your full name" required>
              </div>
              <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" required>
              </div>
              <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" placeholder="Enter password" required>
              </div>
              <div class="form-group">
                <label for="confirm-password">Confirm Password:</label>
                <input type="password" class="form-control" id="confirm-password" placeholder="Confirm password" required>
              </div>
              <button type="submit" class="btn btn-pink btn-block" onclick="submitSignupForm(event)">Sign Up</button>
              <button type="button" class="btn btn-pink btn-block" onclick="showLoginForm()">Back to Login</button>
            </form>
          </div>
          <div id="forgot-password-form" style="display: none;">
            <h3 class="text-center">Forgot Password</h3>
            <form id="forgot-password-form">
              <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
              </div>
              <button type="submit" class="btn btn-pink btn-block" onclick="submitForgotPasswordForm(event)">Submit</button>
              <button type="button" class="btn btn-pink btn-block" onclick="showLoginForm()">Back to Login</button>
            </form>
          </div>
          <div class="loading" id="loading">
            <div class="spinner-border text-pink" role="status">
              <span class="sr-only">Loading...</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
    function submitLoginForm(event) {
      event.preventDefault();
      
      var email = $("#email").val();
      var password = $("#password").val();
      
      if (email.trim() === '' || password.trim() === '') {
        alert("Please enter both email and password.");
        return;
      }

      $("#login-form").hide();
      $("#loading").show();
      // Simulate login process
      setTimeout(function () {
        $("#loading").hide();
        $("#login-form").show();
      }, 2000);
    }

    function submitSignupForm(event) {
      event.preventDefault();
      
      var name = $("#name").val();
      var email = $("#email").val();
      var password = $("#password").val();
      var confirmPassword = $("#confirm-password").val();
      
      if (name.trim() === '' || email.trim() === '' || password.trim() === '' || confirmPassword.trim() === '') {
        alert("Please fill in all the required fields.");
        return;
      }
      
      if (password !== confirmPassword) {
        alert("Passwords do not match.");
        return;
      }
      
      // Perform sign-up process here
      
      alert("Sign-up successful!");
      $("#signup-form").hide();
      $("#login-form").show();
    }

    function submitForgotPasswordForm(event) {
      event.preventDefault();
      
      var email = $("#email").val();
      
      if (email.trim() === '') {
        alert("Please enter your email.");
        return;
      }
      
      // Perform forgot password process here
      
      alert("Password reset link sent to your email.");
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
  </script>
</body>

</html>
