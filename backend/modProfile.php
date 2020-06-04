<?php
    //usato in profile.php
    //questo script serve per modificare i dati del profilo di un utente
    session_start();
    require('connection.php');

    if(isset($_POST["login"])) //controllo se sei arrivato qui premendo il tasto submit del form valida in profile.php o cambiando la URL
    {
        $email = $_SESSION['email'];

        //prendo i dati inseriti nel form
        $nome = strtolower($_POST['nome']);
        $cognome = strtolower($_POST['cognome']);
        $sesso = $_POST['sesso'];
        $ddn = $_POST['ddn'];
        
        //aggiorno i dati nel database
        $sql = "UPDATE users SET nome = '$nome', cognome = '$cognome', genere = '$sesso', dataDiNascita = '$ddn' WHERE email = '$email'";
        if (!$conn -> query($sql)) { // se qualcosa e andato storto
            die($mysqli -> error);
        }
        else {
            echo json_encode(['code'=>200]);
            exit;
        }
        
    }
    else
    {
        header('HTTP/1.1 401 Unauthorized'); //se sei arrivato qui modificando a mano la URL vieni reindirizzato a una pagina di errore
    }

    mysqli_close($conn); //chiudi connessione al DB
?>