<?php
    session_start();
    require('connection.php');

    // prendo i dati e elimino il task dal db
    if(isset($_POST["taskID"]))
    {
        $id = $_POST["taskID"];

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