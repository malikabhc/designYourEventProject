<?php

// Initialisation du tableau d'erreur
$formError = array();
// Déclaration de la regex pour les noms 
$regexText = '/^[a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ\- ]+$/';
// Déclaration de la regex pour les noms et les chiffres
$regexNameAndNumber = '/^[0-9-a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ\- ]+$/';

if (isset($_POST['contactFormSubmit'])) {
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

    if (!empty($_POST['mail'])) {
        $mail = htmlspecialchars($_POST['mail']);
        // filter_var permet de filtrer la variable $mail afin qu'elle corresponde aux normes email classique
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
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
        $formError['lastname'] = REQUIRE_MESSAGE;
    }

    $mailTo = 'malikaa.b@hotmail.fr';
    $headers = 'De : ' . $mailFrom;
    $txt = 'Vous avez reçu un e-mail de ' . $firstname . ' ' . $lastname . ' : ' . $message;

    mail($mailTo, $subject, $txt, $headers);
    header('Location: contactForm.php?mailsend');

    $send = 'Votre message a bien été envoyé';
} else {
    $send = 'Erreur';
}
    