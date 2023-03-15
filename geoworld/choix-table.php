<?php
require_once 'header.php';
session_start ();
if ($_SESSION['role']=='eleve')
    header('location: accueil.php');
?>
<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
  </head> 
<form action="update-db.php" method="get" >
	<fieldset>
	<legend> <i>choix de l'élément à modifier</i></legend>
	Id du pays : <input type="text" name="id" required placeholder="id" /> <br />
	<fieldset>
	<input type="submit" value="Soumettre" />
	<input type="reset" value="Effacer" />
	</form>