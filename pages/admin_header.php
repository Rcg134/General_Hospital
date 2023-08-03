<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>PANEL</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../img/Blue Gradient Medical Care Logo.png" rel="icon">
  <link href="../img/doctor-login.png" rel="apple-touch-icon">

  
  <!-- Vendor CSS Files -->
  <link href="../static/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../static/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../static/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../static/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../static/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../static/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../static/vendor/simple-datatables/style.css" rel="stylesheet">


  <!-- Template Main CSS File -->
  <link href="../static/css/style.css" rel="stylesheet">
  <link href="../static/css/admin_customstyle.css" rel="stylesheet">

  <!-- Calendar -->
  <link href="../static/css/calendar.min.css" rel="stylesheet">
  
    <!-- Cropper -->
    <link href="../static/css/cropper.min.css" rel="stylesheet">
</head>

<body>
  <!-- GET USER PROFILE -->
   <?php
     include("../PHP/set_connection.php");
     include("../PHP/HospitalappController/admin_profile_get.php");
   ?>



  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="#" class="logo d-flex align-items-center">
      <img class="loginLogo" src="../img/Blue Gradient Medical Care Logo.png" alt="Dentist Website Logo">
        <span class="d-none d-lg-block">Panel</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->
    
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">

            <!-- profile pic -->
            <!-- <img src="" id="headerprofpic" alt="Profile" class="rounded-circle"> -->
            <img id="imagePreview" class="rounded-circle" 
            src="<?php
                $iprofile_pic = !empty($profile_pic) ? "data:image/png;base64," . $profile_pic : "../img/emptyprofile.png";
                 echo $iprofile_pic;
            ?>" alt="Preview">
         
            <span class="d-none d-md-block dropdown-toggle ps-2">
               <?php 
                   $id = $_SESSION['usertypeid'] == 2 ? "Dr " . $_SESSION['name'] :  $_SESSION['name'];
                   echo $id;
               ?>
            </span>
            
             <label id=usertypeid hidden>
               <?php 
                    echo $_SESSION['usertypeid'];
                ?>
             </label>


             <label id=iusername hidden>
               <?php 
                    echo $_SESSION['username'];
                ?>
             </label>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">

          
            <li>
              <a class="dropdown-item d-flex align-items-center" href="admin_profile_header.php">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Log Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->


    <!--  error message -->
  <div id="alert" class="alert" style="display: none;">
   <strong id="errormsg"></strong>
  </div>


    <!--  success message -->
  <div id="success" class="successful" style="display: none;">
   <strong id="successmessage"></strong>
  </div>
  

  </header><!-- End Header -->



