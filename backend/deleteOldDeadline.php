<?php
    require_once('connection.php');

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
        header('HTTP/1.1 401 Unauthorized');
    }
    mysqli_close($conn);
?>