<?php
    session_start();
    require_once('connection.php');

    // prendo i dati e elimino il task dal db
    if(isset($_POST["taskID"]))
    {
        $id = $_POST["taskID"];
        /* $user = $_SESSION['email']; */

        $sql = "DELETE FROM tasks WHERE id = '$id'";
    
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