<!DOCTYPE html>
<html>

<head>
  <title>Dentist Website - Login</title>


  <link href="../img/Blue Gradient Medical Care Logo.png" rel="icon">
  <link href="../img/doctor-login.png" rel="apple-touch-icon">
  <link rel="stylesheet" href="../static/css/bootsrap.css">
  <link rel="stylesheet" href="../static/css/login.css">

    <?php  
         session_start();
         if(!empty($_SESSION["iid"])){
            header('location:Front_page.php');
         }
    ?>
</head>


<body>
  <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="card">
          <div class="logo">
            <img class="loginLogo" src="../img/Blue Gradient Medical Care Logo.png" alt="Dentist Website Logo">
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
                <label for="text">Username:</label>
                <input type="text" class="form-control" id="forgotusername" placeholder="Enter your username" required>
              </div>
              <button type="submit" class="btn btn-pink btn-block" onclick="submitForgotPasswordForm(event)">Submit</button>
              <p class="text-center mt-3"> <a href="#" onclick="showLoginForm()">Back to Login</a></p>
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


            <!-- Vertically centered Modal Forgot password-->
            <div class="modal fade" id="forgetpasswordmodal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">New Password</h5>
                    </div>
                    <div class="modal-body">

                      <div class="row">
                        <div class="col-md-12">
                         <label id='lblusername' hidden></label>
                          <!-- # SELECT-->

                          <div class="row">
                              <div class="col-md-12">
                                  <label for="newpassword" class="form-label">New Password</label>
                                  <input type="password" class="form-control"  id="newpassword" required>
                             </div>


                             <div class="col-md-12">
                                  <label for="assigntime" class="form-label">Confirm Password</label>
                                  <input type="password" class="form-control" id="newconfirmpassword" required>
                             </div>
                         </div> 
                         
                         
                        </div>
                      </div>
    
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary" id="submitappointmentupdate" onclick="submitappointmentupdateForm(event)"  >Save</button>
                    </div>
                  </div>
                </div>
              </div>
            <!-- End Vertically centered Modal-->
  



 <!--  error message -->
  <div id="alert" class="alert" style="display: none;">
    <!-- <span class="closebtn">&times;</span> -->
   <strong id="errormsg"></strong>
  </div>



  <script src="../static/js/jquery.min.js"></script>
  <script src="../static/js/login.js"></script>
  <script src="../static/js/alertError.js"></script>
  <script src="../static/js/jquery_3.6.min.js"></script>
  <script src="../static/js/bootsrap.min.js"></script>


  <script src="../static/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  
</body>

</html>
