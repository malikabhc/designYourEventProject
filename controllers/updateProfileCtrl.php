<?php

// Appel de l'AJAX
if (isset($_POST['postalCodeSearch'])) {
    include '../configuration.php';
    $city = new city();
    $city->postalCode = $_POST['postalCodeSearch'];
    echo json_encode($city->getCityByPostalCode());
} else {

    include_once 'configuration.php';

// Initialisation du tableau d'erreur
    $formError = array();
// Déclaration de la regex pour les noms 
    $regexName = '/^[a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ\- ]+$/';
// Déclaration de la regex pour les noms et les chiffres
    $regexNameAndNumber = '/^[0-9-a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ\- ]+$/';
// Déclaration de la regex pour le code postal avec une limite de 5 chiffres
    $regexPostalCode = '/^[0-9]{5}$/';


// Si $_POST['submit'] existe on instancie l'objet user
    if (isset($_POST['submitUpdate'])) {
// Si $_POST['lastname'] n'est pas vide on sécurise avec le htmlspecialchars et on stocke dans la variable lastname
        if (!empty($_POST['lastname'])) {
            $profile->lastname = htmlspecialchars(ucfirst(trim($_POST['lastname'])));
            // Si les données entrées dans le champ ne correspondent pas à la regex on affiche un message d'erreur
            if (!preg_match($regexName, $_POST['lastname'])) {
                $formError['lastname'] = ERROR_LASTNAME;
            }
            // Sinon on indique que le remplissage du champ est obligatoire
        } else {
            $formError['lastname'] = REQUIRE_LASTNAME;
        }

        if (!empty($_POST['firstname'])) {
            $profile->firstname = htmlspecialchars(ucfirst(trim($_POST['firstname'])));
            if (!preg_match($regexName, $_POST['firstname'])) {
                $formError['firstname'] = ERROR_FIRSTNAME;
            }
        } else {
            $formError['firstname'] = REQUIRE_FIRSTNAME;
        }

        if (!empty($_POST['birthdate'])) {
            $profile->birthdate = htmlspecialchars($_POST['birthdate']);
        } else {
            $formError['birthdate'] = REQUIRE_BIRTHDATE;
        }

        if (!empty($_POST['postalCode'])) {
            $profile->postalCode = htmlspecialchars($_POST['postalCode']);
            if (!preg_match($regexPostalCode, $_POST['postalCode'])) {
                $formError['postalCode'] = ERROR_POSTAL_CODE;
            }
        } else {
            $formError['postalCode'] = REQUIRE_POSTAL_CODE;
        }

        if (!empty($_POST['city'])) {
            $profile->idCity = htmlspecialchars($_POST['city']);
            // On met une regex avec des chiffres et des lettres car on récupère l'id de la ville
            if (!preg_match($regexNameAndNumber, $_POST['city'])) {
                $formError['city'] = ERROR_CITY;
            }
        }

        if (!empty($_POST['mailUpdate'])) {
            $profile->mail = htmlspecialchars(strtolower($_POST['mailUpdate']));
            // filter_var permet de filtrer la variable $mailUpdate afin qu'elle corresponde aux normes email classique
            if (!filter_var($_POST['mailUpdate'], FILTER_VALIDATE_EMAIL)) {
                $formError['mailUpdate'] = ERROR_MAIL;
            }
        } else {
            $formError['mailUpdate'] = REQUIRE_MAIL;
        }


        if (count($formError) == 0) {
            $profile->id = $_SESSION['id'];
            $profile->updateUserInformations();
            header('Location: profile.php');
        } else {
            $formError['submitUpdate'] = 'ERREUR';
        }
    }
}

// On appelle la méthode displayUserInformations pour afficher les données de l'utilisateur
$profileUser = $profile->displayUserInformations();
