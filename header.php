<?php
session_start();
include_once 'language/FR_FR.php';
include_once 'controllers/headerCtrl.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
        <!-- Bootstrap core CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
        <!-- Material Design Bootstrap -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.11/css/mdb.min.css" rel="stylesheet" />
        <!-- Fonts Google -->
        <link href="https://fonts.googleapis.com/css?family=Alex+Brush|Abel" rel="stylesheet"> 
        <!-- Icon Fontawesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" />
        <!-- Feuille de style -->
        <link rel="stylesheet" href="assets/css/style.css" />
        <title><?= $title ?></title>
    </head>
    <body>
        <!-- Navbar-brand -->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top teal lighten-1">
            <a class="navbar-brand" href="index.php">Design-your-Event</a>

            <!-- Dropdown -->
            <div class="dropdown">
                <?php if (isset($_SESSION['isConnect'])) { ?>
                    <button class="btn btn-dark dropdown-toggle font-weight-bold" type="button" id="dropdownMenu1" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false"><?= sprintf(NAV_WELCOME, $_SESSION['firstname']) ?> <i class="far fa-grin-hearts"></i>
                    </button>
                    <!--Menu-->
                    <div class="dropdown-menu dropdown-primary">
                        <a class="dropdown-item" href="profile.php"><?= NAV_PERSONAL_INFO ?></a>
                        <a class="dropdown-item" href="<?= $_SERVER['PHP_SELF'] ?>?action=disconnect"><?= NAV_DISCONNECT ?></a>
                    </div>
                <?php } ?>
            </div>

        </nav>
