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
        var login = $('#invia').val();

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
});