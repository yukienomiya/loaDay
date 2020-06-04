<?php
    require('connection.php');

    $email = $_SESSION['email'];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    mysqli_close($conn);
?>