<?php

require '../MysqlCon.php';


$LineID = $_POST['LineID'];


$Conn = new SqlCon();

$Conn->SetDb();

$pdo = $Conn->SetSQLCon();

$sqlGetImage="select * from tbl_spareparts where id='$LineID'"; 


$data = $Conn->SqlConSelect($sqlGetImage,$pdo);


foreach($data as $row) 
{ 
        $dataimage["IMGFront"] = base64_encode($row['IMGFront']);
        $dataimage["IMGRight"] = base64_encode($row['IMGRight']);
        $dataimage["IMGLeft"] = base64_encode($row['IMGLeft']);
        $dataimage["IMGBack"] = base64_encode($row['IMGBack']);
}

echo json_encode($dataimage);





?>