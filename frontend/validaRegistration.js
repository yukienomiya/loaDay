function validaForm(){
    if(!(isNaN(parseInt(document.formRegistration.inputName.value)))){
        alert("Il nome non può essere un numero");
        return false;
    }

    if(isNaN(parseInt(document.formRegistration.inputSurname.value))==false){
        alert("Il cognome non può essere un numero");
        return false;
    }

    if(document.formRegistration.inputPassword.value.length<8){
        alert("La password deve essere lunga almeno 8 caratteri");
        return false;
    }

    var annoInserito = parseInt((document.formRegistration.inputDDN.value.substring(0, 4)), 10);
    var meseInserito = parseInt((document.formRegistration.inputDDN.value.substring(5, 7)), 10);
    var giornoInserito = parseInt((document.formRegistration.inputDDN.value.substring(8, 10)), 10);
    dataInserita = giornoInserito + meseInserito*30 + annoInserito*365;

    var oggi = new Date();
    giornoCorrente = oggi.getDate();
    meseCorrente = oggi.getMonth()+1;
    annoCorrente = oggi.getFullYear();
    dataCorrente = giornoCorrente + meseCorrente*30 + annoCorrente*365;

    if(dataCorrente-dataInserita<6570){
        alert("Data non valida, per utilizzare la piattaforma devi avere almeno 18 anni");
        return false;
    }
    return true;
}