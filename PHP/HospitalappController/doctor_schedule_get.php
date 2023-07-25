

<?php
include("check_session/check_session_if_Exist.php");

$DayFrom = "";
$DayTo = "";
$TimeFrom = "";
$TimeTo = "";
$userid = $_SESSION['iid'];


$data = $Conn->SqlConSelect("CALL doctor_schedule_get({$userid})",$pdo);


$totalrows = count($data);
    if ($totalrows > 0)
    {
        foreach($data as $row) 
        {
            $DayFrom = $row['DayFrom'];
            $DayTo = $row['DayTo'];
            $TimeFrom = $row['TimeFrom'];
            $TimeTo = $row['TimeTo'];
        }
    }

?>