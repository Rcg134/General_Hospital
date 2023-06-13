<?php 

 require '../MysqlCon.php';

 $Conn = new SqlCon();

 $Conn->SetDBSpareParts();

 $pdo = $Conn->SetSQLCon();
 
 $data = $Conn->SqlConSelect('select id ,PartNumber,Description,Brand,Status from prpo',$pdo);


 session_start();
 $sessionname = $_SESSION['name'];

 $badgestatus = '';
      

 
foreach($data as $row) 
 { 

   if ($sessionname == 'admin'){
     

       if ($row['Status'] == 0){
            $badgestatus = '<span class="badge badge-warning">Pending</span>';}
       else{  
             $badgestatus = '<span class="badge badge-success">Validated</span>';}
      
       echo '   
            <tr> 
                 <td class="textdisplay text-center fontblack" hidden>'.$row['id'].'</td> 
       
                 <td class="textdisplay text-center fontblack"><div class="btn-group" role="group" aria-label="Basic example"> 
                            <button type="button" class="btn btn-warning btn-md" id="btnPOupdateSP"><i class="fa fa-pencil"></i></button>      
                            <button type="button" class="btn btn-primary btn-md" id="btnimg"><i class="fa fa-file-image-o"></i></i></button> 
                            </div></td>"
                 <td class="textdisplay text-center fontblack">'.$row['PartNumber'].'</td> 
                 <td class="textdisplay text-center fontblack">'.$row['Description'].'</td> 
                 <td class="textdisplay text-center fontblack">'.$row['Brand'].'</td>       
                 <td class="textdisplay text-center fontblack">'.$badgestatus.'</td> 
            </tr>'; 
   }
   else{

      
    if ($row['Status'] == 0){
      $badgestatus = '<span class="badge badge-warning">Pending</span>';}
 else{  
       $badgestatus = '<span class="badge badge-success">Validated</span>';}

    echo '         
           <tr> 
               <td class="textdisplay text-center fontblack" hidden>'.$row['ID'].'</td> 
          
               <td class="textdisplay text-center fontblack"><div class="btn-group" role="group" aria-label="Basic example"> 
                          
               <button type="button" class="btn btn-primary btn-md" id="btnimg"><i class="fa fa-file-image-o"></i></i></but
               </div></td>"
               <td class="textdisplay text-center fontblack">'.$row['PartNumber'].'</td> 
               <td class="textdisplay text-center fontblack">'.$row['Description'].'</td> 
               <td class="textdisplay text-center fontblack">'.$row['Brand'].'</td> 
               <td class="textdisplay text-center fontblack">'.$badgestatus.'</td> 
       
           </tr>'; 
   }
    


 }
   
 ?> 