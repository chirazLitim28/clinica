<?php 
session_start();
if (isset($_SESSION['doctor_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Doctor') {
       include "../DB_connection.php";
       include "data/patient.php";
      //  include "data/subject.php";
    //    include "data/specialty.php";
       $patients = getAllPatients($conn);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Doctor - Patients</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/style3.css">
	<link rel="icon" href="../assets/img/full_logo.png">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php 
        include "inc/navbar.php";
        if ($patients != 0) {
     ?>
     <div class="container mt-5">


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

           <div class="table-header">
              <table >
                <thead>
                  <tr>
                    <!-- <th scope="col">#</th> -->
                    <th scope="col">ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Gender</th>
                    <!-- <th scope="col">Specialty</th> -->
                    <th scope="col">Phone number</th>
                    <th scope="col">Email</th>
                    <!-- <th scope="col">Action</th> -->
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($patients as $patient ) { ?>
                  <tr>
                    <!-- <th scope="row">1</th> -->
                    <td><?=$patient['patient_id']?></td>
                    <td><?=$patient['fname']?></td>
                    <td><?=$patient['lname']?></td>
                    <td><?=$patient['username']?></td>
                    <td><?=$patient['gender']?></td>
                    <td><?=$patient['patient_phone']?></td>
                    <td><?=$patient['patient_email']?></td>
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