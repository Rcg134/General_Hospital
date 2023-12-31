

<?php
  include("admin_header.php");
 ?>


<?php
  include("admin_sidebar.php");
?>



<main id="main" class="main">



  <!-- PROFILE -->
  <div class="pagetitle">
    <h1>Appointment</h1>
  </div>
  <!-- End Page Title -->

<?php 

 include("../PHP/HospitalappController/overlay/overlayerror.php");

 ?>
  
  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="row">
          <!-- Start Content -->
          <div class="card info-card">
            <div class="card-body">
              <div class="col-lg-12">
                <div class="row">
                  <form class="row g-3" id ="appointmentform">

                   <div class="col-md-6">
                      <label for="validationDefault05" class="form-label">Date</label>
                      <input type="date" id="appdate" class="form-control" min=
                          <?php $minDate = date('Y-m-d'); 
                             echo $minDate;
                             ?>>
                      </div>

                    <div class="col-md-6">
                      <label for="validationDefault01" class="form-label">Time</label>
                      <input type="time" class="form-control" id="apptime" required>
                    </div>

                    <div class='col-md-6'>              
                        <?php
                            include("../PHP/HospitalappController/select/doctor.php");
                        ?>
                    </div>
                    <div class='col-md-6'>
                        <label for="validationDefault01" class="form-label">Schedule</label>        
                        <label class="form-control" id="lblSchedule"> </label> 
                    </div>

                    <div class="col-md-12">

                      <label for="validationDefault05" class="form-label">Message</label>
                      <textarea class="form-control" placeholder="Symptoms" id="appmessage" required></textarea>
           
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- End Content -->
        </div>
      </div>
    </div>
    </div>
    <!-- End Content -->
    </div>
    </div>
    </div>
  </section>

     <!-- #region -->



     
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
                        <div id="doctorcalendarschedule"></div>
                    </div>
                </div>
              </div>
            </div>
            <!-- End Content -->
         </div>
        </div>
      </div>


  </main>
  <!-- End #main -->



<?php
  include("admin_footer.php");
?>


<script src="../static/js/admin_apply_appointment.js"></script> 
