

<?php


$result;

$arraydata= array(
    'Timestart' => "$Timefrom",
    'Idate' => "$Idate");

$data = $Conn->SqlConParamSelect("CALL doctor_approve_time_check(:Timestart,:Idate)",$arraydata,$pdo);


    foreach($data as $row) 
        {
            $result = $row['result'];    
        }


?>
