<?php
    //usato in profile.php
    //questo script serve per eseguire i controlli ed eventualmente modificare la password di un utente
    session_start();
    require('connection.php');

    if(isset($_POST["login"])) //controllo se sei arrivato qui premendo il tasto submit del form validaPass in profile.php o cambiando la URL
    {
        $email = $_SESSION['email'];

        //prendo la vecchia e la nuova password che hai inserito nel form
        $attuale = $_POST['attuale'];
        $nuova = $_POST['nuova'];

        //selezioni la password presente nel database dell'utente che sta cercando di modificarla
        $sql = "SELECT pass FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_row($result);
        if(password_verify($attuale, $row[0])) //se la password nel database e quella inserita da lui corrispondono cambia la password nel database
        {
            $nuova = password_hash($nuova, PASSWORD_BCRYPT); //crypto la password
            $sql = "UPDATE users SET pass = '$nuova' WHERE email = '$email'"; //eseguo la query di update
            if (!$conn -> query($sql)) { // se qualcosa e andato storto
                die($mysqli -> error);
            }
            else {
                echo json_encode(['code'=>200]); //messaggio di successo
                exit;
            }
        }
        else
        {
            echo json_encode(['code'=>300]); //messaggio di errore
            exit;
        }
    }
    else
    {
        header('HTTP/1.1 401 Unauthorized'); //se sei arrivato qui modificando a mano la URL vieni reindirizzato a una pagina di errore
    }

    mysqli_close($conn);
?>