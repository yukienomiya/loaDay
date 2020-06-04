<?php
    //utilizzato in index.php
    // In questo script php viene avviata una sessione, effettuato il collegamento al database e vengono effettuati i controlli per vedere se le credenziali sono giuste
    session_start();
    require('connection.php');

    if(isset($_POST['login'])) //Se sei arrivato a questo script premendo il tasto submit nella pagina index.php e non cambiando l'url
    {
        $errorMSG = ""; //se ci sono degli errori li salverò in questa stringa

        //controllo se la password che ho passato è vuota (nel form ci sono comunque i controlli) salvo un messaggio di errore altrimenti prendo il dato
        if (empty($_POST["pass"])) {
            $errorMSG = "<li>Password is required</<li>";
        } else {
            $pass = $_POST["pass"];
        }

        //controllo se l'email' che ho passato è vuota (nel form ci sono comunque i controlli) salvo un messaggio di errore altrimenti prendo il dato
        if (empty($_POST["email"])) {
            $errorMSG .= "<li>Email is required</li>";
        } else {
            $email = $_POST["email"];
        }

        //selezioni dal database i dati dell'utente con email = all'email salvata in sessione
        $sql = "SELECT nome, pass FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);

        $row = mysqli_fetch_row($result);
        if(password_verify($pass, $row[1])) //se la password inserita nel form corrisponde alla password nel database effettui il login 
        {
            if(empty($errorMSG)) {
                if(mysqli_num_rows($result)) {
                    $_SESSION['email'] = $email; //setto la variabile di session email al valore dell'email inserita nel form
                    $_SESSION['name'] = $row[0]; //setto la variabile di session name al valore del nome preso della query 
                    echo json_encode(['code'=>200]);
                    exit;
                }
            }
        }
    }
    else
    {
        header('HTTP/1.1 401 Unauthorized'); //se sei arrivato qui modificando a mano la URL vieni reindirizzato a una pagina di errore
        exit;
    }

    
?>