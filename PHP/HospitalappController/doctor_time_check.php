

<?php


$result;

$arraydata= array(
    'Timestart' => "$Timefrom");

$data = $Conn->SqlConParamSelect("CALL doctor_approve_time_check(:Timestart)",$arraydata,$pdo);


    foreach($data as $row) 
        {
            $result = $row['result'];    
        }


?>
