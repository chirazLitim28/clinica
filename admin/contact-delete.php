<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])     &&
    isset($_GET['contact_id'])) {

  if ($_SESSION['role'] == 'Admin') {
     include "../DB_connection.php";
     include "data/contact.php";

     $id = $_GET['contact_id'];
     if (removeContact($id, $conn)) {
     	$sm = "Successfully deleted!";
        header("Location: contact.php?success=$sm");
        exit;
     }else {
        $em = "Unknown error occurred";
        header("Location: contact.php?error=$em");
        exit;
     }


  }else {
    header("Location: contact.php");
    exit;
  } 
}else {
	header("Location: contact.php");
	exit;
} 