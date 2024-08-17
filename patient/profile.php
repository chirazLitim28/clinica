<?php 
session_start();
if (isset($_SESSION['patient_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Patient') {
       include "../DB_connection.php";
       include "data/patient.php";
       $patient_id = $_SESSION['patient_id'];
       $patient = getPatientById($patient_id, $conn);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Patient - Home</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="icon" href="../logo.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php 
        include "inc/navbar.php";

        if ($patient != 0) {
     ?>
     <div class="container mt-5">
        <div class="card" style="width: 22rem;">
          <img src="../assets/img/doctor-<?=$patient['gender']?>.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title text-center">@<?=$patient['username']?></h5>
          </div>
                <ul class="list-group list-group-flush">
                <li class="list-group-item">First name: <?=$patient['fname']?></li>
                <li class="list-group-item">Last name: <?=$patient['lname']?></li>
                <li class="list-group-item">Gender: <?=$patient['gender']?></li>
                <li class="list-group-item">Username: <?=$patient['username']?></li>
                <li class="list-group-item">Phone number: <?=$patient['patient_phone']?></li>
                <li class="list-group-item">Email address: <?=$patient['patient_email']?></li>
            </ul>
        </div>
     </div>
     <?php 
        }else {
          header("Location: logout.php?error=An error occurred");
          exit;
        }
     ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
   <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(1) a").addClass('active');
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