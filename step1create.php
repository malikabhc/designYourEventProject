<?php
$title = 'Étape 1 - Création | Design-your-Event';
include_once 'header.php';
include_once 'controllers/step1createCtrl.php';
?>
<div class="container border border-dark orange lighten-2 mb-3">
    <h1 class="text-center font-title mt-2"><?= CREATE_EVENT ?></h1>
    <h2 class="text-center font-title"><?= STEP_ONE ?></h2>

    <form action="#" method="POST" class="form-group mt-2 mb-3" id="formStepOne">
        
        <?php foreach ($themeList as $themeDetail) { ?>
            <div class="form-check form-check-inline mt-2 mb-4">
                <input class="form-check-input" type="radio" name="radioTheme" id="radioTheme" value="<?= $themeDetail->id ?>">
                <img src="assets/img/<?= $themeDetail->themeLink ?>" class="imageTheme" />
                <label class="form-check-label ml-2" for="radioTheme"><?= $themeDetail->themeName ?></label>
            </div>
        <?php } ?>
        <p class="text-danger font-weight-bold"><?= isset($formError['radioTheme']) ? $formError['radioTheme'] : ''; ?></p>

        <h2 class="text-center font-title"><?= STEP_TWO ?></h2>

        <label class="font-weight-bold"><?= EVENT_CATEGORY ?> <span class="text-danger">*</span></label>
        <select name="eventCategory" class="custom-select mb-2" id="eventCategory">
            <option selected disabled>Veuillez sélectionner une option</option>
            <?php foreach ($eventCategoryList as $eventCategoryDetail) { ?>
                <option value="<?= $eventCategoryDetail->id ?>"><?= $eventCategoryDetail->eventCategory ?></option>
            <?php } ?>
        </select>
        <p class="text-danger font-weight-bold"><?= isset($formError['eventCategory']) ? $formError['eventCategory'] : ''; ?></p>


        <label class="font-weight-bold"><?= EVENT_TYPE ?> <span class="text-danger">*</span></label>
        <select name="eventType" class="custom-select mb-2" id="eventType">
            <option selected disabled>Veuillez sélectionner une option</option>
            <?php foreach ($eventTypeList as $eventTypeDetail) { ?>
                <option value="<?= $eventTypeDetail->id ?>"><?= $eventTypeDetail->eventType ?></option>
            <?php } ?>
        </select>
        <p class="text-danger font-weight-bold"><?= isset($formError['eventType']) ? $formError['eventType'] : ''; ?></p>

        <label for="eventName" class="font-weight-bold"><?= EVENT_NAME ?> <span class="text-danger">*</span></label>
        <input type="text" name="eventName" id="eventName" class="form-control mb-2" placeholder="<?= EVENT_NAME ?>" value="<?= isset($eventName) ? $eventName : '' ?>" />
        <p class="text-danger font-weight-bold"><?= isset($formError['eventName']) ? $formError['eventName'] : ''; ?></p>

        <label for="address" class="font-weight-bold"><?= EVENT_LOCATION ?> <span class="text-danger">*</span></label>
        <input type="text" name="address" id="address" class="form-control mb-2" placeholder="<?= EVENT_LOCATION ?>" value="<?= isset($address) ? $address : '' ?>" />
        <p class="text-danger font-weight-bold"><?= isset($formError['address']) ? $formError['address'] : ''; ?></p>

        <label for="dateStart" class="font-weight-bold"><?= DATE_START ?> <span class="text-danger">*</span></label>
        <input type="date" name="dateStart" id="dateStart" class="form-control mb-2" placeholder="<?= DATE_START ?>" value="<?= isset($dateStart) ? $dateStart : '' ?>" />
        <p class="text-danger font-weight-bold"><?= isset($formError['dateStart']) ? $formError['dateStart'] : ''; ?></p>

        <label for="hourStart" class="font-weight-bold"><?= HOUR_START ?> <span class="text-danger">*</span></label>
        <input type="time" name="hourStart" id="hourStart" class="form-control mb-2" placeholder="<?= HOUR_START ?>" value="<?= isset($hourStart) ? $hourStart : '' ?>" />
        <p class="text-danger font-weight-bold"><?= isset($formError['hourStart']) ? $formError['hourStart'] : ''; ?></p>

        <label for="dateFinish" class="font-weight-bold"><?= DATE_FINISH ?></label>
        <input type="date" name="dateFinish" id="dateStart" class="form-control mb-2" placeholder="<?= DATE_FINISH ?>" value="<?= isset($_POST['dateFinish']) ? $_POST['dateFinish'] : '' ?>" />
        <p class="text-danger font-weight-bold"><?= isset($formError['dateFinish']) ? $formError['dateFinish'] : ''; ?></p>

        <label for="hourFinish" class="font-weight-bold"><?= HOUR_FINISH ?></label>
        <input type="time" name="hourFinish" id="hourFinish" class="form-control mb-2" placeholder="<?= HOUR_FINISH ?>" value="<?= isset($_POST['hourFinish']) ? $_POST['hourFinish'] : '' ?>" />
        <p class="text-danger font-weight-bold"><?= isset($formError['hourFinish']) ? $formError['hourFinish'] : ''; ?></p>

        <label for="eventDescription" class="font-weight-bold"><?= EVENT_DESCRIPTION ?> <span class="text-danger">*</span></label>
        <textarea name="eventDescription" id="eventDescription" class="form-control mb-2" placeholder="<?= EVENT_DESCRIPTION ?>" value="<?= isset($eventDescription) ? $eventDescription : '' ?>" ></textarea>
        <p class="text-danger font-weight-bold"><?= isset($formError['eventDescription']) ? $formError['eventDescription'] : ''; ?></p>

        <label for="facebookLink" class="font-weight-bold"><?= FACEBOOK_LINK ?></label>
        <input type="url" name="facebookLink" id="facebookLink" class="form-control mb-2" placeholder="<?= FACEBOOK_LINK ?>" value="<?= isset($facebookLink) ? $facebookLink : '' ?>" />
        <p class="text-danger font-weight-bold"><?= isset($formError['facebookLink']) ? $formError['facebookLink'] : ''; ?></p>

        <label for="twitterLink" class="font-weight-bold"><?= TWITTER_LINK ?></label>
        <input type="url" name="twitterLink" id="twitterLink" class="form-control mb-2" placeholder="<?= TWITTER_LINK ?>" value="<?= isset($twitterLink) ? $twitterLink : '' ?>" />
        <p class="text-danger font-weight-bold"><?= isset($formError['twitterLink']) ? $formError['twitterLink'] : ''; ?></p>

        <label for="instagramLink" class="font-weight-bold"><?= INSTAGRAM_LINK ?></label>
        <input type="url" name="instagramLink" id="instagramLink" class="form-control mb-2" placeholder="<?= INSTAGRAM_LINK ?>" value="<?= isset($instagramLink) ? $instagramLink : '' ?>" />
        <p class="text-danger font-weight-bold"><?= isset($formError['instagramLink']) ? $formError['instagramLink'] : ''; ?></p>

        <label for="snapchatLink" class="font-weight-bold"><?= SNAPCHAT_LINK ?></label>
        <input type="url" name="snapchatLink" id="snapchatLink" class="form-control mb-2" placeholder="<?= SNAPCHAT_LINK ?>" value="<?= isset($snapchatLink) ? $snapchatLink : '' ?>" />
        <p class="text-danger font-weight-bold"><?= isset($formError['snapchatLink']) ? $formError['snapchatLink'] : ''; ?></p>

        <p class="font-weight-bold">(<span class="text-danger">*</span>) : Champ obligatoire</p>

        <input type="submit" name="submitEventOne" id="submitEventOne" class="form-control mt-2 font-weight-bold" value="<?= NEXT_STEP ?>" />
    </form>
</div>
<?php include 'footer.php'; ?>