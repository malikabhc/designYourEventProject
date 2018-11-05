<?php
$title = 'Design-your-Event | Contactez-nous';
include_once 'header.php';
?>
<div class="container border border-dark teal lighten-1 mb-3">
    <h1 class="text-center mt-2">Formulaire de contact</h1>
<form class="form-group mt-2 mb-3">
    <label for="lastname">Nom :</label>
    <input type="text" name="lastname" class="form-control mb-2" placeholder="Votre nom"/>
    <label for="firstname">Prénom :</label>
    <input type="text" name="firstname" class="form-control mb-2" placeholder="Votre prénom" />
    <label for="email">Adresse e-mail :</label>
    <input type="text" name="email" class="form-control mb-2" placeholder="Votre adresse e-mail" />
    <label for="object">Objet :</label>
    <input type="text" name="object" class="form-control mb-2" placeholder="Objet de votre message" />
    <label for="message">Message :</label>
    <textarea type="text" name="message" class="form-control mb-2" placeholder="Votre message"></textarea>
    <input type="submit" name="submit" class="form-control mb-2" />
</form>
</div>
<?php include 'footer.php'; ?>
</body>