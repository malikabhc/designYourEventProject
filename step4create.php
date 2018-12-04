<?php
session_start();
include_once 'language/FR_FR.php';
include_once 'controllers/step4createCtrl.php';
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
        <link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet"> 
        <!-- Icon Fontawesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" />
        <!-- Feuille de style -->
        <link rel="stylesheet" href="assets/css/redTheme.css" />
        <title><?= $displayEventUser->eventName ?> | Design-your-Event</title>
    </head>
    <body>
        <div class="container">
            <h1 class="text-center font-weight-bold mt-3 pt-1 pb-3"><?= $displayEventUser->eventName ?></h1>
            <p><?= $displayEventUser->contributorFirstname . ' ' . $displayEventUser->contributorLastname ?></p>
            <p class=""><?= $displayEventUser->eventDescription ?></p>
            <?php if (date_format($dateStart, 'l d F Y') == date_format($dateFinish, 'l d F Y')) { ?>
                <p class="text-center"><?= date_format($dateStart, 'l d F Y') ?> de <?= $displayEventUser->hourStart ?> à <?= $displayEventUser->hourFinish ?></p>
            <?php } else { ?>
                <p class="text-center"><?= date_format($dateStart, 'l d F Y') ?> à <?= $displayEventUser->hourStart ?>
                    <?php if ($displayEventUser->dateFinish !== '1970-01-01' && $displayEventUser->hourFinish !== '00:00') { ?>
                        au <?= date_format($dateFinish, 'l d F Y') ?> à <?= $displayEventUser->hourFinish ?></p>
                <?php }
            }
            ?>
            <p><?= $displayEventUser->address ?></p>
            <?php if ($displayEventUser->sponsorName !== '' && $displayEventUser->sponsorLink !== '') { ?>
                <a href="<?= $displayEventUser->sponsorLink ?>"><?= $displayEventUser->sponsorName ?></a>
                <?php } ?>
            <div class="text-center pt-1 pb-2">
                <?php if ($displayEventUser->facebookLink !== '') { ?>
                    <a href="<?= $displayEventUser->facebookLink ?>"><i class="fab fa-facebook fa-2x"></i></a>
                <?php } ?>
                <?php if ($displayEventUser->twitterLink !== '') { ?>
                    <a href="<?= $displayEventUser->twitterLink ?>"><i class="fab fa-twitter fa-2x ml-5"></i></a>
                <?php } ?>
                <?php if ($displayEventUser->instagramLink !== '') { ?>
                    <a href="<?= $displayEventUser->instagramLink ?>"><i class="fab fa-instagram fa-2x ml-5"></i></a>
                <?php } ?>
                <?php if ($displayEventUser->snapchatLink !== '') { ?>
                    <a href="<?= $displayEventUser->snapchatLink ?>"><i class="fab fa-linkedin fa-2x ml-5"></i></a>
                <?php } ?>
            </div>
        </div>
        <footer>
            <!-- Copyright -->
            <div class="text-center">© <?= YEAR ?>- <?= EVENT_CREATED_BY ?><span class="font-title size">Design-your-Event</span></div>
            <!-- JQuery -->
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <!-- Lien fichier script -->
            <script src="assets/js/script.js"></script>
            <!-- Bootstrap tooltips -->
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
            <!-- Bootstrap core JavaScript -->
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
            <!-- MDB core JavaScript -->
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.11/js/mdb.min.js"></script>
        </footer>
    </body>
</html>