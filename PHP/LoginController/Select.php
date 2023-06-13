<?php
try {

   require '../MysqlCon.php';

     $Username = $_POST['Username'];
     $Password = $_POST['Password'];





 $Conn = new SqlCon();

 $Conn->SetDBSpareParts();

 $pdo = $Conn->SetSQLCon();

 $arraydata= array(
                'username' => "$Username",
                'password' => "$Password");
 $sql = "select * from users WHERE username= :username and password= :password ";


 $data = $Conn->SqlConParamSelect($sql,$arraydata,$pdo);

 

$name = '';

foreach($data as $row) 
 { 
     $name = $row['name'];
              echo $name; 
 }
     


 session_start();
  $_SESSION['name']= $name;



}

 catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

?>