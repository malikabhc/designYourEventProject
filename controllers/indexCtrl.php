<?php

//Appel de l'AJAX
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
//Déclaration de la regex pour le code postal avec une limite de 5 chiffres
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
            $postalCode = htmlspecialchars($_POST['postalCode']);
            if (!preg_match($regexPostalCode, $_POST['postalCode'])) {
                $formError['postalCode'] = ERROR_POSTAL_CODE;
            }
        } else {
            $formError['postalCode'] = REQUIRE_POSTAL_CODE;
        }

        if (!empty($_POST['city'])) {
            $city = htmlspecialchars($_POST['city']);
            // On met une regex avec lettres et chiffres car on récupère l'id de la ville
            if (!preg_match($regexNameAndNumber, $city)) {
                $formError['city'] = ERROR_CITY;
            }
        }

        if (!empty($_POST['mailRegister'])) {
            $mailRegister = htmlspecialchars($_POST['mailRegister']);
            // filter_var
            if (!filter_var($mailRegister, FILTER_VALIDATE_EMAIL)) {
                $formError['mailRegister'] = ERROR_MAIL;
            }
        } else {
            $formError['mailRegister'] = REQUIRE_MAIL;
        }

        if (!empty($_POST['passwordRegister']) && !empty($_POST['passwordVerify']) && $_POST['passwordRegister'] == $_POST['passwordVerify']) {
            $passwordRegister = password_hash($_POST['passwordRegister'], PASSWORD_DEFAULT);
        } elseif ($_POST['passwordRegister'] != $_POST['passwordVerify']) {
            $formError['passwordVerify'] = ERROR_PASSWORD_VERIFY;
        } else {
            $formError['passwordRegister'] = REQUIRE_PASSWORD;
            $formError['passwordVerify'] = REQUIRE_PASSWORD_VERIFY;
        }

        if (isset($_POST['submitRegister']) && count($formError) == 0) {
            $user = new users();
            $user->lastname = $lastname;
            $user->firstname = $firstname;
            $user->birthdate = $birthdate;
            $user->idCity = $city;
            $user->mailRegister = $mailRegister;
            $user->password = $password;
            $user->postalCode = $postalCode;
            $user->userRegister();
        }
    }
}

// CONNEXION
$message = '';

if (isset($_POST['submitLogin'])) {
        if (!empty($_POST['mailLogin'])) {
            $mailLogin = htmlspecialchars($_POST['mailLogin']);
            // filter_var
            if (!filter_var($mailLogin, FILTER_VALIDATE_EMAIL)) {
                $formError['mailLogin'] = ERROR_MAIL;
            }
        } else {
            $formError['mailLogin'] = REQUIRE_MAIL;
        }
    if (!empty($_POST['passwordLogin'])) {
        $passwordLogin = htmlspecialchars($_POST['passwordLogin']);
    } else {
        $formError['passwordLogin'] = ERROR_PASSWORD;
    }
    if (count($formError) == 0) {
        $user = new users();
        $user->mailLogin = $mailLogin;
        if ($user->userConnection()) {
            if (password_verify($passwordLogin, $user->passwordLogin)) {
                //la connexion se fait
                $message = USER_CONNECTION_SUCCESS;
                //On rempli la session avec les attributs de l'objet issus de l'hydratation
                $_SESSION['id'] = $user->id;
                $_SESSION['mailLogin'] = $user->mailLogin;
                $_SESSION['isConnect'] = true;
            } else {
                //la connexion échoue
                $message = USER_CONNECTION_ERROR;
            }
        }
    }
}