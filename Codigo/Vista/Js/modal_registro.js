function abrirModal(id,i) {
    /*
    *       Esta funcion sera la encargada de abrir y cerrar el modal 
    *   a partir de valores booleanos true(mostrar) o false(cerrar)
    *   solicitado a traves de i.
    */

    /*
    *       La variable id se debe de darle 
    *   la id del objeto que contiene el modal
    * 
    */
    let modal=document.getElementById(id);
    if(i){
        modal.style.display='block';
    }else{
        modal.style.display='none';
    }
    
}