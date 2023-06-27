

<?php
  include("admin_header.php");
 ?>


<?php
  include("admin_sidebar.php");
?>



  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Patient Dashboard</h1>
    </div><!-- End Page Title -->
      
    <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Number of Consultations</h5>
            <div class="row">
              <div class="col-md-3">
                 <i class="fas fa-user fa-3x blue-icon"></i>
                 </div>
                 <div class="col-md-6">
                 <h2 class="card-text" id="approvedCount">20</h2>
                 </div>
              </div>
          </div>
        </div>
      </div>

     <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Appointments</h5>
            <div class="row">
              <div class="col-md-3">
              <i class="fas fa-file-alt fa-3x blue-icon"></i>
                 </div>
                 <div class="col-md-6">
                 <h2 class="card-text" id="approvedCount">1</h2>
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