

<?php
  include("admin_header.php");
 ?>


<?php
  include("admin_sidebar.php");
?>

      
<?php
  include("../PHP/HospitalappController/patient_dashboard_personal_details_count.php");
?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Patient Dashboard</h1>
    </div><!-- End Page Title -->

    <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Number of appointments</h5>
            <div class="row">
              <div class="col-md-6">
                 <i class="fas fa-file fa-3x blue-icon"></i>
                 </div>
                 <div class="col-md-6">
                 <h2 class="card-text"><?php echo $appointments ?></h2>
                 </div>
              </div>
          </div>
        </div>
      </div>
  </div>


    <!-- # Calendar -->
    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <!-- Start Content -->
            <div class="col-md-12">
              <div class="card info-card">
                <div class="card-body">
                <h5 class="card-title">Doctor Schedule</h5>
                    <div class="col-md-12">
                      <?php
                            include("../PHP/HospitalappController/select/doctor.php");
                        ?>
                    </div>
                    <hr>
                   <div class="col-md-12">
                        <div id="doctorcalendarschedule"></div>
                    </div>
                </div>
              </div>
            </div>
            <!-- End Content -->
         </div>
        </div>
      </div>

  <!-- # Calendar -->
    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <!-- Start Content -->
            <div class="col-md-12">
              <div class="card info-card">
                <div class="card-body">
                <h5 class="card-title">Calendar</h5>
                    <div id="calendar"></div>

                </div>
              </div>
            </div>
            <!-- End Content -->
         </div>
        </div>
      </div>

      
    </section>

  </main>
  <!-- End #main -->

  

  
<?php
  include("admin_footer.php");
?>


<script src="../static/js/patient_calendar_dashboard.js"></script> 