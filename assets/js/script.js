//Fonction pour afficher la page d'inscription à l'ouverture du site
$(document).ready(function(){
        $('#connection').hide();
        $('#inscription').show();
     //Au clique sur le bouton Connexion, on affiche le formulaire de connexion et on masque le formulaire d'inscription
    $('#clickConnection').click(function(){
        $('#connection').show();
        $('#inscription').hide();
});
     //Au clique sur le bouton Inscription, on affiche le formulaire d'inscription et on masque le formulaire de connexion
    $('#clickInscription').click(function(){
        $('#connection').hide();
        $('#inscription').show();
});
});

