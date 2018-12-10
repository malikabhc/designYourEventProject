<?php

include_once 'configuration.php';

// Affichage des données de l'évènement
$display = new events();
$display->id = $_GET['id'];
$displayEventUser = $display->displayEvent();


//Formatage de la date de début au format français
$dateOne = $displayEventUser->dateStart;
$dateStart = date_create($dateOne);
//Formatage de la date de fin au format français
$dateTwo = $displayEventUser->dateFinish;
$dateFinish = date_create($dateTwo);