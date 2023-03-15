<?php require_once 'header.php';?>
<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
  </head> 
<form action="insertutilisateur.php" method="post" >
	<fieldset>
	<legend> <i>Inscription</i></legend>
	Nom : <input type="text" name="nom" required placeholder="Nom" /> <br />
	Prénom : <input type="text" name="prenom" required placeholder="Prénom" /> <br />
	Role :
	<select name="role">
	<option value="eleve">Elève</option>
	<option value="professeur">Professeur</option>
	<option value="administrateur">Administrateur</option>
	</select>
	<br />
	Identifiant : <input type="text" name="login" required placeholder="votre login" /> <br />
	mot de passe : <input type="text" name="password" required placeholder="votre mot de passe" /> <br />
	<fieldset>
	<input type="submit" value="Ajouter" />
	<input type="reset" value="Effacer" />
	</form>