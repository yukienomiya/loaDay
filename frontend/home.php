<?php
    session_start();

    if(isset($_SESSION['active']))
    {
?>

        <!DOCTYPE html>
        <html>
        <head>
            <meta charset='utf-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <title>Home</title>
            <meta name='viewport' content='width=device-width, initial-scale=1'>
            <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
            <script src='main.js'></script>
        </head>
        <body>
            HOME PAGE
            <br>
             <a class="btn btn-primary" href="../backend/logout.php?logout">Logout </a>
        </body>
        </html>
<?php 
    }
    else
        header("location: ../frontend/login.php?message2= Effettua prima il login!");
?>