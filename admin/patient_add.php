<?php
session_start();
if (
  isset($_SESSION['admin_id']) &&
  isset($_SESSION['role'])
) {

  if ($_SESSION['role'] == 'Admin') {

    include "../DB_connection.php";


    $fname = '';
    $lname = '';
    $uname = '';
    $gender = '';
    $patient_phone = '';
    $patient_email = '';
    $password = '';


    if (isset($_GET['fname'])) $fname = $_GET['fname'];
    if (isset($_GET['lname'])) $lname = $_GET['lname'];
    if (isset($_GET['uname'])) $uname = $_GET['uname'];
    if (isset($_GET['gender'])) $gender = $_GET['gender'];
    if (isset($_GET['patient_phone'])) $patient_phone = $_GET['patient_phone'];
    if (isset($_GET['patient_email'])) $patient_email = $_GET['patient_email'];
    if (isset($_GET['password'])) $password = $_GET['password'];
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Admin - Add patient</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
      <link rel="icon" href="../logo.png">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    </head>

    <body>
      <?php
      include "inc/navbar.php";
      ?>
      <div class="container mt-5">
        <a href="patient.php" class="btn btn-dark">Go Back</a>

        <form method="post" class="shadow p-3 mt-5 form-w" name="f" id="f">
          <h3>Add New patient</h3>
          <hr>
          <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger" role="alert">
              <?= $_GET['error'] ?>
            </div>
          <?php } ?>
          <?php if (isset($_GET['success'])) { ?>
            <div class="alert alert-success" role="alert">
              <?= $_GET['success'] ?>
            </div>
          <?php } ?>
          <div id="errorMessage" class="alert alert-danger mt-3" role="alert" style="display: none;"></div>
          <div id="successMessage" class="alert alert-success mt-3" role="alert" style="display: none;"></div>

          <div class="mb-3">
            <label class="form-label">First name</label>
            <input type="text" class="form-control" value="<?= $fname ?>" name="fname" id="fname">
          </div>
          <div class="mb-3">
            <label class="form-label">Last name</label>
            <input type="text" class="form-control" value="<?= $lname ?>" name="lname" id="lname">
          </div>
          <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" class="form-control" value="<?= $uname ?>" name="username" id="uname">
          </div>
          <div class="mb-3">
            <label class="form-label">Password</label>
            <div class="input-group mb-3">
              <input type="text" class="form-control" name="pass" id="passInput">
              <button class="btn btn-secondary" id="gBtn">
                Random</button>
            </div>
            <div class="mb-3">
              <label class="form-label">Gender</label>
              <input type="text" class="form-control" value="<?= $gender ?>" name="gender" id="gender">
            </div>
          </div>
          <!-- email and phone num -->
          <div class="mb-3">
            <label class="form-label">Phone number</label>
            <input type="number" class="form-control" value="<?= $patient_phone ?>" name="patient_phone" id="patient_phone">
          </div>
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="text" class="form-control" value="<?= $patient_email ?>" name="patient_email" id="patient_email">
          </div>


          <!-- ///////////////// -->


          <button type="submit" class="btn btn-primary" id="submit ">Add</button>
        </form>

      </div>


      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
      <script>
        $(document).ready(function() {
          $("#navLinks li:nth-child(2) a").addClass('active');
        });

        function makePass(length) {
          var result = '';
          var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
          var charactersLength = characters.length;
          for (var i = 0; i < length; i++) {
            result += characters.charAt(Math.floor(Math.random() *
              charactersLength));

          }
          var passInput = document.getElementById('passInput');
          passInput.value = result;
        }

        var gBtn = document.getElementById('gBtn');
        gBtn.addEventListener('click', function(e) {
          e.preventDefault();
          makePass(4);
        });
      </script>
      <!-- <script>
   // Find the form element using its id
  var form = document.getElementById("pform");

  form.addEventListener("submit", function(event) {
    event.preventDefault();

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "req/patient_add.php");
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          alert(xhr.responseText);
          // You can perform additional actions here upon successful submission
        } else {
          alert("An error occurred.");
          // You can handle the error scenario here
        }
      }
    };

    var fname = encodeURIComponent(document.getElementById("fname").value);
    var lname = encodeURIComponent(document.getElementById("lname").value);
    var uname = encodeURIComponent(document.getElementById("uname").value);
    var gender = encodeURIComponent(document.getElementById("gender").value);
    var patient_email = encodeURIComponent(document.getElementById("patient_email").value);
    var patient_phone = encodeURIComponent(document.getElementById("patient_phone").value);
    var gBtn = encodeURIComponent(document.getElementById("gBtn").value);

    var snd = "fname=" + fname + "&lname=" + lname + "&uname=" + uname + "&gender=" + gender +
              "&patient_email=" + patient_email + "&patient_phone=" + patient_phone +"&gBtn=" gBtn;
              // ...



console.log(snd); // Log the request payload before sending

xhr.send(snd);




  

  });
</script> -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script>
        $(document).ready(function() {
          $("#navLinks li:nth-child(2) a").addClass("active");

          $("#f").on("submit", function(event) {
            event.preventDefault();

            if (validateForm()) {
              var formData = new FormData(this);

              $.ajax({
                url: "req/patient_add.php",
                type: "POST",
                dataType: "json",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data, status) {
                  if (data.success) {
                    $("#successMessage").text(data.message).removeClass("error").addClass("success").show();
                    $("#errorMessage").hide();
                  } else {
                    $("#errorMessage").text(data.message).removeClass("success").addClass("error").show();
                    $("#successMessage").hide();
                  }
                },
                error: function(xhr, desc, err) {
                  console.log(err);
                }
              });
            }
          });
        });

        function validateForm() {
          var fname = document.getElementById("fname").value;
          var lname = document.getElementById("lname").value;
          var username = document.getElementById("uname").value;
          var password = document.getElementById("passInput").value;
          var gender = document.getElementById("gender").value;
          var patientPhone = document.getElementById("patient_phone").value;
          var patientEmail = document.getElementById("patient_email").value;

          if (fname === "") {
            alert("Please enter your first name!");
            return false;
          }
          if (lname === "") {
            alert("Please enter your last name!");
            return false;
          }
          if (username === "") {
            alert("Please enter your username!");
            return false;
          }
          if (password === "") {
            alert("Please enter your password!");
            return false;
          }
          var taille = password.length;
          if (taille < 8 || taille > 13) {
            alert("The password length must be between 8 and 13!");
            return false;
          }

          var hasNumber = false;
          var hasLetter = false;
          var hasUppercase = false;

          for (var i = 0; i < taille; i++) {
            var char = password.charAt(i);

            if (/[0-9]/.test(char)) {
              hasNumber = true;
            } else if (/[a-zA-Z]/.test(char)) {
              hasLetter = true;
              if (char === char.toUpperCase()) {
                hasUppercase = true;
              }
            }
          }

          var isValidPassword = hasNumber && hasLetter && hasUppercase;
          if (!isValidPassword) {
            alert("Your password is incorrect!");
            return false;
          }

          if (gender === "") {
            alert("Please enter your gender!");
            return false;
          }

          var lowercaseGender = gender.toLowerCase();
          var isValidGender = lowercaseGender === "female" || lowercaseGender === "male";
          if (!isValidGender) {
            alert("Please enter 'female' or 'male' as the gender.");
            return false;
          }

          if (patientPhone === "") {
            alert("Please enter your phone number!");
            return false;
          }

          var phonePattern = /^[0-9]{10}$/;
          if (!phonePattern.test(patientPhone)) {
            alert("Your phone number is incorrect!");
            return false;
          }

          if (patientEmail === "") {
            alert("Please enter your email address!");
            return false;
          }

          var emailPattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
          if (!emailPattern.test(patientEmail)) {
            alert("Please enter a valid email address!");
            return false;
          }

          // If all validations pass, return true to allow form submission
          return true;
        }
      </script>




    </body>

    </html>


<?php

  } else {
    header("Location: ../login.php");
    exit;
  }
} else {
  header("Location: ../login.php");
  exit;
}

?>