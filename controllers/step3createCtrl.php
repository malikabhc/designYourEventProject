<?php

include 'configuration.php';

$sponsorName = '';
$sponsorLink = '';

// Initialisation du tableau d'erreur
$formError = array();

if (isset($_POST['submitEventThree'])) {

    if (!empty($_POST['sponsorName'])) {
        $sponsorName = htmlspecialchars(ucfirst(trim($_POST['sponsorName'])));
    }

    if (!empty($_POST['sponsorLink'])) {
        $sponsorLink = htmlspecialchars($_POST['sponsorLink']);
    }

    if (count($formError) == 0) {
        $sponsor = new sponsors();
        $sponsorInEvent = new sponsorsInEvents();

// On hydrate
        $sponsor->sponsorName = $sponsorName;
        $sponsor->sponsorLink = $sponsorLink;
        // On appelle la méthode getInstance de la classe databaseSingleton
        // J'ai fais un singletone pour pouvoir limiter les appels à la base de données et rester sur la même instance
        $database = databaseSingleton::getInstance();
        // On active les erreurs en mode exeption pour que le catch puisse attraper les errreurs
        $database->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        try {
// On démarre la transaction pour simuler la requête
            $database->db->beginTransaction();
// si on appelle la méthode addSponsor de l'objet $sponsor instance de la classe sponsors pour enregistrer les valeurs des attributs 
            if ($sponsor->addSponsor()) {
// On récupère le dernier id inséré dans la database et on l'enregistre dans l'attribut idSocieties de l'objet $user instance de la classe users
                $sponsorInEvent->idSponsors = $database->db->lastInsertId();
// on appelle la méthode userRegister de l'objet $user pour enregistrer la valeur des attributs dans la classe users
                $sponsorInEvent->idEvents = $_GET['id'];
                $sponsorInEvent->addSponsorInEvent();
            }
            // commit valide la transaction en cours, rendant les modifications permanantes
            $database->db->commit();
        } catch (Exception $ex) {
            // Rollback annule la transaction en cours et annule sa modification
            $database->db->rollback();
        }

// Si le $formError ne comporte aucune erreur, on instancie la classe sponsors
        $sponsor = new sponsors();
// On hydrate
        $sponsor->sponsorName = $sponsorName;
        $sponsor->sponsorLink = $sponsorLink;

        // Lorsque l'évènement est enregistré une redirection est effectuée vers l'étape suivante en ajoutant l'id
        header('Location: step4create.php?id=' . $_GET['id']);
    }
}