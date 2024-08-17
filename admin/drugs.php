<?php
session_start();
if (
  isset($_SESSION['admin_id']) &&
  isset($_SESSION['role'])
) {

  if ($_SESSION['role'] == 'Admin') {
    include "../DB_connection.php";
    include "data/drugs.php";
   
    //  include "req/doctor-add.php";
    $drugs = getAllDrugs($conn);
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Admin - Drugs</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="../assets/css/style3.css">
      <link rel="icon" href="../assets/img/full_logo.png">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <link rel="stylesheet" type="text/css" href="../assets/css/pagination.css">
      <style>
        body {
          margin-bottom: 30px;
        }
      </style>
    </head>

    <body>
      <?php
      include "inc/navbar.php";
      if ($drugs != 0) {
      ?>
        <div class="container mt-5">
        <a href="index.php" class="btn btn-dark">Go Back</a>
          <a href="drugs-add.php" class="btn btn-dark">Add New Drug</a>
          <!-- search -->
          <form class="mt-3 n-table" method="get">
            <div class="input-group mb-3">
              <input type="text" class="form-control" name="searchKey" id="searchKey" placeholder="Search...">
              <button type="submit" name="search" class="btn btn-primary">
                <i class="fa fa-search" aria-hidden="true"></i>
              </button>
            </div>
          </form>
          <div id="searchResults"></div>
          <script>
            $(document).ready(function() {
              $("#searchKey").on("keyup", function(event) {
                var formData = {
                  searchKey: $(this).val(),
                  search: 1
                };
                $.ajax({
                  url: "drugs-search.php",
                  type: "get",
                  data: formData,
                  success: function(data) {
                    $("#searchResults").html(data);
                  }
                });
              });
            });
          </script>

          <!-- end search -->
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

          <?php
          require_once '../Pagination.php';

          $drugs = getAllDrugs($conn); // Assuming you have an array of doctors

          // Code to fetch doctors and populate the $doctors array goes here

          $total_records = count($drugs); // Total number of records
          $records_per_page = 2; // Number of records to display per page

          $pagination = new Pagination($total_records, $records_per_page);

          $page_url = 'http://localhost/clinicManagement/admin/drugs.php'; // Replace with the actual URL of your PHP file
          $current_page = $pagination->getCurrentPage();

          $drugs_subset = array_slice($drugs, ($current_page - 1) * $records_per_page, $records_per_page);
          ?>

          <div class="table-responsive">
            <table>
              <thead>
                <tr>
                  <!-- <th scope="col">#</th> -->
                  <th scope="col">ID</th>
                  <th scope="col">Drug Name</th>
                  <th scope="col">Drug Quantity</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($drugs_subset as $drug) { ?>
                  <tr>
                    <!-- <th scope="row">1</th> -->
                    <td><?= $drug['drug_id'] ?></td>
                    <td><?= $drug['drug_name'] ?></td>
                    <td><?= $drug['drug_quantity'] ?></td>
                    <td>
                      <a href="drugs-edit.php?drug_id=<?= $drug['drug_id'] ?>" class="btn btn-warning">Edit</a>
                      <a href="drugs-delete.php?drug_id=<?= $drug['drug_id'] ?>" class="btn btn-danger">Delete</a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>

          <?php
          // Display pagination links
          $page_url = $_SERVER['PHP_SELF']; // Change this to the URL of the page
          echo '<div class="pagination-links">';
          echo $pagination->getPreviousLink($page_url);
          echo $pagination->getPaginationLinks($page_url);
          echo $pagination->getNextLink($page_url);
          echo '</div>';
          ?>

        <?php } else { ?>
          <div class="alert alert-info .w-450 m-5" role="alert">
            Empty!
          </div>
        <?php } ?>
        </div>

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
    header("Location: ../login.php");
    exit;
  }
} else {
  header("Location: ../login.php");
  exit;
}

?>