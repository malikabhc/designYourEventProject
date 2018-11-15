<?php

include_once 'configuration.php';

if (!empty($_GET['id'])) {
    $profile = new users();
    $profile->id = $_GET['id'];
    $userProfile = $profile->displayUserInformations();
}