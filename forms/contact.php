<?php
include("../DB_connection.php");

// Récupération des données du formulaire
$name = $_POST['cname'];
$email = $_POST['cemail'];
$subject = $_POST['subject'];
$message = $_POST['message'];

try {
  // Création d'une nouvelle connexion PDO
  $pdo = new PDO("mysql:host=localhost;dbname=clinic", "root", "");

  // Configuration des attributs PDO pour afficher les erreurs
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Préparation de la requête
  $stmt = $pdo->prepare("INSERT INTO contact (cname, cemail, subject, message) VALUES (?, ?, ?, ?)");

  // Exécution de la requête préparée
  $stmt->execute([$name, $email, $subject, $message]);

  // Envoyer une réponse JSON avec succès
  echo json_encode(["status" => "success"]);
} catch(PDOException $e) {
  // Envoyer une réponse JSON avec erreur et informations de débogage
  echo json_encode(["status" => "error", "message" => $e->getMessage(), "trace" => $e->getTraceAsString()]);
}

// Fermeture de la connexion PDO
$pdo = null;
?>
