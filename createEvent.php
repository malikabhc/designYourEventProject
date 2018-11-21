<?php
$title = 'Design-your-Event | Création';
include_once 'header.php';
include_once 'controllers/createEventCtrl.php';
?>
<div class="container border border-dark orange lighten-2 mb-3">
    <h1 class="text-center font-title mt-2"><?= CREATE_EVENT ?></h1>
    <h2 class="text-center font-title"><?= STEP_ONE ?></h2>
    
    <form action="#" method="POST" class="form-group mt-2 mb-3" id="create">
        
        <label for="eventName" class="font-weight-bold"><?= EVENT_NAME ?></label>
        <input type="text" name="eventName" id="eventName" class="form-control mb-2" placeholder="<?= EVENT_NAME ?>" value="<?= isset($eventName) ? $eventName : '' ?>" />
        <p class="text-danger font-weight-bold"><?= isset($formError['eventName']) ? $formError['eventName'] : ''; ?></p>

        <label for="address" class="font-weight-bold"><?= EVENT_LOCATION ?></label>
        <input type="text" name="address" id="address" class="form-control mb-2" placeholder="<?= EVENT_LOCATION ?>" value="<?= isset($address) ? $address : '' ?>" />
        <p class="text-danger font-weight-bold"><?= isset($formError['address']) ? $formError['address'] : ''; ?></p>

        <label for="dateStart" class="font-weight-bold"><?= DATE_START ?></label>
        <input type="date" name="dateStart" id="dateStart" class="form-control mb-2" placeholder="<?= DATE_START ?>" value="<?= isset($dateStart) ? $dateStart : '' ?>" />
        <p class="text-danger font-weight-bold"><?= isset($formError['dateStart']) ? $formError['dateStart'] : ''; ?></p>

        <label for="hourStart" class="font-weight-bold"><?= HOUR_START ?></label>
        <input type="time" name="hourStart" id="hourStart" class="form-control mb-2" placeholder="<?= HOUR_START ?>" value="<?= isset($hourStart) ? $hourStart : '' ?>" />
        <p class="text-danger font-weight-bold"><?= isset($formError['hourStart']) ? $formError['hourStart'] : ''; ?></p>

        <label for="dateFinish" class="font-weight-bold"><?= DATE_FINISH ?></label>
        <input type="date" name="dateFinish" id="dateStart" class="form-control mb-2" placeholder="<?= DATE_FINISH ?>" value="<?= isset($dateFinish) ? $dateFinish : '' ?>" />
        <p class="text-danger font-weight-bold"><?= isset($formError['dateFinish']) ? $formError['dateFinish'] : ''; ?></p>

        <label for="hourFinish" class="font-weight-bold"><?= HOUR_FINISH ?></label>
        <input type="time" name="hourFinish" id="hourFinish" class="form-control mb-2" placeholder="<?= HOUR_FINISH ?>" value="<?= isset($hourFinish) ? $hourFinish : '' ?>" />
        <p class="text-danger font-weight-bold"><?= isset($formError['hourFinish']) ? $formError['hourFinish'] : ''; ?></p>

        <label for="eventDescription" class="font-weight-bold"><?= EVENT_DESCRIPTION ?></label>
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
        
        <input type="submit" name="submitEvent" id="submitEvent" class="form-control mt-2 font-weight-bold" value="<?= NEXT_STEP ?>" />
    </form>
</div>
<?php include 'footer.php'; ?>