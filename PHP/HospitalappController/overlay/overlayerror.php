


<?php 


$overlay = "<div id='overlay'>
             <div class='overlay-content'>
             <h2 id='animated-text'>You have to complete your profile first</h2>
                <a href='admin_profile_header.php' class='btn btn-primary'>Go to your Profile</a>
                </div>
              </div>
             </div>
             </div>";
$useridtype = $_SESSION['usertypeid'];    


  // Doctor
  if ($useridtype == 2){
    if (empty($bio) || empty($contact_number) || empty($birthdate) || empty($specialize) || empty($value_Day)){
      echo $overlay; 
   }
  }
  else{
    if (empty($bio) || empty($contact_number) || empty($birthdate)){
      echo $overlay; 
   }
  }

 ?>
