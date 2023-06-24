<?php

  require '../MysqlCon.php';

  $Conn = new SqlCon();

  $Conn->SetDb();
  
  $pdo = $Conn->SetSQLCon();
    session_start();
    $Patientid = $_POST['Patientid'];
    $Remarks = $_POST['Remarks'];




      $sql = "CALL appointment_patient_disapprove(:Patientid, 
                                                  :Remarks)";

  
        $arraydata= array(
                'Patientid' => "$Patientid",
                'Remarks' => "$Remarks");
 


       echo  $Conn->SQLConTSQL($sql,$arraydata,$pdo);

?>