<?php
$title = 'Design-your-Event | Mon compte';
include_once 'header.php';
?>
<div class="container border border-dark teal lighten-1 mb-3">
    <h1 class="text-center font-title mt-2"><?= NAV_PERSONAL_INFO ?></h1>
    <!-- Formulaire d'inscription -->
    <form action="#" method="POST" class="form-group mt-2 mb-3" id="update">
        <label for="lastname" class="font-weight-bold"><?= REGISTER_LASTNAME ?></label>
        <input type="text" name="lastname" id="lastname" class="form-control mb-2" placeholder="<?= REGISTER_LASTNAME ?>" value="<?= isset($lastname) ? $lastname : '' ?>" />
        <p class="text-danger font-weight-bold"><?= isset($formError['lastname']) ? $formError['lastname'] : ''; ?></p>

        <label for="firstname" class="font-weight-bold"><?= REGISTER_FIRSTNAME ?></label>
        <input type="text" name="firstname" id="firstname" class="form-control mb-2" placeholder="<?= REGISTER_FIRSTNAME ?>" value="<?= isset($firstname) ? $firstname : '' ?>" />
        <p class="text-danger font-weight-bold"><?= isset($formError['firstname']) ? $formError['firstname'] : ''; ?></p>

        <label for="birthdate" class="font-weight-bold"><?= REGISTER_BIRTHDATE ?></label>
        <input type="date" name="birthdate" id="birthdate" class="form-control mb-2" placeholder="<?= REGISTER_BIRTHDATE ?>" value="<?= isset($birthdate) ? $birthdate : '' ?>" />
        <p class="text-danger font-weight-bold"><?= isset($formError['birthdate']) ? $formError['birthdate'] : ''; ?></p>

        <label for="postalCode" class="font-weight-bold"><?= REGISTER_POSTAL_CODE ?></label>
        <input type="text" name="postalCode" id="postalCode" class="form-control mb-2" placeholder="<?= REGISTER_POSTAL_CODE ?>" value="<?= isset($postalCode) ? $postalCode : '' ?>" />
        <p class="text-danger font-weight-bold"><?= isset($formError['postalCode']) ? $formError['postalCode'] : ''; ?></p>

        <label for="city" class="font-weight-bold"><?= REGISTER_CITY ?></label>
        <select name="city" id="city" class="form-control">
            <option selected disabled><?= SELECT_CITY ?></option>
            <?php foreach ($cityName as $cityValue) { ?>
                <option value="<?= $cityValue->cityValue . id ?>"></option>
            <?php } ?>
        </select>

        <label for="mailRegister" class="font-weight-bold"><?= REGISTER_MAIL ?></label>
        <input type="mail" name="mailRegister" id="mailRegister" class="form-control mb-2" placeholder="<?= REGISTER_MAIL ?>" value="<?= isset($mail) ? $mail : '' ?>" />
        <p class="text-danger font-weight-bold"><?= isset($formError['mail']) ? $formError['mail'] : ''; ?></p>

        <label for="passwordRegister" class="font-weight-bold"><?= REGISTER_PASSWORD ?></label>
        <input type="password" name="passwordRegister" id="passwordRegister" class="form-control mb-2" placeholder="<?= REGISTER_PASSWORD ?>" />
        <p class="text-danger font-weight-bold"><?= isset($formError['password']) ? $formError['password'] : ''; ?></p>

        <label for="confirmPassword" class="font-weight-bold"><?= REGISTER_PASSWORD_VERIFY ?></label>
        <input type="password" name="passwordVerify" id="passwordVerify" class="form-control" placeholder="<?= REGISTER_PASSWORD_VERIFY ?>" />
        <p class="text-danger font-weight-bold"><?= isset($formError['passwordVerify']) ? $formError['passwordVerify'] : ''; ?></p>

        <input type="submit" name="update" id="update" class="form-control mt-2 font-weight-bold" value="<?= UPDATE_SUBMIT ?>" />
    </form>
</div>
<?php include_once 'footer.php'; ?>