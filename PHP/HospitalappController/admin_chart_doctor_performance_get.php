

<?php

require '../MysqlCon.php';

session_start();


$Conn = new SqlCon();
$Conn->SetDb();
$pdo = $Conn->SetSQLCon();


$data = $Conn->SqlConSelect("CALL admin_doctor_performance_chart",$pdo);


$arrayday;



    if ($data)
    {
        foreach($data as $row) 
        {

            $day = [
                  $row['Doctor_Name'],
                  $row['TotalAppointments'],
            ];

            $arrayday[] = $day;
        }
    }

    $arraydataJSON = json_encode($arrayday);
    echo $arraydataJSON;


?>












