<?php
$title = 'Design-your-Event | Contactez-nous';
include_once 'header.php';
include_once 'controllers/contactFormCtrl.php';
?>
<div class="container border border-dark teal lighten-1 mb-3">

        <h1 class="text-center font-title mt-2"><?= CONTACT_FORM_TITLE ?></h1>

        <form class="form-group mt-2 mb-3" action="#" method="POST">
            <label for="lastname" class="font-weight-bold"><?= LASTNAME ?></label>
            <input type="text" name="lastname" class="form-control mb-2" placeholder="<?= LASTNAME ?>" value="<?= isset($lastname) ? $lastname : '' ?>"/>
            <p class="text-danger font-weight-bold"><?= isset($formError['lastname']) ? $formError['lastname'] : ''; ?></p>

            <label for="firstname" class="font-weight-bold"><?= FIRSTNAME ?></label>
            <input type="text" name="firstname" class="form-control mb-2" placeholder="<?= FIRSTNAME ?>" value="<?= isset($firstname) ? $firstname : '' ?>" />
            <p class="text-danger font-weight-bold"><?= isset($formError['firstname']) ? $formError['firstname'] : ''; ?></p>

            <label for="email" class="font-weight-bold"><?= MAIL ?></label>
            <input type="text" name="mail" class="form-control mb-2" placeholder="<?= MAIL ?>" value="<?= isset($mail) ? $mail : '' ?>" />
            <p class="text-danger font-weight-bold"><?= isset($formError['mail']) ? $formError['mail'] : ''; ?></p>

            <label for="object" class="font-weight-bold"><?= CONTACT_FORM_SUBJECT ?></label>
            <input type="text" name="subject" class="form-control mb-2" placeholder="<?= CONTACT_FORM_SUBJECT ?>" value="<?= isset($subject) ? $subject : '' ?>" />
            <p class="text-danger font-weight-bold"><?= isset($formError['subject']) ? $formError['subject'] : ''; ?></p>

            <label for="message" class="font-weight-bold"><?= CONTACT_FORM_MESSAGE ?></label>
            <textarea type="text" name="message" class="form-control mb-2" placeholder="<?= CONTACT_FORM_MESSAGE ?>" value="<?= isset($message) ? $message : '' ?>"></textarea>
            <p class="text-danger font-weight-bold"><?= isset($formError['message']) ? $formError['message'] : ''; ?></p>

            <a href="index.php"><input type="submit" name="contactFormSubmit" class="form-control mb-2" data-toggle="modal" data-target="#basicExampleModal" /></a>
    
        <?php if (count($formError) == 0) { ?>
                <!-- Modal -->
        <div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Votre message a bien été envoyé</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Vous recevrez une réponse dans les meilleurs délais :)</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn teal lighten-1" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    <?php  } ?>
</div>
<?php include 'footer.php'; ?>