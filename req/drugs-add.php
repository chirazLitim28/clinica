<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
    	

if (isset($_POST['drug_name']) &&
    isset($_POST['drug_quantity']) 
   
 ) {
    
    include '../../DB_connection.php';
    include "../drugs.php";

    $drug_name = $_POST['drug_name'];
    $drug_quantity = $_POST['drug_quantity'];
   
   

   
    $data = 'drug_name='.$drug_name.'&drug_quantity='.$drug_quantity;

    if (empty($drug_name)) {
		$em  = "Drug name is required";
		header("Location: ../drugs-add.php?error=$em&$data");
		exit;
	}else if (empty($drug_quantiy)) {
		$em  = " Drug quantity is required";
		header("Location: ../drugs-add.php?error=$em&$data");
		exit;
	
	}else {

        $sql  = "INSERT INTO
                 drugs(drug_name, drug_quantity)
                 VALUES(?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$drug_name, $drug_quantity]);
        $sm = "New drug added successfully";
        header("Location: ../drugs-add.php?success=$sm");
        exit;
	}
    
  }else {
  	$em = "An error occurred";
    header("Location: ../drugs-add.php?error=$em");
    exit;
  }

  }else {
    header("Location: ../../logout.php");
    exit;
  } 
}else {
	header("Location: ../../logout.php");
	exit;
} 
