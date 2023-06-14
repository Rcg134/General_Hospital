<!DOCTYPE html>
<html>

<head>
  <title>Dentist Website - Login</title>
  <link rel="stylesheet" href="../static/css/bootsrap.css">
  <link rel="stylesheet" href="../static/css/login.css">
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="card">
          <div class="logo">
            <img src="../img/teeth-login.png" alt="Dentist Website Logo">
          </div>
          <div id="login-form">
            <form id="login-form">
              <div class="form-group">
                <label for="Username">Username:</label>
                <input type="text" class="form-control" id="logusername" placeholder="Enter Username" required>
              </div>
              <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="logpass" placeholder="Enter Password" required>
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
                <label for="name">First Name:</label>
                <input type="text" class="form-control" id="regfirstname" placeholder="Enter your first name" required>
              </div>
              <div class="form-group">
                <label for="name">Last Name:</label>
                <input type="text" class="form-control" id="reglastname" placeholder="Enter your last name" required>
              </div>
              <div class="form-group">
                <label for="name">User Name:</label>
                <input type="text" class="form-control" id="regusername" placeholder="Enter your username" required>
              </div>
              <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="regpass" placeholder="password" required>
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
                <label for="password">password:</label>
                <input type="password" class="form-control" id="forgotpass" placeholder="Enter your email" required>
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

  <script src="../static/js/jquery.min.js"></script>
  <script src="../static/js/login.js"></script>
</body>

</html>
