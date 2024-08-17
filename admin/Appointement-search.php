<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Search Appointements</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="../assets/css/style3.css">

    <link rel="icon" href="../logo.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
   
     <div class="container mt-5">
        <a href="Appointements-add.php"
           class="btn btn-dark">Add New Appointement</a>

          
           <form action="Appointement-search.php"
                 method="get" 
                 class="mt-3 n-table" id="search">
             <div class="input-group mb-3">
                <input type="text" 
                       class="form-control"
                       name="searchKey"
                       value="<?=$search_key?>" 
                       placeholder="Search...">
                <button class="btn btn-primary">
                        <i class="fa fa-search" 
                           aria-hidden="true"></i>
                      </button>
             </div>
           </form>

<script type="text/javascript">
    var search = document.getElementById('search');
var results = document.getElementById('results');

search.addEventListener('keyup', function() {
var xhr = new XMLHttpRequest();
xhr.open('POST', 'search.php');

xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

xhr.onreadystatechange = function() {
if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
results.innerHTML = xhr.responseText;
}
};
var data = 'search=' + search.value;
xhr.send(data);
});
</script>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clinic";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
// Récupération des données de la recherche
$search = $_GET['search'];
// Recherche dans la base de données
$sql = "SELECT * FROM Appointements WHERE Appointement_id LIKE '%$search%' OR session_time LIKE '%$search%' OR doctor_id LIKE '%$search%' OR patient_id
LIKE '%$search%'";       
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
while($row = mysqli_fetch_assoc($result)) {
echo '<div>';
echo '<h4>' .$row["patient_id"].'</h4>';
echo '<h5>' .$row["doctor_id"].'</h5>';

echo '<p>' .$row["session_time"].'</p>';
echo '</div>';
echo '<hr width=30% align=left />';
}
}
else {
echo "No results";
}
