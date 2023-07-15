<?php

  require '../MysqlCon.php';

  $Conn = new SqlCon();

  $Conn->SetDb();
  
  $pdo = $Conn->SetSQLCon();

    $username = $_POST['Username'];
    $password = $_POST['Password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);



      $sql = "CALL password_update(:username, :password)";

  
        $arraydata= array(
                'username' => "$username",
                'password' => "$hashedPassword");
 


       echo  $Conn->SQLConTSQL($sql,$arraydata,$pdo);

?>