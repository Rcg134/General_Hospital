

<?php
  include("admin_header.php");
 ?>


<?php
  include("admin_sidebar.php");
?>



  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Doctor Dashboard</h1>
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
       
                    <div id="calendar"></div>

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
             <!-- End Page Title -->
  
            <!-- Start Content -->
              <div class="card info-card">
                <div class="card-body">
                 <div class="row">
                  <div class="col-md-12">
                  <h5 class="card-title">Default Table</h5>
                   <?php
                      include("../PHP/HospitalappController/table/admin_appointment_dashboard.php");
                   ?> 
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



<script src="../static/js/admin_apply_appointment.js"></script> 