<?php
    //utilizzato in home.php
    session_start();
    require('connection.php');

    // prendo i dati e elimino la deadline dal db
    if(isset($_POST["deadlineID"]))
    {
        $id = $_POST["deadlineID"];

        $sql = "DELETE FROM deadlines WHERE id = '$id'";
    
        if (!$conn -> query($sql)) { // se qualcosa e andato storto
          die($mysqli -> error);
        }
    }
    else
    {
        header('HTTP/1.1 401 Unauthorized'); //se sei arrivato qui modificando a mano la URL vieni reindirizzato a una pagina di errore
    }

    mysqli_close($conn); //chiudi connessione al DB
?>