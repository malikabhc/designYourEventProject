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
    <div class="form-row">
        <div class="col-md-6">
            <a href="updateProfile.php"><input type="submit" name="update" id="update" class="form-control mb-3 font-weight-bold" value="Modifier mes données" /></a>
        </div>
        <div class="col-md-6">
         <!--   <input type="submit" name="delete" id="delete" class="form-control mb-3 red border-danger font-weight-bold text-white" value="Supprimer mon compte" /></a> -->
            <!-- Button trigger modal -->
            <button type="button" class="form-control mb-3 red border-danger font-weight-bold text-white" data-toggle="modal" data-target="#basicExampleModal">Supprimer mon compte</button>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Êtes-vous sûr de vouloir supprimer votre compte ?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <a href="profile.php?delete=1"><input type="button" name="delete" id="delete" class="btn red" data-dismiss="modal" value="Supprimer" /></a>
                    <a href="profile.php"><input type="button" class="btn teal lighten-1" value="Annuler" /></a>
                </div>
            </div>
        </div>
    </div>


</div>
<?php include_once 'footer.php'; ?>
