<?php
session_start();
if (
  isset($_SESSION['admin_id']) &&
  isset($_SESSION['role'])
) {

  if ($_SESSION['role'] == 'Admin') {


    if (
      isset($_POST['fname']) &&
      isset($_POST['lname']) &&
      isset($_POST['username']) &&
      isset($_POST['pass']) &&
      isset($_POST['gender']) &&
      isset($_POST['doctor_phone']) &&
      isset($_POST['doctor_email']) &&
      // ****
      isset($_POST['specialties'])
    ) {

      include '../../DB_connection.php';
      include "../data/doctor.php";

      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $uname = $_POST['username'];
      $pass = $_POST['pass'];
      $gender = $_POST['gender'];

      $specialties = "";
      foreach ($_POST['specialties'] as $specialty) {
        $specialties .= $specialty;
      }

      $doctor_phone = $_POST['doctor_phone'];
      $doctor_email = $_POST['doctor_email'];

      // $subjects = "";
      // foreach ($_POST['subjects'] as $subject) {
      // 	$subjects .=$subject;
      // }
      $data = 'uname=' . $uname . '&fname=' . $fname . '&lname=' . $lname;

      if (empty($fname)) {
        $response = array(
          'success' => false,
          'message' => "First name is required"
        );
        echo json_encode($response);
        exit;
      } else if (empty($lname)) {
        $response = array(
          'success' => false,
          'message' => "Last name is required"
        );
        echo json_encode($response);
        exit;
      } else if (empty($uname)) {
        $response = array(
          'success' => false,
          'message' => "Username is required"
        );
        echo json_encode($response);
        exit;
      } else if (!unameIsUnique($uname, $conn)) {
        $response = array(
          'success' => false,
          'message' => "Username is taken! Try another"
        );
        echo json_encode($response);
        exit;
      } else if (empty($pass)) {
        $response = array(
          'success' => false,
          'message' => "Password is required"
        );
        echo json_encode($response);
        exit;
      } else if (empty($doctor_phone)) {
        $response = array(
          'success' => false,
          'message' => "Phone number is required"
        );
        echo json_encode($response);
        exit;
      } else  if (empty($doctor_email)) {
        $response = array(
          'success' => false,
          'message' => "Email is required"
        );
        echo json_encode($response);
        exit;
      } else {
        // hashing the password
        $pass = password_hash($pass, PASSWORD_DEFAULT);

        $sql  = "INSERT INTO
                 doctors(username, password, fname, lname, specialties, doctor_phone, doctor_email, gender)
                 VALUES(?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$uname, $pass, $fname, $lname, $specialties, $doctor_phone, $doctor_email, $gender]);
        $response = array(
          'success' => true,
          'message' => "New doctor registered successfully"
        );
        echo json_encode($response);
        exit;
      }
    } else {
      $response = array(
        'success' => false,
        'message' => "Error occurred"
      );
      echo json_encode($response);
      exit;
    }
  } else {
    $response = array(
      'success' => false,
      'message' => "Unauthorized access"
    );
    echo json_encode($response);
    exit;
  }
} else {
  $response = array(
    'success' => false,
    'message' => "Session expired"
  );
  echo json_encode($response);
  exit;
}
