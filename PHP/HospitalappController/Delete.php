<?php
     require '../MysqlCon.php';
     
     $Conn = new SqlCon();

     $Conn->SetDb();

     $pdo = $Conn->SetSQLCon();

     $LineID = $_POST['LineID'];

     $sql = "delete from tbl_spareparts WHERE id= :LineID";

     $arraydata= array(
                'LineID' => "  $LineID");


    echo  $Conn->SQLConTSQL($sql,$arraydata,$pdo);



?>