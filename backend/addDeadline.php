<?php
    session_start();
    require_once('connection.php');

    // prendo i dati e salvo la deadline nel db
    if(isset($_POST["deadlineDate"]))
    {
        $description = $_POST["deadlineDescription"];
        $user = $_SESSION['email'];

        // cambio formato data
        $date = date_create_from_format("d/m/Y H:i", $_POST['deadlineDate']);
        $dateF = date_format($date, "Y-m-d H:i:s");

        $sql = "INSERT INTO deadlines (id, data, descr, user_email) VALUES (NULL, '$dateF', '$description', '$user')";

        if ($conn->query($sql)) {
          $last_id = $conn->insert_id;
          echo $last_id;
        } else { // se qualcosa e andato storto
          die($mysqli -> error);
        }
    }
    else
    {
        header('HTTP/1.1 401 Unauthorized');
    }
    mysqli_close($conn);
?>