<?php /*session_start();
if(isset($_SESSION['email']))
{*/
?>
<!DOCTYPE html>
<html>
    <head>
        <title>profile</title>   <!--titolo della pgina-->
        <meta charset="utf-8"/> <!--imposto la codifica della pagina-->
        <meta name="viewport" content="width-device-width, initial-scale=1"/>   <!--faccio in modo che la visualizzazione della pagina si adatti ad ogni tipo di dispositivo-->
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>
        <!--NAVBAR-->
        <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">
            <img src="../media/logo.png" class="d-inline-block align-top logo" width="110px" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05"
            aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExample05">
            <ul class="navbar-nav ml-auto">
                <li>
                    <a class="nav-link" href="#">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Profilo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="aboutUs.html">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">logout</a>
                </li>
            </ul>
        </div>
        </nav>
        
        <!--CONTENITORE DELLA PAGINA-->
        <div class="container container-fluid mt-6 margin-bottom-small col-10"> <!--crea un "contenitore" per la pagina-->
            <h1>Welcome <?php echo $_SESSION['name']?></h1>
            <div class="container container-fluid mt-5 margin-bottom-small col-8"> <!--crea un "contenitore" per la pagina-->
            <h3 class="text-center margin-top-small">Informazioni personali</h3>

            <!--Elemento principale-->
            <!--Nome-->
            <div class="form-group row mt-5">
                <label for="colFormLabel" class="col-sm-1 col-form-label">Nome</label>
                <div class="col-sm-8">
                    <div class="card">
                        <div class="card-body">
                            NomeInserito
                        </div>
                    </div>
                </div>
                <label for="colFormLabel" class="col-sm-1 col-form-label" data-toggle="modal" data-target="#modalForm">change</label>
                <!--<button type="button" class="btn btn-info btn-lg btn-open" data-toggle="modal" data-target="#modalForm">Change</button>-->

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
                                            <form class="form-group">
                                                <div class="form-group">
                                                    <label>Name:</label>
                                                    <input type="text" name="name" class="form-control">
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-info btn-lg btn-submit" type="submit">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Cognome-->
            <div class="form-group row mt-5">
                <label for="colFormLabel" class="col-sm-1 col-form-label">Cognome</label>
                <div class="col-sm-8">
                    <div class="card">
                        <div class="card-body">
                        CognomeInserito
                        </div>
                    </div>
                </div>
                <label for="colFormLabel" class="col-sm-1 col-form-label">change</label>
            </div>

            <!--Email-->
            <div class="form-group row mt-5">
                <label for="colFormLabel" class="col-sm-1 col-form-label">Email</label>
                <div class="col-sm-8">
                    <div class="card">
                        <div class="card-body">
                            EmailInserita
                        </div>
                    </div>
                </div>
            </div>

            <!--Password-->
            <div class="form-group row mt-5">
                <label for="colFormLabel" class="col-sm-1 col-form-label">Password</label>
                <div class="col-sm-8">
                    <div class="card">
                        <div class="card-body">
                            PasswordInserita
                        </div>
                    </div>
                </div>
                <label for="colFormLabel" class="col-sm-1 col-form-label">change</label>
            </div>

            <!--Data di nascita-->
            <div class="form-group row mt-5">
                <label for="colFormLabel" class="col-sm-1 col-form-label">Data di nascita</label>
                <div class="col-sm-8">
                    <div class="card">
                        <div class="card-body">
                            DDN_Inserita
                        </div>
                    </div>
                </div>
                <label for="colFormLabel" class="col-sm-1 col-form-label">change</label>
            </div>

            <!--Genere-->
            <div class="form-group row mt-5">
                <label for="colFormLabel" class="col-sm-1 col-form-label">Genere</label>
                <div class="col-sm-8">
                    <div class="card">
                        <div class="card-body">
                            GenereInserito
                        </div>
                    </div>
                </div>
                <label for="colFormLabel" class="col-sm-1 col-form-label">change</label>
            </div>
        </div>
    </body>
</html>
<?PHP/*
}
else{
    header('HTTP/1.1 401 Unauthorized');
exit;}*/?>