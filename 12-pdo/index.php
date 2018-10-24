<?php

try {
	$db = new PDO('mysql:host=localhost;dbname=pizzastore;charset=utf8', 'root', '', [
		PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, // Active les erreurs SQL,
		// On récupère tous les résultats en tableau associatif
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	]);
} catch(Exception $e) {
	echo $e->getMessage();
	// Redirection en PHP vers Google avec le message d'erreur concerné
	header('Location: https://www.google.fr/search?q='.$e->getMessage());
}

// Création d'une connexion à la BDD
$db = new PDO('mysql:host=localhost; dbname=pizzastore; charset=utf8', 'root', '');

var_dump($db);

// on créé une requête pour récupérer les pizzas
$query = $db->query('SELECT * FROM pizza'); 
var_dump($query);

// pour récupérer une seule pizza
// ATTENTION, FETCH() déplace le curseur à l'id suivant pour la prochaine requête
// $pizza = $query->fetch();
// var_dump($pizza);

// pour récupérer toutes les pizzas
$pizzas = $query->fetchAll();
var_dump($pizzas);

// parcourir toutes les pizzas avec FETCHALL (nom affiché avec h1);

echo '<h2>Toutes les pizzas avec FETCHALL</h2>';

$queryName = $db->query('SELECT name FROM pizza');
$pizzasName = $queryName->fetchAll();
var_dump($pizzasName);

foreach($pizzasName as $pizzaName) {
    echo '<h3>'.$pizzaName['name'].'</h3>';
}

// parcourir toutes les pizzas avec le FETCH uniquement
echo '<h2>Toutes les pizzas avec FETCH uniquement</h2>';

$query2 = $db->query('SELECT name FROM pizza');
while ($pizza2 = $query2->fetch()) {
    echo $pizza2['name'].' ; ';
}



