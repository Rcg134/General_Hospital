<div class="card">
         <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
           <!-- profile pic -->
           <?php 
             include("../PHP/HospitalappController/profile_pic/profile_pic_img.php");
           ?>


              <h2>
                <!-- Name -->
              <?php   
                    echo $fullname
                ?>
              </h2>
              <!-- User Role -->
              <h3>
                <?php   
                    echo $userrole
                ?>
              </h3>

              <input type="file" accept="image/*" id="imageInput" class="d-none">
              <button type="button" class="btn btn-primary" onclick="document.getElementById('imageInput').click()">Upload Profile Picture</button>

              <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
 </div>