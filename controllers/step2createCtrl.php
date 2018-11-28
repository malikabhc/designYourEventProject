<?php

include 'configuration.php';

// Initialisation du tableau d'erreur
$formError = array();

if (isset($_POST['submitEventTwo'])) {

    if (!empty($_POST['contributorLastname'])) {
        $contributorLastname = htmlspecialchars(ucfirst(trim($_POST['contributorLastname'])));
// Sinon on indique que le remplissage du champ est obligatoire
    } else {
        $formError['contributorLastname'] = REQUIRE_CONTRIBUTOR_LASTNAME;
    }

    if (!empty($_POST['contributorFirstname'])) {
        $contributorFirstname = htmlspecialchars(ucfirst(trim($_POST['contributorFirstname'])));
// Sinon on indique que le remplissage du champ est obligatoire
    } else {
        $formError['contributorFirstname'] = REQUIRE_CONTRIBUTOR_FIRSTNAME;
    }

    if (count($formError) == 0) {
        $contributor = new contributors();
        $contributorInEvent = new contributorsInEvents();

// On hydrate
        $contributor->contributorLastname = $contributorLastname;
        $contributor->contributorFirstname = $contributorFirstname;
        // On appelle la méthode getInstance de la classe dataBaseSingleton
        // J'ai fais un singletone pour pouvoir limiter les appels à la base de données et rester sur la même instance
        $database = databaseSingleton::getInstance();
        // On active les erreurs en mode exeption pour que le catch puisse attraper les errreurs
        $database->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        try {
// On démarre la transaction pour simuler la requête
            $database->db->beginTransaction();
// si on appelle la méthode societyRegister de l'objet $societ instance de la classe societies pour enregistrer les valeurs des attributs 
            if ($contributor->addContributor()) {
// On récupère le dernier id inséré dans la database et on l'enregistre dans l'attribut idSocieties de l'objet $user instance de la classe users
                $contributorInEvent->idContributors = $database->db->lastInsertId();
// on appelle la méthode userRegister de l'objet $user pour enregistrer la valeur des attributs dans la classe users
                $contributorInEvent->idEvents = $_GET['id'];
                $contributorInEvent->addContributorInEvent();
            }
            // commit valide la transaction en cours, rendant les modifications permanantes
            $database->db->commit();
        } catch (Exception $ex) {
            // Rollback annule la transaction en cours et annule sa modification
            $database->db->rollback();
        }

// Si le $formError ne comporte aucune erreur, on instancie la classe contributors
        $contributor = new contributors();
// On hydrate
        $contributor->contributorLastname = $contributorLastname;
        $contributor->contributorFirstname = $contributorFirstname;

        // Lorsque l'évènement est enregistré une redirection est effectuée vers l'étape suivante en ajoutant l'id
        header('Location: step3create.php?id=' . $_GET['id']);
    }
}