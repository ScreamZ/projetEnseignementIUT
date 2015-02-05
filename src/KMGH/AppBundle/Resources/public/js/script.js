$(document).ready(function () {

    /* Close-box message */
    $('.alert-box').on('click', '.close-box', function () {
        $(this).parent().fadeOut();
        clearMsgBox();
    });

    /* Vide la message box */
    function clearMsgBox(){
        $('.alert-box').find('.msg').html('');
        $('.alert-box').find('.type').html('');
        $('.alert-box').removeClass('success').removeClass('error');
    }
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
        var btn_action = $(this).parent();
        $('.btnModifier', btn_action).fadeOut();
        $('.btnSupprimer', btn_action).fadeOut();
        $('.btnValider', btn_action).delay(400).fadeIn();
        btn_action.parent().find("input").removeAttr("disabled");
    });

    /* Clique sur valider */
    $('.last-level table td.btn_action .btnValider').click(function () {
        var that = this;
        var tr = $(this).parent().parent();
        var cm = $('.cm input', tr).val();
        var td = $('.td input', tr).val();
        var tp = $('.tp input', tr).val();
        var id = tr.attr('id');

        // todo ajout jeton csrf
        // todo ajouter jsRoutingbundle pour changer l'adresse
        $.post( "http://localhost/projetEnseignementIUT/web/app_dev.php/update/"+id, { cm: cm, td: td, tp: tp } )
            .done(function(data){
                if (data == 200){
                    var btn_action = $(that).parent();
                    var ligne = btn_action.parent();
                    $('.btnValider', btn_action).fadeOut();
                    ligne.find("input").prop("disabled", true).attr('id', 'inputError1');
                    $('#alertMsg').addClass('success').fadeIn();
                    $('#alertMsg .msg').html('Les modifications ont été effectuées avec succès.');
                    $('#alertMsg .type').html('Ok : ');
                    $('.btnModifier', btn_action).delay(400).fadeIn();
                    $('.btnSupprimer', btn_action).delay(400).fadeIn();

                }
                else{
                    $('#alertMsg .msg').html('Modication non permise');
                    $('#alertMsg .type').html('Erreur : ');
                    $('#alertMsg').addClass('error').fadeIn();
                }
            })
            .fail(function(){
                $('#alertMsg .msg').html('Impossible de se connecter à la base données');
                $('#alertMsg .type').html('Erreur : ');
                $('#alertMsg').addClass('error').fadeIn();
            });

        window.setTimeout( function(){
            $('#alertMsg').slideUp();
            clearMsgBox();
        }, 5000 );

    });

});