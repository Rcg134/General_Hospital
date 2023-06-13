<?php
     require '../MysqlCon.php';
     
     $Conn = new SqlCon();

     $Conn->SetDBSpareParts();

     $pdo = $Conn->SetSQLCon();

     $LineID = $_POST['LineID'];

     $sql = "delete from prpo WHERE id= :LineID";

     $arraydata= array(
                'LineID' => "  $LineID");


    echo  $Conn->SQLConTSQL($sql,$arraydata,$pdo);



?>