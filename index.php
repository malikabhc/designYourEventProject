<?php
$title = 'Design-your-Event | Accueil';
include_once 'header.php';
include_once 'class/database.php';
include_once 'controllers/indexCtrl.php'; ?>
    <div class="container border border-dark teal lighten-1 mb-3">
        <div class="row">
            <div class="col-lg-6 col-sm-6 text-center border-bottom border-dark border-right border-dark"><a href="#inscription" id="clickInscription"><span><?= INDEX_REGISTRATION ?></span></a></div>
            <div class="col-lg-6 col-sm-6 text-center border-bottom border-dark"><a href="#connection" id="clickConnection"><span><?= INDEX_LOGIN ?></span></a></div>
        </div>
<?php if (isset($_POST['submitRegister']) && (count($formError) === 0)) {
    ?> 
    <div class="alert-success">
        <h1><?= USER_INSCRIPTION_SUCCESS ?></h1>
        <p><?= $_POST['lastname'] ?></p>
        <p><?= $_POST['firstname'] ?></p>
        <p><?= $_POST['birthdate'] ?></p>
        <p><?= $_POST['city'] ?></p>    
        <p><?= $_POST['postalCode'] ?></p>
        <p><?= $_POST['mail'] ?></p>
        <p><?= $_POST['password'] ?></p>
    </div>
<?php } else { ?>
        <!-- Formulaire d'inscription -->
        <form action="#" method="POST" class="form-group mt-2 mb-3" id="inscription">
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
                <option selected disabled>Veuillez sélectionner une ville</option>
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

            <input type="submit" name="submitRegister" id="submitRegister" class="form-control mt-2 font-weight-bold" value="<?= REGISTER_SUBMIT ?>" />
        </form>
<?php } ?>

        <!-- Formulaire de connexion -->
        <form action="#connection" method="POST" class="form-group mt-2 mb-3" id="connection">
        <?php if (isset($_POST['submitLogin']) && (count($formError) === 0)) {
    ?> 
    <div class="alert-success">
        <h1><?= USER_CONNECTION_SUCCESS ?></h1>
        <p><?= $_POST['mailLogin'] ?></p>
        <p><?= $_POST['passwordLogin'] ?></p>
    </div>
<?php } else { ?>
            <label for="mailLogin" class="font-weight-bold"><?= LOGIN_MAIL ?></label>
            <input type="mail" name="mailLogin" id="mailLogin" class="form-control mb-2" placeholder="<?= LOGIN_MAIL ?>" />
            <p class="text-danger font-weight-bold"><?= isset($formError['mail']) ? $formError['mail'] : ''; ?></p>

            <label for="passwordLogin" id="password" class="font-weight-bold"><?= LOGIN_PASSWORD ?></label>
            <input type="password" name="passwordLogin" id="passwordLogin" class="form-control mb-2" placeholder="<?= LOGIN_PASSWORD ?>" />
            <p class="text-danger font-weight-bold"><?= isset($formError['password']) ? $formError['password'] : ''; ?></p>

            <input type="submit" name="submitLogin" id="submitLogin" class="form-control mt-2 font-weight-bold" value="<?= LOGIN_SUBMIT ?>" />
        </form>
<?php } ?>
</div>
<?php include 'footer.php'; ?>