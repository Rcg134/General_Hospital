

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

           
    <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Approved Patients</h5>
            <div class="row">
              <div class="col-md-3">
                 <i class="fas fa-check-circle fa-3x blue-icon"></i>
                 </div>
                 <div class="col-md-6">
                 <h2 class="card-text" id="approvedCount">25</h2>
                 </div>
              </div>
          </div>
        </div>
      </div>

     <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Disapproved Patients</h5>
            <div class="row">
              <div class="col-md-3">
              <i class="fas fa-times-circle fa-3x red-icon"></i>
                 </div>
                 <div class="col-md-6">
                 <h2 class="card-text" id="approvedCount">25</h2>
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

    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-12">
             <!-- End Page Title -->
  
            <!-- Start Content -->
              <div class="card info-card">
                <div class="card-body">
                 <div class="row">
                  <div class="col-md-12">
                  <h5 class="card-title">List of Appointments</h5>
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







           <!-- Vertically centered Modal Approve-->
           <div class="modal fade" id="assignmodal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Assign Time</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                      <div class="row">
                        <div class="col-md-12">
                         <label id='lblpatientid' hidden></label>
                          <!-- # SELECT-->

                          <div class="row">
                              <div class="col-md-6">
                                  <label for="assigntime" class="form-label">Time Start</label>
                                  <input type="time" class="form-control"  id="assigntimestart" required>
                             </div>


                             <div class="col-md-6">
                                  <label for="assigntime" class="form-label">Time End</label>
                                  <input type="time" class="form-control" id="assigntimeend" required>
                             </div>
                         </div> 
                         
                         
                        </div>
                      </div>
    
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary" id="submitappointmentupdate"  >Save</button>
                    </div>
                  </div>
                </div>
              </div>
            <!-- End Vertically centered Modal-->




               <!-- Vertically centered Modal Approve-->
           <div class="modal fade" id="dismodal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Disapprove</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                      <div class="row">
                        <div class="col-md-12">
                         <label id='lblpatientiddis' hidden></label>
                          <!-- # SELECT-->
                          <div class="col-md-12">

                              <label for="validationDefault05" class="form-label">Reason</label>
                              <textarea class="form-control" placeholder="Reason to disapprove" id="remarksdisaprove" required></textarea>
                          
                          </div>

                         
                        </div>
                      </div>
    
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-danger" id="submitappointmentupdatedisapprove"  >Disapprove</button>
                    </div>
                  </div>
                </div>
              </div>
            <!-- End Vertically centered Modal-->


  

  
<?php
  include("admin_footer.php");
?>

<script src="../static/js/doctor_calendar_dashboard.js"></script> 
<script src="../static/js/doctor_list_appointment_dashboard.js"></script> 

