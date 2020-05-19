function validaForm(){

    if(!(isNaN(parseInt(document.formRegistration.inputName.value)))){
        alert("Il nome non può essere un numero");
        return false;
    }

    if(isNaN(parseInt(document.formRegistration.inputSurname.value))==false){
        alert("Il cognome non può essere un numero");
        return false;
    }

    if(isNaN(parseInt(document.formRegistration.inputNick.value))==false){
        alert("Il nickname non può essere soltanto un numero");
        return false;
    }

    if(document.formRegistration.inputPassword.value.length<8){
        alert("La password deve essere lunga almeno 8 caratteri");
        return false;
    }
    return true;
}