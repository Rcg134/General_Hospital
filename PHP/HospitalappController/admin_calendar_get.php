

<?php

require '../MysqlCon.php';

session_start();
include("check_session/check_session_if_Exist.php");


$Conn = new SqlCon();
$Conn->SetDb();
$pdo = $Conn->SetSQLCon();


$userid = $_SESSION['iid'];

$data = $Conn->SqlConSelect("CALL appointment_calendar_get({$userid})",$pdo);


$arraydata = [];



    $totalrows = count($data);
    if ($totalrows > 0)
    {
        foreach($data as $row) 
        {
             $name = $row['full_name'];
             $message = $row['message'];

             $date = $row['appointment_date'];
             $timeTo = $row['appointment_time'];
             $timeFrom = $row['appointment_time_end'];

             $datetimeStringFrom = $date. ' ' . $timeTo;
             $datetimeStringTo = $date. ' ' . $timeFrom;

             $datetimeFrom = new DateTime($datetimeStringFrom);
             $datetimeTo = new DateTime($datetimeStringTo);

             $combinedDateTimeFrom = $datetimeFrom->format('Y-m-d\TH:i:s');
             $combinedDateTimeTo = $datetimeTo->format('Y-m-d\TH:i:s');

             $event = [
                'title' => 'Sched for ' . $name . " ({$message})" ,
                'start' => $combinedDateTimeFrom,
                'end' => $combinedDateTimeTo,
            ];

            $arraydata[] = $event;
        }
    }

    $arraydataJSON = json_encode($arraydata);
    echo $arraydataJSON;





?>












