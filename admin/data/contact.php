<?php  

// Get contact by ID
function getContactById($contact_id, $conn){
   $sql = "SELECT * FROM contact
           WHERE contact_id=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$contact_id]);

   if ($stmt->rowCount() == 1) {
     $contact = $stmt->fetch();
     return $contact;
   }else {
    return 0;
   }
}

// All Contacts 
function getAllContacts($conn){
   $sql = "SELECT * FROM contact";
   $stmt = $conn->prepare($sql);
   $stmt->execute();

   if ($stmt->rowCount() >= 1) {
     $contacts = $stmt->fetchAll();
     return $contacts;
   }else {
   	return 0;
   }
}

// Check if the username Unique
// function unameIsUnique($uname, $conn, $doctor_id=0){
//    $sql = "SELECT username, doctor_id FROM doctors
//            WHERE username=?";
//    $stmt = $conn->prepare($sql);
//    $stmt->execute([$uname]);
   
//    if ($doctor_id == 0) {
//      if ($stmt->rowCount() >= 1) {
//        return 0;
//      }else {
//       return 1;
//      }
//    }else {
//     if ($stmt->rowCount() >= 1) {
//        $doctor = $stmt->fetch();
//        if ($doctor['doctor_id'] == $doctor_id) {
//          return 1;
//        }else {
//         return 0;
//       }
//      }else {
//       return 1;
//      }
//    }
   
// }

//DELETE
 function removeContact($id, $conn){
    $sql  = "DELETE FROM contact
            WHERE contact_id=?";
   $stmt = $conn->prepare($sql);
   $re   = $stmt->execute([$id]);
   if ($re) {
     return 1;
    }else {
    return 0;
    }
 }

// Search 
// function searchContacts($key, $conn){
//    $key = preg_replace('/(?<!\\\)([%_])/', '\\\$1',$key);

//    $sql = "SELECT * FROM contact
//            WHERE contact_id LIKE ? 
//            OR cname LIKE ?
//            OR cemail LIKE ?
//            OR subject LIKE ?
//            OR message LIKE ?
//            LIKE ?";
//    $stmt = $conn->prepare($sql);
//    $stmt->execute([$key, $key, $key, $key,$key]);

//    if ($stmt->rowCount() == 1) {
//      $contacts = $stmt->fetchAll();
//      return $contacts;
//    }else {
//     return 0;
//    }
// }
function searchContacts($key, $conn) {
  $key = preg_replace('/(?<!\\\)([%_])/', '$1', $key);

  $sql = "SELECT * FROM contact
          WHERE contact_id LIKE ? 
          OR cname LIKE ?
          OR cemail LIKE ?
          OR subject LIKE ?
          OR message LIKE ?"; // Fix missing placeholder

  $stmt = $conn->prepare($sql);
  $stmt->execute([$key, $key, $key, $key, $key]);

  $contacts = $stmt->fetchAll();
  if (count($contacts) > 0) {
    return $contacts;
  } else {
    return 0;
  }
}
