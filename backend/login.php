<?php
    session_start();
    require_once('connection.php');

    if(isset($_POST['login']))
    {
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $sql = "SELECT nome, cognome FROM users WHERE email = '$email' AND pass = '$pass'";
        $result = mysqli_query($conn, $sql);
    
        if (mysqli_num_rows($result)) {
            $_SESSION['active'] = 1;
            header("location: ../frontend/home.php");
        } else
            header("location: ../frontend/login.php?message= Username o password errati! Riprovare");
    }
    else
    {
        header('HTTP/1.1 401 Unauthorized');
    }

    mysqli_close($conn);
?>