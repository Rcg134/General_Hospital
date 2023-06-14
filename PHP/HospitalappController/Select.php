<?php 

 require '../MysqlCon.php';

 $Conn = new SqlCon();

 $Conn->SetDb();

 $pdo = $Conn->SetSQLCon();
 
 $data = $Conn->SqlConSelect('select ID,BU,PKG,DESCR,DRAWPART,SID,PN,Rock,Level,Icolumn,Irow from tbl_spareparts',$pdo);


 session_start();
 $sessionname = $_SESSION['name'];

 
foreach($data as $row) 
 { 

   if ($sessionname == 'admin'){
     
              echo ' 
             
        <tr> 
        <td class="textdisplay text-center fontblack" hidden>'.$row['ID'].'</td> 
   
        <td class="textdisplay text-center fontblack"><div class="btn-group" role="group" aria-label="Basic example"> 
                   <button type="button" class="btn btn-warning btn-md" id="btnupdateSP"><i class="fa fa-pencil"></i></button>      
                   <button type="button" class="btn btn-primary btn-md" id="btnimg"><i class="fa fa-file-image-o"></i></i></button> 

                   </div></td>"
        <td class="textdisplay text-center fontblack">'.$row['BU'].'</td> 
        <td class="textdisplay text-center fontblack">'.$row['PKG'].'</td> 
        <td class="textdisplay text-center fontblack">'.$row['DESCR'].'</td> 
        <td class="textdisplay text-center fontblack">'.$row['DRAWPART'].'</td> 
        <td class="textdisplay text-center fontblack">'.$row['SID'].'</td> 
        <td class="textdisplay text-center fontblack">'.$row['PN'].'</td> 
        <td class="textdisplay text-center fontblack">'.$row['Rock'].'</td> 
        <td class="textdisplay text-center fontblack">'.$row['Level'].'</td> 
        <td class="textdisplay text-center fontblack">'.$row['Icolumn'].'</td> 
        <td class="textdisplay text-center fontblack">'.$row['Irow'].'</td> 
    </tr>'; 
   }
   else{

                    echo ' 
             
        <tr> 
        <td class="textdisplay text-center fontblack" hidden>'.$row['ID'].'</td> 
   
        <td class="textdisplay text-center fontblack"><div class="btn-group" role="group" aria-label="Basic example"> 
                   
                   <button type="button" class="btn btn-primary btn-md" id="btnimg"><i class="fa fa-file-image-o"></i></i></button> 

                   </div></td>"
        <td class="textdisplay text-center fontblack">'.$row['BU'].'</td> 
        <td class="textdisplay text-center fontblack">'.$row['PKG'].'</td> 
        <td class="textdisplay text-center fontblack">'.$row['DESCR'].'</td> 
        <td class="textdisplay text-center fontblack">'.$row['DRAWPART'].'</td> 
        <td class="textdisplay text-center fontblack">'.$row['SID'].'</td> 
        <td class="textdisplay text-center fontblack">'.$row['PN'].'</td> 
        <td class="textdisplay text-center fontblack">'.$row['Rock'].'</td> 
        <td class="textdisplay text-center fontblack">'.$row['Level'].'</td> 
        <td class="textdisplay text-center fontblack">'.$row['Icolumn'].'</td> 
        <td class="textdisplay text-center fontblack">'.$row['Irow'].'</td> 

    </tr>'; 
   }
    


 }
   
 ?> 