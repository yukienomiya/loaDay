<html>
    <head></head>
    <body>
        <?php
            //CONTROLLO SU COME SI E' ARRIVATI NELLA PAGINA
            if(!(isset($_POST['registrationButton']))){
                header("Location: ../../Frontend/homeLoaDay.html");
            }

            //CONNESSIONE AL DB
            $mysqli=new mysqli('localhost', 'root', 'password', 'ltw', '3306');
            if($mysqli->connect_error){
                die('Errore di connessione('. $mysql->connect_errno . ')' . $mysqli->connect_error);
            } else {
                echo'Connesso. ' . $mysqli->host_info . "\n";
            }

            //RACCOLTA DEI DATI INSERITI NELLA FORM
            $name=strtolower($_POST['inputName']);  //prende il nome appena inserito nella form
            $surname=strtolower($_POST['inputSurname']);    //prende il cognome appena inserito nella form
            $email=strtolower($_POST['inputEmail']);    //prende il cognome appena inserito nella form
            $password= hash('sha256',$_POST['inputPassword']); //prende la password appena inserita nella form e la codifica con una funzione hash
            $ddn=($_POST['inputDDN']);  //prende la data di nascita appena inserita nella form
            if((isset($_POST['genere'])==true)){  //controlla se è stato selezionato uno dei due radio
                $genere=($_POST['genere']);   //prende il genere appena inserito nella form
            }

            //CONTROLLO SE I DATI DELLA FORM SONO GIA' NEL DB
            $q1=$mysqli->query("SELECT * FROM utenti WHERE nome='$name' AND cognome='$surname' AND email='$email'"); //scrivo la query
            if($q1->num_rows) {
                echo "<h1> Utente già registrato, eseguire il login</h1>
                <a href=../../Frontend/login.html> Click here to login</a>";
                }   //se ci sono rimanda alla pagina di login

            //INSERIMENTO DATI NEL DB
            else{
                if(($ddn!="") && (isset($_POST['genere'])==true)){  //se i campi data di nascita e genere sono stati compilati
                    $q2="INSERT INTO utenti (nome, cognome, email, password, dataDiNascita, genere) VALUES ('$name','$surname','$email','$password','$ddn','$genere')"; //crea una nuova query per inserire i valori nella tabella
                    if (!$mysqli->query($q2)) { //controlla se tutto è andato a buon fine
                        die($mysqli->error);
                    }
                }

                if(($ddn!="") && (isset($_POST['genere'])==false)){  //se il campo nascita è stato compilato ma genere no
                    $q2="INSERT INTO utenti (nome, cognome, email, password, dataDiNascita) VALUES ('$name','$surname','$email','$password','$ddn')"; //crea una nuova query per inserire i valori nella tabella
                    if (!$mysqli->query($q2)) { //controlla se tutto è andato a buon fine
                        die($mysqli->error);
                    }
                }

                if(($ddn=="") && (isset($_POST['genere'])==true)){  //se il campo data di nascita non è stato compilato ma genere si
                    $q2="INSERT INTO utenti (nome, cognome, email, password, genere) VALUES ('$name','$surname','$email','$password','$genere')"; //crea una nuova query per inserire i valori nella tabella
                    if (!$mysqli->query($q2)) { //controlla se tutto è andato a buon fine
                        die($mysqli->error);
                    }
                }

                else{
                    if(($ddn=="") && (isset($_POST['genere'])==false)){  //se i campi data di nascita e genere non sono stati compilati
                        $q2="INSERT INTO utenti (nome, cognome, email, password) VALUES ('$name','$surname','$email','$password')"; //crea una nuova query per inserire i valori nella tabella
                        if (!$mysqli->query($q2)) { //controlla se tutto è andato a buon fine
                            die($mysqli->error);
                        }
                    }
                }
            }
        ?>
    </body>
</html>