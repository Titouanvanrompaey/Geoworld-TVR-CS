<?php
require_once ("inc/connect-db.php");
//on récupère et on vérifie les données reçues par le formulaire
$nom = $_POST['nom'] ;
$prenom = $_POST['prenom'];
$login = $_POST['login'];
$password = $_POST['password'];
$role = $_POST['role'];
// on rédige la requête SQL
$sql = " INSERT into utilisateurs (nom, prenom, login, password, role )
values (:nom, :prenom, :login, :password, :role)";
try {
//on prépare la requête avec les données reçues
$statement = $pdo->prepare($sql);
$statement->bindParam(':nom', $nom, PDO::PARAM_STR);
$statement->bindParam(':prenom', $prenom, PDO::PARAM_STR);
$statement->bindParam(':login', $login, PDO::PARAM_STR);
$statement->bindParam(':password', $password, PDO::PARAM_STR);
$statement->bindParam(':role', $role, PDO::PARAM_INT);
$statement->execute();
//On renvoie vers la liste des salaries
header("Location:accueil.php");
}
catch(PDOException $e){
echo 'Erreur : '.$e->getMessage();
}
?>