<?php

  require '../MysqlCon.php';

  $Conn = new SqlCon();

  $Conn->SetDb();
  
  $pdo = $Conn->SetSQLCon();
    session_start();
    $Apppoitnmentid = $_POST['Id'];
    $Apptime = $_POST['Time'];
    $Appdate = $_POST['Idate'];
    $Selectdoctorid = $_POST['DoctorId'];

    
    //check doctor schedule
    include "../HospitalappController/doctor_schedule_check.php";
      
    //check if patient time is already reserve
    include "../HospitalappController/patient_approve_time_check.php";


       if ($Availability == "OK" && $Time_reserve == 0){
        $sql = "CALL my_appointment_time_reSchedule(:Apppoitnmentid,:Time,:Idate)";

  
        $arraydata= array(
                'Apppoitnmentid' => "$Apppoitnmentid",
                'Time' => "$Apptime",
                'Idate'=>"$Appdate");
 
      

       echo  $Conn->SQLConTSQL($sql,$arraydata,$pdo);
      }
      else if ($Availability == "NO"){
        echo "NO";
      }
      else if ($Time_reserve == 1){
        echo "reserved";
      }

?>