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

// AJAX pour afficher les 
$(function () {
    $("#postalCode").keyup(function () {
        // Insertion d'une limite pour limiter le début
        $.post("../../controllers/indexCtrl.php", {
            postalCodeSearch: $("#postalCode").val()
        }, function (cityName) {
            $("#city").empty();
            // Each est une fonction qui fait une boucle sur les éléments de la classe cityName
            $.each(cityName, function(cityKey, cityValue){
                $("#city").append('<option value=" ' + cityValue.id + '">' + cityValue.cityName + ' ' + '</option >')
                });
        }, 'JSON');
    });
});
