<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
    	

if (isset($_POST['fname'])      &&
    isset($_POST['lname'])      &&
    isset($_POST['username'])   &&
    isset($_POST['doctor_id']) &&
    isset($_POST['gender'])   &&
    isset($_POST['specialties'])&&
    isset($_POST['doctor_phone']) &&
    isset($_POST['doctor_email'])) {
    
    include '../../DB_connection.php';
    include "../data/doctor.php";

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $uname = $_POST['username'];
    $gender = $_POST['gender'];
    $doctor_phone = $_POST['doctor_phone'];
    $doctor_email = $_POST['doctor_email'];

    $doctor_id = $_POST['doctor_id'];
    
    $specialties = "";
    foreach ($_POST['specialties'] as $specialty) {
    	$specialties .=$specialty;
    }

    // $subjects = "";
    // foreach ($_POST['subjects'] as $subject) {
    // 	$subjects .=$subject;
    // }

    $data = 'doctor_id='.$doctor_id;

    if (empty($fname)) {
		$em  = "First name is required";
		header("Location: ../doctor-edit.php?error=$em&$data");
		exit;
	}else if (empty($lname)) {
		$em  = "Last name is required";
		header("Location: ../doctor-edit.php?error=$em&$data");
		exit;
	}else if (empty($uname)) {
		$em  = "Username is required";
		header("Location: ../doctor-edit.php?error=$em&$data");
		exit;
	}else if (!unameIsUnique($uname, $conn, $doctor_id)) {
		$em  = "Username is taken! try another";
		header("Location: ../doctor-edit.php?error=$em&$data");
		exit;
	}else if (empty($gender)) {
		$em  = "gender is required";
		header("Location: ../doctor-edit.php?error=$em&$data");
		exit;
	}else if (empty($doctor_phone)) {
		$em  = "phone number is required";
		header("Location: ../doctor-edit.php?error=$em&$data");
		exit;
	}else if (empty($doctor_email)) {
		$em  = "email is required";
		header("Location: ../doctor-edit.php?error=$em&$data");
		exit;
	}else {
        $sql = "UPDATE doctors SET
                username = ?, fname=?, lname=?, gender=?, specialties=?, doctor_phone=?, doctor_email=?
                WHERE doctor_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$uname,$fname, $lname, $gender, $specialties, $doctor_phone, $doctor_email, $doctor_id]);
        $sm = "successfully updated!";
        header("Location: ../doctor-edit.php?success=$sm&$data");
        exit;
	}
    
  }else {
  	$em = "An error occurred";
    header("Location: ../doctor-edit.php?error=$em");
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
