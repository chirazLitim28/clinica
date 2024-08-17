<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])     &&
    isset($_GET['Appointement_id'])) {

    if ($_SESSION['role'] == 'Admin') {
      
       include "../DB_connection.php";
      
       include "data/Appointement.php";

       $Appointement_id = $_GET['Appointement_id'];
       $Appointement = getAppointementById($Appointement_id, $conn);

       if ($Appointement == 0) {
         header("Location: Appointement.php");
         exit;
       }


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin - Show Appointement</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="icon" href="../logo.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script language ="JavaScript"> 
function verif()

{if(document.f.patients.username.value == "") 
{ alert("patient name is required!"); return false; }; 
if(document.f.doctors.username == "") { alert("doctor name is required!"); return false; };

}
</script>
</head>
<body>
    <?php 
        include "inc/navbar.php";
     ?>
     <div class="container mt-5">
        <a href="Appointements.php"
           class="btn btn-dark">Go Back</a>

        <form method="post" name="f"
              class="shadow p-3 mt-5 form-w" 
              action="req/Appointements_show.php"onSubmit="return verif()">
        <h3>Edit edit</h3><hr>
        <?php if (isset($_GET['error'])) { ?>
          <div class="alert alert-danger" role="alert">
           <?=$_GET['error']?>
          </div>
        <?php } ?>
        <?php if (isset($_GET['success'])) { ?>
          <div class="alert alert-success" role="alert">
           <?=$_GET['success']?>
          </div>
        <?php } ?>


             
        <div class="mb-3">
          <label class="form-label">Patient name</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$Appointement['patient_name']?>" 
                 name="patient_name">
        </div>

        <div class="mb-3">
          <label class="form-label">Patient Phone number </label>
          <input type="text" 
                 class="form-control"
                 value="<?=$Appointement['Patient_Phone_number']?>"
                 name="Patient_Phone_number">
        </div>
        <div class="mb-3">
        <label class="form-label">Concerned doctor</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$Appointement['Concerned_doctor']?>" 
                 name="Concerned_doctor">
        </div>
        <div class="mb-3">
        <label class="form-label"> Session timing</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$Appointement['Session_timing']?>" 
                 name="Session_timing">
        </div>
        <button type="submit" 
              class="btn btn-primary" >Update</button>
     
    </div>
      
       
              
     </form>
     </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
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
    </script>

</body>
</html>
<?php 

  }}
  else {
    header("Location: Appointements.php");
    exit;
  } 

?>