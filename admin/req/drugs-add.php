<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
    	

if (isset($_POST['drug_name']) &&
    isset($_POST['drug_quantity']) ) {
    
    include '../../DB_connection.php';
    include "../data/drugs.php";

    $drug_name = $_POST['drug_name'];
    $drug_quantity = $_POST['drug_quantity'];
   
    
    $data = 'drug_name='.$drug_name.'&drug_quantity='.$drug_quantity;

    if (empty($drug_name)) {
      $response = array(
          'success' => false,
          'message' => "Drug name is required"
      );
      echo json_encode($response);
      exit;
  } else if (empty($drug_quantity)) {
      $response = array(
          'success' => false,
          'message' => " Drug quantity is required"
      );
      echo json_encode($response);
      exit;
  }  else if (!drugnameIsUnique($drug_name, $conn)) {
      $response = array(
          'success' => false,
          'message' => " drug name  already exist! Try another"
      );
      echo json_encode($response);
      exit;
  }  else {
      

      $sql  = "INSERT INTO drugs(drug_name, drug_quantity) VALUES(?,?)";
      $stmt = $conn->prepare($sql);
      $stmt->execute([$drug_name, $drug_quantity]);
      $response = array(
          'success' => true,
          'message' => "New drug is added  successfully"
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
