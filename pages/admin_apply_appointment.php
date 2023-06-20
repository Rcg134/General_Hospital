

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
                   
                        <?php
                            include("../PHP/HospitalappController/select/doctor.php");
                        ?>

                    <div class="col-md-12">

                      <label for="validationDefault05" class="form-label">Message</label>
                      <textarea class="form-control" placeholder="Biography" id="appmessage" required></textarea>
           
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


  </main>
  <!-- End #main -->



<?php
  include("admin_footer.php");
?>


<script src="../static/js/admin_apply_appointment.js"></script> 
