

// Valida si el ultimo carcter ingresado es un signo de numero si lo tiene lo elimina
function tiene_numeros_key(id) {
    const numero = "0123456789.,#$%&/)(='?¡¿-_:;@|°¬+*/{}[]";    // Valores que no tienen que estar en el string.
    const texto = document.getElementById(id).value;
    let l=numero.length;
    let lt=texto.length;
    for (i = 0; i < l ; i++) {
        if (texto.charAt(lt-1)==numero.charAt(i))  {  // Compara si el ultimo carcter de la cdena es igual a algun caracter de numero.
            val = texto.substring(0, lt - 1); // Elimina el ultimo caracter de la cadena
            document.getElementById(id).value=val; // Carga la cadena.
        }
    }
}

// Valida si el valor es 100% numerico
function validarNumerico(id) {
    let elemento = document.getElementById(id);
    let valueInt = parseInt(elemento.value);
    if (valueInt == elemento.value || typeof elemento == "undefined") {
        return true;
    } else {
        val = elemento.value.substring(0, elemento.value.length - 1);
        document.getElementById(id).value=val; 

    }
}

function validarPassword(id) {
    var password = document.getElementById(id).value;
    var lowerCasePattern = /[a-z]/;
    var upperCasePattern = /[A-Z]/;
    var numberPattern = /[0-9]/;

    if (!lowerCasePattern.test(password) || !upperCasePattern.test(password) || !numberPattern.test(password)) {
        alert('La contraseña debe contener al menos un carácter en minúscula, uno en mayúscula y un número.');
        return false;
    }
}


/*************************************************************************/


// Valida si un strin tiene numeros y signos.
function tiene_numeros(texto, msgId) {
    const numero="0123456789.,#$%&/()='?¡¿-_:;@|°¬+*/";    // Valores que no tienen que estar en el string.
    for (i = 0; i < texto.length; i++) {
        if (numero.indexOf(texto.charAt(i), 0) != -1) {
            document.getElementById(msgId).style.display = "block";
            return 1;
        }
    }
    document.getElementById(msgId).style.display = "none";
    return 0;
}


