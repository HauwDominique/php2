<?php


// FICHIER DE CONFIG GLOBAL
// ce fichier contient nos variables "globales" pour notre site.
// Titre du site, titre de la page, page courante, ...

$siteName = 'Pizza Store';

// page courante et titre de la balise title
// $currentPageTitle = null;
// si REQUEST_URI vaut /home/toto/fichier.php, $page renverra fichier
$currentPageUrl = basename($_SERVER['REQUEST_URI'], '.php');
