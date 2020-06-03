<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>loaDay - Benvenuto</title>
		<!-- Bootstrap core CSS -->
		<link href="main.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="js/index.js"></script>
	</head>
	<body>
	  
		<!-- Full Page Intro -->
		<div class="view index-bg">
		  <div class="mask rgba-black-light d-flex justify-content-center align-items-center">
        <div class="container d-flex">
          <div class="row justify-content-between align-self-center">
            <div class="col-md-6 mb-4 text-center text-md-left">
        
              <img src="../media/logoST.png" style="height: 150px;">
        
              <hr class="hr-dark">
        
              <p class="text-secondary">Pianifica i tuoi obiettivi e carica la tua giornata!</p>
        
              <p class="d-none d-md-block text-secondary">
                loaDay ti offre una piattaforma dove annotare i tuoi obiettivi giornalieri e le tue imminenti scadenze, in modo da aumentare la tua produttività.
                Completa tutti i task che ti sei prefissato e riempi la barra di caricamento della giornata!
              </p>
        
              <a class="d-none d-md-inline index-link" id="mostraNascosta">Scopri di più</a>
        
            </div>
            <div class="col-md-6 col-xl-5 mb-4">
              <div class="card">
                <div class="card-header login-card-header">
                  <h3 class="text-center mb-0 font-weight-light">
                    Accedi
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
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <label id="scritta" class="form-check-label mr-2" for="show">Mostra</label>
                            <input id="show" type="checkbox">
                          </div>
                        </div>
                        <div class="invalid-feedback">
                          Password non valida!
                        </div>
                      </div>
                    </div>

                    <div class="text-center mt-4">
                      <button id="login" type="submit" name="login" class="btn btn-accent mb-2">LOGIN</button>
                      <br>
                      <small><a href="registration.html" class="btn-link">Non sei registrato? Clicca qui!</a></small>
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
              <div id="myCar" class="carousel slide carousel-slide" data-ride="carousel">
                <ol class="carousel-indicators">
                <li data-target="#myCar" data-slide-to="0" class="active"></li>
                <li data-target="#myCar" data-slide-to="1"></li>
                <li data-target="#myCar" data-slide-to="2"></li>
                <li data-target="#myCar" data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-100" src="../media/taskICON.png" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>TO-DO LIST</h5>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="../media/dlICON.png" alt="Second slide">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>DEADLINES</h5>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="../media/profileICON.png" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>PROFILO</h5>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="../media/aboutusICON.png" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>ABOUT US</h5>
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
              <h3 class="h3 mb-3">Una sbirciatina alle funzionalità</h3>
              <p>Se deciderai di <a href="/registration.html">registrati</a> a loaDay, avrai accesso a queste pagine:</p>
              <p>Home, dove potrai annotare i tuoi task per oggi, domani o per il futuro. Inoltre, troverai anche la sezione Deadlines, dove inserire le scadenze importanti da ricordare.</p>
              <p>Profilo, dove potrai modificare i tuoi dati personali.</p>
              <p>About Us, dove scoprirai di più su chi ha creato loaDay.</p>
              <hr>
              <p>
                <ol class="list-group">
                  <li class="list-group-item" data-target="#myCar" data-slide-to="0">
                  <strong>To-do list</strong>
                  </li>
                  <li class="list-group-item" data-target="#myCar" data-slide-to="1">
                  <strong>Deadlines</strong>
                  </li>
                  <li class="list-group-item" data-target="#myCar" data-slide-to="2">
                  <strong>Profilo</strong>
                  </li>
                  <li class="list-group-item" data-target="#myCar" data-slide-to="3">
                  <strong>About Us</strong>
                  </li>
                </ol>					
              </p>
            </div>

          </div>
        </section>
		  </div>
		</main>

	</body>
</html>