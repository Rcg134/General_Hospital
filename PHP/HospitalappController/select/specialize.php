

<?php



$data = $Conn->SqlConSelect("select id, name, description FROM tbl_specialize",$pdo);


$select = " <div class='col-md-6'>
           <label for='selectspecialized' class='form-label'>Specialized</label>
           <select class='form-control' id='selectspecialized'>";

$option = "<option value=0 selected> Select... </option>";

foreach($data as $row) 
{

  if (!empty($specialize) && $specialize == $row['id']){
    $option .= " <option value={$row['id']} Selected> {$row['description']} </option>";
  }
  else
  {
    $option .= " <option value={$row['id']}> {$row['description']} </option>";
  }
    

}


 echo $select .= $option . "</select>  </div>";


?>












