<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>loaDay - Home Page</title>
		<!-- Bootstrap core CSS -->
		<link href="main.css" rel="stylesheet">
	  </head>
	  <body>
		<nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
		  <div class="container">
			<a class="navbar-brand" href="index.php">
			  <strong>loaDay</strong>
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
			  aria-expanded="false" aria-label="Toggle navigation">
			  <span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
			  <!-- Left -->
			  <ul class="navbar-nav mr-auto">
				<li class="nav-item active">
				  <a class="nav-link" href="index.html">Home
				  </a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="about_us.html">About Us</a>
				</li>
			  </ul>
			  <!-- Right -->
			  <ul class="navbar-nav nav-flex-icons">
				<li class="nav-item">
				  <a href="signin.html" class="nav-link border border-light rounded">
					Registrati!
				  </a>
				</li>
			  </ul>
			</div>
		  </div>
		</nav>
	  
		<!-- Full Page Intro -->
		<div class="view" style="background-image: url('img/sfondo.png'); background-repeat: no-repeat; background-size: cover;">
		  <div class="mask rgba-black-light d-flex justify-content-center align-items-center">
			<div class="container">
			  <div class="row">
				<div class="col-md-6 mb-4 white-text text-center text-md-left">
	  
				  <h1 class="display-4 font-weight-bold">LoaDay</h1>
	  
				  <hr class="hr-light">
	  
				  <p>
					<strong>Ottimizza il tuo tempo e produci al massimo!</strong>
				  </p>
	  
				  <p class="mb-4 d-none d-md-block">
					<strong>Tramite questa home page meravigliosa potrai accedere e registrarti all'applicazione web che ti farà laureare in poco tempo!
						Organizza la tua giornata nel migliore dei modi senza mai dimenticare ciò che devi fare.
					</strong>
				  </p>
	  
				<a class="btn btn-primary btn-lg" id="mostraNascosta">Leggi altro
				  </a>
	  
				</div>
				<div class="col-md-6 col-xl-5 mb-4">
				  <div class="card">
					<div class="card-header">
						<h3 class="dark-grey-text text-center">
							<strong>Accedi</strong>
						  </h3>
					</div>
					<div class="card-body">
					  <!-- Form -->
					  <form id="loginform" class="needs-validation" novalidate method="POST" action="../backend/login.php">
						<div class="form-row">
							<div class="input-group form-control-lg">
								<span class="input-group-prepend">
									<div class="input-group-text">
									  <svg class="bi bi-person" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										  <path fill-rule="evenodd" d="M13 14s1 0 1-1-1-4-6-4-6 3-6 4 1 1 1 1h10zm-9.995-.944v-.002.002zM3.022 13h9.956a.274.274 0 00.014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 00.022.004zm9.974.056v-.002.002zM8 7a2 2 0 100-4 2 2 0 000 4zm3-2a3 3 0 11-6 0 3 3 0 016 0z" clip-rule="evenodd"/>
										</svg>
									</div>
								</span>
								<input id="email" type="email" class="form-control" name="email" value="" placeholder="Email" required autofocus="">
								<div class="invalid-feedback">
									Email non valida!
								</div>
							</div>
						</div>
						<div class="form-row">
							<div class="input-group form-control-lg">
								<div class="input-group-prepend">
									<div class="input-group-text">
									  <svg class="bi bi-shield-lock" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										  <path fill-rule="evenodd" d="M5.443 1.991a60.17 60.17 0 00-2.725.802.454.454 0 00-.315.366C1.87 7.056 3.1 9.9 4.567 11.773c.736.94 1.533 1.636 2.197 2.093.333.228.626.394.857.5.116.053.21.089.282.11A.73.73 0 008 14.5c.007-.001.038-.005.097-.023.072-.022.166-.058.282-.111.23-.106.525-.272.857-.5a10.197 10.197 0 002.197-2.093C12.9 9.9 14.13 7.056 13.597 3.159a.454.454 0 00-.315-.366c-.626-.2-1.682-.526-2.725-.802C9.491 1.71 8.51 1.5 8 1.5c-.51 0-1.49.21-2.557.491zm-.256-.966C6.23.749 7.337.5 8 .5c.662 0 1.77.249 2.813.525a61.09 61.09 0 012.772.815c.528.168.926.623 1.003 1.184.573 4.197-.756 7.307-2.367 9.365a11.191 11.191 0 01-2.418 2.3 6.942 6.942 0 01-1.007.586c-.27.124-.558.225-.796.225s-.526-.101-.796-.225a6.908 6.908 0 01-1.007-.586 11.192 11.192 0 01-2.417-2.3C2.167 10.331.839 7.221 1.412 3.024A1.454 1.454 0 012.415 1.84a61.11 61.11 0 012.772-.815z" clip-rule="evenodd"/>
										  <path d="M9.5 6.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"/>
										  <path d="M7.411 8.034a.5.5 0 01.493-.417h.156a.5.5 0 01.492.414l.347 2a.5.5 0 01-.493.585h-.835a.5.5 0 01-.493-.582l.333-2z"/>
										</svg>
									</div>
								</div>
								<input id="pass" type="password" class="form-control" name="pass" required placeholder="Password">
								<div class="invalid-feedback">
									Password non valida!
								</div>
							</div>
						</div>

						  
						<div class="text-center mt-4">
							<button id="login" type="submit" name="login" class="btn btn-primary">Invia</button>
							<br>
							<small><a href="registrazione.html" class="btn-link">Non sei registrato? Clicca qui!</a></small>
						</div>
					  </form>
					</div>
				  </div>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  
		<main>
		  <div id="nascosta" class="container" style="display: none;">
			<section class="mt-5">
			  <div class="row">
				<div class="col-md-6 mb-4">
					<div id="myCar" class="carousel slide" data-ride="carousel">
					  <ol class="carousel-indicators">
						<li data-target="#myCar" data-slide-to="0" class="active"></li>
						<li data-target="#myCar" data-slide-to="1"></li>
						<li data-target="#myCar" data-slide-to="2"></li>
						<li data-target="#myCar" data-slide-to="3"></li>
						<li data-target="#myCar" data-slide-to="4"></li>
					  </ol>
					  <div class="carousel-inner">
						  <div class="carousel-item active">
							  <img class="d-block w-100" src="img/1.png" alt="First slide">
							  <div class="carousel-caption d-none d-md-block">
								  <h5>Home Page</h5>
									<p>La pagina inziale dove ti trovi ora</p>
							  </div>
						  </div>
						  <div class="carousel-item">
							  <img class="d-block w-100" src="img/2.png" alt="Second slide">
							  <div class="carousel-caption d-none d-md-block">
								  <h5>Pagina Principale</h5>
									<p>Dove potrai visualizzare, modificare ed eliminare tasks e deadlines</p>
							  </div>
						  </div>
						  <div class="carousel-item">
							  <img class="d-block w-100" src="img/3.png" alt="Third slide">
							  <div class="carousel-caption d-none d-md-block">
								  <h5>About Us</h5>
									<p>Qui troverai una descrizione dei componenti del gruppo di questo progetto!</p>
							  </div>
						  </div>
						  <div class="carousel-item">
							  <img class="d-block w-100" src="img/4.png" alt="Third slide">
							  <div class="carousel-caption d-none d-md-block">
								  <h5>Profilo</h5>
									<p>LOREM IPSUM STO PIPOLO</p>
							  </div>
						  </div>
						  <div class="carousel-item">
							  <img class="d-block w-100" src="img/5.png" alt="Third slide">
							  <div class="carousel-caption d-none d-md-block">
								  <h5>Pagina di Registrazione</h5>
									<p>Pronto a sfruttare a pieno la tua giornata?!</p>
							  </div>
						  </div>
					  </div>
					  <a class="carousel-control-prev" href="#myCar" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					  </a>
					  <a class="carousel-control-next" href="#myCar" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					  </a>
					</div>
	
			  </div>
				<div class="col-md-6 mb-4">
				  <h3 class="h3 mb-3">Benvenuto alla descrizione segreta</h3>
				  <p>Questa web app nasce dall'idea di 3 ragazzi che dovevano svolgere l'esame di linguaggi e tecnologie per il web durante l'anno accademico 2019/2020</p>
				  <p>Leggi i dettagli in basso per scoprire da quale pagine è formata LoaDay.</p>

				  <hr>

				  <p>
					  <ol class="list-group">
						  <li class="list-group-item" data-target="#myCar" data-slide-to="0">
							<strong>Home Page</strong>
						  </li>
						  <li class="list-group-item" data-target="#myCar" data-slide-to="1">
							<strong>Pagina Principale</strong>
						  </li>
						  <li class="list-group-item" data-target="#myCar" data-slide-to="2">
							<strong>About Us</strong>
						  </li>
						  <li class="list-group-item" data-target="#myCar" data-slide-to="3">
							<strong>Profilo</strong>
						  </li>
						  <li class="list-group-item" data-target="#myCar" data-slide-to="4">
							<strong>Pagina di Registrazione</strong>
						  </li>
					  </ol>					
				  </p>
				</div>
			  </div>
			</section>
		  </div>
		</main>

		<footer class="page-footer text-center font-small">
		  <div class="footer-copyright py-3">
				<div class="text-muted">
					Made with ♥️.
				</div>
		  </div>
		</footer>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script type="text/javascript" src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

		<script>
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
					var pattern = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&-_])[A-Za-z\d@$!%*#?&-_]{8,}$/; //min 8 caratteri, almeno 1 numero e almeno 1 carattere speciale
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
								$(location).attr('href',"../frontend/home.php");
							}
						});

						ajaxRequest.fail(function(return_data){
							$(errLogin).modal('show');
							$('#loginform').trigger('reset');
						});
					}
				});
			});
		</script>
	  </body>
</html>