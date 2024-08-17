<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
      
       include "../DB_connection.php";
     

       $drug_name = '';
       $drug_quantity = '';
      


       if (isset($_GET['fname'])) $fname = $_GET['drug_name'];
       if (isset($_GET['lname'])) $lname = $_GET['drug_quantity'];
      
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin - Add Drug</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="icon" href="../logo.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

   
<script>
 function verif() {
  if (document.pform.drug_name.value == "") {
    alert("Enter the drug name!");
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

        <form method="post"
              class="shadow p-3 mt-5 form-w" name="pform" id="pform"
               onSubmit="return verif()">
        <h3>Add New Drug</h3><hr>
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
        <div id="errorMessage" class="alert alert-danger mt-3" role="alert" style="display: none;"></div>
    <div id="successMessage" class="alert alert-success mt-3" role="alert" style="display: none;"></div>

        <div class="mb-3">
          <label class="form-label">Drug name</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$drug_name?>" 
                 name="drug_name"
                   id="drug_name">
        </div>
        <div class="mb-3">
          <label class="form-label">Drug Quantity</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$drug_quantity?>"
                 name="drug_quantity"
                 id="drug_quantity">
        </div>
       
        

<!-- ///////////////// -->


      <button type="submit" class="btn btn-primary" id="submit ">Add</button>
     </form>

     </div>
  
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
   
 
<script>
  $(document).on("submit", "#pform", function(event) {
    event.preventDefault();

    var drugQuantity = $("#drug_quantity").val();

    if (isNaN(drugQuantity) || drugQuantity === "") {
        alert("Please enter a valid number for drug quantity!");
        return false;
    }

    var formData = new FormData(this);

    $.ajax({
        url: "req/drugs-add.php",
        type: "POST",
        dataType: "json",
        data: formData,
        processData: false,
        contentType: false,
        success: function(data, status) {
            if (data.success) {
                $("#successMessage").text(data.message).removeClass("error").addClass("success").show();
                $("#errorMessage").hide();
            } else {
                $("#errorMessage").text(data.message).removeClass("success").addClass("error").show();
                $("#successMessage").hide();
            }
        },
        error: function(xhr, desc, err) {
            console.log(err);
        }
    });
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