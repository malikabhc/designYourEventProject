<?php
$title = 'Étape 4 - Résultat | Design-your-Event';
include_once 'header.php';
include_once 'controllers/step4createCtrl.php';
?>
<div class="container border border-dark orange lighten-2 mb-3">
    <h1 class="text-center font-title mt-2"><?= CREATE_EVENT ?></h1>
    <h2 class="text-center font-title"><?= STEP_FOUR ?></h2>
    <h1><?= $displayEventUser->eventName ?></h1>
    <p><?= $displayEventUser->address ?></p>
    <p><?= $displayEventUser->dateHourStart ?></p>
    <p><?= $displayEventUser->dateHourFinish ?></p>

</div>
<?php include 'footer.php'; ?>