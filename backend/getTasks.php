<?php
    require('connection.php');

    $email = $_SESSION['email'];

    $oggi = date("Y-m-d");
    $ieri = date('Y-m-d',strtotime("-1 days"));

    //inseriti in data odierna e categoria oggi
    $sql = "SELECT * FROM tasks WHERE
                                (user_email = '$email' and category = 'oggi' and create_date = '$oggi')
                                OR (user_email = '$email' and category = 'oggi' and create_date <= '$ieri' and completato = '0')
                                OR (user_email = '$email' and category = 'domani' and create_date = '$ieri')
                                OR (user_email = '$email' and category = 'domani' and create_date < '$ieri' and completato = '0')
                                OR (user_email = '$email' and create_date < '$ieri' and done_date = '$oggi' and NOT category = 'in futuro')";
    $todayTasks = mysqli_query($conn, $sql);

    //calcolo la percentuale per la barra di caricamento (numero task di oggi completati / numero task di oggi totali)*100
    $nRecord = mysqli_num_rows($todayTasks);
    $sql = "SELECT COUNT( * ) as 'Fatti' FROM tasks WHERE completato = '1' and done_date = '$oggi' and NOT category = 'in futuro' and NOT (category = 'domani' and create_date = '$oggi')";
    $fatti = mysqli_fetch_row(mysqli_query($conn, $sql));

    if(mysqli_num_rows($todayTasks) > 0)
        $percentuale = round(($fatti[0]/$nRecord)*100, 1);
    else
        $percentuale = 0;
    

    //inseriti oggi e categoria domani
    $sql = "SELECT * FROM tasks WHERE user_email = '$email' and category = 'domani' and create_date = '$oggi'";
    $tomorrowTasks = mysqli_query($conn, $sql);

    //categoria in futuro non completati
    $sql = "SELECT * FROM tasks WHERE user_email = '$email' and category = 'in futuro' and completato = '0'";
    $futureTasks = mysqli_query($conn, $sql);

    //cancello i tasks vecchi completati
    $sql = "DELETE FROM tasks WHERE completato = '1' and done_date <= '$ieri'";
    mysqli_query($conn, $sql);

    mysqli_close($conn);
?>