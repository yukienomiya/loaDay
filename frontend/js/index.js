$(document).ready(function(){

    //funzione che viene eseguita sul click del bottone con id 'mostraNascosta'
    //mostra o nasconde una div cambiando il testo del bottone
    $("#mostraNascosta").click(function(){
        $("#nascosta").toggle(500, function(){
                if(!($("#nascosta").css('display') == 'none'))
                {
                    $('html,body').animate({
                        scrollTop: $("#nascosta").offset().top},
                        'slow');
                    $("#mostraNascosta").text("Chiudi");
                }
                else
                {
                    $("#mostraNascosta").text("Leggi altro");
                }
            });
    });

    //funzione che aggiunge o rimuove la classe 'evidenzia' sull'hover degli elementi con classe 'list-group-item'
    $(".list-group-item").hover(function(){
        $(this).addClass('evidenzia');
    }, function(){
        $(this).removeClass('evidenzia');
    });

    //funzione per verificare se la stringa passata (in questo caso l'email) è del formato scelto
    function isValidEmail(email) {
        var pattern = /^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/;
        return pattern.test(email);
    };

    //funzione per verificare se la stringa passata (in questo caso la password) è del formato scelto
    function isValidPassword(password) {
        var pattern = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/; //min 8 caratteri, almeno 1 numero e almeno 1 carattere speciale
        return pattern.test(password);
    };

    //modal da mostrare se al momento del login l'email e la password inseriti non corrispondono con quelli nel database
    var errLogin = '<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">'+
    '<div class="modal-dialog modal-dialog-centered" role="document">'+
    '<div class="modal-content">'+
        '<div class="modal-header">'+
        '<h5 class="modal-title" id="exampleModalLongTitle">Qualcosa è andato storto...</h5>'+
        '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
            '<span aria-hidden="true">&times;</span>'+
        '</button>'+
        '</div>'+
        '<div class="modal-body">'+
        'L\'email o la password sono errati, per favore prova di nuovo.'+
        '</div>'+
        '<div class="modal-footer">'+
        '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>'+
        '</div>'+
    '</div>'+
    '</div>'+
    '</div>';

    //funzione da eseguire al momento del submit del form con id 'loginform'
    $('#loginform').submit(function(event){
        event.preventDefault();

        //prendo i valori dai campi input
        var email = $('#email').val();
        var password = $('#pass').val();
        var errori = $('.invalid-feedback');
        var login = $('#login').val();

        //nascondo i messaggi di errore (se prova a fare il submit 2 volte con errori, gli errori devono resettarsi!)
        $(errori).hide();

        //controllo i valori inseriti dall'utente, se sbagliati faccio visualizzare gli errori corrispondenti
        if(!isValidEmail(email) && !isValidPassword(password)) $(errori).show();
        else if(!isValidEmail(email)) $(errori[0]).show();
        else if(!isValidPassword(password)) $(errori[1]).show();
        else //se è tutto corretto effettuo una chiamata ajax che porta al file login.php e passo i valori inseriti dall'utente nel form
        {
            var ajaxRequest =$.ajax({
                type:'POST',
                url: "../backend/login.php",
                dataType: 'json',
                data: { email: email, pass: password, login: login }
            });

            //se la chiamata ajax va a buon fine mando l'utente alla home (home.php)
            ajaxRequest.done(function(data){
                if (data.code == "200"){
                    $(location).attr('href',"home.php");
                }
            });

            //se la chiamata ajax non va a buon fine mostro la modal definita e resetto il form
            ajaxRequest.fail(function(return_data){
                $(errLogin).modal('show');
                $('#loginform').trigger('reset');
            });
        }
    });

    //funzione per mostrare o nascondere la password nel form di login
    $('#show').change(function() {
        if(this.checked) {
            $('#pass').attr('type','text');
            $("#scritta").text("Nascondi");
        }
        else {
            $('#pass').attr('type','password');
            $("#scritta").text("Mostra");
        }
    });
});