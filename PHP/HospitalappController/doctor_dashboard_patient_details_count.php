<?php


    $doctorid = $_SESSION['iid'];

    // GET APPROVE
    $sql = "CALL doctor_dashboard_approve_patients_count(:Doctorid)";
    $arraydata= array(
                'Doctorid' => "$doctorid");
    $data =  $Conn->SqlConParamSelect($sql,$arraydata,$pdo);
        foreach($data as $row) 
        {
            $approve = $row['approve'];
        }


    // GET DISAPPROVE
    $sql = '';
    $data = '';

    $sql = "CALL doctor_dashboards_disapprove_patient_count(:Doctorid)";
    $data =  $Conn->SqlConParamSelect($sql,$arraydata,$pdo);
        foreach($data as $row) 
        {
            $disapprove = $row['disapprove'];
        }

    
    // GET DISAPPROVE
    $sql = '';
    $data = '';

    $sql = "CALL doctor_dashboard_pending_patients_count(:Doctorid)";
    $data =  $Conn->SqlConParamSelect($sql,$arraydata,$pdo);
        foreach($data as $row) 
        {
            $pending = $row['pending'];
        }

?>