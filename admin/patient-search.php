<?php
session_start();
if (
  isset($_SESSION['admin_id']) &&
  isset($_SESSION['role'])
) {

  if ($_SESSION['role'] == 'Admin') {
    if (isset($_GET['searchKey'])) {

      $search_key = $_GET['searchKey'];
      include "../DB_connection.php";
      include "data/patient.php";
      
      $patients = searchPatients($search_key, $conn);
?>
      <!DOCTYPE html>
      <html lang="en">

      <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin - Serach octors</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/style3.css">
        <link rel="icon" href="../logo.png">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      </head>

      <body>
        <?php
        // include "inc/navbar.php";
        if ($patients != 0) {
        ?>
          <div class="container mt-5">
            <!-- <a href="patient-add.php" class="btn btn-dark">Add New patient</a> -->

            <!-- <form class="mt-3 n-table" method="get" action="patient-search.php">
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="searchKey" id="searchKey" placeholder="Search...">
                <button type="submit" name="search" class="btn btn-primary">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </button>
              </div>
            </form> -->

            <!-- <div id="searchResults"></div>
            <script>
              $(document).ready(function() {
                $("#searchKey").on("keyup", function(event) {
                  var formData = this.value + "&search=1";
                  $.ajax({
                    url: "patient-search.php",
                    type: "get",
                    data: formData,
                    success: function(data) {
                      $("#searchResults").html(data);
                    }
                  });
                });
              });
            </script> -->

            <?php if (isset($_GET['error'])) { ?>
              <div class="alert alert-danger mt-3 n-table" role="alert">
                <?= $_GET['error'] ?>
              </div>
            <?php } ?>

            <?php if (isset($_GET['success'])) { ?>
              <div class="alert alert-info mt-3 n-table" role="alert">
                <?= $_GET['success'] ?>
              </div>
            <?php } ?>

            <div class="table-responsive">
              <table>

                <tbody>
                  <?php foreach ($patients as $patient) { ?>
                    <tr>
                      <!-- <th scope="row">1</th> -->
                      <td><?= $patient['patient_id'] ?></td>
                      <td><?= $patient['fname'] ?></td>
                      <td><?= $patient['lname'] ?></td>
                      <td><?= $patient['username'] ?></td>
                     
                      <td><?= $patient['patient_phone'] ?></td>
                      <td><?= $patient['patient_email'] ?></td>
                      <td>
                        <a href="patient_edit.php?patient_id=<?= $patient['patient_id'] ?>" class="btn btn-warning">Edit</a>
                        <a href="patient_delete.php?patient_id=<?= $patient['patient_id'] ?>" class="btn btn-danger">Delete</a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          <?php } else { ?>
            <div class="alert alert-info .w-450 m-5" role="alert">
              No Results Found
              <!-- <a href="patient.php" class="btn btn-dark">Go Back</a> -->
            </div>
          <?php } ?>
          </div>
          <br>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
          <script>
            $(document).ready(function() {
              $("#navLinks li:nth-child(2) a").addClass('active');
            });
          </script>

      </body>

      </html>
<?php

    } else {
      header("Location: patient.php");
      exit;
    }
  } else {
    header("Location: ../login.php");
    exit;
  }
} else {
  header("Location: ../login.php");
  exit;
}

?>