<?php
function mostrarTablaEntrada($usuarios, $total_paginas, $pagina_actual, $urls)
{

?>

  <section>

    <label for="ABuscar" id="comentario"></label>
    <input type="text" id="Buscar" disabled>
<br>
    <select name="Buscador" id="BuscarOpcion" onchange="BuscarOpcionEntrada('comentario','Buscar','BuscarOpcion','enviar')">
      <option value=""> </option>
      <option value="1"> Cedula</option>
      <option value="2"> Nombre</option>
      <option value="3"> Apellido</option>
      <option value="4"> Tipo</option>
      <option value="5" > Descripcion</option>
    </select>
  <br>

  <?php
      isset($_GET['invitado']) ? $invitado = $_GET['invitado'] : $invitado = 'no';
      if ($invitado == 'si') {
        echo "
        <input type='radio' id='miRadioInvitado' name='grupoRadioInvitado' value='si' onclick='invitado()' checked>
        <label for='miRadioInvitado'>invitado</label>
    
        <input type='radio' id='miRadioUsuario' name='grupoRadioInvitado' value='no' onclick='invitado()' >
        <label for='miRadioUsuario'>usuarios</label>
        ";
      } else {
        echo "
        <input type='radio' id='miRadioInvitado' name='grupoRadioInvitado' value='si' onclick='invitado()'>
        <label for='miRadioInvitado'>invitado</label>
    
        <input type='radio' id='miRadioUsuario' name='grupoRadioInvitado' value='no' onclick='invitado()' checked>
        <label for='miRadioUsuario'>usuarios</label>
        ";
      }

  ?>
 


    <br><br>
    <select name="FechaTiempo" id="OpcionFecha" onchange="OpcionFechaScript()">
      <option value=""> </option>
      <option value="1"> Fecha</option>
      <option value="2"> Tiempo</option>
      <option value="3"> Todo</option>
    </select>
    <br><br>
    <div id="fecha" style="display: none;">
      <label for="DeFecha">De</label><input type="date" id="DeFecha"><br>
      <label for="AFecha">A</label><input type="date" id="AFecha"><br>
    </div>
    <div id="tiempo" style="display: none;">
      <p>Hora : Minuto : Segundo</p>
      De
      <input type="number" min="00" max="24" maxlength="2" id="DeHora" class="tiempo" value="00" required>
      :
      <input type="number" max="59" min="00" maxlength="2" id="DeMin" class="tiempo" value="00" required>
      :
      <input type="number" max="59" min="00" maxlength="2" id="DeSeg" class="tiempo" value="00" required><br>

      A
      <input type="number" min="0" max="24" maxlength="2" id="AHora" class="tiempo" value="00" required>
      :
      <input type="number" max="59" min="0" maxlength="2" id="AMin" class="tiempo" value="00" required>
      :
      <input type="number" max="59" min="0" maxlength="2" id="ASeg" class="tiempo" value="00" required><br>


    </div>

    <br><br>
    <button id="enviar" onclick="
    mostrarXML('Controlador/tablasEntrada.php?buscarOpcion='+document.getElementById('BuscarOpcion').value+'&'+'valor='+document.getElementById('Buscar').value + VerOpcionFechaScript(true) + radioButton());
    "> Buscar</button>
    <br><br>
  </section>

<?php

  //UsuarioCI, UsuarioNombre, UsuarioApellido, RegistroDesc, RegistroInvitado, RealizaDia, RealizaHora


  if ($invitado == 'si') {
    echo "<table id='customers'>";
    echo "<tr>";
    echo "<th>Cedula</th>";
    echo "<th>Descripcion</th>";
    echo "<th>Dia</th>";
    echo "<th>Hora</th>";
    echo "</tr>";
    
    foreach ($usuarios as $usuario) {
      echo "<tr>";
      echo "<td>" . $usuario['UsuarioRegistroCI'] . "</td>";
      echo "<td>" . $usuario['RegistroDesc'] . "</td>";
      echo "<td>" . $usuario['RealizaDia'] . "</td>";
      echo "<td>" . $usuario['RealizaHora'] . "</td>";
      // echo "<td><a onclick=\"mostrarXML('Controlador/tablasAdministrativos.php?index=" . $pagina_actual . "&borrar=" . $usuario['UsuarioCI'] . "')\">X</a></td>";
      echo "</tr>";
    }
    echo "</table>";
  } else{
    echo "<table id='customers'>";
    echo "<tr>";
    echo "<th>Cedula de Identidad</th>";
    echo "<th>Nombre</th>";
    echo "<th>Apellido</th>";
    echo "<th>Tipo</th>";
    echo "<th>Dia</th>";
    echo "<th>Hora</th>";
    echo "</tr>";

    foreach ($usuarios as $usuario) {
      echo "<tr>";
      echo "<td>" . $usuario['UsuarioCI'] . "</td>";
      echo "<td>" . $usuario['UsuarioNombre'] . "</td>";
      echo "<td>" . $usuario['UsuarioApellido'] . "</td>";
      echo "<td>" . $usuario['UsuarioTipo'] . "</td>";
      echo "<td>" . $usuario['RealizaDia'] . "</td>";
      echo "<td>" . $usuario['RealizaHora'] . "</td>";
      // echo "<td><a onclick=\"mostrarXML('Controlador/tablasAdministrativos.php?index=" . $pagina_actual . "&borrar=" . $usuario['UsuarioCI'] . "')\">X</a></td>";
      echo "</tr>";
    }
    echo "</table>";
  }

  if ($total_paginas > 1) {
    // Generar los botones de navegación para cambiar entre las páginas
    $mostrarAnterior = $pagina_actual - 1;
    if ($mostrarAnterior < 1) {
      $mostrarAnterior = 1;
    }

    $mostrarSiguiente = $pagina_actual + 1;
    if ($mostrarSiguiente > $total_paginas) {
      $mostrarSiguiente = $total_paginas;
    }
    echo "<div class='catalogo'>";
    echo "<ul>";
    echo    "<li class='sigan'>";
    echo        "<a onclick=\"mostrarXML('Controlador/tablasEntrada.php?index=" . $mostrarAnterior  . $urls . "')\">Anterior</a>";
    echo    "</li>";
    echo    "<li class='seleccion'>";
    echo "<select name='cat' id='cat' onchange=\"var option=document.getElementById('cat').value;mostrarXML('Controlador/tablasEntrada.php?index='+option+'" . $urls . "' );\">";
    for ($i = 1; $i <= $total_paginas; $i++) {
      if ($i == $pagina_actual) {
        echo            "<option value='$i' selected>Pagina $i </option>";
      } else {
        echo            "<option value='$i' >Pagina $i </option>";
      }
    }
    echo        "</select>";
    echo    "</li>";
    echo    "<li class='sigan'>";
    echo        "<a onclick=\"mostrarXML('Controlador/tablasEntrada.php?index=" . $mostrarSiguiente . $urls . "')\">Siguiente</a>";
    echo    "</li>";
    echo "</ul>";
    echo "</div>";
  }
}
