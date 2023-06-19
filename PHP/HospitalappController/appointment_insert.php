<?php

  require '../MysqlCon.php';

  $Conn = new SqlCon();

  $Conn->SetDb();
  
  $pdo = $Conn->SetSQLCon();
    session_start();
    $Appdate = $_POST['Appdate'];
    $Apptime = $_POST['Apptime'];
    $Patientid = $_SESSION['iid'];
    $Selectdoctorid = $_POST['Selectdoctorid'];
    $Appmessage = $_POST['Appmessage'];
     

    // check max patients
    include "../HospitalappController/doctor_max_patients_check.php";
    
    if ($result == 0){
      $sql = "CALL Insert_appointment(:Appdate, :Apptime, :Patientid, :Selectdoctorid, :Appmessage)";

  
      $arraydata= array(
              'Appdate' => "$Appdate",
              'Apptime' => "$Apptime",
              'Patientid' => "$Patientid",
              'Selectdoctorid' => "$Selectdoctorid",
              'Appmessage' => "$Appmessage");



     echo $Conn->SQLConTSQL($sql,$arraydata,$pdo);
    }
    else if ($result == 1)
    {
      echo false;
    }

?>