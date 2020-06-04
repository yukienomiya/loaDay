<?php session_start();
/*if(isset($_SESSION['email']))
{*/
?>
<!DOCTYPE html>
<html>
    <head>
        <title>profile</title>   <!--titolo della pgina-->
        <meta charset="utf-8"/> <!--imposto la codifica della pagina-->
        <meta name="viewport" content="width-device-width, initial-scale=1"/>   <!--faccio in modo che la visualizzazione della pagina si adatti ad ogni tipo di dispositivo-->
        
        <!-- Bootstrap CSS -->
        <script src="node_modules/jquery/dist/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="main.css">
        <link rel="stylesheet" type="text/css" href="style.css">
        <script type="text/javascript" src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script>
            $(function () {
                $("#navbar").load("components/navbar.html");
                $("#footer").load("components/footer.html");
            });
        </script>

    </head>

    <body>
        <div id="navbar"></div>
        
        <!--CONTENITORE DELLA PAGINA-->
        <div class="container container-fluid mt-6 margin-bottom-small col-10"> <!--crea un "contenitore" per la pagina-->
            <h1 class="mt-5 mb-5">Welcome utente_loggato</h1>
            <div class="container container-fluid mt-5 margin-bottom-small col-8"> <!--crea un "contenitore" per la pagina-->
            <h3 class="text-center margin-top-small mt-5 mb-5">Informazioni personali</h3>

            <!--Dati registrati-->
            <div class="form-group row mt-5">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Nome:</label>
                <div class="col-sm-10">
                    <div class="card">
                        <div class="card-body">
                            <?php echo $_SESSION['name']?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row mt-5">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Cognome:</label>
                <div class="col-sm-10">
                    <div class="card">
                        <div class="card-body">
                            <?php echo $_SESSION['surname']?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row mt-5">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Email:</label>
                <div class="col-sm-10">
                    <div class="card">
                        <div class="card-body">
                            <?php echo $_SESSION['email']?>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="form-group row mt-5">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Password:</label>
                <div class="col-sm-10">
                    <div class="card">
                        <div class="card-body">
                            <?php echo $_SESSION['password']?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row mt-5">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Data di nascita:</label>
                <div class="col-sm-10">
                    <div class="card">
                        <div class="card-body">
                            <?php echo $_SESSION['dataDiNascita']?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row mt-5">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Genere:</label>
                <div class="col-sm-10">
                    <div class="card card-title">
                        <div class="card-body">
                            <?php echo $_SESSION['genere']?>
                        </div>
                    </div>
                </div>
            </div>
            </div>

            <div class="text-center mb-5">
                <button type="button" class="btn btn-secondary active center mt-5 margin-bottom-medium" data-toggle="modal" data-target="#modalForm">Change</button>
            </div>
        </div>
        
        <!--popUp_Form-->
        <div class="container-fluid">
            <div class="row">
                <div class="modal fade" role="dialog" id="modalForm">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Inserisci il nome</h4>
                                <button class="close" type="button" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="form">
                                <form id="formChangeData" action="../Backend/dataChange.php" class="form-registration mb-2" method="post" name="formChangeData" onSbmit="">    <!--crea un form per cambiare nome-->
                                    <input type="text" name="inputName" class="form-control mb-2" placeholder="Nome"/>
                                    <input type="text" name="inputSurname" class="form-control mb-2" placeholder="Cognome"/>
                                    <input type="password" name="inputPassword" class="form-control mb-2" placeholder="Password"/>
                                    <input type="date" name="inputDDN" class="input-group date">
                                    <div class="form-check form-check-inline mt-3">  <!--crea due elementi di tipo radio per la selezione del genere-->
                                        <input type="radio" name="genere" value="uomo">Uomo &nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="genere" value="donna">Donna
                                    </div>
                                        <div class="modal-footer mt-3">
                                            <button class="btn btn-secondary active center" type="submit">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="footer"></div>
    </body>
</html>
<?PHP
/*}
else{
    header('HTTP/1.1 401 Unauthorized');
exit;}*/?>

<!--

-->