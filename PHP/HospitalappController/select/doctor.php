

<?php

$data = $Conn->SqlConSelect("CALL doctor_get()",$pdo);


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







