<?php
    session_start();
    require_once('connection.php');

    // prendo i dati e aggiorno l'attributo completato del task nel db
    if(isset($_POST["taskID"]))
    {
        $id = $_POST["taskID"];
        $completed = $_POST["taskCompleted"];
        /* $user = $_SESSION['email']; */

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
        header('HTTP/1.1 401 Unauthorized');
    }

    mysqli_close($conn);
?>