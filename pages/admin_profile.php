

<?php
  include("admin_header.php");
 ?>


<?php
  include("admin_sidebar.php");
?>




<main id="main" class="main">



<!-- LIST OF USER -->
<div class="pagetitle">
   <h1>Newly Registered User</h1>
 </div>
 <!-- End Page Title -->
 <section class="section" id="newreguser">
   <div class="row">
     <div class="col-lg-12">
       <div class="row">
         <!-- Start Content -->
         <div class="card info-card">
           <div class="card-body">
             <div class="col-lg-12">
               <div class="row">
                 <div class="row g-3">
                   

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











  <!-- PROFILE -->
  <div class="pagetitle">
    <h1>Profile</h1>
  </div>
  <!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="row">
          <!-- Start Content -->
          <div class="card info-card">
            <div class="card-body">
              <div class="col-lg-12">
                <div class="row">
                  <form class="row g-3">
                    <div class="col-md-6">
                      <label for="validationDefault01" class="form-label">First name</label>
                      <input type="text" class="form-control" id="proffn"
                                   value=
                                   <?php
                                       if(empty($_SESSION['fn']))
                                       {
                                        echo "";
                                       }
                                       else{
                                        echo $_SESSION['fn'];  
                                       }
                                   ?> required>
                    </div>
                    <div class="col-md-6">
                      <label for="validationDefault02" class="form-label">Last name</label>
                      <input type="text" class="form-control" id="profln" 
                                    value=
                                      <?php 
                                        if(empty($_SESSION['ln']))
                                        {
                                         echo "";
                                        }
                                        else{
                                         echo $_SESSION['ln'];  
                                        } 
                                      ?> required>
                    </div>
                    <div class="col-md-6">
                      <label for="validationDefault03" class="form-label">Contact Number</label>
                      <input type="text" class="form-control" id="profcn" required>
                    </div>
                    <!-- <div class="col-md-3"><label for="validationDefault04" class="form-label">State</label><select class="form-select" id="validationDefault04" required><option selected disabled value="">Choose...</option><option>...</option></select></div> -->
                    <div class="col-md-6">
                      <label for="validationDefault03" class="form-label">Email</label>
                      <input type="email" class="form-control" id="profemail" placeholder="name@example.com">
                    </div>
                    <div class="col-md-6">
                      <label for="validationDefault05" class="form-label">Birth date</label>
                      <input type="date" id="profbdate" class="form-control">
                    </div>
                    <div class="col-md-6">
                      <label for="validationDefault05" class="form-label">Specialized</label>
                      <select class="form-control" id="selectspecialized">
                        <option selected="1">Cardiology</option>
                        <option value="2">Pedia</option>
                        <option value="3">Neuro</option>
                      </select>
                    </div>
                    <div class="col-md-12">
                      <label for="validationDefault05" class="form-label">BIO</label>
                      <textarea class="form-control" placeholder="Biography" id="profdesc"></textarea>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary" type="submit" onclick="submitprofileupdate(event)">Save</button>
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
