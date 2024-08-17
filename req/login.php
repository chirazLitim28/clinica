<?php 
session_start();

if (isset($_POST['uname']) &&
    isset($_POST['pass']) &&
    isset($_POST['role'])) {

	include "../DB_connection.php";
	
	$uname = $_POST['uname'];
	$pass = $_POST['pass'];
	$role = $_POST['role'];

	if (empty($uname)) {
		$em  = "Username is required";
		header("Location: ../login.php?error=$em");
		exit;
	}else if (empty($pass)) {
		$em  = "Password is required";
		header("Location: ../login.php?error=$em");
		exit;
	}else if (empty($role)) {
		$em  = "An error Occurred";
		header("Location: ../login.php?error=$em");
		exit;
	}else {
        
        if($role == '1'){
        	$sql = "SELECT * FROM admin 
        	        WHERE username = ?";
        	$role = "Admin";
        }else if($role == '2'){
        	$sql = "SELECT * FROM doctors 
        	        WHERE username = ?";
        	$role = "Doctor";
        }else {
        	$sql = "SELECT * FROM patients 
        	        WHERE username = ?";
        	$role = "Patient";
        }

        $stmt = $conn->prepare($sql);
        $stmt->execute([$uname]);

        if ($stmt->rowCount() == 1) {
        	$user = $stmt->fetch();
        	$username = $user['username'];
        	$password = $user['password'];
			
            if ($username === $uname) {
            	if (password_verify($pass, $password)) {
            		$_SESSION['role'] = $role;
            		if($role == 'Admin') {
       			 	$id = $user['admin_id'];
            		$_SESSION['admin_id'] = $id;
				    header("Location: ../admin/index.php");
				    exit;						
					}
            		$_SESSION['role'] = $role;
            		if($role == 'Doctor') {
       			 	$id = $user['doctor_id'];
            		$_SESSION['doctor_id'] = $id;
				    header("Location: ../doctor/index.php");
				    exit;						
					}
            		$_SESSION['role'] = $role;
            		if($role == 'Patient') {
       			 	$id = $user['patient_id'];
            		$_SESSION['patient_id'] = $id;
				    header("Location: ../patient/profile.php");
				    exit;						
					}
            	}else {
		        	$em  = "Incorrect Username or Password";
				    header("Location: ../login.php?error=$em");
				    exit;
		        }
            }else {
	        	$em  = "Incorrect Username or Password";
			    header("Location: ../login.php?error=$em");
			    exit;
	        }
        }else {
        	$em  = "Incorrect Username or Password";
		    header("Location: ../login.php?error=$em");
		    exit;
        }
	}


}else{
	header("Location: ../login.php");
	exit;
}