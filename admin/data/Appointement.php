<?php  
function getAppointementById($Appointement_id, $conn){
   $sql = "SELECT * FROM Appointement
           WHERE Appointement_id=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$Appointement_id]);

   if ($stmt->rowCount() == 1) {
     $Appointements = $stmt->fetch();
     return $Appointements;
   }else {
    return 0;
   }
}


function getAllAppointements($conn){
   $sql = "SELECT * FROM Appointements";
   $stmt = $conn->prepare($sql);
   $stmt->execute();

   if ($stmt->rowCount() >= 1) {
     $Appointements = $stmt->fetchAll();
     return $Appointements;
   }else {
   	return 0;
   }
}


// DELETE
function removeAppointement($Appointement_id, $conn){
   $sql  = "DELETE FROM Appointements
           WHERE Appointement_id=?";
   $stmt = $conn->prepare($sql);
   $re   = $stmt->execute([$Appointement_id]);
   if ($re) {
     return 1;
   }else {
    return 0;
   }
}
// Search 
function searchAppointement($key, $conn){
  $key = preg_replace('/(?<!\\\)([%_])/', '\\\$1',$key);

  $sql = "SELECT * FROM Appointements
          WHERE Appointement_id LIKE ? 
          OR session_time LIKE ? ";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$key, $key,$key]);

  if ($stmt->rowCount() == 1) {
    $Appointements = $stmt->fetchAll();
    return $Appointements;
  }else {
   return 0;
  }
}