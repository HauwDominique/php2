<?php

// Création d'une connexion à la BDD
$db = new PDO('mysql:host=localhost; dbname=pizzastore', 'root', ''); 

var_dump($db);