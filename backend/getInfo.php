<?php
    //utilizzato in profile.php
    //tramite questo script eseguo una query per prendere tutti i dati dello user loggato
    require('connection.php');

    $email = $_SESSION['email'];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    mysqli_close($conn);
?>