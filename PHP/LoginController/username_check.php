<?php

  require '../MysqlCon.php';

  $Conn = new SqlCon();

  $Conn->SetDb();
  
  $pdo = $Conn->SetSQLCon();
    session_start();
    $Username = $_POST['Username'];


    $sql = "CALL username_check(:Username)";
      
    $arraydata= array(
        'Username' => "$Username");
    
    $data = $Conn->SqlConParamSelect($sql,$arraydata,$pdo);    


    foreach($data as $row) 
        {
            $result = $row['isexist'];    
        }

                                     
      if ($result == 0){
        echo false;
      }
      else if ($result >= 1)
      {
        echo true;
      }
?>