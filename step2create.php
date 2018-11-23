<?php
$title = 'Design-your-Event | Étape 2 - Création';
include_once 'header.php';
include_once 'controllers/step2createCtrl.php';
?>
<div class="container border border-dark orange lighten-2 mb-3">
    <h1 class="text-center font-title mt-2"><?= CREATE_EVENT ?></h1>
    <h2 class="text-center font-title"><?= STEP_TWO ?></h2>

    <form action="#" method="POST" class="form-group mt-2 mb-3" id="formStepTwo">

        <label for="contributorsLastname" class="font-weight-bold"><?= CONTRIBUTORS_LASTNAME ?> <span class="text-danger">*</span></label>
        <input type="text" name="contributorsLastname" id="contributorsLastname" class="form-control mb-2" placeholder="<?= CONTRIBUTORS_LASTNAME ?>" value="<?= isset($contributorsLastname) ? $contributorsLastname : '' ?>" />
        <p class="text-danger font-weight-bold"><?= isset($formError['contributorsLastname']) ? $formError['contributorsLastname'] : ''; ?></p>

        <label for="contributorsFirstname" class="font-weight-bold"><?= CONTRIBUTORS_FIRSTNAME ?> <span class="text-danger">*</span></label>
        <input type="text" name="contributorsFirstname" id="contributorsFirstname" class="form-control mb-2" placeholder="<?= CONTRIBUTORS_FIRSTNAME ?>" value="<?= isset($contributorsFirstname) ? $contributorsFirstname : '' ?>" />
        <p class="text-danger font-weight-bold"><?= isset($formError['contributorsFirstname']) ? $formError['contributorsFirstname'] : ''; ?></p>

        <p class="font-weight-bold">(<span class="text-danger">*</span>) : Champ obligatoire</p>

        <a href="step3create.php"><input type="submit" name="submitEventTwo" id="submitEventTwo" class="form-control mt-2 font-weight-bold" value="<?= NEXT_STEP ?>" /></a>
    </form>
</div>
<?php include 'footer.php'; ?>