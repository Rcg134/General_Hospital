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


  //Delete ID
  $sqldelete = "delete from `tbl_doctor_sched` WHERE doctorsId = {$Iid}";
      
  $Conn->SqlConSelect($sqldelete,$pdo);


 //Insert new schedule
  $pdo = $Conn->SetSQLCon();
       
      $sql = "CALL doctors_Sched_Date_Check(:DayFrom, 
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