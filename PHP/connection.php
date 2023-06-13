<?php 
 $servername = "localhost"; 
 $username = "root"; 
 $password = "p@ssword"; 
 $db="db_sparepartsimage"; 
   
 // Create connection 

 try {
       $pdo = new PDO("mysql:host=$servername;dbname=$db", $username, $password);

       $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      // echo "Connected successfully";
     } 
 catch(PDOException $e) 
      {
          echo "Connection failed: " . $e->getMessage();
      }

 ?> 