<?php

  require '../MysqlCon.php';

  $Conn = new SqlCon();

  $Conn->SetDb();
  
  $pdo = $Conn->SetSQLCon();
    session_start();
    $Patientid = $_POST['Patientid'];
    $Timefrom = $_POST['Timefrom'];
    $Timeto = $_POST['Timeto'];
    $Status = $_POST['Status'];




      $sql = "CALL appointment_patient_update(:Patientid, 
                                              :Timefrom, 
                                              :Timeto,
                                              :Status)";

  
        $arraydata= array(
                'Patientid' => "$Patientid",
                'Timefrom' => "$Timefrom",
                'Timeto' => "$Timeto",
                'Status' => "$Status");
 


       echo  $Conn->SQLConTSQL($sql,$arraydata,$pdo);

?>