

<div id="editarFun" class="modal">
    <span onclick="abrirModal('editarFun',false)" class="close" title="Cerrar modal">&times;</span>
    <form class="modal-content" method="post" action="Controlador/registro.php">
      <div class="container">
        <h1>Registrar funcionario</h1>
        <p>Registro de nuevos funcionario al sistema.</p>
        <hr>

        <label for="ci"><b>Cedula</b></label>

        <input type="text" name="cedula" id="ci" min="0" class="formInput" onkeydown="desabilitarFlechas('ci')"
          onkeyup="validarNumerico('ci');" onscroll="noScroll('ci')" maxlength="8" value="<?php echo $ci  ?> " disabled required>

        <label for="con"><b>Contraseña</b></label>
        <input type="password" name="contraseña1" id="con" class="formInput" value="***"  required>

        <label for="con"><b>Contraseña</b></label>
        <input type="password" name="contraseña2" id="con" class="formInput" value="***" required>


 
        <input type="hidden" name="re" value="3">
        
        <hr>

        <button type="submit" class="boton2 enviar">Listo</button>
        <button type="reset" class="boton2 reset">Reset</button>

      </div>
    </form>
  </div>



