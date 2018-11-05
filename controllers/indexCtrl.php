<?php
include_once 'configuration.php';

// Initialisation du tableau d'erreur
$formError = array();

// Déclaration de la regex pour les noms 
$regexName = '/^[a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ\-]+$/';
//Déclaration de la regex pour les chiffres
$regexPostalCode = '/^[0-9]{5}$/';


// Si $_POST['submit'] existe on instancie l'objet user
if (isset($_POST['submitRegister'])) {
// Si $_POST['lastname'] n'est pas vide on sécurise avec le htmlspecialchars et on stocke dans la variable lastname
    if (!empty($_POST['lastname'])) {
        $lastname = htmlspecialchars($_POST['lastname']);
        // Si les données entrées dans le champ ne correspondent pas à la regex on affiche un message d'erreur
        if (!preg_match($regexName, $lastname)) {
            $formError['lastname'] = ERROR_LASTNAME;
        }
        // Sinon on indique que le remplissage du champ est obligatoire
    } else {
        $formError['lastname'] = REQUIRE_LASTNAME;       
    }

    if (!empty($_POST['firstname'])) {
        $firstname = htmlspecialchars($_POST['firstname']);
        if (!preg_match($regexName, $firstname)) {
            $formError['firstname'] = ERROR_FIRSTNAME;
        }
    } else {
        $formError['firstname'] = REQUIRE_FIRSTNAME;       
    }

    if (!empty($_POST['birthdate'])) {
        $birthdate = htmlspecialchars($_POST['birthdate']);
    } else {
        $formError['birthdate'] = REQUIRE_BIRTHDATE;
    }
    
    if (!empty($_POST['postalCode'])) {
        $postalCode = htmlspecialchars($_POST['firstname']);
        if (!preg_match($regexPostalCode, $_POST['postalCode'])) {
            $formError['postalCode'] = ERROR_POSTAL_CODE;
        }
    } else {
        $formError['postalCode'] = REQUIRE_POSTAL_CODE;       
    }

    if (!empty($_POST['cityName'])) {
        $cityName = htmlspecialchars($_POST['cityName']);
        if (!preg_match($regexName, $cityName)) {
            $formError['cityName'] = ERROR_CITY;
        }
    } else {
        $formError['cityName'] = REQUIRE_CITY;       
    }
    
    if (!empty($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $email = htmlspecialchars($_POST['email']);
    } else {
        $formError['email'] = ERROR_EMAIL;
    } 

    if (!empty($_POST['password']) && !empty($_POST['passwordVerify']) && $_POST['password'] == $_POST['passwordVerify']) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    } else {
        $formError['password'] = ERROR_PASSWORD;
        $formError['passwordVerify'] = ERROR_PASSWORD_VERIFY;
//    } if(empty($_POST['password']) && empty($_POST['passwordVerify'])){
//        $formError['password'] = REQUIRE_PASSWORD;
//        $formError['passwordVerify'] = REQUIRE_PASSWORD_VERIFY;
   }

    if (isset($_POST['submitRegister']) && count($formError) == 0) {
        $user = new users();
        $user->lastname = $lastname;
        $user->firstname = $firstname;
        $user->birthdate = $birthdate;
        $user->email = $email;
        $user->password = $password;
        $user->userRegister();
        $city = new city();
        $city->cityName = $cityName;
        $city->postalCode = $postalCode;
    }
}