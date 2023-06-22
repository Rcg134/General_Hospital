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

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th hidden>id</th>
                <th>Action</th>
                <th>Status</th>
                <th>Full Name</th>
                <th>Message</th>
                <th>Appointment Date</th>
                <th hidden>Time Start real value</th>
                <th>Time Start</th>
                <th>Time End</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($currentPageData as $row): 
                  $currentstat = $row['istatus'];
                  $origtimefrom = $row['appointment_time'];
                  $origtimeto = $row['appointment_time_end'];
                  $timeFormatFrom = "";
                  $timeFormatEnd = "";

                 if(!empty($origtimefrom))
                 {
                  $timestamp = strtotime($origtimefrom);
                  $timeFormatFrom = date('h:i A', $timestamp);
                 }

                if (!empty($origtimeto)){
                  $timeend = strtotime($origtimeto);
                  $timeFormatEnd = date('h:i A', $timeend);
                }
            
                ?>
                <tr>
                     <td hidden><?php echo $row['id']; ?></td>
                    <td class="text-wrap">

                      <?php if ($currentstat != "Approved") { ?>
                         <div class="fixed-cell-width">  
                           <button type="button" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Approve" id="btnapp">
                               <i class="bi bi-check-circle"></i>
                           </button>
                           <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Disapprove" id="btndis" class="btn btn-danger">
                               <i class="bi bi-exclamation-octagon"></i>
                           </button>
                         </div>
                      <?php }; ?>
                      
                    </td>

                    
                    <td class="text-wrap">
                      <span class="badge rounded-pill <?php echo $row['class']; ?> text-dark">
                        <?php echo $currentstat ?>
                      </span>
                    </td>
                    

                    <td class="text-wrap">   
                        <div class="fixed-cell-width">  
                        <?php  
                             $iprofile_pic = base64_encode($row['profile_pic']);
                             $validprofile_pic = !empty($iprofile_pic) ? 'data:image/png;base64,' . $iprofile_pic : '../img/emptyprofile.png';
                             $patientname = $row['full_name'];

                              echo "<div class='row'>
                                       <div class='col-auto'>
                                       <img id='imagePreview'  alt='Preview| class='rounded-circle'
                                       src={$validprofile_pic}>
                                       </div>
                                       <div class='col'>
                                        {$patientname}
                                       </div>
                                     </div>"

                        ?>
                         </div>
                    </td>

                    <td class="text-wrap"> 
                        <div class="fixed-cell-width">  
                            <?php echo $row['message']; ?> 
                        </div>
                    </td>

                    <td class="text-wrap">
                      <div class="fixed-cell-width">  
                        <?php echo $row['appointment_date']; ?>
                      </div>
                    </td>
                    
                    <td hidden>
                       <?php echo $origtimefrom; ?>
                    </td>

                    <td class="text-wrap">
                      <div class="fixed-cell-width">  
                        <?php echo $timeFormatFrom; ?>
                      </div>
                    </td>

                    <td class="text-wrap">
                      <div class="fixed-cell-width">  
                        <?php echo $timeFormatEnd; ?>
                      </div>
                    </td>


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
