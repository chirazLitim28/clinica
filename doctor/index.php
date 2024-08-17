<?php 
session_start();
if (isset($_SESSION['doctor_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Doctor') {
       include "../DB_connection.php";
       include "data/doctor.php";
       include "data/specialty.php";


       $doctor_id = $_SESSION['doctor_id'];
       $doctor = getDoctorById($doctor_id, $conn);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Doctor - Home</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/style3.css">
	<link rel="icon" href="../logo.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php 
        include "inc/navbar.php";

        if ($doctor != 0) {
     ?>
     <div class="container1">
        <div class="card" style="width: 22rem;">
          <img src="../assets/img/doctor-<?=$doctor['gender']?>.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title text-center">@<?=$doctor['username']?></h5>
          </div>
                <ul class="list-group list-group-flush">
                <li class="list-group-item">First name: <?=$doctor['fname']?></li>
                <li class="list-group-item">Last name: <?=$doctor['lname']?></li>
                <li class="list-group-item">Gender: <?=$doctor['gender']?></li>
                <li class="list-group-item">Username: <?=$doctor['username']?></li>
                <li class="list-group-item">Phone number: <?=$doctor['doctor_phone']?></li>
                <li class="list-group-item">Email address: <?=$doctor['doctor_email']?></li>

                <li class="list-group-item">Speciality: 
                    <?php 
                    $s = '';
                    $specialties = str_split(trim($doctor['specialties']));
                    foreach ($specialties as $specialty) {
                        $s_temp = getSpecialtyById($specialty, $conn);
                        if ($s_temp != 0) 
                            $s .=$s_temp['specialty'].', ';
                    }
                    echo $s;
                    ?>
                </li>
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