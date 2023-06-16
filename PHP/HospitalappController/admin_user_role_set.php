<?php
  
    require '../MysqlCon.php';

    $Conn = new SqlCon();
    
    $Conn->SetDb();
    
    $pdo = $Conn->SetSQLCon();


    $Userid = $_POST['Colid'];
    $Selectid = $_POST['Selectid'];



    $sql = "update tbl_login_user 
                SET user_type_id = :Selectid
             WHERE id=:Userid";

    
             
    $arraydata = array(
        'Userid' => "$Userid",
        'Selectid' => "$Selectid");
    


 
    echo  $Conn->SQLConTSQL($sql,$arraydata,$pdo);

?>