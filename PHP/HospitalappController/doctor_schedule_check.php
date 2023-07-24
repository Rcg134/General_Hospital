

<?php


$result;

$arraydata= array(
    'Appdate' => "$Appdate",
    'Apptime' => "$Apptime",
    'Selectdoctorid' => "$Selectdoctorid");

$data = $Conn->SqlConParamSelect("CALL doctor_schedule_check(:Appdate ,:Apptime, :Selectdoctorid)",$arraydata,$pdo);


    foreach($data as $row) 
        {
            $Availability = $row['Availability'];    
        }


?>












