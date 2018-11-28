<?php

// Appel de l'AJAX
if (isset($_POST['postalCodeSearch'])) {
    include '../configuration.php';
    $city = new city();
    $city->postalCode = htmlspecialchars($_POST['postalCodeSearch']);
    // json_encode permet de faire l'affichage
    echo json_encode($city->getCityByPostalCode());
    
} elseif (isset($_POST['mailVerify'])) {
    include '../configuration.php';
    $checkUser = new users();
    $checkUser->mail = htmlspecialchars($_POST['mailVerify']);
    echo $checkUser->checkIfUserExist();
} else {

    include 'configuration.php';

// Initialisation du tableau d'erreur
    $formError = array();
// Déclaration de la regex pour les noms 
    $regexName = '/^[a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ\- ]+$/';
// Déclaration de la regex pour les noms et les chiffres
    $regexNameAndNumber = '/^[0-9-a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ\- ]+$/';
// Déclaration de la regex pour le code postal avec une limite de 5 chiffres
    $regexPostalCode = '/^[0-9]{5}$/';


// Si $_POST['submit'] existe on instancie l'objet user
    if (isset($_POST['submitRegister'])) {
// Si $_POST['lastname'] n'est pas vide on sécurise avec le htmlspecialchars et on stocke dans la variable lastname
        if (!empty($_POST['lastname'])) {
            $lastname = htmlspecialchars(ucfirst(trim($_POST['lastname'])));
            // Si les données entrées dans le champ ne correspondent pas à la regex on affiche un message d'erreur
            if (!preg_match($regexName, $lastname)) {
                $formError['lastname'] = ERROR_LASTNAME;
            }
            // Sinon on indique que le remplissage du champ est obligatoire
        } else {
            $formError['lastname'] = REQUIRE_LASTNAME;
        }

        if (!empty($_POST['firstname'])) {
            $firstname = htmlspecialchars(ucfirst(trim($_POST['firstname'])));
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
            // On met une regex avec des chiffres et des lettres car on récupère l'id de la ville
            if (!preg_match($regexNameAndNumber, $city)) {
                $formError['city'] = ERROR_CITY;
            }
        }

        if (!empty($_POST['mailRegister'])) {
            $mailRegister = htmlspecialchars(strtolower($_POST['mailRegister']));
            // filter_var permet de filtrer la variable $mailRegister afin qu'elle corresponde aux normes email classique
            if (!filter_var($mailRegister, FILTER_VALIDATE_EMAIL)) {
                $formError['mailRegister'] = ERROR_MAIL;
            }
        } else {
            $formError['mailRegister'] = REQUIRE_MAIL;
        }

        if (!empty($_POST['passwordRegister']) && !empty($_POST['passwordVerify']) && $_POST['passwordRegister'] == $_POST['passwordVerify']) {
            // On utilise password_hash pour créer une clé de hachage et que le mot de passe ne soit connu que de l'utilisateur 
            $passwordRegister = password_hash($_POST['passwordRegister'], PASSWORD_DEFAULT);
        } elseif ($_POST['passwordRegister'] != $_POST['passwordVerify']) {
            $formError['passwordVerify'] = ERROR_PASSWORD_VERIFY;
        } else {
            $formError['passwordRegister'] = REQUIRE_PASSWORD;
            $formError['passwordVerify'] = REQUIRE_PASSWORD_VERIFY;
        }


        if (count($formError) == 0) {
            // Si $_POST['submitRegister'] existe et que le $formError ne comporte aucune erreur, on instancie la classe users
            $user = new users();
            // On hydrate
            $user->lastname = $lastname;
            $user->firstname = $firstname;
            $user->birthdate = $birthdate;
            $user->idCity = $city;
            $user->mail = $mailRegister;
            $user->password = $passwordRegister;
            $user->postalCode = $postalCode;
            $userExist = $user->checkIfUserExist();
            if ($userExist == 0) {
                // On appelle la méthode userRegister
            }
            $user->userRegister();
        }
    }
}

// CONNEXION
$mailLogin = '';
$message = '';

if (isset($_POST['submitLogin'])) {
    if (!empty($_POST['mailLogin'])) {
        $mailLogin = htmlspecialchars(strtolower($_POST['mailLogin']));
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
        // S'il n'y a pas d'erreur dans le tableau $formError on instancie l'objet de la classe users
        $user = new users();
        $user->mail = $mailLogin;
        // On appelle la méthode userConnection
        if ($user->userConnection()) {
            // On vérifie avec la fonction password_verify que le hachage du mdp dans la base de données correspond au mdp entrer dans l'input
            if (password_verify($passwordLogin, $user->password)) {
                // La connexion se fait, on remplit la session avec les attributs de l'objet issus de l'hydratation
                $_SESSION['id'] = $user->id;
                $_SESSION['mailLogin'] = $user->mail;
                // On récupère l'attribut firstname pour afficher un message de bienvenue personnalisé
                $_SESSION['firstname'] = $user->firstname;
                $_SESSION['isConnect'] = true;
                // Permet de recharger la page après connexion
                header('Location: profile.php');
            } else {
                // Si la connexion échoue on affiche un message d'erreur
                $message = USER_CONNECTION_ERROR;
            }
        }
    }
}