<?php

  require '../MysqlCon.php';

  $Conn = new SqlCon();

  $Conn->SetDb();
  
  $pdo = $Conn->SetSQLCon();
    session_start();
    $DayFrom = $_POST['DayFrom'];
    $DayTo = $_POST['DayTo'];
    $DateFrom = $_POST['DateFrom'];
    $DateTo = $_POST['DateTo'];
    $Iid = $_SESSION['iid'];



      $sql = "CALL Doctors_Sched_Date_Check(:DayFrom, 
                                            :DayTo, 
                                            :DateFrom, 
                                            :DateTo, 
                                            :Iid)";

  
        $arraydata= array(
                'DayFrom' => "$DayFrom",
                'DayTo' => "$DayTo",
                'DateFrom' => "$DateFrom",
                'DateTo' => "$DateTo",
                'Iid' => "$Iid");
 


       echo  $Conn->SQLConTSQL($sql,$arraydata,$pdo);

?>