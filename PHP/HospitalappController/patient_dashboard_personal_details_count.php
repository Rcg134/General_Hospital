<?php


    $patientid = $_SESSION['iid'];

    // GET APPOINTMENTS
    $sql = "CALL patient_dashboard_appointments_count(:Patientid)";
    $arraydata= array(
                'Patientid' => "$patientid");


    $data =  $Conn->SqlConParamSelect($sql,$arraydata,$pdo);
        foreach($data as $row) 
        {
            $appointments = $row['appointments'];
        }


?>