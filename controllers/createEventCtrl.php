<?php

include 'configuration.php';

// Initialisation du tableau d'erreur
$formError = array();

//$hourStart = '00:00'; 
//$hourFinish = '00:00'; 
//$dateStart = '1900-01-01';
//$dateFinish = '1900-01-01';

// Si $_POST['submit'] existe on instancie l'objet user
if (isset($_POST['submitEvent'])) {
// Si $_POST['lastname'] n'est pas vide on sécurise avec le htmlspecialchars et on stocke dans la variable lastname
    if (!empty($_POST['eventName'])) {
        $eventName = htmlspecialchars($_POST['eventName']);
// Sinon on indique que le remplissage du champ est obligatoire
    } else {
        $formError['eventName'] = REQUIRE_EVENT_NAME;
    }

    if (!empty($_POST['address'])) {
        $address = htmlspecialchars($_POST['address']);
    } else {
        $formError['address'] = REQUIRE_ADDRESS;
    }

    if (!empty($_POST['dateStart'])) {
        $dateStart = htmlspecialchars($_POST['dateStart']);
    } else {
        $formError['dateStart'] = REQUIRE_DATE_START;
    }

    if (!empty($_POST['hourStart'])) {
        $hourStart = htmlspecialchars($_POST['hourStart']);
    } else {
        $formError['hourStart'] = REQUIRE_HOUR_START;
    }

    if (!empty($_POST['dateFinish'])) {
        $dateFinish = htmlspecialchars($_POST['dateFinish']);
    }

    if (!empty($_POST['hourFinish'])) {
        $hourFinish = htmlspecialchars($_POST['hourFinish']);
    }

    if (!empty($_POST['eventDescription'])) {
        $eventDescription = htmlspecialchars($_POST['eventDescription']);
    } else {
        $formError['eventDescription'] = REQUIRE_EVENT_DESCRIPTION;
    }

    if (!empty($_POST['facebookLink'])) {
        $facebookLink = htmlspecialchars($_POST['facebookLink']);
    }

    if (!empty($_POST['twitterLink'])) {
        $twitterLink = htmlspecialchars($_POST['twitterLink']);
    }

    if (!empty($_POST['instagramLink'])) {
        $instagramLink = htmlspecialchars($_POST['instagramLink']);
    }

    if (!empty($_POST['snapchatLink'])) {
        $snapchatLink = htmlspecialchars($_POST['snapchatLink']);
    }

    if (count($formError) == 0) {
// Si $_POST['submitRegister'] existe et que le $formError ne comporte aucune erreur, on instancie la classe users
        $event = new events();
// On hydrate
        $event->eventName = $eventName;
        $event->address = $address;
        $event->dateHourStart = $dateStart . '' . $hourStart;
        $event->dateHourFinish = $dateFinish . '' . $hourFinish;
        $event->eventDescription = $eventDescription;
        $event->facebookLink = $facebookLink;
        $event->twitterLink = $twitterLink;
        $event->instagramLink = $instagramLink;
        $event->snapchatLink = $snapchatLink;

        $event->eventRegister();
    }
}