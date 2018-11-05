<?php
$title = 'Design-your-Event | Accueil';
include_once 'header.php';
include_once 'controllers/indexCtrl.php'; 
if (isset($_POST['submitRegister']) && (count($formError) === 0)) { ?> 
<div class="alert-success">
    <h1>Votre inscription a bien été prise en compte !</h1>
    <p><?= $_POST['lastname'] ?></p>
    <p><?= $_POST['firstname'] ?></p>
    <p><?= $_POST['birthdate'] ?></p>
    <p><?= $_POST['cityName'] ?></p>    
    <p><?= $_POST['postalCode'] ?></p>
    <p><?= $_POST['email'] ?></p>
    <p><?= $_POST['password'] ?></p>
</div>
    <?php } else { ?>
    <div class="container border border-dark teal lighten-1 mb-3">
        <div class="row">
            <div class="col-lg-6 col-sm-6 text-center border-bottom border-dark border-right border-dark"><a href="#inscription" id="clickInscription"><span><?= INDEX_REGISTRATION ?></span></a></div>
            <div class="col-lg-6 col-sm-6 text-center border-bottom border-dark"><a href="#connection" id="clickConnection"><span><?= INDEX_LOGIN ?></span></a></div>
        </div>
        <!-- Formulaire d'inscription -->
        <form action="#" method="POST" class="form-group mt-2 mb-3" id="inscription">
            <label for="lastname" class="font-weight-bold"><?= REGISTER_LASTNAME ?></label>
            <input type="text" name="lastname" class="form-control mb-2" placeholder="<?= REGISTER_LASTNAME ?>" value="<?= isset($lastname) ? $lastname : '' ?>" />
            <p class="text-danger font-weight-bold"><?= isset($formError['lastname']) ? $formError['lastname'] : ''; ?></p>
            <label for="firstname" class="font-weight-bold"><?= REGISTER_FIRSTNAME ?></label>
            <input type="text" name="firstname" class="form-control mb-2" placeholder="<?= REGISTER_FIRSTNAME ?>" value="<?= isset($firstname) ? $firstname : '' ?>" />
            <p class="text-danger font-weight-bold"><?= isset($formError['firstname']) ? $formError['firstname'] : ''; ?></p>
            <label for="birthdate" class="font-weight-bold"><?= REGISTER_BIRTHDATE ?></label>
            <input type="date" name="birthdate" class="form-control mb-2" placeholder="<?= REGISTER_BIRTHDATE ?>" value="<?= isset($birthdate) ? $birthdate : '' ?>" />
            <p class="text-danger font-weight-bold"><?= isset($formError['birthdate']) ? $formError['birthdate'] : ''; ?></p>
            <label for="postalCode" class="font-weight-bold"><?= REGISTER_POSTAL_CODE ?></label>
            <input type="text" name="postalCode" class="form-control mb-2" placeholder="<?= REGISTER_POSTAL_CODE ?>" value="<?= isset($postalCode) ? $postalCode : '' ?>" />
            <p class="text-danger font-weight-bold"><?= isset($formError['postalCode']) ? $formError['postalCode'] : ''; ?></p>
            <label for="cityName" class="font-weight-bold"><?= REGISTER_CITY ?></label>
            <input type="text" name="cityName" class="form-control mb-2" placeholder="<?= REGISTER_CITY ?>" value="<?= isset($cityName) ? $cityName : '' ?>" />
            <p class="text-danger font-weight-bold"><?= isset($formError['cityName']) ? $formError['cityName'] : ''; ?></p>
            <label for="email" class="font-weight-bold"><?= REGISTER_EMAIL ?></label>
            <input type="mail" name="email" class="form-control mb-2" placeholder="<?= REGISTER_EMAIL ?>" value="<?= isset($email) ? $email : '' ?>" />
            <p class="text-danger font-weight-bold"><?= isset($formError['email']) ? $formError['email'] : ''; ?></p>
            <label for="password" class="font-weight-bold"><?= REGISTER_PASSWORD ?></label>
            <input type="password" name="password" class="form-control mb-2" placeholder="<?= REGISTER_PASSWORD ?>" />
            <p class="text-danger font-weight-bold"><?= isset($formError['password']) ? $formError['password'] : ''; ?></p>
            <label for="confirmPassword" class="font-weight-bold"><?= REGISTER_PASSWORD_VERIFY ?></label>
            <input type="password" name="passwordVerify" class="form-control" placeholder="<?= REGISTER_PASSWORD_VERIFY ?>" />
            <p class="text-danger font-weight-bold"><?= isset($formError['passwordVerify']) ? $formError['passwordVerify'] : ''; ?></p>
            <input type="submit" name="submitRegister" class="form-control mt-2 font-weight-bold" value="<?= REGISTER_SUBMIT ?>" />
        </form>
        <!-- Formulaire de connexion -->
        <form action="#connection" method="POST" class="form-group mt-2 mb-3" id="connection">
            <label for="email" class="font-weight-bold"><?= LOGIN_EMAIL ?></label>
            <input type="mail" name="email" class="form-control mb-2" placeholder="<?= LOGIN_EMAIL ?>" />
            <p class="text-danger font-weight-bold"><?= isset($formError['email']) ? $formError['email'] : ''; ?></p>
            <label for="password" class="font-weight-bold"><?= LOGIN_PASSWORD ?></label>
            <input type="text" name="password" class="form-control mb-2" placeholder="<?= LOGIN_PASSWORD ?>" />
            <p class="text-danger font-weight-bold"><?= isset($formError['password']) ? $formError['password'] : ''; ?></p>
            <input type="submit" name="submitLogin" class="form-control mt-2 font-weight-bold" value="<?= LOGIN_SUBMIT ?>" />
        </form>
    <?php } ?>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>