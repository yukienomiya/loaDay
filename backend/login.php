<?php
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $servername = "localhost";
    $username = "loaday";
    $password = "";
    $db = "my_loaday";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $db);

    // Check connection
    if(!$conn) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT nome, cognome FROM users WHERE email = '$email' AND pass = '$pass'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo "Nome: " . $row["nome"]. " Cognome: " . $row["cognome"]. "<br>";
        }
        header("location: ../frontend/home.html");
    } else {
        echo "ERRORE AUTENTICAZIONE";
    }

    mysqli_close($conn);
?>