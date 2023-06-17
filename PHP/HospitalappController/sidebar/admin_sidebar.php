



<?php

  $usertypeid = $_SESSION['usertypeid'];

  if ($usertypeid == 1)
  {
     echo "
     <li class='nav-item'>
        <a class='nav-link ' href='index.html'>
          <i class='bi bi-grid'></i>
          <span>Dashboard</span>
        </a>
     </li>


     <li class='nav-item'>
             <a class='nav-link collapsed' data-bs-target='#components-nav' data-bs-toggle='collapse' href='#'>
               <i class='bi bi-menu-button-wide'></i><span>User</span><i class='bi bi-chevron-down ms-auto'></i>
             </a>
             <ul id='components-nav' class='nav-content collapse ' data-bs-parent='#sidebar-nav'>
               <li>
                 <a href='admin_new_user.php'>
                   <i class='bi bi-circle'></i><span>Newly Created User</span>
                 </a>
               </li>
               <li>
                 <a href='components-alerts.html'>
                   <i class='bi bi-circle'></i><span>All Users</span>
                 </a>
               </li>
               <li>
             </ul>
     </li>
      
     ";

  }
  else if ($usertypeid == 2)
  {
    echo "
    <li class='nav-item'>
       <a class='nav-link ' href='admin_dashboard.php'>
         <i class='bi bi-grid'></i>
         <span>Dashboard</span>
       </a>
    </li>";

  }






?>


