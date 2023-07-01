<?php

  require '../MysqlCon.php';

  $Conn = new SqlCon();

  $Conn->SetDb();
  
  $pdo = $Conn->SetSQLCon();
    session_start();
    $Apppoitnmentid = $_POST['Id'];





      $sql = "CALL my_appointment_status_cancel_update(:Apppoitnmentid)";

  
        $arraydata= array(
                'Apppoitnmentid' => "$Apppoitnmentid");
 


       echo  $Conn->SQLConTSQL($sql,$arraydata,$pdo);

?>