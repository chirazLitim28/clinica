<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])     &&
    isset($_GET['patient_id'])) {

  if ($_SESSION['role'] == 'Admin') {
     include "../DB_connection.php";
     include "data/patient.php";

     $id = $_GET['patient_id'];
     if (removePatient($id, $conn)) {
     	$sm = "Successfully deleted!";
        header("Location: patient.php?success=$sm");
        exit;
     }else {
        $em = "Unknown error occurred";
        header("Location: patient.php?error=$em");
        exit;
     }


  }else {
    header("Location: patient.php");
    exit;
  } 
}else {
	header("Location: patient.php");
	exit;
} 