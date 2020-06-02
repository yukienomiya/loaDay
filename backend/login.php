<?php
    session_start();
    require_once('connection.php');

    if(isset($_POST['login']))
    {
        $errorMSG = "";

        if (empty($_POST["pass"])) {
            $errorMSG = "<li>Password is required</<li>";
        } else {
            $pass = $_POST["pass"];
        }

        if (empty($_POST["email"])) {
            $errorMSG .= "<li>Email is required</li>";
        } else {
            $email = $_POST["email"];
        }

        $sql = "SELECT nome, cognome FROM users WHERE email = '$email' AND pass = '$pass'";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
    
        if(empty($errorMSG)){
            if(mysqli_num_rows($result)) {
                $_SESSION['email'] = $email;
                $row = mysqli_fetch_row($result);
                $_SESSION['name'] = $row[0];
                echo json_encode(['code'=>200]);
                exit;
            }
        }
    }
    else
    {
        header('HTTP/1.1 401 Unauthorized');
        exit;
    }

    
?>