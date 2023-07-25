   
<?php
  include("admin_header.php");
 ?>


<?php
  include("admin_sidebar.php");
?>



<main id="main" class="main">



<?php
  include("../PHP/HospitalappController/doctor_schedule_get.php");
?>



   <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

         <!-- Profile Picture -->
                <?php
                       include("admin_profile_picture.php"); 
                  ?>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

                <?php
                    if ($_SESSION['usertypeid'] == 2)
                    {echo "
                      <li class='nav-item'>
                           <button class='nav-link' data-bs-toggle='tab' data-bs-target='#profile-schedule'>Schedule</button>
                      </li>";
                    }
                  ?>

    

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

  
              </ul>
              <div class="tab-content pt-2">

               <div class="tab-pane fade show active profile-overview" id="profile-overview">
                   <!-- Profile Overview -->
                 <?php
                       include("admin_profile_overview.php"); 
                  ?>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                     
                  <!-- Profile Edit Form -->
                  <?php
                       include("admin_profile_edit.php"); 
                  ?>

                </div>


                <div class="tab-pane fade pt-3" id="profile-change-password">

                  <!-- Change password Edit Form -->
                   <?php
                       include("admin_profile_change_password.php"); 
                    ?>

                </div>

                <div class="tab-pane fade pt-3" id="profile-schedule">

                  <!-- Schedule Form -->
                   <?php
                       include("admin_profile_schedule.php"); 
                    ?>
        
                </div>



              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

   </main>
<!-- End #main -->




<!-- Crop Modal -->
      <div class="modal fade" id="cropModal" tabindex="-1" data-bs-backdrop="false">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header alert-primary">
                      <h5 class="modal-title">Crop your picture</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <div class="modal-body">
                         <div class="text-center">
                           <img id="modalImage" src="" alt="Crop" style="max-width: 100%; max-height: 70vh;">
                         </div>
                       </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary" id="cropButton">Save changes</button>
                    </div>
                  </div>
                </div>
         </div>

    

<?php
  include("admin_footer.php");
?>


<script src="../static/js/admin_profile.js"></script>
<script src="../static/js/cropper.js"></script>