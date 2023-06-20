<?php
 include("../PHP/HospitalappController/check_session/check_session_if_Exist.php");
 ?>
              <h5 class="card-title">About</h5>
                  <p class="small fst-italic">
                    <?php  
                      $mybio = !empty($bio) ? $bio : '';
                      echo $mybio;
                    ?>
                  </p>

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8">
                        <!-- Name -->
                         <?php   
                              $myfullname = !empty($fullname) ? $fullname : '';
                              echo $myfullname;
                          ?>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Hospital</div>
                    <div class="col-lg-9 col-md-8">
                           <!-- Hospital -->
                        <?php   
                           $myhospital = !empty($hospital) ? $hospital : '';
                           echo $myhospital;
                        ?>
                    </div>
                  </div>
                  

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8">
                    <!-- Contact Number -->
                      <?php   
                           $mycontact_number = !empty($contact_number) ? $contact_number : '';
                           echo $mycontact_number;
                        ?>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">
                       <!-- Email -->
                      <?php   
                          $myemail = !empty($email) ? $email : '';
                           echo $myemail;
                        ?>
                    </div>
                  </div>