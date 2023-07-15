<?php

  require '../MysqlCon.php';

  $Conn = new SqlCon();

  $Conn->SetDb();
  
  $pdo = $Conn->SetSQLCon();
    session_start();
    $Apppoitnmentid = $_POST['Id'];
    $Time = $_POST['Time'];





      $sql = "CALL my_appointment_time_reSchedule(:Apppoitnmentid,:Time)";

  
        $arraydata= array(
                'Apppoitnmentid' => "$Apppoitnmentid",
                'Time' => "$Time");
 


       echo  $Conn->SQLConTSQL($sql,$arraydata,$pdo);

?>