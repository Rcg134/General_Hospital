<?php

  require '../MysqlCon.php';

  $Conn = new SqlCon();

  $Conn->SetDb();
  
  $pdo = $Conn->SetSQLCon();
    session_start();
    $Apppoitnmentid = $_POST['Id'];
    $Time = $_POST['Time'];
    $Idate = $_POST['Idate'];





      $sql = "CALL my_appointment_time_reSchedule(:Apppoitnmentid,:Time,:Idate)";

  
        $arraydata= array(
                'Apppoitnmentid' => "$Apppoitnmentid",
                'Time' => "$Time",
                'Idate'=>"$Idate");
 


       echo  $Conn->SQLConTSQL($sql,$arraydata,$pdo);

?>