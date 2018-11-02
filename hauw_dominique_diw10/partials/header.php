<?php
  
    // inclusion du fichier database
  require_once(__DIR__.'/../config/database.php');

  ?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Immobilier</title>  
    </title>

    <!-- Bootstrap core CSS -->
    <link rel ="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
  </head>

  <body>

      <nav class="navbar navbar-expand-md navbar-dark bg-dark">
      <a class="navbar-brand" href="formulaire.php"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbars-affiche_donnees">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="formulaire.php">Formulaire</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="affichage_donnees.php">Liste</a>
          </li>
        </ul>
        </div>
    </nav>

    <body>
    </html>
