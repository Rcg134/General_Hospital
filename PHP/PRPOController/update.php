<?php
     require '../MysqlCon.php';

     $PARTNUMBER = $_POST['PARTNUMBER'];
     $DESCRIPTION = $_POST['DESCRIPTION'];
     $BRAND = $_POST['BRAND'];

 
    $LineID = $_POST['LineID'];
    $sql = '';

    $Conn = new SqlCon();

    $Conn->SetDBSpareParts();

    $pdo = $Conn->SetSQLCon();

    $sqlCHECK="select * from tbl_spareparts where id='$LineID'"; 

   
    $data = $Conn->SqlConSelect($sqlCHECK,$pdo);


  foreach($data as $row) 
 { 
      $dbfront = $row['IMGFront'];
      $dbright = $row['IMGRight'];
      $dbleft = $row['IMGLeft'];
      $dbback = $row['IMGBack'];
     
 }
   

     $sql = "update prpo 
                               SET PartNumber=:PARTNUMBER,
                                   Description=:DESCRIPTION,
                                   Brand= :BRAND";

                

        $arraydata = array(
                'PARTNUMBER' => "$PARTNUMBER",
                'DESCRIPTION' => "$DESCRIPTION",
                'BRAND' => "$BRAND",
                'LineID' => "$LineID");
             
 


     if($_POST['noimagefront'] == "no"){
         $imgDatafront = file_get_contents($_FILES['filefront']['tmp_name']);
         $sql .= ",IMGFront=:imgDatafront";
         $arraydata['imgDatafront'] = "$imgDatafront";
      }
    ELSE if($dbfront != NULL){

        $sql .="";
     }
      else{
        $imgDatafront = NULL;
     }



     
       if($_POST['noimageright'] == "no"){
         $imgDataright = file_get_contents($_FILES['fileright']['tmp_name']);
         $sql.= ",IMGRight=:imgDataright";
         $arraydata['imgDataright'] = "$imgDataright";
      }
       else if($dbright != NULL){

            $sql .="";
       }
       
    
      else{
        $imgDataright = NULL;
      }





  
      if($_POST['noimageleft'] == "no"){
         $imgDataleft = file_get_contents($_FILES['fileleft']['tmp_name']);
         $Status = 1;
         $sql.= ",IMGLeft=:imgDataleft
                 ,Status=:Status";
         $arraydata['imgDataleft'] = "$imgDataleft";
         $arraydata['Status'] = "$Status";

      }
     else  if($dbleft != NULL){
            $sql.="";
     }
      else{
        $imgDataleft = NULL;
      }



    
     if($_POST['noimageback'] == "no"){
         $imgDataback = file_get_contents($_FILES['fileback']['tmp_name']);
         $sql.= ",IMGBack=:imgDataback";
         $arraydata['imgDataback'] = "$imgDataback";
      }
     else if($dbback != NULL){

             $sql.="";
      }
      
      else{
        $imgDataback = NULL;
      }





    $sql .= " WHERE id=:LineID";
 
    echo  $Conn->SQLConTSQL($sql,$arraydata,$pdo);

?>