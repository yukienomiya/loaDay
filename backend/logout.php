<?php
    session_start();

    if(isset($_GET['logout']))
    {
        session_destroy();
        header("location: ../frontend/index.php");
    }
?>