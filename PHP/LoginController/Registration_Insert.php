<?php

  require '../MysqlCon.php';



  $Conn = new SqlCon();

  $Conn->SetDb();
  
  $pdo = $Conn->SetSQLCon();

    $username = $_POST['Username'];
    $password = $_POST['Password'];
    $firstname = $_POST['Firstname'];
    $lastname = $_POST['Lastname'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    include("../LoginController/registration_username_check.php");

    //Not exsisting User
    if ($isexist == false)
    {
       
      $sql = "insert into `tbl_login_user`(username, password, lastname, firstname) 
      VALUES (:username, :password, :lastname, :firstname)";

  
        $arraydata= array(
                'username' => "$username",
                'password' => "$hashedPassword",
                'firstname' => "$firstname",
                'lastname' => "$lastname");
 


       echo  $Conn->SQLConTSQL($sql,$arraydata,$pdo);

    }
    else{
      echo false;
    }
      

?>