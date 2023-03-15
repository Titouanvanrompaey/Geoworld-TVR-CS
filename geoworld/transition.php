<?php
session_start ();
if ($_SESSION['role']=='administrateur')
    header('location: formulaire.php');
else
    header('location: accueil.php');
?>