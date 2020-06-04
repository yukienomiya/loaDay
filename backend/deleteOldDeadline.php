<?php
    //utilizzato in home.php
    require('connection.php');

    //elimino le deadline scadute
    if(isset($_SESSION["email"]))
    {
        $data = date("Y-m-d H:i:s");

        $sql = "DELETE FROM deadlines WHERE user_email = '$email' and data < '$data'";
    
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