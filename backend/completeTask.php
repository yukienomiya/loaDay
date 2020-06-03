<?php
    session_start();
    require_once('connection.php');

    // prendo i dati e aggiorno l'attributo completato del task nel db
    if(isset($_POST["taskID"]))
    {
        $id = $_POST["taskID"];
        $completed = $_POST["taskCompleted"];

        $sql = "UPDATE tasks SET completato = '$completed' WHERE tasks.id = '$id'";
    
        if (!$conn -> query($sql)) { // se qualcosa e andato storto
          die($mysqli -> error);
        }
    }
    else
    {
        header('HTTP/1.1 401 Unauthorized');
    }

    mysqli_close($conn);
?>