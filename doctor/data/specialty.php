<?php 

// All Specialties
function getAllSpecialties($conn){
   $sql = "SELECT * FROM specialties";
   $stmt = $conn->prepare($sql);
   $stmt->execute();

   if ($stmt->rowCount() >= 1) {
     $specialties = $stmt->fetchAll();
     return $specialties;
   }else {
   	return 0;
   }
}

// Get Specialties by ID
function getSpecialtyById($specialty_id, $conn){
   $sql = "SELECT * FROM specialties
           WHERE specialty_id=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$specialty_id]);

   if ($stmt->rowCount() == 1) {
     $specialty = $stmt->fetch();
     return $specialty;
   }else {
   	return 0;
   }
}


 ?>