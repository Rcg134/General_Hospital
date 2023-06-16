<?php

  require '../MysqlCon.php';

  $Conn = new SqlCon();

  $Conn->SetDb();
  
  $pdo = $Conn->SetSQLCon();
    session_start();
    $Firstname = $_POST['Firstname'];
    $Lastname = $_POST['Lastname'];
    $Email = $_POST['Email'];
    $Birthdate = $_POST['Birthdate'];
    $Contactnumber = $_POST['Contactnumber'];
    $Bio = $_POST['Bio'];
    $Usertypeid = $_POST['Usertypeid'];
    $Iid = $_SESSION['iid'];
    $Specialized = $_POST['Specialized'];


 




      $sql = "CALL Insert_profile(:Firstname, :Lastname, :Email, :Birthdate, :Contactnumber, :Bio, :Usertypeid, :Iid, :Specialized)";

  
        $arraydata= array(
                'Firstname' => "$Firstname",
                'Lastname' => "$Lastname",
                'Email' => "$Email",
                'Birthdate' => "$Birthdate",
                'Contactnumber' => "$Contactnumber",
                'Bio' => "$Bio",
                'Usertypeid' => "$Usertypeid",
                'Iid' => "$Iid",
                'Specialized' => "$Specialized");
 


       echo  $Conn->SQLConTSQL($sql,$arraydata,$pdo);

?>