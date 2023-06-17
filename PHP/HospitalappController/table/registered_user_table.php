<?php


$data = $Conn->SqlConSelect("select id, 
                                    username, 
                                    password, 
                                    firstname, 
                                    lastname, 
                                    user_type_id, 
                                    isadmin, 
                                    idate, 
                                    active 
                            FROM tbl_login_user 
                            WHERE user_type_id != 1 AND
                                  user_type_id = 0
                            ORDER BY idate asc",$pdo);



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


    <table class="table table-striped">
        <thead>
            <tr>
                <th hidden>id</th>
                <th>Action</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Date Registered</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($currentPageData as $row): ?>
                <tr>
                     <td hidden><?php echo $row['id']; ?></td>
                    <td>
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#userrolemodal" onclick="getcolumn(this)">
                            <i class="bi bi-check-circle"></i>
                        </button>
                    </td>
                    <td><?php echo $row['firstname']; ?></td>
                    <td><?php echo $row['lastname']; ?></td>
                    <td><?php echo $row['idate']; ?></td>
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
