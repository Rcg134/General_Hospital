

<?php
  include("admin_header.php");
 ?>


<?php
  include("admin_sidebar.php");
?>



  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Admin Dashboard</h1>
    </div><!-- End Page Title -->
  

  <!-- # Calendar -->
    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <!-- Start Content -->
            <div class="col-md-12">
              <div class="card info-card">
                <div class="card-body">
                  <hr>
                <div class="col-md-12">
                   <h3>Appointment for all Doctors</h3>
                <div>
                <hr>
                <div id="chart"></div>

                </div>
              </div>
            </div>
            <!-- End Content -->
         </div>
        </div>
      </div>

    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <!-- Start Content -->
            <div class="col-md-12">
              <div class="card info-card">
                <div class="card-body">
                <hr>
                <div class="col-md-12">
                   <h3>Doctor Performance Tracker</h3>
                <div>
                <hr>
                 <div class="row">
                  <div class="col-md-12">
                      <div id="DoctorPerformanceChart"></div>
                   </div>
                  </div>
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



<script src="../static/js/admin_visual_dashboard.js"></script> 