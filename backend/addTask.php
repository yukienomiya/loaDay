<?php
    session_start();
    require('connection.php');

    // prendo i dati e salvo la deadline nel db
    if(isset($_POST["taskDescription"]))
    {
      $description = $_POST["taskDescription"];
      $category = $_POST["taskCategory"];
      $user = $_SESSION['email'];
      $date = date("Y-m-d");

      $sql = "INSERT INTO tasks (descr, completato, category, user_email, create_date) VALUES ('$description', 0, '$category', '$user', '$date')";
      if ($conn->query($sql)) {
        // prendo l'id dell'elemento (l'ultimo inserito)
        $last_id = $conn->insert_id;
        echo $last_id;
      } else { // se qualcosa e' andato storto
        die($mysqli -> error);
      }
    }
    else
    {
        header('HTTP/1.1 401 Unauthorized');
    }
    mysqli_close($conn);
?>