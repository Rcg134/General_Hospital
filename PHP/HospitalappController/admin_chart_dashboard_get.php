

<?php

require '../MysqlCon.php';

session_start();


$Conn = new SqlCon();
$Conn->SetDb();
$pdo = $Conn->SetSQLCon();


$data = $Conn->SqlConSelect("CALL appointment_calendar_get_all",$pdo);


$arrayday;



    if ($data)
    {
        foreach($data as $row) 
        {

            $day = [
                  $row['day'],
                  $row['appointment_count'],
            ];

            $arrayday[] = $day;
        }
    }

    $arraydataJSON = json_encode($arrayday);
    echo $arraydataJSON;


?>












