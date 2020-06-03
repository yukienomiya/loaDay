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
                <label for="colFormLabel" class="col-sm-1 col-form-label">Nome:</label>
                <div class="col-sm-8">
                    <div class="card">
                        <div class="card-body">
                        <?php echo $_SESSION['name']?>
                        </div>
                    </div>
                </div>
                <label for="colFormLabel" class="col-sm-1 col-form-label" data-toggle="modal" data-target="#modalForm">change</label>
                <!--<button type="button" class="btn btn-info btn-lg btn-open" data-toggle="modal" data-target="#modalForm">Change</button>-->

                <!--popUp_Nome-->
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
                                        <form id="formChangeName" action="../Backend/dataChange.php" class="form-registration" method="post" name="formRegistration">    <!--crea un form per cambiare nome-->
                                            <form class="form-group">
                                                <div class="form-group">
                                                    <input type="text" name="inputName" class="form-control" placeholder="Nome" autofocus required/>
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
                <label for="colFormLabel" class="col-sm-1 col-form-label">Cognome:</label>
                <div class="col-sm-8">
                    <div class="card">
                        <div class="card-body">
                        <?php echo $_SESSION['surname']?>
                        </div>
                    </div>
                </div>
                <label for="colFormLabel" class="col-sm-1 col-form-label" data-toggle="modal" data-target="#modalFormSurname">change</label>

                <!--popUp_Cognome-->
                <div class="container-fluid">
                    <div class="row">
                        <div class="modal fade" role="dialog" id="modalFormSurname">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Inserisci il cognome</h4>
                                        <button class="close" type="button" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form">
                                            <form class="form-group">
                                                <div class="form-group">
                                                    <input type="text" name="inputSurname" class="form-control" placeholder="Cognome" required/>
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

            <!--Email-->
            <div class="form-group row mt-5">
                <label for="colFormLabel" class="col-sm-1 col-form-label">Email</label>
                <div class="col-sm-8">
                    <div class="card">
                        <div class="card-body">
                        <?php echo $_SESSION['email']?>
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
                        <?php echo $_SESSION['password']?>
                        </div>
                    </div>
                </div>
                <label for="colFormLabel" class="col-sm-1 col-form-label" data-toggle="modal" data-target="#modalFormPassword">change</label>

                <!--popoUp_Password-->
                <div class="container-fluid">
                    <div class="row">
                        <div class="modal fade" role="dialog" id="modalFormPassword">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Inserisci la password</h4>
                                        <button class="close" type="button" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form">
                                            <form class="form-group">
                                                <div class="form-group">
                                                    <input type="password" name="inputPassword" class="form-control" placeholder="Password" required/>
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

            <!--Data di nascita-->
            <div class="form-group row mt-5">
                <label for="colFormLabel" class="col-sm-1 col-form-label">Data di nascita</label>
                <div class="col-sm-8">
                    <div class="card">
                        <div class="card-body">
                        <?php echo $_SESSION['dataDiNascita']?>
                        </div>
                    </div>
                </div>
                <label for="colFormLabel" class="col-sm-1 col-form-label" data-toggle="modal" data-target="#modalFormDDN">change</label>
                
                <!--popUp_DataDiNascita-->
                <div class="container-fluid">
                    <div class="row">
                        <div class="modal fade" role="dialog" id="modalFormDDN">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Inserisci la data di nascita</h4>
                                        <button class="close" type="button" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form">
                                            <form class="form-group mt-5 mb-5">
                                                <div class="form-group">
                                                    <input type="date" name="inputDDN" class="input-group date" required>
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

            <!--Genere-->
            <div class="form-group row mt-5">
                <label for="colFormLabel" class="col-sm-1 col-form-label">Genere</label>
                <div class="col-sm-8">
                    <div class="card">
                        <div class="card-body">
                        <?php echo $_SESSION['genere']?>
                        </div>
                    </div>
                </div>
                <label for="colFormLabel" class="col-sm-1 col-form-label" data-toggle="modal" data-target="#modalFormGenere">change</label>

                <!--popUp_Genere-->
                <div class="container-fluid">
                    <div class="row">
                        <div class="modal fade" role="dialog" id="modalFormGenere">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Scegli il genere</h4>
                                        <button class="close" type="button" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form">
                                            <form class="form-group">
                                                <div class="form-group">
                                                    <div class="form-check form-check-inline">  <!--crea due elementi di tipo radio per la selezione del genere-->
                                                        <input type="radio" name="genere" value="uomo" required>M &nbsp;&nbsp;&nbsp;
                                                        <input type="radio" name="genere" value="donna" required>F
                                                    </div>
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
        </div>
    </body>
</html>
<?PHP/*
}
else{
    header('HTTP/1.1 401 Unauthorized');
exit;}*/?>