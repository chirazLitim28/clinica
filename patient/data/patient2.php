<?php 

// All Patients
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



// Get Patient By Id 
function getPatientById($id, $conn){
   $sql = "SELECT * FROM patients
           WHERE patient_id=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$id]);

   if ($stmt->rowCount() == 1) {
     $patient = $stmt->fetch();
     return $patient;
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


function patientPasswordVerify($patient_pass, $conn, $patient_id){
   $sql = "SELECT * FROM patients
           WHERE patient_id=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$patient_id]);

   if ($stmt->rowCount() == 1) {
     $patient = $stmt->fetch();
     $pass  = $patient['password'];

     if (password_verify($patient_pass, $pass)) {
        return 1;
     }else {
        return 0;
     }
   }else {
    return 0;
   }
}