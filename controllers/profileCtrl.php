<?php

include_once 'configuration.php';

// Affichage des données de l'utilisateur
if (!empty($_SESSION['id'])) {
    $profile = new users();
    $profile->id = $_SESSION['id'];
    $userProfile = $profile->displayUserInformations();
}

// Suppression des données de l'utilisateur
if (isset($_GET['delete'])) {
    $removeUser = new users();
    $removeUser->id = $_SESSION['id'];
    if ($removeUser->removeUser()) {
        session_unset();
        session_destroy();
        header('Location: index.php');
        exit;
    }
}