<?php
/**
 * Fragment Header HTML page
 *
 * PHP version 7
 *
 * @category  Page_Fragment
 * @package   Application
 * @author    SIO-SLAM <sio@ldv-melun.org>
 * @copyright 2019-2021 SIO-SLAM
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/sio-melun/geoworld
 */
?><!doctype html>
<html lang="fr" class="h-100">
<?php require_once 'inc/manager-db.php'; ?>
<?php $lesContinents=getNomContinent() ?>
<head>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Application Geoworld">
    <title>Homepage : GeoWorld</title>

  <!-- Bootstrap core CSS -->
  <link href="assets/bootstrap-5.1.3-dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  <!-- Custom styles for this template -->
  <link href="css/custom.css" rel="stylesheet">

</head>


<body>

<nav class="navbar navbar-expand-md navbar-blue fixed-top bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="accueil.php">Geoworld</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="transition.php">Ajout utilisateur</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="authentification.php">Deconnexion</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="chat.php">Messagerie</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="choix-table.php">Modifier la base de données</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="accueil.php" id="dropdown01" data-bs-toggle="dropdown" aria-haspopup="true"
             aria-expanded="false">Choix continent</a>
          <div class="dropdown-menu" aria-labelledby="dropdown01">
            <?php foreach($lesContinents as $cont): ?>
              <a class="dropdown-item" href="?continent=<?php echo "$cont->continent" ;?>"><?php echo"$cont->continent"; ?></a> 
              <?php endforeach ?>
          </div>
        </li>
      </ul>
      <img src="images/terres.jpg" height="50"px width="45"px>
    </div>
  </div>
</nav>
