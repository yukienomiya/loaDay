<?php
    $servername = "localhost";
    $username = "root";
    $password = "Info_26654";
    $db = "my_loaday";
    
    $conn = new mysqli($servername, $username, $password, $db);
    if($conn->connect_error){
        die('Errore di connessione('. $conn->connect_errno . ')' . $conn->connect_error);
    } else {
        echo'Connesso. ' . $conn->host_info . "\n";
    }