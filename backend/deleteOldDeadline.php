<?php
    session_start();
    require_once('connection.php');

    $email = $_SESSION['email'];
    $data = date("Y-m-d H:i:s");

    $sql = "DELETE FROM deadlines WHERE user_email = '$email' and data < '$data'";
    mysqli_query($conn, $sql);
?>