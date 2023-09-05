function noScroll(id){
    document.getElementById('id').blur;
    setTimeout(1000);
    document.getElementById('id').focus;
}

// Desabilitar la flechas del teclado.
function desabilitarFlechas(event) {
    let key = event.charCode || event.keyCode;
    if (key == 38 || key == 40) {
        event.preventDefault();
    } else {
        return;
    }
}
