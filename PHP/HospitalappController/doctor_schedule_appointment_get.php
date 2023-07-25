

<?php

require '../MysqlCon.php';

$Conn = new SqlCon();

$Conn->SetDb();

$pdo = $Conn->SetSQLCon();

$sql = "CALL doctor_schedule_appointment_get(:Iid)";

$arraydata= array('Iid' => $_POST['Iid']);

$data = $Conn->SqlConParamSelect($sql,$arraydata,$pdo);


$totalrows = count($data);
    if ($totalrows > 0)
    {
        foreach($data as $row) 
        {
            $aDayFrom = $row['iDayFrom'];
            $aDayTo = $row['iDayTo'];
            $aTimeFrom = $row['TimeFrom'];
            $aTimeTo = $row['TimeTo'];
        }
        $timestampTO = strtotime($aTimeFrom);
        $formattedTimeTO = date("g:ia", $timestampTO);
        $timestampFROM = strtotime($aTimeTo);
        $formattedTimeFROM = date("g:ia", $timestampFROM);


        echo "{$aDayFrom} - {$aDayTo} ({$formattedTimeTO} To {$formattedTimeFROM})";
    }

?>