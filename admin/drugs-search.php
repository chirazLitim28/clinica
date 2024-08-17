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
      include "data/drugs.php";
     
      $drugs = searchDrugs($search_key, $conn);
?>
      <!DOCTYPE html>
      <html lang="en">

      <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin - Serach drugs</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/style3.css">
        <link rel="icon" href="../logo.png">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      </head>

      <body>
        <?php
        // include "inc/navbar.php";
        if ($drugs != 0) {
        ?>
          <div class="container mt-5">
          

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
                  <?php foreach ($drugs as $drug) { ?>
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
          <?php } else { ?>
            <div class="alert alert-info .w-450 m-5" role="alert">
              No Results Found
              <!-- <a href="doctor.php" class="btn btn-dark">Go Back</a> -->
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
      header("Location: drugs.php");
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