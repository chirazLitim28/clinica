<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
       include "../DB_connection.php";
       include "data/Appointement.php";
           $Appointement = getAllAppointements($conn);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin - Appointements</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/style3.css">
	<link rel="icon" href="../logo.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php 
        include "inc/navbar.php";
        if ($Appointement != 0) {
     ?>
     <div class="container mt-5">
     <a href="index.php"
           class="btn btn-dark">Go back</a>
        <a href="Appointement-add.php"
           class="btn btn-dark">Add New Appointements</a>
           <!-- search -->
                       <form action="Appointement-search.php" 
                 class="mt-3 n-table"
                 method="get">
             <div class="input-group mb-3">
                <input type="text" 
                       class="form-control"
                       name="searchKey"
                       placeholder="Search...">
                <button class="btn btn-primary">
                        <i class="fa fa-search" 
                           aria-hidden="true"></i>
                      </button>
             </div>
           </form>
           <!-- end search -->

           <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger mt-3 n-table" 
                 role="alert">
              <?=$_GET['error']?>
            </div>
            <?php } ?>

          <?php if (isset($_GET['success'])) { ?>
            <div class="alert alert-info mt-3 n-table" 
                 role="alert">
              <?=$_GET['success']?>
            </div>
            <?php } ?>

           <div class="table-responsive">
              <table>
                <thead>
                  <tr>
                    <!-- <th scope="col">#</th> -->
                    <th scope="col">Patient ID</th>
                   
                    <th scope="col">Doctor Name</th>
                    <th scope="col">Session timing</th>
                    <th scope="col">Full informations</th>

                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($Appointement as $Appointement ) { ?>
                  <tr>
                    <!-- <th scope="row">1</th> -->
                    <td><?=$Appointement['patient_id']?></td>
                    <td><?=$Appointement['doctor_id']?></td>
                    <td><?=$Appointement['session_time']?></td>
                    <td>
                        <a href="Appointements_show.php?Appointement_id=<?=$Appointement['Appointement_id']?>"
                           class="btn btn-warning">Show</a>
                        
                    </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
           </div>
         <?php }else{ ?>
             <div class="alert alert-info .w-450 m-5" 
                  role="alert">
                Empty!
              </div>
         <?php } ?>
     </div>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(2) a").addClass('active');
        });
    </script>

</body>
</html>
<?php 

  }else {
    header("Location: ../login.php");
    exit;
  } 
}else {
	header("Location: ../login.php");
	exit;
} 

?>