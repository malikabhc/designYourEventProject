<?php
$title = 'Design-your-Event | Mon compte';
include_once 'header.php';
include_once 'controllers/updateProfileCtrl.php';
?>
<div class="container border border-dark teal lighten-1 mb-3">
    <h1 class="text-center font-title mt-2"><?= NAV_PERSONAL_INFO ?></h1>
    <!-- Formulaire de modification -->
    <form action="#" method="POST" class="form-group mt-2 mb-3" id="update">
        <label for="lastname" class="font-weight-bold"><?= LASTNAME ?></label>
        <input type="text" name="lastname" id="lastname" class="form-control mb-2" placeholder="<?= LASTNAME ?>" value="<?= $userProfile->lastname ?>" />
        <p class="text-danger font-weight-bold"><?= isset($formError['lastname']) ? $formError['lastname'] : ''; ?></p>

        <label for="firstname" class="font-weight-bold"><?= FIRSTNAME ?></label>
        <input type="text" name="firstname" id="firstname" class="form-control mb-2" placeholder="<?= FIRSTNAME ?>" value="<?= $userProfile->firstname ?>" />
        <p class="text-danger font-weight-bold"><?= isset($formError['firstname']) ? $formError['firstname'] : ''; ?></p>

        <label for="birthdate" class="font-weight-bold"><?= BIRTHDATE ?></label>
        <input type="date" name="birthdate" id="birthdate" class="form-control mb-2" placeholder="<?= BIRTHDATE ?>" value="<?= $userProfile->birthdate ?>" />
        <p class="text-danger font-weight-bold"><?= isset($formError['birthdate']) ? $formError['birthdate'] : ''; ?></p>

        <label for="postalCode" class="font-weight-bold"><?= POSTAL_CODE ?></label>
        <input type="text" name="postalCode" id="postalCode" class="form-control mb-2" placeholder="<?= POSTAL_CODE ?>" value="<?= $userProfile->postalCode ?>" />
        <p class="text-danger font-weight-bold"><?= isset($formError['postalCode']) ? $formError['postalCode'] : ''; ?></p>

        <label for="city" class="font-weight-bold"><?= CITY ?></label>
        <select name="city" id="city" class="form-control">
            <option selected><?= $userProfile->cityName ?></option>
        </select>
        <p class="text-danger font-weight-bold"><?= isset($formError['city']) ? $formError['city'] : ''; ?></p>

        <label for="mailUpdate" class="font-weight-bold"><?= MAIL ?></label>
        <input type="mail" name="mailUpdate" id="mailUpdate" class="form-control mb-2" placeholder="<?= MAIL ?>" value="<?= $userProfile->mail ?>" />
        <p class="text-danger font-weight-bold"><?= isset($formError['mailUpdate']) ? $formError['mailUpdate'] : ''; ?></p>

        <input type="submit" name="submitUpdate" id="submitUpdate" class="form-control mt-2 font-weight-bold" value="<?= UPDATE_SUBMIT ?>" />
    </form>
</div>
<?php include_once 'footer.php'; ?>