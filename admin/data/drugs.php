<?php  
function getDrugById($drug_id, $conn){
   $sql = "SELECT * FROM drugs
           WHERE drug_id=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$drug_id]);

   if ($stmt->rowCount() == 1) {
     $drugs = $stmt->fetch();
     return $drugs;
   }else {
    return 0;
   }
}


function getAllDrugs($conn){
   $sql = "SELECT * FROM drugs";
   $stmt = $conn->prepare($sql);
   $stmt->execute();

   if ($stmt->rowCount() >= 1) {
     $drugs = $stmt->fetchAll();
     return $drugs;
   }else {
   	return 0;
   }
}

function drugnameIsUnique($drug_name, $conn, $drug_id = 0)
{
  $sql = "SELECT drug_name, drug_id FROM drugs
           WHERE drug_name=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$drug_name]);

  if ($drug_id == 0) {
    if ($stmt->rowCount() >= 1) {
      return 0;
    } else {
      return 1;
    }
  } else {
    if ($stmt->rowCount() >= 1) {
      $doctor = $stmt->fetch();
      if ($doctor['drug_id'] == $drug_id) {
        return 1;
      } else {
        return 0;
      }
    } else {
      return 1;
    }
  }
}
// DELETE
function removeDrug($drug_id, $conn){
   $sql  = "DELETE FROM drugs
           WHERE drug_id=?";
   $stmt = $conn->prepare($sql);
   $re   = $stmt->execute([$drug_id]);
   if ($re) {
     return 1;
   }else {
    return 0;
   }
}
// Search 
function searchDrugs($key, $conn)
{
  $key = preg_replace('/(?<!\\\)([%_])/', '\\\$1', $key);

  $sql = "SELECT * FROM drugs
           WHERE drug_id LIKE ? 
           OR drug_name LIKE ?
           OR drug_quantity LIKE ?";

           
  $stmt = $conn->prepare($sql);
  $stmt->execute([$key, $key, $key]);

  $drugs = $stmt->fetchAll();
  if (count($drugs) > 0) {
    return $drugs;
  } else {
    return false;
  }
}