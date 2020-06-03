<?php
    //CONTROLLO SU COME SI E' ARRIVATI NELLA PAGINA
    if(!(isset($_POST['registrationButton']))){
        header("Location: ../frontend/index.php");
    }

    //CONNESSIONE AL DB
    require_once('connection.php');

    //RACCOLTA DEI DATI INSERITI NELLA FORM
    $name=strtolower($_POST['inputName']);  //prende il nome appena inserito nella form
    $surname=strtolower($_POST['inputSurname']);    //prende il cognome appena inserito nella form
    $email=strtolower($_POST['inputEmail']);    //prende il cognome appena inserito nella form
    $password= password_hash($_POST['inputPassword'], PASSWORD_BCRYPT); //prende la password appena inserita nella form e la codifica con una funzione hash
    $ddn=($_POST['inputDDN']);  //prende la data di nascita appena inserita nella form
    if((isset($_POST['genere'])==true)){  //controlla se è stato selezionato uno dei due radio
        $genere=($_POST['genere']);   //prende il genere appena inserito nella form
    }

    //CONTROLLO SE I DATI DELLA FORM SONO GIA' NEL DB
    $q1=$conn->query("SELECT * FROM users WHERE email='$email' AND nome='$name' AND cognome='$surname'"); //scrivo la query
    if($q1->num_rows) {
        echo "<h1> Utente già registrato, eseguire il login</h1>
        <a href=../../Frontend/login.html> Click here to login</a>";
        }   //se ci sono rimanda alla pagina di login

    //INSERIMENTO DATI NEL DB
    else{
        if(($ddn!="") && (isset($_POST['genere'])==true)){  //se i campi data di nascita e genere sono stati compilati
            $q2="INSERT INTO users (email, pass, nome, cognome, dataDiNascita, genere) VALUES ('$email','$password','$name','$surname','$ddn','$genere')"; //crea una nuova query per inserire i valori nella tabella
            if (!$conn->query($q2)) { //controlla se tutto è andato a buon fine
                die($conn->error);
            }
        }

        if(($ddn!="") && (isset($_POST['genere'])==false)){  //se il campo nascita è stato compilato ma genere no
            $q2="INSERT INTO users (email, pass, nome, cognome, dataDiNascita) VALUES ('$email','$password','$name','$surname','$ddn')"; //crea una nuova query per inserire i valori nella tabella
            if (!$conn->query($q2)) { //controlla se tutto è andato a buon fine
                die($conn->error);
            }
        }

        if(($ddn=="") && (isset($_POST['genere'])==true)){  //se il campo data di nascita non è stato compilato ma genere si
            $q2="INSERT INTO users (email, pass, nome, cognome, genere) VALUES ('$email','$password','$name','$surname','$genere')"; //crea una nuova query per inserire i valori nella tabella
            if (!$conn->query($q2)) { //controlla se tutto è andato a buon fine
                die($conn->error);
            }
        }

        else{
            if(($ddn=="") && (isset($_POST['genere'])==false)){  //se i campi data di nascita e genere non sono stati compilati
                $q2="INSERT INTO users (email, pass, nome, cognome) VALUES ('$email','$password','$name','$surname')"; //crea una nuova query per inserire i valori nella tabella
                if (!$conn->query($q2)) { //controlla se tutto è andato a buon fine
                    die($conn->error);
                }
            }
        }
    }

    header("Location: ../frontend/index.php");
?>