$(document).ready(function(){

    function isValidName(stringa) {
        if(stringa.trim().match(/^[a-z]+$/i) == null) {
			return false;
		}
		else return true;
    };

    $('#valida').submit(function(event){
        event.preventDefault();

        var nome = $('#nome').val();
        var cognome = $('#cogn').val();
        var ddn = $('#ddn').val();
        var sesso = $('input[name=genere]:checked', '#valida').val();
        var errori = $('.invalid-feedback');
        var login = $('#inviaProfilo').val();

        $(errori).hide();
        $('#successo').hide();
        $('#errore').hide();

        if(!isValidName(nome) && !isValidName(cognome)) $(errori).show();
        else if(!isValidName(nome)) $(errori[0]).show();
        else if(!isValidName(cognome)) $(errori[1]).show();
        else
        {
            var ajaxRequest =$.ajax({
                type:'POST',
                url: "../backend/modProfile.php",
                dataType: 'json',
                data: { nome: nome, cognome: cognome, sesso:sesso, ddn:ddn, login: login }
            });

            ajaxRequest.done(function(data){
                if (data.code == "200"){
                    $('#successo').show();

                    $.ajax({
                        url: "../backend/getInfo.php",
                        type: "POST",
                        success: function () {
                          $("#refresh").load(location.href+" #refresh>*","");
                        },
                        error: function () {
                          alert("Non sono riuscito ad aggiornare i dati.");
                        }
                      });
                    
                }
            });

            ajaxRequest.fail(function(){
                $('#errore').show();
            });
        }
    });


    function isValidPassword(password) {
        var pattern = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/; //min 8 caratteri, almeno 1 numero e almeno 1 carattere speciale
        return pattern.test(password);
    };

    function check(psw1, psw2) {
        return psw1 == psw2 ? true : false;
    };

    $('#validaPass').submit(function(event){
        event.preventDefault();

        var attuale = $('#vecchia').val();
        var nuova = $('#nuova').val();
        var verifica = $('#nuovaVerifica').val();
        var errori = $('.invalid-feedback');
        var login = $('#inviaPass').val();

        $(errori).hide();
        $('#successoP').hide();
        $('#erroreP').hide();
        $('#errPsw').show();

        if(!isValidPassword(nuova)) $(errori[2]).show();
        else if(!check(nuova, verifica)) $(errori[3]).show();
        else
        {
            var ajaxRequest =$.ajax({
                type:'POST',
                url: "../backend/modPassword.php",
                dataType: 'json',
                data: { attuale: attuale, nuova: nuova, login: login }
            });

            ajaxRequest.done(function(data){
                if (data.code == "200"){
                    $('#validaPass').trigger('reset');
                    $('#successoP').show();
                    $('html,body').animate({
                        scrollTop: $("#successoP").offset().top},
                        'slow');
                }
                else {
                    $('#validaPass').trigger('reset');
                    $('#errPsw').show();
                    $('html,body').animate({
                        scrollTop: $("#errPsw").offset().top},
                        'slow');
                }
            });

            ajaxRequest.fail(function(){
                $('#erroreP').show();
                $('html,body').animate({
                    scrollTop: $("#erroreP").offset().top},
                    'slow');
            });
        }
    });
});