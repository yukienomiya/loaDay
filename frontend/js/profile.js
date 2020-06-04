$(document).ready(function(){

    //funzione che controlla se la stringa sia composta di soli caratteri
    function isValidName(stringa) {
        if(stringa.trim().match(/^[a-z]+$/i) == null) {
			return false;
		}
		else return true;
    };

    //funzione eseguita al momento del submit del form con id 'valida'
    $('#valida').submit(function(event){
        event.preventDefault();

        //prendo i valori dai campi input
        var nome = $('#nome').val();
        var cognome = $('#cogn').val();
        var ddn = $('#ddn').val();
        var sesso = $('input[name=genere]:checked', '#valida').val();
        var errori = $('.invalid-feedback');
        var login = $('#inviaProfilo').val();

        //per sicurezza nascondo eventuali messaggi a comparsa
        $(errori).hide();
        $('#successo').hide();
        $('#errore').hide();

        //controllo i valori inseriti dall'utente, se sbagliati faccio visualizzare gli errori corrispondenti
        if(!isValidName(nome) && !isValidName(cognome)) $(errori).show();
        else if(!isValidName(nome)) $(errori[0]).show();
        else if(!isValidName(cognome)) $(errori[1]).show();
        else //se è tutto corretto effettuo una chiamata ajax che porta al file modProfile.php e passo i valori inseriti dall'utente nel form
        {
            var ajaxRequest =$.ajax({
                type:'POST',
                url: "../backend/modProfile.php",
                dataType: 'json',
                data: { nome: nome, cognome: cognome, sesso:sesso, ddn:ddn, login: login }
            });
            //se la chiamata ajax va a buon fine mostro una notifica di successo e aggiorno soltanto la div con i dati utenti per mostrare le modifiche
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
            //se la chiamata ajax non va a buon fine mostro una notifica di errore
            ajaxRequest.fail(function(){
                $('#errore').show();
            });
        }
    });

    //funzione che controlla il pattern della password
    function isValidPassword(password) {
        var pattern = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/; //min 8 caratteri, almeno 1 numero e almeno 1 carattere speciale
        return pattern.test(password);
    };

    //funzione che compara due stringe per verificare se sono uguali
    function check(psw1, psw2) {
        return psw1 == psw2 ? true : false;
    };

    //funzione eseguita al momento del submit del form con id 'validaPass'
    $('#validaPass').submit(function(event){
        event.preventDefault();

        //prendo i valori dai campi input
        var attuale = $('#vecchia').val();
        var nuova = $('#nuova').val();
        var verifica = $('#nuovaVerifica').val();
        var errori = $('.invalid-feedback');
        var login = $('#inviaPass').val();

        //per sicurezza nascondo eventuali messaggi a comparsa
        $(errori).hide();
        $('#successoP').hide();
        $('#erroreP').hide();
        $('#errPsw').show();

        //controllo i valori inseriti dall'utente, se sbagliati faccio visualizzare gli errori corrispondenti
        if(!isValidPassword(nuova)) $(errori[2]).show();
        else if(!check(nuova, verifica)) $(errori[3]).show();
        else //se è tutto corretto effettuo una chiamata ajax che porta al file modPassword.php e passo i valori inseriti dall'utente nel form
        {
            var ajaxRequest =$.ajax({
                type:'POST',
                url: "../backend/modPassword.php",
                dataType: 'json',
                data: { attuale: attuale, nuova: nuova, login: login }
            });
            //se la chiamata ajax va a buon fine mostro una notifica di successo dove faccio scrollare la pagina, e resetto gli input
            ajaxRequest.done(function(data){
                if (data.code == "200"){
                    $('#validaPass').trigger('reset');
                    $('#successoP').show();
                    $('html,body').animate({
                        scrollTop: $("#successoP").offset().top},
                        'slow');
                }
                else { //se l'utente ha sbagliato ad inserire la password attuale non puoi modificarla con una nuova e mostro una notifica di errore
                    $('#validaPass').trigger('reset');
                    $('#errPsw').show();
                    $('html,body').animate({
                        scrollTop: $("#errPsw").offset().top},
                        'slow');
                }
            });

            //se la chiamata ajax non va a buon fine mostro una notifica di errore
            ajaxRequest.fail(function(){
                $('#erroreP').show();
                $('html,body').animate({
                    scrollTop: $("#erroreP").offset().top},
                    'slow');
            });
        }
    });
});