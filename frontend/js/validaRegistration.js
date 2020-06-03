function validaForm(){     //funzione che controlla se il form è stato compilato correttamente
    if(!(isNaN(parseInt(document.formRegistration.inputName.value)))){  //controlla che il nome non sia composto solo da numeri
        alert("Il nome non può essere un numero");  //se non supera il controllo lancia un alert in cui spiega il motivo
        return false;
    }

    if(isNaN(parseInt(document.formRegistration.inputSurname.value))==false){   //controlla che il cognome non sia composto solo da numeri
        alert("Il cognome non può essere un numero");   //se non supera il controllo lancia un alert in cui spiega il motivo
        return false;
    }

    var pattern = /^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/;
    var email = document.formRegistration.inputEmail.value;
    if(!(pattern.test(email))) { //controlla che il formato dell'email sia corretto
        alert("Formato email non valido");  //se non supera il controllo lancia un alert in cui spiega il motivo
        return false;
    }

    var pattern = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/;
    var password = document.formRegistration.inputPassword.value;
    if(!(pattern.test(password))) { //controlla che la password sia min 8 caratteri, almeno 1 numero e almeno 1 carattere speciale
        alert("La password deve essere lunga almeno 8 caratteri, almeno 1 numero e almeno 1 carattere speciale");  //se non supera il controllo lancia un alert in cui spiega il motivo
        return false;
    }

    var annoInserito = parseInt((document.formRegistration.inputDDN.value.substring(0, 4)), 10);    //prende l'anno dalla data inserita
    var meseInserito = parseInt((document.formRegistration.inputDDN.value.substring(5, 7)), 10);    //prende il mese dalla data inserita
    var giornoInserito = parseInt((document.formRegistration.inputDDN.value.substring(8, 10)), 10); //prende il giorno dalla data inserita
    dataInserita = giornoInserito + meseInserito*30 + annoInserito*365; //calcola la data inserita in giorni

    var oggi = new Date();  //prende la data corrente
    giornoCorrente = oggi.getDate();    //prende il giorno della data corrente
    meseCorrente = oggi.getMonth()+1;   //prende il mese della data corrente e somma 1 perchè i mesi vanno da 0 a 11 con getDate()
    annoCorrente = oggi.getFullYear();  //prede l'anno della data corrente
    dataCorrente = giornoCorrente + meseCorrente*30 + annoCorrente*365; //calcola la data corrente in giorni

    if(dataCorrente-dataInserita<3650){ //controlla che la data inserita meno la data corrente non sia inferiore a 10 anni in giorni
        alert("Data non valida, per utilizzare la piattaforma devi avere almeno 18 anni");  //se non supera il controllo lancia un alert in cui spiega il motivo
        return false;
    }
    return true;
}