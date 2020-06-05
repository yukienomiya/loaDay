<?php 
  //puoi accedere a questa pagina solo se ti sei prima loggato altrimenti verrai riportato alla pagina index.php
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
        <meta name="viewport" content="width=device-width, initial-scale=1"/>   <!--faccio in modo che la visualizzazione della pagina si adatti ad ogni tipo di dispositivo-->
        
        <!-- Bootstrap CSS -->
        <script src="node_modules/jquery/dist/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="main.css">
        <link rel="stylesheet" type="text/css" href="style.css">
        <script type="text/javascript" src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/profile.js"></script> <!-- carico il file con le funzioni javascript/jquery -->
        <script>
            $(function () {
                $("#navbar").load("components/navbar.html"); //carico la navbar
                $("#footer").load("components/footer.html"); //carico la footbar
            });
        </script>

    </head>

    <body>
        <div id="navbar"></div>

        <!-- Notifiche per modifica profilo-->
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

        <!-- Notifiche per modifica password-->
        <div id="successoP" class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;">
            <strong>Successo!</strong> La tua password è stata modificato correttamente.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div id="erroreP" class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;">
            <strong>Errore!</strong> La tua password non è stata modificata. Riprova più tardi.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div id="errPsw" class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;">
            <strong>Attenzione!</strong> Hai sbagliato ad inserire la password attuale!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        
        <div class="container container-fluid mt-6 margin-bottom-small col-10">
            <h2 class="mt-5 mb-5">Benvenuto, <?= strtoupper($row[2]) ?></h2>
            <div class="container container-fluid mt-5 margin-bottom-small col-lg-8">
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
                                            <input type="radio" name="genere" value="uomo" <?php if($row[4] == "uomo") {?> checked <?php } ?>> Uomo
                                            <input type="radio" name="genere" value="donna"  <?php if($row[4] == "donna") {?> checked <?php } ?> class="ml-3" > Donna
                                        </div>
                                    </div>
                                </div>                                
                            </div>
                            <div class="card-footer text-right">
                                <button id="inviaProfilo" type="submit" class="btn btn-primary profile-btn">SALVA</button>
                            </div>
                        </div>
                    </form>
                    <form id="validaPass" class="form-registration" method="POST" name="modificaPass">
                        <div class="card mt-4">
                            <div class="card-header">
                                <h4 class="card-title"><i class="now-ui-icons users_circle-08"></i> Cambia Password </h4>
                            </div>                            
                            <div class="card-body">                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Password attuale</label>
                                        <div class="form-group">
                                            <input id="vecchia" type="password" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Nuova Password</label>
                                        <div class="form-group">
                                            <input id="nuova" type="password" class="form-control">
                                            <div class="invalid-feedback">
                                                Password non valida (min 8 caratteri, almeno 1 numero e almeno 1 carattere speciale)
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Ripeti Password</label>
                                        <div class="form-group">
                                            <input id="nuovaVerifica" type="password" class="form-control">
                                            <div class="invalid-feedback">
                                                Non corrisponde
                                            </div>
                                        </div>
                                    </div>
                                </div>                            
                            </div>
                            <div class="card-footer text-right">
                                <button id="inviaPass" type="submit" class="btn btn-primary profile-btn">SALVA</button>
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
    header("location: index.php"); //reindirizzamento alla pagina index.php
    exit;
  }
?>