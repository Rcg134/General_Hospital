

<?php
  include("admin_header.php");
 ?>


<?php
  include("admin_sidebar.php");
?>


<main id="main" class="main">

<!-- LIST OF USER -->
<div class="pagetitle" id=registereduserid >
   <h1>Newly Registered User</h1>
 </div>
 <!-- End Page Title -->
 <section class="section" id="newreguser" >
   <div class="row">
     <div class="col-lg-12">
       <div class="row">
         <!-- Start Content -->
         <div class="card info-card">
           <div class="card-body">
             <div class="col-lg-12">
               <div class="row">
                 <div class="row g-3">
                   
                 <!-- TABLE -->
                  <?php
                      include("../PHP/HospitalappController/table/registered_user_table.php");
                   ?>
            
                 </div>
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


  </main>
  <!-- End #main -->

  
         <!-- Vertically centered Modal -->
              <div class="modal fade" id="userrolemodal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Assign User Role</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                      <div class="row">
                        <div class="col-md-12">
                             <label id='lblcolumnid' hidden></label>
                          <!-- # SELECT-->
                          <?php
                           include("../PHP/HospitalappController/select/user_role.php");
                          ?>

                        </div>
                      </div>
    
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary" onclick="submitsetuserrole(this)" >Save changes</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Vertically centered Modal-->




<?php
  include("admin_footer.php");
?>


<script src="../static/js/admin_new_user.js"></script> 
