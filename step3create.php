<?php
$title = 'Étape 3 - Création | Design-your-Event';
include_once 'header.php';
include_once 'controllers/step3createCtrl.php';
?>
<div class="container border border-dark orange lighten-2 mb-3">
    <h1 class="text-center font-title mt-2"><?= CREATE_EVENT ?></h1>
    <h2 class="text-center font-title"><?= STEP_THREE ?></h2>

    <form action="#" method="POST" class="form-group mt-2 mb-3" id="formStepThree">

        <label for="sponsorName" class="font-weight-bold"><?= SPONSOR_NAME ?></label>
        <input type="text" name="sponsorName" id="sponsorName" class="form-control mb-2" placeholder="<?= SPONSOR_NAME ?>" value="<?= isset($sponsorName) ? $sponsorName : '' ?>" />
        <p class="text-danger font-weight-bold"><?= isset($formError['sponsorName']) ? $formError['sponsorName'] : ''; ?></p>

        <label for="sponsorLink" class="font-weight-bold"><?= SPONSOR_LINK ?></label>
        <input type="text" name="sponsorLink" id="sponsorLink" class="form-control mb-2" placeholder="<?= SPONSOR_LINK ?>" value="<?= isset($sponsorLink) ? $sponsorLink : '' ?>" />
        <p class="text-danger font-weight-bold"><?= isset($formError['sponsorLink']) ? $formError['sponsorLink'] : ''; ?></p>

        <input type="submit" name="submitEventThree" id="submitEventThree" class="form-control mt-2 font-weight-bold" value="<?= DISPLAY_RESULT ?>" />
    </form>
</div>
<?php include 'footer.php'; ?>