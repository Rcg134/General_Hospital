<?php

  require '../MysqlCon.php';

  $Conn = new SqlCon();

  $Conn->SetDb();
  
  $pdo = $Conn->SetSQLCon();

    $BU = $_POST['BU'];
    $PKG = $_POST['PKG'];
    $DESCR = $_POST['DESCR'];
    $DRAWPART = $_POST['DRAWPART'];
    $SID = $_POST['SID'];
    $Level = $_POST['Level'];
    $Rock = $_POST['Rock'];
    $Icolumn = $_POST['Icolumn'];
    $Irow = $_POST['Irow'];
    $PN = $_POST['PN'];

 
    




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
      }
      else{
        $imgDataleft = NULL;
      }



    if($_POST['noimageback'] == "no"){
         $imgDataback = file_get_contents($_FILES['fileback']['tmp_name']);
      }
      else{
        $imgDataback = NULL;
      }




      $sql = "insert into `tbl_spareparts`( BU, PKG, DESCR,DRAWPART,SID,Level,Rock,Icolumn,Irow,PN,IMGFront,IMGRight,IMGLeft,IMGBack) 
      VALUES (:BU,:PKG,:DESCR,:DRAWPART,:SID,:Level,:Rock,:Icolumn,:Irow,:PN,:imgDatafront,:imgDataright,:imgDataleft,:imgDataback)";

  
        $arraydata= array(
                'BU' => "$BU",
                'PKG' => "$PKG",
                'DESCR' => "$DESCR",
                'DRAWPART' => "$DRAWPART",
                'SID' => "$SID",
                'Level' => "$Level",
                'Rock' => "$Rock",
                'Icolumn' => "$Icolumn",
                'Irow' => "$Irow",
                'PN' => "$PN",
                'imgDatafront' => "$imgDatafront",
                'imgDataright' => "$imgDataright",
                'imgDataleft' => "$imgDataleft",
                'imgDataback' => "$imgDataback");
 


       echo  $Conn->SQLConTSQL($sql,$arraydata,$pdo);

?>