



    <!-- PROFILE -->
    <div class="pagetitle">
        <h1>Profile</h1>
    </div>
    <!-- End Page Title -->


                <div class="row">
                    <!-- Start Content -->
                    <div class="card info-card">
                        <div class="card-body">
                            <div class="col-lg-12">
                                <div class="row">
                                    <form class="row g-3" id="profileform">
                                        <div class="col-md-6">
                                            <label for="validationDefault01" class="form-label">First name</label>
                                            <input type="text" required class="form-control" id="proffn" 
                                            value=<?php
                                                     if(empty($_SESSION['fn']))
                                                     {
                                                      echo "";
                                                     }
                                                     else{
                                                      echo $_SESSION['fn'];  
                                                     }
                                                 ?>>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="validationDefault02" class="form-label">Last name</label>
                                            <input type="text" required class="form-control" id="profln" 
                                            value=<?php 
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




                                         <div class="input-group">
                                                 <div class="input-group-prepend">
                                                   <span class="input-group-text">(+63)</span>
                                                 </div>
                                                 <input type="text" required onkeypress="return allowNumbersOnly(event)" maxlength="10" class="form-control" id="profcn" 
                                                  value=<?php 
                                                        $contact = !empty($contact_number) ? $contact_number : '';
                                                        echo $contact;
                                                     ?>>
                                               </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="validationDefault03" class="form-label">Email</label>
                                            <input type="email" required class="form-control" id="profemail"
                                                placeholder="name@example.com" 
                                                 value=<?php 
                                                         $iemail = !empty($email) ? $email : '';
                                                         echo $iemail
                                                      ?>>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="validationDefault05" class="form-label">Birth date</label>
                                            <input type="date" required id="profbdate" class="form-control" 
                                                 value=<?php 
                                                          $ibrithdate = !empty($birthdate) ? $birthdate : '';
                                                          echo $ibrithdate;
                                                       ?>>

                                        </div>

                                          <?php
                                             if ($_SESSION['usertypeid'] == 1 || $_SESSION['usertypeid'] == 2 ) 
                                             {
                                               include("../PHP/HospitalappController/select/specialize.php");
                                             }      
                                           ?>


                                          <?php
                                             if ($_SESSION['usertypeid'] == 1 || $_SESSION['usertypeid'] == 2 ) 
                                             {
                                                $ivalue_Day = !empty($value_Day) ? $value_Day : '';
                                               echo "<div class='col-md-12> 
                                               <label for='validationDefault03' class='form-label'>Maximum Patients per day</label>
                                               <input type='text' required class='form-control' onkeypress='return allowNumbersOnly(event)' id='profvalueday' value='{$ivalue_Day}'>
                                               </div>";
                                              }      
                                           ?>

                                        <div class="col-md-12">

                                            <label for="validationDefault05" class="form-label">BIO</label>
                                            <textarea class="form-control" required placeholder="Biography"
                                                id="profdesc"><?php 
                                                   $ibio = !empty($bio) ? $bio : ''; 
                                                   echo $ibio;
                                                ?></textarea>

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






    <!-- #region -->

