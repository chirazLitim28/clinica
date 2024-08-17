<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
    	

if (isset($_POST['fname'])      &&
    isset($_POST['lname'])      &&
    isset($_POST['username'])   &&
    isset($_POST['patient_id'])&&
    isset($_POST['gender'])   &&
    isset($_POST['patient_phone']) &&
    isset($_POST['patient_email'])) {
    
    include '../../DB_connection.php';
    include "../data/patient.php";

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $uname = $_POST['username'];
    $patient_phone = $_POST['patient_phone'];
    $patient_email = $_POST['patient_email'];
    $gender = $_POST['gender'];
    
    $patient_id = $_POST['patient_id'];
    

    $data = 'patient_id ='.$patient_id;

    if (empty($fname)) {
		$em  = "First name is required";
		header("Location: ../patient_edit.php?error=$em&$data");
		exit;
	}else if (empty($lname)) {
		$em  = "Last name is required";
		header("Location: ../patient_edit.php?error=$em&$data");
		exit;
	}else if (empty($uname)) {
		$em  = "Username is required";
		header("Location: ../patient_edit.php?error=$em&$data");
		exit;
	}else if (!unameIsUnique($uname, $conn, $patient_id)) {
		$em  = "Username is taken! try another";
		header("Location: ../patient_edit.php?error=$em&$data");
		exit;
	}else {
        $sql = "UPDATE patients SET
                username = ?, fname=?, lname=? , gender=?,patient_phone=?, patient_email=?
                WHERE patient_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$uname,$fname, $lname,$gender, $patient_phone, $patient_email, $patient_id]);
        $sm = "successfully updated!";
        header("Location: ../patient_edit.php?success=$sm&$data");
        exit;
	}
    
  }else {
  	$em = "An error occurred";
    header("Location: ../patient_edit.php?error=$em");
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
