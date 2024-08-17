<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])     &&
    isset($_GET['drug_id'])) {

  if ($_SESSION['role'] == 'Admin') {
     include "../DB_connection.php";
     include "data/drugs.php";

     $id = $_GET['drug_id'];
     if (removeDrug($id, $conn)) {
     	$sm = "Successfully deleted!";
        header("Location: drugs.php?success=$sm");
        exit;
     }else {
        $em = "Unknown error occurred";
        header("Location: drugs.php?error=$em");
        exit;
     }


  }else {
    header("Location: drugs.php");
    exit;
  } 
}else {
	header("Location: drugs.php");
	exit;
} 