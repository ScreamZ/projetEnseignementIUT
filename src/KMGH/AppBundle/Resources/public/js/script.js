$(document).ready(function () {

    /* Close-box message */
    $('.alert-box').on('click', '.close-box', function () {
        $(this).parent().fadeOut();
        $(this).parent().find('.msg').html('');
    });

    /* Clique au niveau 1 */
    $('.tab > .level1 > .ligne > .content a').click(function () {
        var ligne = $(this).parent().parent();
        if ($('.icon .glyphicon', ligne).hasClass('glyphicon-folder-open')) {
            $('.icon .glyphicon', ligne).removeClass('glyphicon-folder-open');
            $('.icon .glyphicon', ligne).addClass('glyphicon-folder-close');
            ligne.nextAll('.level2').hide();
        }
        else {
            $('.icon .glyphicon', ligne).removeClass('glyphicon-folder-close');
            $('.icon .loading', ligne).show();
            ligne.nextAll('.level2').show();
            $('.icon .glyphicon', ligne).addClass('glyphicon-folder-open');
            $('.icon .loading', ligne).hide();
        }
    });

    /* Clique au niveau 2 */
    $('.tab > .level1 > .level2 > .ligne > .content a').click(function () {
        var ligne = $(this).parent().parent();
        if ($('.icon .glyphicon', ligne).hasClass('glyphicon-folder-open')) {
            $('.icon .glyphicon', ligne).removeClass('glyphicon-folder-open');
            $('.icon .glyphicon', ligne).addClass('glyphicon-folder-close');
            ligne.nextAll('.level3').hide();
        }
        else {
            $('.icon .glyphicon', ligne).removeClass('glyphicon-folder-close');
            $('.icon .loading', ligne).show();
            ligne.nextAll('.level3').show();
            $('.icon .glyphicon', ligne).addClass('glyphicon-folder-open');
            $('.icon .loading', ligne).hide();
        }
    });

    /* Clique au niveau 3 */
    $('.tab > .level1 > .level2 > .level3 > .ligne > .content a').click(function () {
        var ligne = $(this).parent().parent();
        if ($('.icon .glyphicon', ligne).hasClass('glyphicon-folder-open')) {
            $('.icon .glyphicon', ligne).removeClass('glyphicon-folder-open');
            $('.icon .glyphicon', ligne).addClass('glyphicon-folder-close');
            ligne.nextAll('.last-level').hide();
        }
        else {
            $('.icon .glyphicon', ligne).removeClass('glyphicon-folder-close');
            $('.icon .loading', ligne).show();
            ligne.nextAll('.last-level').show();
            $('.icon .glyphicon', ligne).addClass('glyphicon-folder-open');
            $('.icon .loading', ligne).hide();
        }
    });


    /* Clique sur modifier */
    $('.last-level table td.btn_action .btnModifier').click(function () {
        btn_action = $(this).parent();
        $('.btnModifier', btn_action).fadeOut();
        $('.btnSupprimer', btn_action).fadeOut();
        $('.btnValider', btn_action).delay(400).fadeIn();
        btn_action.parent().find("input").removeAttr("disabled");
    });

    /* Clique sur valider */
    $('.last-level table td.btn_action .btnValider').click(function () {
        /* Envoi de la requete ajax de modification d'heures de cours */
        /* Si succés : */
        btn_action = $(this).parent();
        ligne = btn_action.parent();
        $('.btnValider', btn_action).fadeOut();
        $('.btnModifier', btn_action).delay(400).fadeIn();
        $('.btnSupprimer', btn_action).delay(400).fadeIn();
        ligne.find("input").prop("disabled", true).attr('id', 'inputError1');
        /* Sinon : */
        $('#alertMsg .msg').html('Impossible de se connecter à la base données');
        $('#alertMsg .type').html('Erreur : ');
        $('#alertMsg').addClass('error').fadeIn();
    });

});