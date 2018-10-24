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
	header('Location: https://www.google.fr/search?q='.$e->getMessage());
}

// 1 - Ecrire la requête qui permet de récupérer la pizza avec l'id 3

$query = $db->query('SELECT * FROM pizza WHERE id = 3');
$pizza=$query->fetch();
var_dump($pizza);
echo $pizza['id'] .' : ' .$pizza['name'];

// la même sans afficher l'id en résultat
$query = $db->query('SELECT name FROM pizza WHERE id = 3');
$pizza=$query->fetch();
var_dump($pizza);
echo $pizza['name'];


// 2 - Récupérer l'id dynamiquement à partir de l'url
//  Exemple : si je saisis pizza.php?id=7, je dois récupérer la pizza avec l'id 7

$id = $_GET['id']; //ici on récupère l'id dans l'url à partir de la chaine 'id'.
// ensuite on injecte cette id dans le code suivant

$query = $db->query('SELECT * FROM pizza WHERE id ='.$id);
$pizza = $query->fetch();
var_dump($pizza);


// on vérifie que la pizza existe
if($pizza) {
    echo $pizza['id'] .' ; ' .$pizza['name'];}
    else {
        echo "la pizza n'existe pas";
    }





