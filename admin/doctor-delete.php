<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])     &&
    isset($_GET['doctor_id'])) {

  if ($_SESSION['role'] == 'Admin') {
     include "../DB_connection.php";
     include "data/doctor.php";

     $id = $_GET['doctor_id'];
     if (removeDoctor($id, $conn)) {
     	$sm = "Successfully deleted!";
        header("Location: doctor.php?success=$sm");
        exit;
     }else {
        $em = "Unknown error occurred";
        header("Location: doctor.php?error=$em");
        exit;
     }


  }else {
    header("Location: doctor.php");
    exit;
  } 
}else {
	header("Location: doctor.php");
	exit;
} 