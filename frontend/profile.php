<?php 
  session_start();
  if(isset($_SESSION['email']))
  {
    require('../backend/getInfo.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>loaDay - Profilo</title>   <!--titolo della pgina-->
        <meta charset="utf-8"/> <!--imposto la codifica della pagina-->
        <meta name="viewport" content="width-device-width, initial-scale=1"/>   <!--faccio in modo che la visualizzazione della pagina si adatti ad ogni tipo di dispositivo-->
        
        <!-- Bootstrap CSS -->
        <script src="node_modules/jquery/dist/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="main.css">
        <link rel="stylesheet" type="text/css" href="style.css">
        <script type="text/javascript" src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="js/profile.js"></script>
        <script>
            $(function () {
                $("#navbar").load("components/navbar.html");
                $("#footer").load("components/footer.html");
            });
        </script>

    </head>

    <body>
        <div id="navbar"></div>

        <div id="successo" class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;">
            <strong>Successo!</strong> Il tuo profilo è stato modificato correttamente.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div id="errore" class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;">
            <strong>Errore!</strong> Si è verificato un errore imprevisto. Riprova più tardi.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        
        <!--CONTENITORE DELLA PAGINA-->
        <div class="container container-fluid mt-6 margin-bottom-small col-10"> <!--crea un "contenitore" per la pagina-->
            <h2 class="mt-5 mb-5">Benvenuto, <?= strtoupper($row[2]) ?></h2>
            <div class="container container-fluid mt-5 margin-bottom-small col-8"> <!--crea un "contenitore" per la pagina-->
                <div class="row">
                    <div id="refresh" class="col-md-12">
                    <form id="valida" class="form-registration" method="POST" name="modifica" novalidate>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><i class="now-ui-icons users_circle-08"></i> Informazioni personali </h4>
                            </div>                            
                            <div class="card-body">                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Email</label>
                                        <div class="form-group">
                                            <input type="text" value="<?= $row[0] ?>" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Nome</label>
                                        <div class="form-group">
                                            <input id="nome" type="text" value="<?= strtoupper($row[2]) ?>" class="form-control" required>
                                            <div class="invalid-feedback">
                                                Nome non valido
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Cognome</label>
                                        <div class="form-group">
                                            <input id="cogn" type="text" value="<?= strtoupper($row[3]) ?>" class="form-control" required>
                                            <div class="invalid-feedback">
                                                Cognome non valido
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Data di Nascita</label>
                                        <div class="form-group">
                                            <input id="ddn" type="date" value="<?= $row[5] ?>" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Genere</label>
                                        <div class="form-group form-check">
                                            <input id="sesso" type="radio" name="genere" value="uomo" <?php if($row[4] == "uomo") {?> checked <?php } ?>> Uomo
                                            <input id="sesso" type="radio" name="genere" value="donna"  <?php if($row[4] == "donna") {?> checked <?php } ?> class="ml-3" > Donna
                                        </div>
                                    </div>
                                </div>                                
                            </div>
                            <div class="card-footer text-right">
                                <button id="invia" type="submit" class="btn btn-primary">SALVA</button>
                            </div>
                        </div>
                    </form>
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
    header("location: /frontend/index.php");
    exit;
  }
?>