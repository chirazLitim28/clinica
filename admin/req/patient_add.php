<?php
session_start();
if (isset($_SESSION['admin_id']) && isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'Admin') {
        if (
            isset($_POST['fname']) &&
            isset($_POST['lname']) &&
            isset($_POST['username']) &&
            isset($_POST['pass']) &&
            isset($_POST['gender']) &&
            isset($_POST['patient_phone']) &&
            isset($_POST['patient_email'])
        ) {
            include '../../DB_connection.php';
            include "../data/patient.php";

            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $uname = $_POST['username'];
            $pass = $_POST['pass'];
            $gender = $_POST['gender'];
            $patient_phone = $_POST['patient_phone'];
            $patient_email = $_POST['patient_email'];

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
            } else {
                // Hashing the password
                $pass = password_hash($pass, PASSWORD_DEFAULT);

                $sql  = "INSERT INTO patients(username, password, fname, lname, patient_phone, patient_email, gender) VALUES(?,?,?,?,?,?,?)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$uname, $pass, $fname, $lname, $patient_phone, $patient_email, $gender]);
                $response = array(
                    'success' => true,
                    'message' => "New patient registered successfully"
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
