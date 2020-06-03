$(document).ready(function(){

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

    $(".list-group-item").hover(function(){
        $(this).addClass('evidenzia');
    }, function(){
        $(this).removeClass('evidenzia');
    });

    function isValidEmail(email) {
        var pattern = /^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/;
        return pattern.test(email);
    };

    function isValidPassword(password) {
        var pattern = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/; //min 8 caratteri, almeno 1 numero e almeno 1 carattere speciale
        return pattern.test(password);
    };

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

    $('#loginform').submit(function(event){
        event.preventDefault();

        var email = $('#email').val();
        var password = $('#pass').val();
        var errori = $('.invalid-feedback');
        var login = $('#login').val();

        $(errori).hide();

        if(!isValidEmail(email) && !isValidPassword(password)) $(errori).show();
        else if(!isValidEmail(email)) $(errori[0]).show();
        else if(!isValidPassword(password)) $(errori[1]).show();
        else
        {
            var form = $(this);
            var url = form.attr('action');

            var ajaxRequest =$.ajax({
                type:'POST',
                url: url,
                dataType:'json',
                data:{email:email, pass:password, login:login}
            });

            ajaxRequest.done(function(data){
                if (data.code == "200"){
                    $(location).attr('href',"home.php");
                }
            });

            ajaxRequest.fail(function(return_data){
                $(errLogin).modal('show');
                $('#loginform').trigger('reset');
            });
        }
    });

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