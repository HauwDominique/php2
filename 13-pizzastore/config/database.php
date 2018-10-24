<?php
// on crée une connexion à la base de donnée
// le try catch permet de débugguer et de remonter les erreurs éventuelles

try {
	$db = new PDO('mysql:host=localhost;dbname=pizzastore;charset=utf8', 'root', '', [
		PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, // Active les erreurs SQL,
		// On récupère tous les résultats en tableau associatif
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	]);
} catch(Exception $e) {
	echo $e->getMessage();
	// Redirection en PHP vers Google avec le message d'erreur concerné
    // header('Location: https://www.google.fr/search?q='.urlencode($e->getMessage());
    echo '<img src="assets/img/homer_sympson.gif">';
}
var_dump($db);