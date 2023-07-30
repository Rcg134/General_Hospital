

<?php


$result;

$arraydata= array(
    'Apptime' => "$Apptime",
    'Selectdoctorid' => "$Selectdoctorid");

$data = $Conn->SqlConParamSelect("CALL patient_approve_time_check(:Selectdoctorid ,:Apptime)",$arraydata,$pdo);


    foreach($data as $row) 
        {
            $Time_reserve = $row['Time_reserve'];    
        }


?>












