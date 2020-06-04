<?php
    session_start();
    require('connection.php');

    // prendo i dati e salvo la deadline nel db
    if(isset($_POST["deadlineDate"]))
    {
        $description = $_POST["deadlineDescription"];
        $user = $_SESSION['email'];

        // cambio formato data (da 'd/m/Y H:i' a 'Y-m-d H:i:s')
        $date = date_create_from_format("d/m/Y H:i", $_POST['deadlineDate']);
        $dateF = date_format($date, "Y-m-d H:i:s");

        // query
        $sql = "INSERT INTO deadlines (id, data, descr, user_email) VALUES (NULL, '$dateF', '$description', '$user')";

        if ($conn->query($sql)) {
          // id dell'ultima deadline inserita nel db
          $last_id = $conn->insert_id;
          // ritorno l'id
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