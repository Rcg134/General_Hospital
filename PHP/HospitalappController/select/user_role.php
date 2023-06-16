

<?php

$data = $Conn->SqlConSelect("select id, name, description FROM tbl_user_type",$pdo);


$select = "<label for='validationDefault05' class='form-label'>User Role</label>
          <select class='form-control' id='userroleid'>";

$option = "";

foreach($data as $row) 
{

  $option .= " <option value={$row['id']}> {$row['description']} </option>";

}

echo $select .= $option . "</select>";


?>







