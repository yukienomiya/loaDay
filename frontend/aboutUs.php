<?php 
//puoi accedere a questa pagina solo se ti sei prima loggato altrimenti verrai riportato alla pagina index.php
  session_start();
  if(isset($_SESSION['email']))
  {
?>
<!DOCTYPE html>
<html>
    <head>
        <title>loaDay - About Us</title>   <!--titolo della pgina-->
        <meta charset="utf-8"/> <!--imposto la codifica della pagina-->
        <meta name="viewport" content="width=device-width, initial-scale=1"/>   <!--faccio in modo che la visualizzazione della pagina si adatti ad ogni tipo di dispositivo-->
        <script src="node_modules/jquery/dist/jquery.min.js"></script>  <!--importo file jquery-->
        <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script> <!--importo file di bootstrap-->
        <link rel="stylesheet" type="text/css" href="main.css"> <!--importo file di bootstrap-->
        <link rel="stylesheet" type="text/css" href="style.css">  <!--importo il file personalizzato .css-->
        <script type="text/javascript" src="js/main.js"></script>  <!--importo classe javascript-->

        <script>
            $(function () {
                $("#navbar").load("components/navbar.html"); //carico la navbar
                $("#footer").load("components/footer.html"); //carico la footbar
            });
        </script>
    </head>

    <body>
      <div id="navbar"></div>
      
      <!--CONTENITORE DELLA PAGINA-->
      <div class="container container-fluid content"> <!--<crea un "contenitore" per la pagina-->

        <!--CAROSELLO-->
        <div id="carouselAboutUs" class="col-12 carousel container-position" data-ride="carousel"> <!--crea un contenitore per il carosello-->
          <div class="carousel-inner">
            <div class="carousel-item active" data-interval="700">  <!--setta l'intervallo di tempo tra un immagine e l'altra-->
              <img src="../media/anteprima_logo.JPG" class="d-block w-100">   <!--seleziona la prima immagine del carosello-->
            </div>
            <div class="carousel-item" data-interval="700"> <!--setta l'intervallo di tempo tra un immagine e l'altra-->
              <img src="../media/aboutusHOME.png" class="d-block w-100">  <!--seleziona la seconda immagine del carosello-->
            </div>
            <div class="carousel-item" data-interval="700"> <!--setta l'intervallo di tempo tra un immagine e l'altra-->
              <img src="../media/profile.png" class="d-block w-100">   <!--seleziona la terza immagine del carosello-->
            </div>
        </div>

          <!--FRECCETTE CAROSELLO-->
          <a class="carousel-control-prev" href="#carouselAboutUs" role="button" data-slide="prev"> <!--implementa la freccia "precedente" del carosello-->
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselAboutUs" role="button" data-slide="next"> <!--implementa la freccia "successiva" del carosello-->
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>

          <!--Indicatori-->
          <ol class="carousel-indicators">  <!--implementa gli indicatori del carosello-->
            <li data-target="#carouselAboutUs" data-slide-to="0" class="active"></li>
            <li data-target="#carouselAboutUs" data-slide-to="1" class="active"></li>
            <li data-target="#carouselAboutUs" data-slide-to="2" class="active"></li>
          </ol>
        </div>

        <!--Riga principale-->
        <div class="row margin-top-small margin-bottom-small">  <!--crea una riga nella pagina-->
          <!--Prima colonna-->
          <div class="col-md-4 text-center">    <!--crea una prima colonna grande un terzo della pagina-->
              <li class="listaAboutUs no-bullets" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">   <!--crea  una lista senza punti per il collapse di seguito-->
                  <a>Da chi nasce loaDay</a>    <!--elemento della lista-->
              </li>
              <!--Primo collapse-->
              <div id="collapseOne" class="collapse margin-top-xSmall margin-bottom-xSmall" aria-labelledby="headingOne">   <!--crea il primo elemento di tipo collapse-->
                  <div class="card-deck">   <!--crea una elemento di tipo card-deck-->
                      <!--Card_Foto_1-->
                      <div class="card" data-toggle="collapse" data-target="#collapseOneOne" aria-expanded="true" aria-controls="collapseOneOne">   <!--crea un elemento di tipo card-->
                          <img src="../media/Gabriele_image.png" class="card-img-top">    <!--selezeziona l'immagine della card-->
                      </div>
                      <!--Card_Foto_2-->
                      <div class="card" data-toggle="collapse" data-target="#collapseOneTwo" aria-expanded="true" aria-controls="collapseOneTwo">
                          <img src="../media/Giorgio_image.png" class="card-img-top">
                      </div>
                      <!--Card_Foto_3-->
                      <div class="card" data-toggle="collapse" data-target="#collapseOneThree" aria-expanded="true" aria-controls="collapseOneThree">
                          <img src="../media/Yuki_image.png" class="card-img-top">
                      </div>
                  </div>
              </div>
              <!--Collapse_Presentazione_1-->
              <div id="collapseOneOne" class="collapse margin-top-xSmall margin-xSmall" aria-labelledby="headingOne">   <!--crea il primo elemento di tipo collapse del primo elemento collapse-->
                  <div class="card">  <!--crea il "contorno" della card-->
                      <div class="card-body"> <!--crea il corpo-->
                          <h5 class="card-title">Gabriele</h5>  <!--varie descrizioni della card-->
                          <p class="card-text">26 anni</p>
                          <p class="card-text">Studente di informatica</p>
                          <p class="card-text">La tecnologia è l'ambito che da sempre mi appassiona, già dai primi anni del liceo la mia idea era quella di immergermi in questo mondo ed approfondirne la conoscenza.</p>
                          <p class="card-text">Nel tempo libero mi dedico ad altre tre grandi passioni: il pianoforte, che suono sin da bambino, la vespa, un regalo ricevuto dal mio nonno meccanico e la birra artigianale.</p>
                          <a href=https://github.com/Ga94> Link al profilo GitHub</a>
                      </div>
                  </div>
              </div>
              <!--Collapse_Presentazione_2-->
              <div id="collapseOneTwo" class="collapse margin-top-xSmall margin-xSmall" aria-labelledby="headingOne">
                  <div class="card">  <!--crea il contorno-->
                      <div class="card-body"> <!--crea il corpo-->
                          <h5 class="card-title">Giorgio</h5>
                          <p class="card-text">23 anni</p>
                          <p class="card-text">Studente di Informatica</p>
                          <p class="card-text">L'informatica è la scienza che mi appassiona fin dalle superiori.</p>
                          <p class="card-text">Accetto sempre ogni sfida cercando di vincere ogni volta e sono appassionato di basket.</p>
                          <a href=https://github.com/GiorgioMor> Link al profilo GitHub</a>
                      </div>
                  </div>
              </div>
              <!--Collapse_Presentazione_3-->
              <div id="collapseOneThree" class="collapse margin-top-xSmall margin-xSmall" aria-labelledby="headingOne">
                  <div class="card">  <!--crea il contorno-->
                      <div class="card-body"> <!--crea il corpo-->
                          <h5 class="card-title">Yuki</h5>
                          <p class="card-text">22 anni</p>
                          <p class="card-text">Studentessa di informatica</p>
                          <p class="card-text">Sono un'aspirante poliglotta, mi interessa il web development e il mondo del software open source.</p>
                          <p class="card-text">Ah, e ho un gatto :)</p>
                          <a href=https://github.com/yukienomiya> Link al profilo GitHub</a>
                      </div>
                  </div>
              </div>
          </div>

          <!--Seconda colonna-->
          <div class="col-md-4 text-center">    <!--crea una seconda colonna grande un terzo della pagina-->
              <li class="listaAboutUs no-bullets" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">   <!--crea  una lista senza punti per il collapse di seguito-->
                  <a>Come nasce loaDay</a>  <!--elemento della lista-->
              </li>
              <!--Secondo collapse-->
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo">  <!--crea il primo elemento di tipo collapse-->
                  <div class="card-body">   <!--corpo della card-->
                      Essendo studenti universitari, comprendiamo benissimo quanto sia difficile essere produttivi quando le cose da fare e le scadenze da rispettare non fanno che aumentare giorno dopo giorno. loaDay rappresenta un modo semplice ed efficace per aiutarti a organizzare gli impegni e rimanere motivato e produttivo.
                  </div>
              </div>
          </div>

          <!--Terza colonna-->
          <div class="col-md-4 text-center">
              <li class="listaAboutUs no-bullets" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                <a>Cosa sarà domani loaDay</a>
              </li>
              <!--Terzo collapse-->
              <div id="collapseThree" class="collapse" aria-labelledby="headingThree">
                  <div class="card-body">
                      Continueremo a sviluppare e migliorare loaDay in futuro, in modo da permettere ad altri utenti di utilizzarla. Stiamo già programmando miglioramenti da apportare e funzionalità da aggiungere. Stay tuned!
                  </div>
              </div>
          </div>
        </div>
      </div>
      <div id="footer"></div>
    </body>
</html>
<?php
  }
  else {
    header("location: index.php"); //reindirizzamento alla pagina index.php
    exit;
  }
?>