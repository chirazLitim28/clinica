<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
    	

if (isset($_POST['admin_pass']) &&
    isset($_POST['new_pass'])   &&
    isset($_POST['c_new_pass']) &&
    isset($_POST['patient_id'])) {
    
    include '../../DB_connection.php';
    include "../data/patient.php";
    include "../data/admin.php";

    $admin_pass = $_POST['admin_pass'];
    $new_pass = $_POST['new_pass'];
    $c_new_pass = $_POST['c_new_pass'];

    $patient_id = $_POST['patient_id'];
    $id = $_SESSION['admin_id'];
    
    $data = 'patient_id='.$patient_id.'#change_password';

    if (empty($admin_pass)) {
		$em  = "Admin password is required";
		header("Location: ../patient_edit.php?perror=$em&$data");
		exit;
	}else if (empty($new_pass)) {
		$em  = "New password is required";
		header("Location: ../patient_edit.php?perror=$em&$data");
		exit;
	}else if (empty($c_new_pass)) {
		$em  = "Confirmation password is required";
		header("Location: ../patient_edit.php?perror=$em&$data");
		exit;
	}else if ($new_pass !== $c_new_pass) {
        $em  = "New password and confirm password does not match";
        header("Location: ../patient_edit.php?perror=$em&$data");
        exit;
    }else if (!adminPasswordVerify($admin_pass, $conn, $id)) {
        $em  = "Incorrect admin password";
        header("Location: ../patient_edit.php?perror=$em&$data");
        exit;
    }else {
        // hashing the password
        $new_pass = password_hash($new_pass, PASSWORD_DEFAULT);

        $sql = "UPDATE patients SET
                password = ?
                WHERE patient_id=?";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$new_pass, $patient_id]);
        $sm = "The password has been changed successfully!";
        header("Location: ../patient_edit.php?psuccess=$sm&$data");
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
