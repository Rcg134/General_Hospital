

<?php

require '../MysqlCon.php';

$Conn = new SqlCon();
$Conn->SetDb();
$pdo = $Conn->SetSQLCon();


$doctorId = $_POST["Iid"];

$data = $Conn->SqlConSelect("CALL patient_doctor_schedule_calendar_get({$doctorId})",$pdo);


$arraydata = [];



    $totalrows = count($data);
    if ($totalrows > 0)
    {
        foreach($data as $row) 
        {
             $name = $row['full_name'];

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
                'title' => 'Reserve By ' . $name,
                'start' => $combinedDateTimeFrom,
                'end' => $combinedDateTimeTo,
            ];

            $arraydata[] = $event;
        }
    }

    $arraydataJSON = json_encode($arraydata);
    echo $arraydataJSON;





?>












