<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])     &&
    isset($_GET['drug_id'])) {

    if ($_SESSION['role'] == 'Admin') {
      
       include "../DB_connection.php";
      
       include "data/drugs.php";

       $drug_id = $_GET['drug_id'];
       $drug = getDrugById($drug_id, $conn);

       if ($drug == 0) {
         header("Location: drugs.php");
         exit;
       }


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin - Edit drug</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="icon" href="../logo.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script language ="JavaScript"> 
function verif()

{if(document.f.drug_name.value == "") 
{ alert("durg name is required!"); return false; }; 
var drugQuantity = document.f.drug_quantity.value;
			if (isNaN(drugQuantity) || drugQuantity === "") {
				alert("Please enter a valid number for drug quantity!");
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
        <a href="drugs.php"
           class="btn btn-dark">Go Back</a>

        <form method="post" name="f"
              class="shadow p-3 mt-5 form-w" 
              action="req/drugs-edit.php"onSubmit="return verif()">
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
          <label class="form-label">Drug name</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$drug['drug_name']?>" 
                 name="drug_name">
        </div>

        <div class="mb-3">
          <label class="form-label">Drug quantity </label>
          <input type="text" 
                 class="form-control"
                 value="<?=$drug['drug_quantity']?>"
                 name="drug_quantity">
        </div>
        <div class="mb-3">
        <label class="form-label">DrugID</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$drug['drug_id']?>" 
                 name="drug_id">
        </div>
        <button type="submit" 
              class="btn btn-primary" >Update</button>
     
    </div>
      
       
              
     </form>
     </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
    

</body>
</html>
<?php 

  }}
  else {
    header("Location: drugs.php");
    exit;
  } 

?>