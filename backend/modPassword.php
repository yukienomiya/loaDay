<?php
    session_start();
    require('connection.php');

    if(isset($_POST["login"]))
    {
        $email = $_SESSION['email'];

        $attuale = $_POST['attuale'];
        $nuova = $_POST['nuova'];

        $sql = "SELECT pass FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_row($result);
        if(password_verify($attuale, $row[0]))
        {
            $nuova = password_hash($nuova, PASSWORD_BCRYPT);
            $sql = "UPDATE users SET pass = '$nuova' WHERE email = '$email'";
            if (!$conn -> query($sql)) { // se qualcosa e andato storto
                die($mysqli -> error);
            }
            else {
                echo json_encode(['code'=>200]);
                exit;
            }
        }
        else
        {
            echo json_encode(['code'=>300]);
            exit;
        }
    }
    else
    {
        header('HTTP/1.1 401 Unauthorized');
    }

    mysqli_close($conn);
?>