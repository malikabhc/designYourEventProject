<?php

// Initialisation du tableau d'erreur
$formError = array();
// Déclaration de la regex pour les noms 
$regexText = '/^[a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ\- ]+$/';

if (isset($_POST['contactFormSubmit'])) {
    if (!empty($_POST['lastname'])) {
        $lastname = htmlspecialchars($_POST['lastname']);
        // Si les données entrées dans le champ ne correspondent pas à la regex on affiche un message d'erreur
        if (!preg_match($regexText, $lastname)) {
            $formError['lastname'] = ERROR_LASTNAME;
        }
        // Sinon on indique que le remplissage du champ est obligatoire
    } else {
        $formError['lastname'] = REQUIRE_LASTNAME;
    }

    if (!empty($_POST['firstname'])) {
        $firstname = htmlspecialchars($_POST['firstname']);
        if (!preg_match($regexText, $firstname)) {
            $formError['firstname'] = ERROR_FIRSTNAME;
        }
    } else {
        $formError['firstname'] = REQUIRE_FIRSTNAME;
    }

    if (!empty($_POST['mail'])) {
        $mailFrom = htmlspecialchars($_POST['mail']);
        // filter_var permet de filtrer la variable $mail afin qu'elle corresponde aux normes email classique
        if (!filter_var($mailFrom, FILTER_VALIDATE_EMAIL)) {
            $formError['mail'] = ERROR_MAIL;
        }
    } else {
        $formError['mail'] = REQUIRE_MAIL;
    }

    if (!empty($_POST['subject'])) {
        $subject = htmlspecialchars($_POST['subject']);
    }

    if (!empty($_POST['message'])) {
        $message = htmlspecialchars($_POST['message']);
    } else {
        $formError['message'] = REQUIRE_MESSAGE;
    }
    
    if (count($formError) == 0) {
        $mailTo = 'malikaa.b@hotmail.fr';
        $headers = 'De : ' . $mailFrom;
        $txt = 'Vous avez reçu un e-mail de ' . $firstname . ' ' . $lastname . ' : ' . $message;

        mail($mailTo, $subject, $txt, $headers);
        // Ajouter une condition pour afficher la modale
        header('Location: index.php?mailsend');
    }
}