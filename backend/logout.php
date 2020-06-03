<?php
    session_start();

    if(isset($_GET['logout']))
    {
        session_destroy();
        header('Location: ../frontend/index.php');
    }
    else
    {
        header('HTTP/1.1 401 Unauthorized');
        exit;
    }
?>