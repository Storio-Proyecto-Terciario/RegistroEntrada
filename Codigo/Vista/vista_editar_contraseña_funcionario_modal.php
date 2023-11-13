<?php


?>

<div id="editarFun" class="modal">
    <span onclick="abrirModal('editarFun',false)" class="close" title="Cerrar modal">&times;</span>
    <form onsubmit="return validarPassword('con1')" class="modal-content"  method="post"  action="Controlador/admin.php">
      <div class="container">
        <h1>Cambio de contraseña</h1>
        <p></p>
        <hr>

        <label for="cicon"><b>Cedula</b></label>

        <input type="text" name="cedula" id="cicon" min="0" class="formInput" onkeydown="desabilitarFlechas('cicon')"
          onkeyup="validarNumerico('cicon');" onscroll="noScroll('cicon')" maxlength="8" value="<?php echo $ci  ?> " disabled required>

        <label for="con1"><b>Contraseña</b></label>
        <input type="password" name="contra1" id="con1" class="formInput" value="pedroPP147258"  onfocus="this.value=null"
        minlength="8" required>

        <label for="con2"><b>Contraseña</b></label>
        <input type="password" name="contra2" id="con2" class="formInput" value="pedroPP147258" onfocus="this.value=null"
        minlength="8" required>


 
        <input type="hidden" name="accion" value="1">
        
        <hr>

        <button type="submit" class="boton2 enviar">Listo</button>
        <button type="reset" class="boton2 reset">Reset</button>
        <button type="button" class="boton2 reset" onclick="window.location.href = 'Controlador/admin.php?accion=2';">Eliminar Usuario</button>

      </div>
    </form>
  </div>



