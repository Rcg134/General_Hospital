

<?php


$result;

$arraydata= array(
    'Apptime' => "$Apptime",
    'Selectdoctorid' => "$Selectdoctorid",
     'Appdate'=> "$Appdate");

$data = $Conn->SqlConParamSelect("CALL patient_approve_time_check(:Selectdoctorid ,:Apptime ,:Appdate)",$arraydata,$pdo);


    foreach($data as $row) 
        {
            $Time_reserve = $row['Time_reserve'];    
        }


?>












