<?php

session_start();//On veut utiliser les sessions sur la page

var_dump($_SESSION); // le tableau est vide la 1ere fois

$countries = ['fr', 'it'];

// j'ajoute les pays dans la session
$_SESSION['countries'] = $countries;
unset($_SESSION['countries']); //Permet de supprimer un éléments d'une session
// session_destroy(); Attention, supprime toute la session

var_dump($_SESSION); // la session doit contenir tous les pays

// pour les cookies (session qui dure indéfiniment 
// et sur la machine cliente)
var_dump($_COOKIE);
// $_COOKIE['cookie"] = 'test';
setcookie('cookie', 'test', time()+60*60*24*365);//le cookie est sur la machine, mais sera stocké de façon temporaire
// ici le 3e paramètre est le timestamp qui se finira dans un an

// détruire un cookie
setcookie('cookie', null, time()-60*60*24*365); //ici on passe le timestamp à 0 (par rapport au timestamp inséré dans le cookie)