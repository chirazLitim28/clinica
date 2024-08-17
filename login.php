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
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap"
    rel="stylesheet">

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

</head>

<body>
  <div class="full">


    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center ">
      <div class="container d-flex justify-content-between align-items-center">

        <div class="logo">
          <!-- <h1 class="text-light"><a href="index.html"><span>Moderna</span></a></h1> -->
          <!-- Uncomment below if you prefer to use an image logo -->
          <a href="index.html"><img src="assets/img/full_logo.png" alt="" class="img-fluid"></a>
        </div>

        <nav id="navbar" class="navbar">
          <ul>
            <li><a class="" href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="services.php">Services</a></li>
            <!-- <li><a class="active" href="portfolio.html">Portfolio</a></li> -->
            <li><a href="team.php">Team</a></li>
            <li><a href="contact.php">Contact Us</a></li>
            <li><a class="book scrollto" href="book.php">Book </a></li>
            <li><a class="book scrollto" href="login.php">Log in</a></li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

      </div>
    </header><!-- End Header -->
    <body>
<!-- ======= Hero No Slider Section ======= -->
<div id="hero-no-slider" class="d-flex justify-cntent-center align-items-center">
        <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
      <div class="row justify-content-center">
    <!-- <div class="black-fill"><br /> <br /> -->
    	<div class="d-flex justify-content-center align-items-center flex-column">
            <form class="login" 
    	      method="post"
    	      action="req/login.php"
            style="max-width: 500px; width: 90%; background: rgba(255,255,255, 0.5); padding: 40px; border-radius: 10px; margin-top:100px ;">
    		      <h3>Login</h3>
              <?php if (isset($_GET['error'])) { ?>
              <div class="alert alert-danger" role="alert">
              <?=$_GET['error']?>
	          	</div>
			        <?php } ?>
              <div class="mb-3">
                <label class="form-label">username
                </label>
                <input type="text" 
                      class="form-control"
                      name="uname">
              </div>
		          <div class="mb-3">
                <label class="form-label">password</label>
                <input type="password" 
                      class="form-control"
                      name="pass">
              </div>
              <div class="mb-3">
                <label class="form-label">Login as </label>
                <select class="form-control"
                        name="role">
                  <option value="1">Admin</option>
                  <option value="2">Dentist</option>
                  <option value="3">Patient</option>
                </select>
              </div>

		          <button type="submit" class="btn btn-primary">Login</button>
	        	</form>
                    <br /><br />
        <div class="text-center text-light">
			<?php
			// $pass = 123;
			// $pass = password_hash($pass, PASSWORD_DEFAULT);
      // echo $pass;
			?>
        </div>
      </div>
      </div>
      </div>
    <!-- </div> -->
  </div>
  <!-- End Hero No Slider Sectio -->
  
  </div>

    <!-- ////////////**************/////////////////***************** -->
    <div class="lcontainer">
      <div class="lform-container">
        <form id="llogin-form">
          <h2>Login</h2>
          <div class="linput-container">
            <input type="text" placeholder="Username" name="username" required />
          </div>
          <div class="linput-container">
            <input type="password" placeholder="Password" name="password" required />
          </div>
          <button type="submit">Login</button>
        </form>
      </div>
     

    </div> 

    <!-- //////////////// Script /////////////// -->
    <script>
      var x = document.getElementById('login');
      var y = document.getElementById('register');
      var z = document.getElementById('btn');
      function register() {
        x.style.left = '-400px';
        y.style.left = '50px';
        z.style.left = '110px';
      }
      function login() {
        x.style.left = '50px';
        y.style.left = '450px';
        z.style.left = '0px';
      }
    </script>
    <!-- <script>
      var modal = document.getElementById('login-form');
      window.onclick = function(event) 
      {
          if (event.target == modal) 
          {
              modal.style.display = "none";
          }
      }
    </script> -->

   
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

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
  </div>
</body>

</html>