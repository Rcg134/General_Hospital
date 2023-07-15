<?php
$sql = "CALL doctor_get(:Iid)";

$arraydata= array('Iid' => $_SESSION['iid']);

$data = $Conn->SqlConParamSelect($sql,$arraydata,$pdo);

$select = "<div class='col-md-6'>
          <label for='validationDefault05' class='form-label'>Doctor</label>
          <select class='form-control' id='selectdoctorid'>";

$option = "";

foreach($data as $row) 
{

  $option .= " <option value={$row['login_id']}> {$row['full_name']} -- ({$row['description']})</option>";

}

echo $select .= $option . "</select> </div>" ;


?>