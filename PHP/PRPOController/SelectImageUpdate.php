<?php

require '../MysqlCon.php';


$PARTNUMBER = $_POST['PARTNUMBER'];


$Conn = new SqlCon();

$Conn->SetDBSpareParts();

$pdo = $Conn->SetSQLCon();

$sqlGetImage="select * from prpo where PartNumber='$PARTNUMBER'"; 


$data = $Conn->SqlConSelect($sqlGetImage,$pdo);


foreach($data as $row) 
{ 
        $dataimage["IMGFront"] = base64_encode($row['IMGFront']);
        $dataimage["IMGRight"] = base64_encode($row['IMGRight']);
        $dataimage["IMGLeft"] = base64_encode($row['IMGLeft']);
        $dataimage["IMGBack"] = base64_encode($row['IMGBack']);
}

$countpic = count($data);


 if($countpic > 0){
        echo json_encode($dataimage);
 }
 else{
        $error["error"] =  "No Data";
        echo json_encode($error);
 }


?>