<?php
$title = 'Design-your-Event | Contactez-nous';
include_once 'header.php';
include_once 'controllers/contactFormCtrl.php';
?>
<div class="container border border-dark teal lighten-1 mb-3">
    <h1 class="text-center font-title mt-2"><?= CONTACT_FORM_TITLE ?></h1>

    <form class="form-group mt-2 mb-3" action="#" method="POST">
        <label for="lastname" class="font-weight-bold"><?= CONTACT_FORM_LASTNAME ?></label>
        <input type="text" name="lastname" class="form-control mb-2" placeholder="<?= CONTACT_FORM_LASTNAME ?>" value="<?= isset($lastname) ? $lastname : '' ?>"/>
        <p class="text-danger font-weight-bold"><?= isset($formError['lastname']) ? $formError['lastname'] : ''; ?></p>

        <label for="firstname" class="font-weight-bold"><?= CONTACT_FORM_FIRSTNAME ?></label>
        <input type="text" name="firstname" class="form-control mb-2" placeholder="<?= CONTACT_FORM_FIRSTNAME ?>" value="<?= isset($firstname) ? $firstname : '' ?>" />
        <p class="text-danger font-weight-bold"><?= isset($formError['firstname']) ? $formError['firstname'] : ''; ?></p>

        <label for="email" class="font-weight-bold"><?= CONTACT_FORM_MAIL ?></label>
        <input type="text" name="mail" class="form-control mb-2" placeholder="<?= CONTACT_FORM_MAIL ?>" value="<?= isset($mail) ? $mail : '' ?>" />
        <p class="text-danger font-weight-bold"><?= isset($formError['mail']) ? $formError['mail'] : ''; ?></p>

        <label for="object" class="font-weight-bold"><?= CONTACT_FORM_SUBJECT ?></label>
        <input type="text" name="subject" class="form-control mb-2" placeholder="<?= CONTACT_FORM_SUBJECT ?>" value="<?= isset($subject) ? $subject : '' ?>" />
        <p class="text-danger font-weight-bold"><?= isset($formError['subject']) ? $formError['subject'] : ''; ?></p>

        <label for="message" class="font-weight-bold"><?= CONTACT_FORM_MESSAGE ?></label>
        <textarea type="text" name="message" class="form-control mb-2" placeholder="<?= CONTACT_FORM_MESSAGE ?>" value="<?= isset($message) ? $message : '' ?>"></textarea>
        <p class="text-danger font-weight-bold"><?= isset($formError['message']) ? $formError['message'] : ''; ?></p>

        <input type="submit" name="contactFormSubmit" class="form-control mb-2" />

        <?php if(isset($_POST['contactFormSubmit']) && $send != '') { ?>
            <p><?= $send ?></p>
        <?php } ?>
    </form>
</div>
<?php include 'footer.php'; ?>