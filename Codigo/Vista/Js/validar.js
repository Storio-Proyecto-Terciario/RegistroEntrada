

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



function codVer(id, id2) {
    const ci = '2987634';
    const val = document.getElementById(id);
    let iden = 0;
    let identificador = null;
    let mayor;
    let val2=val.value;
    
    if(document.getElementById(id).value.length>7){
        val2 = null;
        

        for (i = 0; i <= 7; i++) {
            
            val2 =val2 . val.value.charAt(i);
         
        }
    }
val.value=val2;
    for (i = 0; i < val2.length; i++) {
        let cuenta;
        cuenta = val2.charAt(i) * ci.charAt(i);
        iden = iden + cuenta;
    }

    mayor = iden;
    do {
        if (mayor % 10 == 0) {
            identificador = mayor - iden;
        } else {
            mayor++;
        }
    } while (identificador == null);

    document.getElementById(id2).innerHTML = val2 + "-" + identificador;
}


// Valida si el valor es 100% numerico
function validarNumerico(id) {
    let elemento = document.getElementById(id);
    let valueInt = parseInt(elemento.value);
    alert(elemento.value);
    if (valueInt == elemento.value || typeof elemento == "undefined") {
        return true;
    } else {
        val = elemento.value.substring(0, elemento.value.length - 1);
        document.getElementById(id).value=val; 
        alert(elemento.value);
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


