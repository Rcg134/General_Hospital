<?php

  require '../MysqlCon.php';

  $Conn = new SqlCon();

  $Conn->SetDBSpareParts();
  
  $pdo = $Conn->SetSQLCon();

    $PARTNUMBER = $_POST['PARTNUMBER'];
    $DESCRIPTION = $_POST['DESCRIPTION'];
    $BRAND = $_POST['BRAND'];
    $Status = '';


 


      if($_POST['noimagefront'] == "no"){
         $imgDatafront = file_get_contents($_FILES['filefront']['tmp_name']);
      }
      else{
        $imgDatafront = NULL;
      }
       
      if($_POST['noimageright'] == "no"){
         $imgDataright = file_get_contents($_FILES['fileright']['tmp_name']);

      }
      else{
        $imgDataright = NULL;

      }



     if($_POST['noimageleft'] == "no"){
         $imgDataleft = file_get_contents($_FILES['fileleft']['tmp_name']);
         $Status = 1;
      }
      else{
        $imgDataleft = NULL;
        $Status = 0;
      }



    if($_POST['noimageback'] == "no"){
         $imgDataback = file_get_contents($_FILES['fileback']['tmp_name']);
      }
      else{
        $imgDataback = NULL;
      }




      $sql = "insert into `prpo`( PartNumber, Description, Brand,Status ,IMGFront ,IMGRight ,IMGLeft ,IMGBack) 
      VALUES (:PARTNUMBER,:DESCRIPTION,:BRAND,:Status,:imgDatafront,:imgDataright,:imgDataleft,:imgDataback)";

  
        $arraydata= array(
                'PARTNUMBER' => "$PARTNUMBER",
                'DESCRIPTION' => "$DESCRIPTION",
                'BRAND' => "$BRAND",
                'Status' => "$Status", 
                'imgDatafront' => "$imgDatafront",
                'imgDataright' => "$imgDataright",
                'imgDataleft' => "$imgDataleft",
                'imgDataback' => "$imgDataback");
 


       echo  $Conn->SQLConTSQL($sql,$arraydata,$pdo);

?>