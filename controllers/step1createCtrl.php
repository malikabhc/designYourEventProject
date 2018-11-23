<?php

include 'configuration.php';

// Initialisation des valeurs par défaut
$hourFinish = '00:00';
$dateFinish = '1970-01-01';
$facebookLink = '';
$twitterLink = '';
$instagramLink = '';
$snapchatLink = '';

// Initialisation du tableau d'erreur
$formError = array();

// Si $_POST['submit'] existe on instancie l'objet user
if (isset($_POST['submitEventOne'])) {
    // Si $_POST['eventName'] n'est pas vide on sécurise avec le htmlspecialchars et on stocke dans la variable lastname
    if (!empty($_POST['eventCategory'])) {
        $eventCategory = htmlspecialchars($_POST['eventCategory']);
// Sinon on indique que le remplissage du champ est obligatoire
    } else {
        $formError['eventCategory'] = REQUIRE_EVENT_NAME;
    }

    if (!empty($_POST['eventType'])) {
        $eventType = htmlspecialchars($_POST['eventType']);
    } else {
        $formError['eventType'] = REQUIRE_EVENT_NAME;
    }

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
// Si le $formError ne comporte aucune erreur, on instancie la classe events
        $event = new events();
// On hydrate
        $event->eventName = $eventName;
        $event->address = $address;
        $event->dateHourStart = $dateStart . ' ' . $hourStart;
        $event->dateHourFinish = $dateFinish . ' ' . $hourFinish;
        $event->eventDescription = $eventDescription;
        $event->facebookLink = $facebookLink;
        $event->twitterLink = $twitterLink;
        $event->instagramLink = $instagramLink;
        $event->snapchatLink = $snapchatLink;

        $event->idUsers = $_SESSION['id'];
        $event->idEventsType = $_POST['eventType'];
        $event->idEventsCategory = $_POST['eventCategory'];

        $addedEventId = $event->eventRegister();
        
        // Lorsque la l'évènement est enregistré une redirection est effectuée vers l'étape suivante en ajoutant l'id
        header('Location: step2create.php?id=' . $addedEventId);
    }
}

// Instanciation de l'objet $eventCategory afin d'afficher les données de la table eventCategory dans le select
$eventCategory = new eventCategory();
$eventCategoryList = $eventCategory->getEventCategoryList();

// Instanciation de l'objet $eventTypes afin d'afficher les données de la table eventType dans le select
$eventTypes = new eventType();
$eventTypeList = $eventTypes->getEventTypeList();