<?php
    session_start();
    require('connection.php');

    if(isset($_POST["login"]))
    {
        $email = $_SESSION['email'];

        $nome = strtolower($_POST['nome']);
        $cognome = strtolower($_POST['cognome']);
        $sesso = $_POST['sesso'];
        $ddn = $_POST['ddn'];
        

        $sql = "UPDATE users SET nome = '$nome', cognome = '$cognome', genere = '$sesso', dataDiNascita = '$ddn' WHERE email = '$email'";
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
        header('HTTP/1.1 401 Unauthorized');
    }

    mysqli_close($conn);
?>