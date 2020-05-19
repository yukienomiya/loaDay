<html>
    <head></head>
    <body>
        <?php
            $dbconn=pg_connect("host=localhost port=5432 dbname=ProgettoLTW user=postgres password=InfoPoggy") or die('Could not connect: ' . pg_last_error());
            /*if(!(isset($_POST['registrationButton']))){
                header("Location: ../home.html");   //home.html è un nome fittizio, va sostituito con il nome della pagina di login che ha fatto Yukie
            }*/
            $nick=$_POST['inputNick'];    //metto nella variabile nick il nickename inserito ora dall'utente nella form
            $q1="select name, surname, email, nickname from utenti where nickname= '" . $nick ."'"; //scrivo la query
            $result=pg_query($dbconn, $q1);   //effettuo la query
            if($line=pg_fetch_array($result, null, PGSQL_ASSOC)){   //controllo se ci sono già tuple con lo stesso nickname
                if(($line["name"]==$_POST['inputName']) && ($line["surname"]==$_POST['inputSurname']) && ($line["email"]==$_POST['inputEmail'])){
                    echo "<h1> Utente già registrato, eseguire il login</h1>
                    <a href=../paginaLogin/login.html> Click here to login</a>";    //login.html è un nome fittizio, va sostituito con il nome della pagina di login che ha fatto Giorgio
                    }
                else{
                    echo "<h1> Ops... mi dispiace, nickname già utilizzato, scegline un altro!</h1>";   //bisogna vedere un attimo come poter tornare alla pagina precedente in automatico
                }
            }

            else{
                $name=$_POST['inputName'];  //prende il nome inserito nella form
                $surname=$_POST['inputSurname'];    //prende il cognome inserito nella form
                $email=$_POST['inputEmail'];    //prende il cognome inserito nella form
                $password=md5($_POST['inputPassword']); //prende la password inserito nella form e la codifica con una funzione hash
                $q2="insert into utenti values ($1,$2,$3,$4,$5)";   //crea una nuova query per inserire i valori nella tabella
                $data=pg_query_params($dbconn,$q2,array($name,$surname,$email,$nick,$password)); //inserisce la tupla nella tabella
                if($data){  //controlla se tutto è andato a buon fine
                    //header("Location: registrationCompleted.html");
                    echo "<h1> Registrazione completata! <br/></h1>";  //lanciamo un messasggio di notifica per l'utente
                }
            }
        ?>
    </body>
</html>