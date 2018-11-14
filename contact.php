<?php
$title = 'Design-your-Event | Contactez-nous';
include_once 'header.php';
?>
<div class="container border border-dark teal lighten-1 mb-3">
    <h1 class="text-center font-title mt-2"><?= CONTACT_FORM_TITLE ?></h1>
<form class="form-group mt-2 mb-3">
    <label for="lastname" class=" font-weight-bold"><?= CONTACT_FORM_LASTNAME ?></label>
    <input type="text" name="lastname" class="form-control mb-2" placeholder="<?= CONTACT_FORM_LASTNAME ?>"/>
    <label for="firstname" class=" font-weight-bold"><?= CONTACT_FORM_FIRSTNAME ?></label>
    <input type="text" name="firstname" class="form-control mb-2" placeholder="<?= CONTACT_FORM_FIRSTNAME ?>" />
    <label for="email" class=" font-weight-bold"><?= CONTACT_FORM_MAIL ?></label>
    <input type="text" name="mail" class="form-control mb-2" placeholder="<?= CONTACT_FORM_MAIL ?>" />
    <label for="object" class=" font-weight-bold"><?= CONTACT_FORM_OBJECT ?></label>
    <input type="text" name="object" class="form-control mb-2" placeholder="<?= CONTACT_FORM_OBJECT ?>" />
    <label for="message"><?= CONTACT_FORM_MESSAGE ?></label>
    <textarea type="text" name="message" class="form-control mb-2" placeholder="<?= CONTACT_FORM_MESSAGE ?>"></textarea>
    <input type="submit" name="submitContactForm" class="form-control mb-2" />
</form>
</div>
<?php include 'footer.php'; ?>