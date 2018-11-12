<?php
// Ouverture de la session
session_start();
        
// Définition des informations de connexion à la base de données
define('HOST', '127.0.0.1');
define('LOGIN', 'malikabhc');
define('PASSWORD', '11bdd27');
define('DBNAME', 'designYourEvent');

// Ajout des fichiers nécessaire au bon fonctionnement du site
include_once 'class/database.php';
include_once 'models/users.php';
include_once 'models/city.php';