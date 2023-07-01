  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

           
       <?php
       
          include("../PHP/HospitalappController/sidebar/admin_sidebar.php");
       
       ?>
      
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#" aria-expanded="false">
          <i class="bi bi-journal-text"></i><span>Appointment</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav" style="">
          <li>
            <a href="admin_apply_appointment.php">
              <i class="bi bi-circle"></i><span>Apply</span>
            </a>
          </li>
          <li>
            <a href="my_appointment.php">
              <i class="bi bi-circle"></i><span>My Appointment</span>
            </a>
          </li>


          <!-- <li>
            <a href="forms-editors.html">
              <i class="bi bi-circle"></i><span>Form Editors</span>
            </a>
          </li>
          <li>
            <a href="forms-validation.html">
              <i class="bi bi-circle"></i><span>Form Validation</span>
            </a>
          </li>  -->
        </ul>
      </li>
      
      
      <!-- End Components Nav -->
    </ul>

  </aside><!-- End Sidebar-->