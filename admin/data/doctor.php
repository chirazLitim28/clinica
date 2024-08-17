<?php

// Get Doctor by ID
function getDoctorById($doctor_id, $conn)
{
  $sql = "SELECT * FROM doctors
           WHERE doctor_id=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$doctor_id]);

  if ($stmt->rowCount() == 1) {
    $doctor = $stmt->fetch();
    return $doctor;
  } else {
    return 0;
  }
}

// All Doctors 
function getAllDoctors($conn)
{
  $sql = "SELECT * FROM doctors";
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  if ($stmt->rowCount() >= 1) {
    $doctors = $stmt->fetchAll();
    return $doctors;
  } else {
    return 0;
  }
}

// Check if the username Unique
function unameIsUnique($uname, $conn, $doctor_id = 0)
{
  $sql = "SELECT username, doctor_id FROM doctors
           WHERE username=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$uname]);

  if ($doctor_id == 0) {
    if ($stmt->rowCount() >= 1) {
      return 0;
    } else {
      return 1;
    }
  } else {
    if ($stmt->rowCount() >= 1) {
      $doctor = $stmt->fetch();
      if ($doctor['doctor_id'] == $doctor_id) {
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
function removeDoctor($id, $conn)
{
  $sql  = "DELETE FROM doctors
           WHERE doctor_id=?";
  $stmt = $conn->prepare($sql);
  $re   = $stmt->execute([$id]);
  if ($re) {
    return 1;
  } else {
    return 0;
  }
}

// Search 
function searchDoctors($key, $conn)
{
  $key = preg_replace('/(?<!\\\)([%_])/', '\\\$1', $key);

  $sql = "SELECT * FROM doctors
           WHERE doctor_id LIKE ? 
           OR fname LIKE ?
           OR lname LIKE ?
           OR username LIKE ?
           OR doctor_phone LIKE ?
           OR doctor_email LIKE ?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$key, $key, $key, $key, $key, $key]);

  $doctors = $stmt->fetchAll();
  if (count($doctors) > 0) {
    return $doctors;
  } else {
    return false;
  }
}
