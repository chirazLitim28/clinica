<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>CliniKa </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/Asset 1.png" rel="icon">
  <link href="assets/img/Asset 1.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <script>
    function verif1() {
      var name = document.getElementById('cname').value;
      var subject = document.getElementById('subject').value;
      var message = document.getElementById('message').value;
      var email = document.getElementById('cemail').value;

      if (name.trim() === "") {
        alert("Enter your name!");
        return false;
      }
      if (email.trim() === "") {
        alert("Enter your email address!");
        return false;
      }
      var emailPattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
      if (!emailPattern.test(email)) {
        alert("Enter a valid email address!");
        return false;
      }
      if (subject.trim() === "") {
        alert("Enter your subject!");
        return false;
      }

      if (message.trim() === "") {
        alert("Enter your message!");
        return false;
      }





      return true;
    }
  </script>


</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center ">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <!-- <h1 class="text-light"><a href="index.html"><span>Moderna</span></a></h1> -->
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="index.php"><img src="assets/img/full_logo.png" alt="" class="img-fluid"></a>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="" href="index.php">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="services.php">Services</a></li>
          <!-- <li><a class="active" href="portfolio.html">Portfolio</a></li> -->
          <li><a href="team.php">Team</a></li>
          <li><a href="contact.php">Contact Us</a></li>
          <li><a class="book scrollto" href="services.php">Book </a></li>
          <li><a class="book scrollto" href="login.php">Log in</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Contact Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Contact</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Contact</li>
          </ol>
        </div>

      </div>
    </section><!-- End Contact Section -->

    <!-- ======= Contact Section ======= -->
    <section class="contact" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
      <div class="container">

        <div class="row">

          <div class="col-lg-6">

            <div class="row">
              <div class="col-md-12">
                <div class="info-box">
                  <i class="bx bx-map"></i>
                  <h3>Our Address</h3>
                  <p>14 Street Des Freres Aoudia El-Mouradia-algiers</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bx bx-envelope"></i>
                  <h3>Email Us</h3>
                  <p>info@clinika.com<br>contact@clinika.com</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bx bx-phone-call"></i>
                  <h3>Call Us</h3>
                  <p>+213 541 36 35 89<br>+213 561 21 96 86</p>
                </div>
              </div>
            </div>

          </div>

          <div class="col-lg-6">
            <form id="contact-form" name="f1" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="cname" class="form-control" id="cname" placeholder="Your Name">
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="text" class="form-control" name="cemail" id="cemail" placeholder="Your Email">
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" id="message"></textarea>
              </div>

              <div class="text-center"><button type="submit" id="submit-btn">Send Message</button></div>
            </form>
          </div>


        </div>

      </div>
      <script>
        //       document.getElementById("contact-form").addEventListener("submit", function(event) {
        //   event.preventDefault();

        //   var form = event.target;
        //   var formData = new FormData(form);

        //   var xhr = new XMLHttpRequest();
        //   xhr.open("POST", "forms/contact.php"); // Use forward slash instead of backslash
        //   xhr.onreadystatechange = function() {
        //     if (xhr.readyState === XMLHttpRequest.DONE) {
        //       if (xhr.status === 200) {
        //         form.reset();
        //         // Optionally show a success message or perform additional actions
        //         alert("Your message has been sent. Thank you!");
        //       } else {
        //         // Handle error response
        //         alert("An error occurred. Please try again.");
        //       }
        //     }
        //   };

        //   xhr.send(formData);
        // });




        document.getElementById("contact-form").addEventListener("submit", function(event) {
          event.preventDefault();

          var form = event.target;
          var formData = new FormData(form);

          var xhr = new XMLHttpRequest();
          xhr.open("POST", "forms/contact.php");
          xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
              if (xhr.status === 200) {
                form.reset();
                alert("Your message has been sent. Thank you!");
              } else {
                alert("An error occurred. Please try again.");
              }
            }
          };

          if (verif1()) {
            xhr.send(formData);
          }
        });
      </script>
    </section><!-- End Contact Section -->

    <!-- ======= Map Section ======= -->
    <section class="map mt-2">
      <div class="container-fluid p-0">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1597.5749205609168!2d3.2918578836035923!3d36.79095761934429!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x128e45b1faa6c30d%3A0x826b4486d0490d85!2sClinique%20Dentaire%20Ain%20taya!5e0!3m2!1sfr!2sdz!4v1679194511801!5m2!1sfr!2sdz"></iframe>
      </div>
    </section><!-- End Map Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
    <!-- ////////// -->
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-links" style="text-align: center;">
            <h3>OPENING HOURS</h3>
            <img src="assets/img/clock.svg" alt="" class="icon" height="100px" width="100px">
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <br><br><br>
            <h4>Sunday - Thursday</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a>8:00am - 5:30pm</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <br><br><br>
            <h4>Friday</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a>8:00am - 1:00pm</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <br><br><br>
            <h4>Sturday</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a>8:00am - 4:00pm</a></li>
            </ul>
          </div>

        </div>
      </div>
    </div>
    <!-- ////////// -->
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="index.html">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="about.html">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="services.html">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="team.html">Team</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">General Dentistry</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Orthodontics</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Periodontics</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Oral Surgery</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              14 Street Des<br>
              Freres Aoudia <br>
              El-Mouradia-algiers <br><br>
              <strong>Phone:</strong> +213 541 36 35 89<br>
              <strong>Email:</strong> contact@clinika.com<br>
            </p>

          </div>

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>About Clinika</h3>
            <p>Clinika it a dental clinic that was founded in 1923 by two skilled dentists, Dr.Doukani Farouk and
              Dr.Amirouche
              Khadija. Our team's passion and love for work has made the clinic one of the most successful and
              reputable hospitals in Algeria.</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Clinika</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>