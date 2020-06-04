<?php
    //usato nella navbar
    // In questo script php viene distrutta la sessione attuale e si viene reindirizzati alla pagina index.php
    session_start();

    if(isset($_GET['logout'])) //controllo se sei arrivato qui cambiando la URL o tramite il link
    {
        session_destroy();
        header('Location: ../frontend/index.php');
    }
    else
    {
        header('HTTP/1.1 401 Unauthorized'); //se sei arrivato qui modificando a mano la URL vieni reindirizzato a una pagina di errore
        exit;
    }
?>