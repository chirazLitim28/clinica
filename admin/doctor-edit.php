<?php
session_start();
if (
  isset($_SESSION['admin_id']) &&
  isset($_SESSION['role'])     &&
  isset($_GET['doctor_id'])
) {

  if ($_SESSION['role'] == 'Admin') {

    include "../DB_connection.php";
    //  include "data/subject.php";
    include "data/specialty.php";
    include "data/doctor.php";
    //  $subjects = getAllSubjects($conn);
    $specialties = getAllSpecialties($conn);

    $doctor_id = $_GET['doctor_id'];
    $doctor = getDoctorById($doctor_id, $conn);

    if ($doctor == 0) {
      header("Location: doctor.php");
      exit;
    }


?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Admin - Edit Doctor</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="../css/style.css">
      <link rel="icon" href="../logo.png">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script>
        function verif1() {

          if (document.f1.fname.value == "") {
            alert(" enter your firstname!");
            return false;
          };
          if (document.f1.lname.value == "") {
            alert("enter your lastname !");
            return false;
          };
          if (document.f1.username.value == "") {
            alert("enter your username !");
            return false;
          };
          // gender 
          if (document.f1.gender.value == "") {
            alert("enter your gender !");
            return false;
          };
          var genderInput = document.f1.gender.value;
          var isValid = validateGender(genderInput);

          if (!isValid) {
            alert("Please enter 'female' or 'male' as the gender.");
            return false;
          };
          // return true;
          function validateGender(gender) {
            var lowercaseGender = gender.toLowerCase();
            return lowercaseGender === "female" || lowercaseGender === "male";
          };

          // speciality
          var checkboxes = document.getElementsByName("specialties[]");
          var selectedCount = 0;

          for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
              selectedCount++;
            }
          }

          if (selectedCount === 0) {
            alert("choose at least one speciality!");
            return false;
          }
          // phone number
          // if (document.f1.doctor_phone.value == "") {
          //   alert("enter your phone number!");
          //   return false;
          // };
          // var v = 1;
          // var taille = document.f1.doctor_phone.value.length;
          // for (i = 0; i < taille; ++i) {
          //   if (document.f1.doctor_phone.value.charAt(i) < "0" || document.f1.doctor_phone.value.charAt(i) > "9" || taille != 10) v = -1;
          // };
          // if (v == -1) {
          //   alert("your phone number is incorrect!");
          //   return false;
          // };
          // end phone number
          // *************************
          // phone number
          if (document.f1.doctor_phone.value == "") {
            alert("Enter your phone number!");
            return false;
          }

          var v = 1;
          var phone = document.f1.doctor_phone.value;
          var size = phone.length;

          for (i = 0; i < size; ++i) {
            if (
              phone.charAt(i) < "0" ||
              phone.charAt(i) > "9" ||
              size != 10 ||
              !/^[a-zA-Z0-9]+$/.test(phone)
            ) {
              v = -1;
            }
          }

          if (v == -1) {
            alert("Your phone number is incorrect!");
            return false;
          }
          // end phone number
          ////*********************** */
          // email
          if (document.f1.doctor_email.value == "") {
            alert("enter your address email !");
            return false;
          }
          var emailPattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
          if (!emailPattern.test(document.f1.doctor_email.value)) {
            alert("enter a valid address email !");
            return false;
          }
        }

        function verif2() {
          if (document.f2.admin_pass.value == "") {
            alert(" enter admin password!");
            return false;
          };
          if (document.f2.new_pass.value == "") {
            alert(" enter the new password!");
            return false;
          };

          var taille = document.f2.new_pass.value.length;
          if (taille < 8 || taille > 13) {
            alert("the length must be between 8 and 13!");
            return false;
          }
          var hasNumber = false;
          var hasLetter = false;
          var hasUppercase = false;

          for (var i = 0; i < taille; i++) {
            var char = document.f2.new_pass.value.charAt(i);

            if (/[0-9]/.test(char)) {
              hasNumber = true;
            } else if (/[a-zA-Z]/.test(char)) {
              hasLetter = true;
              if (char === char.toUpperCase()) {
                hasUppercase = true;
              }
            }
          }
          v = hasNumber && hasLetter && hasUppercase;
          if (v == false) {
            alert("your password is incorrect!");
            return false;
          }

          if (document.f2.c_new_pass.value == "") {
            alert(" confirm your password!");
            return false;
          };
          if (document.f2.new_pass.value !== document.f2.c_new_pass.value) {
            alert("The new password and confirm password do not match!");
            return false;
          }
        }
      </script>
    </head>

    <body>
      <?php
      include "inc/navbar.php";
      ?>
      <div class="container mt-5">
        <a href="doctor.php" class="btn btn-dark">Go Back</a>

        <form name="f1" method="post" class="shadow p-3 mt-5 form-w" action="req/doctor-edit.php" onSubmit="return verif1()">
          <h3>Edit Doctors</h3>
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
          <div class="mb-3">
            <label class="form-label">First name</label>
            <input type="text" class="form-control" value="<?= $doctor['fname'] ?>" name="fname">
          </div>
          <div class="mb-3">
            <label class="form-label">Last name</label>
            <input type="text" class="form-control" value="<?= $doctor['lname'] ?>" name="lname">
          </div>
          <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" class="form-control" value="<?= $doctor['username'] ?>" name="username">
          </div>
          <input type="text" value="<?= $doctor['doctor_id'] ?>" name="doctor_id" hidden>
          <!--  -->
          <div class="mb-3">
            <label class="form-label">Gender</label>
            <input type="text" class="form-control" value="<?= $doctor['gender'] ?>" name="gender">
          </div>
          <div class="mb-3">
            <label class="form-label">Specialty</label>
            <div class="row row-cols-5">
              <?php
              $specialty_ids = str_split(trim($doctor['specialties']));
              foreach ($specialties as $specialty) {
                $checked = 0;
                foreach ($specialty_ids as $specialty_id) {
                  if ($specialty_id == $specialty['specialty_id']) {
                    $checked = 1;
                  }
                }
              ?>
                <div class="col">
                  <input type="checkbox" name="specialties[]" <?php if ($checked) echo "checked"; ?> value="<?= $specialty['specialty_id'] ?>">
                  <?= $specialty['specialty'] ?>
                </div>
              <?php } ?>

            </div>
          </div>
          <div class="mb-3">
            <label class="form-label">Phone number</label>
            <input type="number" class="form-control" value="<?= $doctor['doctor_phone'] ?>" name="doctor_phone">
          </div>
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" value="<?= $doctor['doctor_email'] ?>" name="doctor_email">
          </div>
          <button type="submit" class="btn btn-primary">
            Update</button>
        </form>

        <form name="f2" method="post" class="shadow p-3 my-5 form-w" action="req/doctor-change.php" id="change_password" onSubmit="return verif2()">
          <h3>Change Password</h3>
          <hr>
          <?php if (isset($_GET['perror'])) { ?>
            <div class="alert alert-danger" role="alert">
              <?= $_GET['perror'] ?>
            </div>
          <?php } ?>
          <?php if (isset($_GET['psuccess'])) { ?>
            <div class="alert alert-success" role="alert">
              <?= $_GET['psuccess'] ?>
            </div>
          <?php } ?>

          <div class="mb-3">
            <div class="mb-3">
              <label class="form-label">Admin password</label>
              <input type="password" class="form-control" name="admin_pass">
            </div>

            <label class="form-label">New password </label>
            <div class="input-group mb-3">
              <input type="text" class="form-control" name="new_pass" id="passInput">
              <button class="btn btn-secondary" id="gBtn">
                Random</button>
            </div>

          </div>
          <input type="text" value="<?= $doctor['doctor_id'] ?>" name="doctor_id" hidden>

          <div class="mb-3">
            <label class="form-label">Confirm new password </label>
            <input type="text" class="form-control" name="c_new_pass" id="passInput2">
          </div>
          <button type="submit" class="btn btn-primary">
            Change</button>
        </form>
      </div>

      <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(2) a").addClass('active');
        });

        function makePass(length) {
            var result           = '';
            var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var charactersLength = characters.length;
            for ( var i = 0; i < length; i++ ) {
              result += characters.charAt(Math.floor(Math.random() * 
         charactersLength));

           }
           var passInput = document.getElementById('passInput');
           var passInput2 = document.getElementById('passInput2');
           passInput.value = result;
           passInput2.value = result;
        }

        var gBtn = document.getElementById('gBtn');
        gBtn.addEventListener('click', function(e){
          e.preventDefault();
          makePass(4);
        });
    </script> -->

    </body>

    </html>
<?php

  } else {
    header("Location: doctor.php");
    exit;
  }
} else {
  header("Location: doctor.php");
  exit;
}

?>