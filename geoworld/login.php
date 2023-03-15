<?php
require_once('inc/manager-db.php');
if (isset($_POST['login']) && isset($_POST['password']) && !empty($_POST['login'])&& !
empty($_POST['login'])) {
$result = getAuthentification($_POST['login'],$_POST['password']);
print_r($result);
if($result){
session_start ();
$_SESSION['nom'] = $result->nom;
$_SESSION['identifiant'] = $result->id;
$_SESSION['role'] = $result->role;
header ('location: accueil.php');
}
else{
header ('location: authentification.php');
}
}
else {
header ('location: authentification.php');
}
?>