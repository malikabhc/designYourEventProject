<?php
$title = 'Design-your-Event | Mon compte';
include_once 'header.php';
include_once 'class/database.php';
include_once 'controllers/profileCtrl.php';
?>
<div class="container border border-dark teal lighten-1 mb-3">
    <h1 class="text-center font-title mt-2"><?= NAV_PERSONAL_INFO ?></h1>
    <p class="font-weight-bold text-center"><?= LASTNAME ?> :  <?= $userProfile->lastname ?></p>
    <p class="font-weight-bold text-center"><?= FIRSTNAME ?> : <?= $userProfile->firstname ?></p>
    <p class="font-weight-bold text-center"><?= BIRTHDATE ?> : <?= date_format($date, 'd/m/Y') ?></p>
    <p class="font-weight-bold text-center"><?= POSTAL_CODE ?> : <?= $userProfile->postalCode ?></p>
    <p class="font-weight-bold text-center"><?= CITY ?> : <?= $userProfile->cityName ?></p>
    <p class="font-weight-bold text-center"><?= MAIL ?> : <?= $userProfile->mail ?></p>
    <div class="form-row">
        <div class="col-md-6">
            <a href="updateProfile.php"><input type="submit" name="update" id="update" class="form-control mb-3 font-weight-bold" value="<?= EDIT_PROFILE ?>" /></a>
        </div>
        <div class="col-md-6">
            <!-- Button trigger modal -->
            <button type="button" class="form-control mb-3 red border-danger font-weight-bold text-white" data-toggle="modal" data-target="#basicExampleModal"><?= DELETE_ACCOUNT ?></button>
        </div>
        <div class="col-md-12">
            <a href="step1create.php"><input type="submit" name="create" id="create" class="form-control mb-3 font-weight-bold" value="<?= NAV_CREATE ?>" /></a>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?= DELETE_ACCOUNT_CONFIRMATION ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <a href="profile.php?delete=1"><input type="button" name="delete" id="delete" class="btn red" data-dismiss="modal" value="<?= DELETE ?>" /></a>
                    <a href="profile.php"><input type="button" class="btn teal lighten-1" value="<?= CANCEL ?>" /></a>
                </div>
            </div>
        </div>
    </div>

</div>
<?php include_once 'footer.php'; ?>
