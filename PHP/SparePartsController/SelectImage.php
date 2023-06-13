<?php

require '../MysqlCon.php';


$LineID = $_POST['LineID'];


$Conn = new SqlCon();

$Conn->SetDBSpareParts();

$pdo = $Conn->SetSQLCon();

$sqlGetImage="select * from tbl_spareparts where id='$LineID'"; 


$data = $Conn->SqlConSelect($sqlGetImage,$pdo);


foreach($data as $row) 
{ 
  echo '<img src="data:image/jpeg;base64,'.base64_encode($row['IMGFront']).'" id="imagepreviewfront" class="img-fluid">
        <br>
        <img <img src="data:image/jpeg;base64,'.base64_encode($row['IMGRight']).'" id="imagepreviewright" class="img-fluid">
        <br>
        <img <img src="data:image/jpeg;base64,'.base64_encode($row['IMGLeft']).'" id="imagepreviewleft" class="img-fluid">
        <br>
        <img <img src="data:image/jpeg;base64,'.base64_encode($row['IMGBack']).'" id="imagepreviewback" class="img-fluid">';
}







?>