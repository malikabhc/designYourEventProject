// Fonction pour afficher la page d'inscription à l'ouverture du site
$(document).ready(function () {
    $('#inscription').show();
    $('#connection').hide();
    // Au clique sur le bouton Connexion, on affiche le formulaire de connexion et on masque le formulaire d'inscription
    $('#clickConnection').click(function () {
        $('#connection').show();
        $('#inscription').hide();
    });
    // Au clique sur le bouton Inscription, on affiche le formulaire d'inscription et on masque le formulaire de connexion
    $('#clickInscription').click(function () {
        $('#connection').hide();
        $('#inscription').show();
    });
    if ($('#connection').hasClass('connectionError')){
        $('#connection').show();
        $('#inscription').hide();
    }
});


// AJAX pour afficher les villes en entrant le code postal
$(function () {
    $("#postalCode").keyup(function () {
        // Insertion d'une condition pour limiter le début de la recherche à 3 chiffres minimum
        if ($('#postalCode').val().length >= 3)
            $.post("../../controllers/indexCtrl.php", {
                postalCodeSearch: $("#postalCode").val()
            }, function (cityName) {
                // Empty vide le select avant de le remplir à l'aide du each
                $("#city").empty();
                // Each est une fonction qui fait une boucle sur les éléments de l'input cityName et les affiches
                $.each(cityName, function (cityKey, cityValue) {
                    // Append 
                    $("#city").append('<option value=" ' + cityValue.id + '">' + cityValue.cityName + ' ' + '</option >')
                });
            }, 'JSON');
    }
    );
});

// AJAX pour modifier la couleur de l'input mail s'il existe déjà dans la BDD
$(function () {
    // L'évènement blur est déclenché lorsque le champ #mailRegister perd le focus
    $('#mailRegister').blur(function () {
        $.post('controllers/indexCtrl.php', {mailVerify: $(this).val()}, function (data) {
            if (data == 1) {
                $('#mailRegister').addClass('text-white').css('background-color', '#f44336');
                $('#submitRegister').hide();
            } else {
                $('#mailRegister').removeClass('text-white').css('background-color', 'white');
                $('#submitRegister').show();
            }
        },
                'JSON');
    });
});

