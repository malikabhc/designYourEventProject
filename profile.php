<?php
$title = 'Design-your-Event | Mon compte';
include_once 'header.php';
include_once 'class/database.php';
include_once 'controllers/profileCtrl.php';
?>
<div class="container border border-dark teal lighten-1 mb-3">
    <h1 class="text-center font-title mt-2"><?= NAV_PERSONAL_INFO ?></h1>
    <p class="font-weight-bold text-center">Nom : <?= $userProfile->lastname ?></p>
    <p class="font-weight-bold text-center">Prénom : <?= $userProfile->firstname ?></p>
    <p class="font-weight-bold text-center">Date de naissance : <?= $userProfile->birthdate ?></p>
    <p class="font-weight-bold text-center">Code postal : <?= $userProfile->postalCode ?></p>
    <p class="font-weight-bold text-center">Ville : <?= $userProfile->cityName ?></p>
    <p class="font-weight-bold text-center">Adresse e-mail : <?= $userProfile->mail ?></p>
    <a href="updateProfile.php"><input type="button" name="update" id="update" class="form-control mb-2" value="Modifier mes données" /></a>
    <input type="button" name="delete" id="delete" class="form-control mb-2" value="Supprimer mon compte" />
</div>

<?php include_once 'footer.php'; ?>