<?php
    //utilizzato in home.php
    session_start();
    require('connection.php');

    // prendo i dati e aggiorno l'attributo completato e done_date del task nel db
    if(isset($_POST["taskID"]))
    {
        $id = $_POST["taskID"];
        $completed = $_POST["taskCompleted"];

        if($completed)
        {
            $oggi = date("Y-m-d");
            $sql = "UPDATE tasks SET completato = '$completed', done_date = '$oggi' WHERE tasks.id = '$id'";
        }
        else
            $sql = "UPDATE tasks SET completato = '$completed', done_date = NULL WHERE tasks.id = '$id'";
        
    
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