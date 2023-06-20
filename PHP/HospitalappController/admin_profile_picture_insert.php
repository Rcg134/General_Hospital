<?php

  require '../MysqlCon.php';

  $Conn = new SqlCon();

  $Conn->SetDb();
  
  $pdo = $Conn->SetSQLCon();
    session_start();
    $ImageData = $_POST['Image'];
    $Iid = $_SESSION['iid'];
    $Usertypeid = $_SESSION['usertypeid'];
    
    // Convert the base64 data to binary
    $ImageData = str_replace('data:image/png;base64,', '', $ImageData);
    $ImageData = str_replace(' ', '+', $ImageData);
    $ImageBinary = base64_decode($ImageData);


      $sql = "CALL insert_profile_pic(:Image, 
                                      :Usertypeid, 
                                      :Iid)";

  
        $arraydata= array(
                'Image' => "$ImageBinary",
                'Iid' => "$Iid",
                'Usertypeid' => "$Usertypeid");
 


       echo  $Conn->SQLConTSQL($sql,$arraydata,$pdo);

?>