<?php  

// Get Doctor by ID
function getDoctorById($doctor_id, $conn){
   $sql = "SELECT * FROM doctors
           WHERE doctor_id=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$doctor_id]);

   if ($stmt->rowCount() == 1) {
     $doctor = $stmt->fetch();
     return $doctor;
   }else {
    return 0;
   }
}


