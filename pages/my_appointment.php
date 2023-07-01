

<?php
  include("admin_header.php");
 ?>


<?php
  include("admin_sidebar.php");
?>



<main id="main" class="main">



  <!-- PROFILE -->
  <div class="pagetitle">
    <h1>My Appointment</h1>
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
                <h5 class="card-title">Table History</h5>
                  <!-- Content -->
                  <?php
                      include("../PHP/HospitalappController/table/my_appointment_table.php");
                   ?> 
    
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


    <!-- Vertically centered Modal Approve-->
       <div class="modal fade" id="cancelmodal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Cancel</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                      <div class="row">
                        <div class="col-md-12">
                         <label id='lblappointmentid' hidden></label>
                          <!-- # SELECT-->
                          <div class="col-md-12">

                             <label>Are you sure you want to cancel this appointment?</label>
                          
                          </div>
                                   
                        </div>
                      </div>
    
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-danger" id="submitcancel"  >Yes</button>
                    </div>
                  </div>
                </div>
              </div>
            <!-- End Vertically centered Modal-->


  </main>
  <!-- End #main -->



<?php
  include("admin_footer.php");
?>


<script src="../static/js/my_appointment.js"></script> 
