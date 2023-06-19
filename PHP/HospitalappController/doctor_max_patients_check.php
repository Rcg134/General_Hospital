

<?php


$result;

$arraydata= array(
    'Appdate' => "$Appdate",
    'Selectdoctorid' => "$Selectdoctorid");

$data = $Conn->SqlConParamSelect("CALL patients_max_check(:Selectdoctorid, :Appdate)",$arraydata,$pdo);





    foreach($data as $row) 
        {
            $result = $row['result'];    
        }


?>












