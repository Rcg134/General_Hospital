<?php

$userid = $_SESSION['iid'];

$sqltext = "CALL appointment_get(:Iid)";

$arraydata= array(
    'Iid' => "$userid");


$data = $Conn->SqlConParamSelect($sqltext,$arraydata,$pdo);



// Determine the total number of items and items per page
$totalItems = count($data);
$itemsPerPage = 5;

// Determine the current page
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculate the starting and ending indices of the data for the current page
$startIndex = ($currentPage - 1) * $itemsPerPage;
$endIndex = $startIndex + $itemsPerPage - 1;

// Get the data for the current page
$currentPageData = array_slice($data, $startIndex, $itemsPerPage);
?>

<div class="container mt-5">
    <table class="table table-striped">
        <thead>
            <tr>
                <th hidden>id</th>
                <th>Action</th>
                <th>Full Name</th>
                <th>Message</th>
                <th>Appointment Date</th>
                <th>Appointment Time</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($currentPageData as $row): 
                  $timestamp = strtotime($row['appointment_time']);
                  $timeFormat = date('h:i A', $timestamp);
                ?>
                <tr>
                     <td hidden><?php echo $row['id']; ?></td>
                    <td>
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#userrolemodal" onclick="getcolumn(this)">
                            <i class="bi bi-check-circle"></i>
                        </button>
                    </td>
                    <td><?php echo $row['full_name']; ?></td>
                    <td><?php echo $row['message']; ?></td>
                    <td><?php echo $row['appointment_date']; ?></td>
                    <td><?php echo $timeFormat; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="pagination">
      <ul class="pagination justify-content-center">
         <?php
          $totalPages = ceil($totalItems / $itemsPerPage);

          // Previous page arrow
          if ($currentPage > 1) {
              echo '<li class="page-item"><a class="page-link" href="?page=' . ($currentPage - 1) . '">&laquo;</a></li>';
          }

          // Generate pagination links
          for ($i = 1; $i <= $totalPages; $i++) {
              echo '<li class="page-item';
              if ($i == $currentPage) {
                  echo ' active';
              }
              echo '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
          }

          // Next page arrow
          if ($currentPage < $totalPages) {
              echo '<li class="page-item"><a class="page-link" href="?page=' . ($currentPage + 1) . '">&raquo;</a></li>';
          }
          ?>
        </ul>
    </div>
</div>