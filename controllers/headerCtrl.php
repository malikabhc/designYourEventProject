<?php
// Déconnexion
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'disconnect') {
        // On détruit d'abord la session
        session_destroy();
        // Puis on redirige vers l'index
        header('location:index.php');
    }
}