<?php
class SqlCon{

  public $Servname;
  public $usr;
  public $pass;
  public $dbname;


 //Spareparts Database
  function SetDb(){
    $this->Servname = "localhost"; 
    $this->usr = "root"; 
    $this->pass = "p@ssword"; 
    $this->dbname = "db_genhospital"; 
  }



 //Setting connection
 function SetSQLCon(){
    
     $servername = $this->Servname; 
     $username =  $this->usr; 
     $password =  $this->pass; 
     $db =  $this->dbname; 
       
     // Create connection 
     try {
           $pdo = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
    
           $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
           return $pdo;
         } 
     catch(PDOException $e) 
          {
             return  "Connection failed: " . $e->getMessage();
          }
    
    }

  
  //SQL Select
    function SqlConSelect($sqltext,$pdo){

      $sql = $sqltext;
   
      $statement =  $pdo->query($sql); 
 
      $data = $statement->fetchAll(PDO::FETCH_ASSOC);

      return $data;

    }



      //SQL Select with param
    function SqlConParamSelect($sqltext,$arr,$pdo){

      $sql = $sqltext;
   
      $statement =  $pdo->prepare($sql); 

      $statement->execute($arr);
 
      $data = $statement->fetchAll(PDO::FETCH_ASSOC);

      return $data;

    }



    //SQL Insert
    function SQLConTSQL($sqltext,$arr,$pdo){

      $sql = $sqltext;
      $statement = $pdo->prepare($sql);
  
     try {
            $statement->execute($arr);
            return   true;
         }

     catch(Exception $e) 
       { 
          return  $e->getMessage();
        }

     }
  


}


?>