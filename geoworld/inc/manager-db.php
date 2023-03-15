<?php
/**
 * Ce script est composé de fonctions d'exploitation des données
 * détenues pas le SGBDR MySQL utilisées par la logique de l'application.
 *
 * C'est le seul endroit dans l'application où a lieu la communication entre
 * la logique métier de l'application et les données en base de données, que
 * ce soit en lecture ou en écriture.
 *
 * PHP version 7
 *
 * @category  Database_Access_Function
 * @package   Application
 * @author    SIO-SLAM <sio@ldv-melun.org>
 * @copyright 2019-2023 SIO-SLAM
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/sio-melun/geoworld
 */

/**
 *  Les fonctions dépendent d'une connection à la base de données,
 *  cette fonction est déportée dans un autre script.
 */
require_once 'connect-db.php';


// Exemple d'une fonction sans paramètre, avec documentation technique PhpDoc  

/**
 * Obtenir la liste des pays
 *
 * @return liste d'objets de type StdClass représentant un Country 
 */
function getAllCountries()
{
    global $pdo;
    $query = 'SELECT * FROM Country;';
    return $pdo->query($query)->fetchAll();
}



// Exemple d'une fonction paramétrée, avec documentation technique PhpDoc  

/**
 * Obtenir la liste de tous les pays référencés d'un continent donné
 *
 * @param string $continent le nom d'un continent
 * 
 * @return array tableau d'objets (des pays)
 */
function getCountriesByContinent($continent)
{
    // pour utiliser la variable globale dans la fonction
    global $pdo;
    $query = 'SELECT * FROM Country WHERE Continent = :cont;';
    $prep = $pdo->prepare($query);
    // on associe ici (bind) le paramètre (:cont) de la req SQL,
    // avec la valeur reçue en paramètre de la fonction ($continent)
    // on prend soin de spécifier le type de la valeur (String) afin
    // de se prémunir d'injections SQL (des filtres seront appliqués)
    $prep->bindValue(':cont', $continent, PDO::PARAM_STR);
    $prep->execute();
    // var_dump($prep);  pour du debug
    // var_dump($continent);

    // on retourne un tableau d'objets (car spécifié dans connect-db.php)
    return $prep->fetchAll();
}
function getNomContinent(){
    global $pdo;
    $query='SELECT continent FROM country GROUP BY continent;';
    return $pdo->query($query)->fetchAll();
}
function getNomCapitale($idcapitale){
    global $pdo;
    $sql = $pdo->prepare("SELECT city.Name FROM city WHERE :idc= city.id");
    $sql->bindParam(':idc', $idcapitale , PDO::PARAM_INT);
    $sql->execute();
    $nomcapitale = $sql->fetchColumn();
    return $nomcapitale;
}
function getAuthentification($login,$password){
  global $pdo;
  $query = "SELECT * FROM utilisateurs where login=:login and password=:password";
  $prep = $pdo->prepare($query);
  $prep->bindValue(':login', $login);
  $prep->bindValue(':password', $password);
  $prep->execute();
  // on vérifie que la requête ne retourne qu'une seule ligne
  if($prep->rowCount() == 1){
  $result = $prep->fetch();
  return $result;
  }
  else
  return false;
  }
  function getMessages(){
    global $pdo;
    if(isset($_POST['pseudo']) AND isset($_POST['message']) AND !empty($_POST['pseudo']) AND !empty($_POST['message'])){
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $message = htmlspecialchars($_POST['message']);
    $sth = $pdo->prepare('INSERT INTO chat (nom,message) VALUES (:nom, :message)');
    $sth->execute(array(':nom' => $pseudo, ':message' => $message));
    return [$pseudo, $message];
}
}
function getpays($id){

    global $pdo;
    $requete = "SELECT * FROM country where id = :id";

    try{
      $prep = $pdo->prepare($requete);
      $prep->bindParam(':id', $id, PDO::PARAM_INT);
      $prep->execute();
      $result = $prep->fetch(); 
      return $result; 
    }

    catch ( Exception $e ) {
           die ("erreur dans la requete ".$e->getMessage());
      }
}
?>
