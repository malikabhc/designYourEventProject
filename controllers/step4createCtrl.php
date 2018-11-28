<?php

include_once 'configuration.php';

// Affichage des données de l'évènement
$display = new events();
$displayEventUser = $display->displayEvent();
