

<?php

$bio;
$data;
$email;
$birthdate;
$data;
$specialize;

$usertypeid = $_SESSION['usertypeid'];
$userid = $_SESSION['iid'];


  // Patient
if ($usertypeid == 3)
{
    $data = $Conn->SqlConSelect("select description, contact_number, email, birthdate FROM tbl_patient_table WHERE login_id = {$userid}",$pdo);
}
 // Doctor 
else if ($usertypeid == 2)
{
    $data = $Conn->SqlConSelect("select description, contact_number, email, birthdate,specialize_id FROM tbl_doctor_details WHERE login_id = {$userid}",$pdo);
}



if ($usertypeid != 1)
{
    $totalrows = count($data);
    if ($totalrows > 0)
    {
        foreach($data as $row) 
        {
        
            $bio = $row['description'];
            $contact_number = $row['contact_number'];
            $email = $row['email'];
            $birthdate = $row['birthdate'];
            $specialize = $usertypeid == 2 ? $row['specialize_id'] : '';
        
        }
    }
}




?>












