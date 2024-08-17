<?php
session_start();
if (
  isset($_SESSION['admin_id']) &&
  isset($_SESSION['role'])     &&
  isset($_GET['patient_id'])
) {

  if ($_SESSION['role'] == 'Admin') {

    include "../DB_connection.php";

    include "data/patient.php";



    $patient_id = $_GET['patient_id'];
    $patient = getPatientById($patient_id, $conn);

    if ($patient == 0) {
      header("Location: patient.php");
      exit;
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Admin - Edit patient</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="../css/style.css">
      <link rel="icon" href="../logo.png">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script>
        function verif() {
          if (document.pform.fname.value == "") {
            alert(" enter your firstname!");
            return false;
          };
          if (document.pform.lname.value == "") {
            alert("enter your lastname !");
            return false;
          };
          if (document.pform.username.value == "") {
            alert("enter your username !");
            return false;
          };

          // password
          // if(document.pform.pass.value == "" ) 
          // { alert("enter your password !"); return false; };
          //   var taille = document.pform.pass.value.length;
          //   if (taille < 8 || taille > 13) {
          //     alert("the length of your password  must be between 8 and 13!");
          //     return false;
          //   }
          //   var hasNumber = false;
          //   var hasLetter = false;
          //   var hasUppercase = false;

          //   for (var i = 0; i < taille; i++) {
          //     var char = document.pform.pass.value.charAt(i);

          //     if (/[0-9]/.test(char)) {
          //       hasNumber = true;
          //     } else if (/[a-zA-Z]/.test(char)) {
          //       hasLetter = true;
          //       if (char === char.toUpperCase()) {
          //         hasUppercase = true;
          //       }
          //     }
          //   }
          //   v = hasNumber && hasLetter && hasUppercase;
          // if(v == false) {alert("your passwor should contain numbers letters and upercase"); return false; }

          //gender 
          if (document.pform.gender.value == "") {
            alert("enter your gender !");
            return false;
          };


          var genderInput = document.pform.gender.value;
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

          // phone number
          if (document.pform.patient_phone.value == "") {
            alert("Enter your phone number!");
            return false;
          }

          var v = 1;
          var phone = document.pform.patient_phone.value;
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

          // email
          if (document.pform.patient_email.value == "") {
            alert("enter your address email !");
            return false;
          }
          var emailPattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
          if (!emailPattern.test(document.pform.patient_email.value)) {
            alert("enter a valid address email !");
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
        <a href="patient.php" class="btn btn-dark">Go Back</a>

        <form method="post" class="shadow p-3 mt-5 form-w" action="req/patient_edit.php" name="pform" id="pform" onSubmit="return verif()">
          <h3>Edit patient</h3>
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

          <input type="hidden" value="<?= $patient['patient_id'] ?>" name="patient_id" hidden>

          <div class="mb-3">
            <label class="form-label">First name</label>
            <input type="text" class="form-control" value="<?= $patient['fname'] ?>" name="fname">
          </div>
          <div class="mb-3">
            <label class="form-label">Last name</label>
            <input type="text" class="form-control" value="<?= $patient['lname'] ?>" name="lname">
          </div>
          <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" class="form-control" value="<?= $patient['username'] ?>" name="username">
          </div>
          <div class="mb-3">
            <label class="form-label">Gender</label>
            <input type="text" class="form-control" value="<?= $patient['gender'] ?>" name="gender">
          </div>
          <div class="mb-3">
            <label class="form-label">Phone number</label>
            <input type="number" class="form-control" value="<?= $patient['patient_phone'] ?>" name="patient_phone">
          </div>
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" value="<?= $patient['patient_email'] ?>" name="patient_email">
          </div>
          <button type="submit" class="btn btn-primary">Update</button>
      </div>



      </form>
      </div>

      <form method="post" class="shadow p-3 my-5 form-w" action="req/patient-change.php" id="change_password">
        <h3>Change Password</h3>
        <hr>
        <?php if (isset($_GET['perror'])) { ?>
          <div class="alert alert-danger" role="alert">
            <?= $_GET['perror'] ?>
          </div>
        <?php  } ?>
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
        <input type="text" value="<?= $patient['patient_id'] ?>" name="patient_id" hidden>

        <div class="mb-3">
          <label class="form-label">Confirm new password </label>
          <input type="text" class="form-control" name="c_new_pass" id="passInput2">
        </div>
        <button type="submit" class="btn btn-primary">
          Change</button>
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
          var passInput2 = document.getElementById('passInput2');
          passInput.value = result;
          passInput2.value = result;
        }

        var gBtn = document.getElementById('gBtn');
        gBtn.addEventListener('click', function(e) {
          e.preventDefault();
          makePass(4);
        });
      </script>

    </body>

    </html>
<?php

  }
} else {
  header("Location: patient.php");
  exit;
}

?>