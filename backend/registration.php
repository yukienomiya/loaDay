<html>
    <head></head>
    <body>
        <?php
            //CONTROLLO SU COME SI E' ARRIVATI NELLA PAGINA
            $dbconn=pg_connect("host=localhost port=5432 dbname=ProgettoLTW user=postgres password=password") or die('Could not connect: ' . pg_last_error());
            if(!(isset($_POST['registrationButton']))){
                header("Location: ../../Frontend/homeLoaDay.html");
            }

            //RACCOLTA DEI DATI INSERITI NELLA FORM
            $name=strtolower($_POST['inputName']);  //prende il nome appena inserito nella form
            $surname=strtolower($_POST['inputSurname']);    //prende il cognome appena inserito nella form
            $email=strtolower($_POST['inputEmail']);    //prende il cognome appena inserito nella form
            $password=md5($_POST['inputPassword']); //prende la password appena inserita nella form e la codifica con una funzione hash
            $ddn=($_POST["inputDDN"]);  //prende la data di nascita appena inserita nella form
            if((isset($_POST['genere'])==true)){  //controlla se è stato selezionato uno dei due radio
                $genere=($_POST['genere']);   //prende il genere appena inserito nella form
                echo("$genere");
            }

            //CONTROLLO SE I DATI DELLA FORM SONO GIA' NEL DB
            $q1="select name, surname, email from utenti where email= '" . $email ."'"; //scrivo la query
            $result=pg_query($dbconn, $q1);   //effettuo la query
            if($line=pg_fetch_array($result, null, PGSQL_ASSOC)){   //controllo se ci sono già tuple con la stessa email
                if(($line["name"]==$name) && ($line["surname"]==$surname)){ //controlla se ci sono tuple con lo stesso nome e cognome
                    echo "<h1> Utente già registrato, eseguire il login</h1>
                    <a href=../../Frontend/login.html> Click here to login</a>";
                    }   //se ci sono rimanda alla pagina di login
            }

            //INSERIMENTO DATI NEL DB
            else{
                if(($ddn!="") && (isset($_POST['genere'])==true)){  //se i campi data di nascita e genere sono stati compilati
                    $q2="insert into utenti values ($1,$2,$3,$4,$5,$6)"; //crea una nuova query per inserire i valori nella tabella
                    $data=pg_query_params($dbconn,$q2,array($name,$surname,$email,$password,$ddn,$genere));  //inserisce la tupla nella tabella
                    if($data){  //controlla se tutto è andato a buon fine
                        echo "<h1> Registrazione completata! <br/></h1>";  //lanciamo un messasggio di notifica per l'utente
                        header("Location: ../../Frontend/userHome.html");
                    }
                }

                if(($ddn!="") && (isset($_POST['genere'])==false)){  //se il campo nascita è stato compilato ma genere no
                    $q2="insert into utenti values ($1,$2,$3,$4,$5,$6)"; //crea una nuova query per inserire i valori nella tabella
                    $data=pg_query_params($dbconn,$q2,array($name,$surname,$email,$password,$ddn,null));  //inserisce la tupla nella tabella
                    if($data){  //controlla se tutto è andato a buon fine
                        echo "<h1> Registrazione completata! <br/></h1>";  //lanciamo un messasggio di notifica per l'utente
                        header("Location: ../../Frontend/userHome.html");
                    }
                }

                if(($ddn=="") && (isset($_POST['genere'])==true)){  //se il campo data di nascita non è stato compilato ma genere si
                    $q2="insert into utenti values ($1,$2,$3,$4,$5,$6)"; //crea una nuova query per inserire i valori nella tabella
                    $data=pg_query_params($dbconn,$q2,array($name,$surname,$email,$password,null,$genere));  //inserisce la tupla nella tabella
                    if($data){  //controlla se tutto è andato a buon fine
                        echo "<h1> Registrazione completata! <br/></h1>";  //lanciamo un messasggio di notifica per l'utente
                        header("Location: ../../Frontend/userHome.html");
                    }
                }

                else{
                    $q2="insert into utenti values ($1,$2,$3,$4)";   //crea una nuova query per inserire i valori nella tabella
                    $data=pg_query_params($dbconn,$q2,array($name,$surname,$email,$password)); //inserisce la tupla nella tabella
                    if($data){  //controlla se tutto è andato a buon fine
                        echo "<h1> Registrazione completata! <br/></h1>";  //lanciamo un messasggio di notifica per l'utente
                        header("Location: ../../Frontend/userHome.html");
                   }
                }
            }
        ?>
    </body>
</html>