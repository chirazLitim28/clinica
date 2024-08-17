<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
    	

if (isset($_POST['drug_name'])      &&
    isset($_POST['drug_quantity'])
   ) {
    
    include '../../DB_connection.php';
    include "../data/drugs.php";

    $drug_name = $_POST['drug_name'];
    $drug_quantity = $_POST['drug_quantity'];
    $drug_id = $_POST['drug_id'];

    $data = 'drug_id='.$drug_id;

    if (empty($drug_name)) {
		$em  = "Drug name is required";
		header("Location: ../drugs-edit.php?error=$em&$data");
		exit;
	}else if (empty($drug_quantity)) {
		$em  = "Drug quantity is required";
		header("Location: ../drugs-edit.php?error=$em&$data");
		exit;
	
	}else {
        $sql = "UPDATE drugs SET
                drug_name = ?, drug_quantity=?
                WHERE drug_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$drug_name,$drug_quantity, $drug_id]);
        $sm = "successfully updated!";
        header("Location: ../drugs-edit.php?success=$sm&$data");
        exit;
	}
    
  }else {
  	$em = "An error occurred";
    header("Location: ../drugs-edit.php?error=$em");
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