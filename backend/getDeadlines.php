<?php
    session_start();
    require_once('connection.php');

    // prendo le deadlines dell'utente dal db
    if(isset($_SESSION["email"]))
    {
        $user = $_SESSION['email'];

        $dlQ = "SELECT * FROM deadlines WHERE user_email='$user' ORDER BY deadlines.data ASC";
        $result = $conn->query($dlQ);
        if ($result->num_rows > 0) {
          $resArray = array();
          while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $myArray[] = $row;
          }
          echo json_encode($myArray);
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