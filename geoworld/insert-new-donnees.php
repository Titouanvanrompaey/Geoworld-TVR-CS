<?php
require_once('inc/connect-db.php');
//on récupère et on vérifie les données reçues par le formulaire 
if ( isset($_GET['id']) && !empty($_GET['id'])){
	$id = $_GET['id'] ;
}

// à faire sur chaque donnée reçue
$nom = $_GET['nom'];
$continent = $_GET['continent'];
$region = $_GET['region'];
$superficie = $_GET['superficie'];
$population = $_GET['population'];
$esperance = $_GET['esperance'];
$GNP = $_GET['GNP'];
$localname = $_GET['localname'];
$gouvernement = $_GET['gouvernement'];
$dirigeant = $_GET['dirigeant'];
$capital = $_GET['capital'];


$sql = 'UPDATE country SET Name=:nom, Continent=:continent, Region=:region, SurfaceArea=:superficie, Population=:population, LifeExpectancy=:esperance, GNP=:GNP, LocalName=:localname, GovernmentForm=:gouvernement, HeadOfState=:dirigeant, Capital=:capital WHERE id=:id';


try {

	$statement = $pdo->prepare($sql);
	$statement->bindParam(':nom', $nom, PDO::PARAM_STR);
	$statement->bindParam(':continent', $continent, PDO::PARAM_STR);
	$statement->bindParam(':region', $region, PDO::PARAM_STR);
	$statement->bindParam(':superficie', $superficie, PDO::PARAM_INT);
	$statement->bindParam(':population', $population, PDO::PARAM_INT);
    $statement->bindParam(':esperance', $esperance, PDO::PARAM_INT);
    $statement->bindParam(':GNP', $GNP, PDO::PARAM_INT);
    $statement->bindParam(':localname', $localname, PDO::PARAM_STR);
    $statement->bindParam(':gouvernement', $gouvernement, PDO::PARAM_STR);
    $statement->bindParam(':dirigeant', $dirigeant, PDO::PARAM_STR);
    $statement->bindParam(':capital', $capital, PDO::PARAM_INT);
	$statement->bindParam(':id', $id, PDO::PARAM_INT);
	$statement->execute();

           
}
catch(PDOException $e){
     echo 'Erreur : '.$e->getMessage();
}
header("location: accueil.php")
?>