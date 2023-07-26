<?php

    $sql = "CALL username_check(:Username)";
      
    $arraydata= array(
        'Username' => "$username");
    
    $data = $Conn->SqlConParamSelect($sql,$arraydata,$pdo);    


    foreach($data as $row) 
        {
            $result = $row['result'];    
        }

                                     
      if ($result == 0){
        $isexist = false;
      }
      else if ($result >= 1)
      {
        $isexist = true;
      }
?>