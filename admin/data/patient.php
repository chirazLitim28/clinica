<?php  

// Get patient by ID
function getPatientById($patient_id, $conn){
   $sql = "SELECT * FROM patients
           WHERE patient_id=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$patient_id]);

   if ($stmt->rowCount() == 1) {
     $patients = $stmt->fetch();
     return $patients;
   }else {
    return 0;
   }
}

// All patients 
function getAllPatients($conn){
   $sql = "SELECT * FROM patients";
   $stmt = $conn->prepare($sql);
   $stmt->execute();

   if ($stmt->rowCount() >= 1) {
     $patients = $stmt->fetchAll();
     return $patients;
   }else {
   	return 0;
   }
}

// Check if the username Unique
function unameIsUnique($uname, $conn, $patient_id=0){
   $sql = "SELECT username, patient_id FROM patients
           WHERE username=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$uname]);
   
   if ($patient_id == 0) {
     if ($stmt->rowCount() >= 1) {
       return 0;
     }else {
      return 1;
     }
   }else {
    if ($stmt->rowCount() >= 1) {
       $patient = $stmt->fetch();
       if ($patient['patient_id'] == $patient_id) {
         return 1;
       }else {
        return 0;
      }
     }else {
      return 1;
     }
   }
   
}

// DELETE
function removepatient($id, $conn){
   $sql  = "DELETE FROM patients
           WHERE patient_id=?";
   $stmt = $conn->prepare($sql);
   $re   = $stmt->execute([$id]);
   if ($re) {
     return 1;
   }else {
    return 0;
   }
}


// Search 
function searchPatients($key, $conn)
{
  $key = preg_replace('/(?<!\\\)([%_])/', '\\\$1', $key);

  $sql = "SELECT * FROM patients
           WHERE patient_id LIKE ? 
           OR fname LIKE ?
           OR lname LIKE ?
           OR username LIKE ?
           OR patient_phone LIKE ?
           OR patient_email LIKE ?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$key, $key, $key, $key, $key, $key]);

  $patients = $stmt->fetchAll();
  if (count($patients) > 0) {
    return $patients;
  } else {
    return false;
  }
}

