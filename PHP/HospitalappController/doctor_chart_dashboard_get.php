

<?php

require '../MysqlCon.php';

session_start();


$Conn = new SqlCon();
$Conn->SetDb();
$pdo = $Conn->SetSQLCon();


$userid = $_SESSION['iid'];

$data = $Conn->SqlConSelect("CALL doctor_dashboard_appointments_date_get({$userid})",$pdo);


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












