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

   // check Time if it is already taken by other patient
   include "../HospitalappController/doctor_time_check.php";


      $sql = "CALL appointment_patient_update(:Patientid, 
                                              :Timefrom, 
                                              :Timeto,
                                              :Status)";

      //time has not been taken by other patient                                      
      if ($result == 0){
        $arraydata= array(
                'Patientid' => "$Patientid",
                'Timefrom' => "$Timefrom",
                'Timeto' => "$Timeto",
                'Status' => "$Status");
 


       echo  $Conn->SQLConTSQL($sql,$arraydata,$pdo);
      }
      //time has  been taken by other patient     
      else if ($result >= 1)
      {
        echo false;
      }
?>