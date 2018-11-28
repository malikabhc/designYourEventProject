<?php
$title = 'Étape 2 - Création | Design-your-Event';
include_once 'header.php';
include_once 'controllers/step2createCtrl.php';
?>
<div class="container border border-dark orange lighten-2 mb-3">
    <h1 class="text-center font-title mt-2"><?= CREATE_EVENT ?></h1>
    <h2 class="text-center font-title"><?= STEP_TWO ?></h2>

    <form action="#" method="POST" class="form-group mt-2 mb-3" id="formStepTwo">

        <label for="contributorLastname" class="font-weight-bold"><?= CONTRIBUTOR_LASTNAME ?> <span class="text-danger">*</span></label>
        <input type="text" name="contributorLastname" id="contributorLastname" class="form-control mb-2" placeholder="<?= CONTRIBUTOR_LASTNAME ?>" value="<?= isset($contributorLastname) ? $contributorLastname : '' ?>" />
        <p class="text-danger font-weight-bold"><?= isset($formError['contributorLastname']) ? $formError['contributorLastname'] : ''; ?></p>

        <label for="contributorFirstname" class="font-weight-bold"><?= CONTRIBUTOR_FIRSTNAME ?> <span class="text-danger">*</span></label>
        <input type="text" name="contributorFirstname" id="contributorFirstname" class="form-control mb-2" placeholder="<?= CONTRIBUTOR_FIRSTNAME ?>" value="<?= isset($contributorFirstname) ? $contributorFirstname : '' ?>" />
        <p class="text-danger font-weight-bold"><?= isset($formError['contributorFirstname']) ? $formError['contributorFirstname'] : ''; ?></p>

        <p class="font-weight-bold">(<span class="text-danger">*</span>) : Champ obligatoire</p>

        <input type="submit" name="submitEventTwo" id="submitEventTwo" class="form-control mt-2 font-weight-bold" value="<?= NEXT_STEP ?>" />
    </form>
</div>
<?php include 'footer.php'; ?>