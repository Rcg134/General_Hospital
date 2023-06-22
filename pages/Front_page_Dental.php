<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SmilePro - Your Trusted Dental Care Provider</title>
    <link
      rel="stylesheet"
      href="../static/css/bootsrap.css"
    />
    <link rel="stylesheet" href="../static/css/bootsrap.min.css">
    <link rel="stylesheet" href="../static/css/customstyle.css">

  </head>

  <body>
    <header>
        <nav id="navbar" class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="logo-container">
              </div>
               <a class="navbar-brand" href="#">
                 <span class="beautiful-letter">G</span>eneral Hospital
               </a>
    
          <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="#home" onclick="animateSection('#home')">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#about-us" onclick="animateSection('#about')">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#services" onclick="animateSection('#services')">Services</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#contact" onclick="animateSection('#contact')">Contact</a>
              </li>

                              <?php	
                                    session_start();				                                           
                                    if(empty($_SESSION['name']))
         														 {
                                         echo " <li class='nav-item'>
                                                   <a class='nav-link btn btn-schedule' href='Hospitalapp_Login.php'>Log in</a>
                                                </li>";
         														 }   
         														 else{
                                        $usertype = $_SESSION['usertypeid'];
                                        $status = '';
                                         // Doctor                                       
                                        if ($usertype == 2) {
                                          $status =  "<a class='dropdown-item' href='doctor_dashboard.php'>Panel</a>";
                                        }
                                        // Patient   
                                        else if ($usertype == 3) {
                                          $status = "<a class='dropdown-item' href='patient_dashboard.php'>Panel</a>";
                                        }
                                        // admin   
                                        else if ($usertype == 1){
                                          $status =  "<a class='dropdown-item' href='admin_dashboard.php'>Panel</a>";
                                        }

                                         echo "	<div class='collapse navbar-collapse' id='navbarNav'>
                                                 <ul class='navbar-nav ml-auto'>
                                                   <li class='nav-item dropdown'>
                                                     <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                        {$_SESSION['name']}
                                                     </a>
                                                      <label id='lblid' hidden> {$_SESSION['iid']} </label>
                                                      <label id='lblusrtypeid' hidden> {$_SESSION['usertypeid']} </label>
                                                     <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
                                                        {$status}
                                                       <a class='dropdown-item' href='logout.php'>Logout</a>
                                                     </div>
                                                   </li>
                                                 </ul>
                                               </div>";  
                                     }         	 
								              ?>

            </ul>
          </div>
        </nav>
      </header>

    <section id="home" class="py-5 text-center">
      <div class="container">
        <h1>Welcome to Calamba General Hospital</h1>
        <p class="lead">Your Trusted health Care Provider</p>
        <a href="#appointment" class="btn btn-schedule">Schedule an Appointment</a>
      </div>
    </section>

    <section id="about-us" class="py-5">
      <div class="container">
        <h2>About Us</h2>
        <p>
          At our general hospital, we are committed to providing exceptional healthcare services to our patients. With a team of highly skilled doctors, nurses, and staff, we strive to deliver comprehensive medical care and personalized treatment plans.
        </p>
        <p>
          Our mission is to improve the health and well-being of the communities we serve. We are dedicated to promoting preventive care, early detection of illnesses, and the highest standards of medical excellence. We believe in fostering a compassionate and patient-centered environment where individuals and families feel comfortable and supported throughout their healthcare journey.
        </p>
        <p>
          With state-of-the-art facilities and advanced medical technologies, we offer a wide range of services, including general hospital care, specialized treatments, emergency care, vaccinations, and more. Our multidisciplinary approach ensures that our patients receive comprehensive and coordinated care across various medical specialties.
        </p>
        <p>
          We are proud to have a team of experienced and dedicated healthcare professionals who are committed to providing the highest quality of care. Our doctors, nurses, and staff are passionate about their work and are constantly updating their skills and knowledge to stay at the forefront of medical advancements.
        </p>
        <p>
          Your health and well-being are our top priorities, and we are honored to be your trusted healthcare provider. We look forward to serving you and your family with excellence and compassion.
        </p>
      </div>
    </section>
    



<section id="services" class="py-5">
  <div class="container">
    <h2>Our Services</h2>
    <div class="row">
      <div class="col-md-6">
        <h3>General Hospital Services</h3>
        <p>
          Take advantage of our comprehensive range of general hospital services, including medical exams, treatments, surgeries, and more.
        </p>
      </div>
      <div class="col-md-6">
        <h3>Vaccinations</h3>
        <p>
          Protect yourself and your loved ones with our vaccination services, including routine immunizations and specific vaccines for various diseases.
        </p>
      </div>
      <div class="col-md-6">
        <h3>Cosmetic Procedures</h3>
        <p>
          Enhance your appearance with our cosmetic procedures, such as plastic surgery, Botox, and dermal fillers.
        </p>
      </div>
      <div class="col-md-6">
        <h3>Orthopedics</h3>
        <p>
          Restore your musculoskeletal health with our orthopedic treatments, including joint replacements, sports medicine, and rehabilitation.
        </p>
      </div>
      <div class="col-md-6">
        <h3>Emergency Medical Care</h3>
        <p>
          We provide immediate and responsive emergency medical care for critical situations. Contact us immediately for urgent medical assistance.
        </p>
      </div>
      <div class="col-md-6">
        <h3>Pediatrics</h3>
        <p>
          Ensure the health and well-being of your children with our specialized pediatric services, including check-ups, vaccinations, and pediatric consultations.
        </p>
      </div>
      <div class="col-md-6">
        <h3>Obstetrics and Gynecology</h3>
        <p>
          Receive personalized care for women's health needs, including prenatal care, gynecological exams, family planning, and reproductive health services.
        </p>
      </div>
      <div class="col-md-6">
        <h3>Cardiology</h3>
        <p>
          Take care of your heart health with our cardiology services, including cardiac evaluations, diagnostic tests, and treatment for heart conditions.
        </p>
      </div>
      <div class="col-md-6">
        <h3>Oncology</h3>
        <p>
          Access comprehensive cancer care, including screenings, diagnostics, chemotherapy, radiation therapy, and supportive services for cancer patients.
        </p>
      </div>
    </div>
  </div>
</section>


<section id="doctors" class="py-5">
  <div class="container">
    <h2>Our Doctors</h2>
    <div id="doctor-carousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#doctor-carousel" data-slide-to="0" class="active"></li>
        <li data-target="#doctor-carousel" data-slide-to="1"></li>
        <li data-target="#doctor-carousel" data-slide-to="2"></li>
        <li data-target="#doctor-carousel" data-slide-to="3"></li>
        <li data-target="#doctor-carousel" data-slide-to="4"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="../img/person.jpg" alt="Doctor 1">
          <div class="carousel-caption">
            <h3>Dr. Dr. John Smith</h3>
            <p>Cardiology</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget justo eu elit consequat mattis. Aliquam malesuada finibus lacus, sed finibus justo vestibulum ac.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="../img/person.jpg" alt="Doctor 2">
          <div class="carousel-caption">
            <h3>Dr. Emily Johnson</h3>
            <p>Pediatrics</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget justo eu elit consequat mattis. Aliquam malesuada finibus lacus, sed finibus justo vestibulum ac.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="../img/person.jpg" alt="Doctor 3">
          <div class="carousel-caption">
            <h3>Dr. Sarah Davis</h3>
            <p>Obstetrics and Gynecology</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget justo eu elit consequat mattis. Aliquam malesuada finibus lacus, sed finibus justo vestibulum ac.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="../img/person.jpg" alt="Doctor 4">
          <div class="carousel-caption">
            <h3>Dr. Michael Thompson</h3>
            <p>Orthopedics</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget justo eu elit consequat mattis. Aliquam malesuada finibus lacus, sed finibus justo vestibulum ac.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="../img/person.jpg" alt="Doctor 5">
          <div class="carousel-caption">
            <h3>Dr. Laura Wilson</h3>
            <p>Oncology</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget justo eu elit consequat mattis. Aliquam malesuada finibus lacus, sed finibus justo vestibulum ac.</p>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#doctor-carousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#doctor-carousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
</section>


      

    <section id="appointment" class="py-5">
        <div class="container">
            <h2>Schedule Appointment</h2>
            <form>
                <div class="form-group">
                    <label for="appointment-date">Date</label>
                    <input type="date" id="appointment-date" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="appointment-time">Time</label>
                    <input type="time" id="appointment-time" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="tel" id="phone" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" class="form-control" rows="3" required></textarea>
                </div>
                  <div class="row text-center">
                    <div class="col-md-12">
                      <button type="submit" class="btn btn-schedule">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </section>


    <footer class="py-3 text-center">
      <div class="container">
        <ul class="list-inline mb-0">
          <li class="list-inline-item">
            <a href="#"><img src="../img/fb.png" alt="Facebook" /></a>
          </li>
          <li class="list-inline-item">
            <a href="#"><img src="../img/twitter.png" alt="Twitter" /></a>
          </li>
          <li class="list-inline-item">
            <a href="#"><img src="../img/instagram.png" alt="Instagram" /></a>
          </li>
          <!-- <li class="list-inline-item">
            <a href="#"><img src="linkedin.png" alt="LinkedIn" /></a>
          </li> -->
        </ul>
        <p class="text-white mt-3">Follow us on social media for updates and promotions!</p>
        <p class="text-white">123 Example Street, City, Country</p>
        <p class="text-white">Phone: +1 123-456-7890</p>
        <p class="text-white">Email: info@example.com</p>
        <div class="row">
            <div class="col">
                <h5 class="text-white">Clinics</h5>
                <ul class="list-unstyled text-white">
                    <li>Clinic A</li>
                    <li>Clinic B</li>
                    <li>Clinic C</li>
                </ul>
            </div>
            <div class="col">
                <h5 class="text-white">Services</h5>
                <ul class="list-unstyled text-white">
                    <li>Service A</li>
                    <li>Service B</li>
                    <li>Service C</li>
                </ul>
            </div>
        </div>
    </div>
      </div>

    </footer>





      <a href="#navbar" class="scroll-to-top">
        <i class="fa fa-arrow-up"></i>
      </a>
      
    <script src="../static/js/jquery_3.6.min.js"></script>
    <script src="../static/js/popper.min.js"></script>
    <script src="../static/js/bootsrap.min.js"></script>
    <script src="../static/js/all.min.js"></script>
  
    <!-- <script src="../static/js/jquery_3.6.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script> -->
    <script src="../static/js/custom.js"></script>




  </body>
</html>
