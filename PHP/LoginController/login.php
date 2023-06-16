<?php
try {

   require '../MysqlCon.php';

     $Username = $_POST['Username'];
     $Password = $_POST['Password'];


 $Conn = new SqlCon();

 $Conn->SetDb();

 $pdo = $Conn->SetSQLCon();

 $sql = "select * from `tbl_login_user` WHERE username= :username  ";

 $arraydata= array('username' => $Username);


 $data = $Conn->SqlConParamSelect($sql,$arraydata,$pdo);


$rowCount = count($data);

if ($rowCount > 0){

  foreach($data as $row) 
  { 
      $authpass = $row['password'];
      $fn = $row['firstname'];
      $ln = $row['lastname'];
      $iid = $row['id'];
      $usertypeid = $row['user_type_id'];
  }

  if (password_verify($Password, $authpass)) 
  {
    session_start();
    $fullname = $fn . " " . $ln;
    $_SESSION['name'] = $fullname ;
    $_SESSION['fn'] = $fn;
    $_SESSION['ln'] = $ln;
    $_SESSION['iid'] = $iid;
    $_SESSION['usertypeid'] = $usertypeid;
    echo true; 
  }
}

}
 catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

?>