<?php
function mostrarTablaFun($usuarios, $total_paginas, $pagina_actual, $urls)
{

?>
  <label for="ABuscar" id="comentario"></label>
  <input type="" id="Buscar" disabled>

  <select name="" id="BuscarOpcion" onchange="BuscarOpcionAdministrativo('comentario','Buscar','BuscarOpcion','enviar')">
    <option value=""> </option>
    <option value="1"> Cedula</option>
    <option value="2"> Nombre</option>
    <option value="3"> Apellido</option>
    <option value="4"> Contacto</option>
  </select>

  <button id="enviar" onclick="
    mostrarXML('Controlador/tablasAdministrativos.php?buscarOpcion='+document.getElementById('BuscarOpcion').value+'&'+'valor='+document.getElementById('Buscar').value)
   " disabled> Buscar</button>


<?php
  echo "<table id='customers'>";
  echo "<tr>";
  echo "<th>Cedula de Identidad</th>";
  echo "<th>Nombre</th>";
  echo "<th>Apellido</th>";
  echo "<th>Contacto</th>";
  echo "<th>Eliminar</th>";
  echo "</tr>";
  foreach ($usuarios as $usuario) {
    echo "<tr>";
    echo "<td>" . $usuario['UsuarioCI'] . "</td>";
    echo "<td>" . $usuario['UsuarioNombre'] . "</td>";
    echo "<td>" . $usuario['UsuarioApellido'] . "</td>";
    echo "<td>" . $usuario['AdministrativoContacto'] . "</td>";
    echo "<td><a onclick=\"mostrarXML('Controlador/tablasAdministrativos.php?index=" . $pagina_actual . "&borrar=" . $usuario['UsuarioCI'] . "')\">X</a></td>";
    echo "</tr>";
  }
  echo "</table>";

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
    echo        "<a onclick=\"mostrarXML('Controlador/tablasAdministrativos.php?index=" . $mostrarAnterior + $urls . "')\">Anterior</a>";
    echo    "</li>";
    echo    "<li class='seleccion'>";
    echo "<select name='cat' id='cat' onchange=\"var option=document.getElementById('cat').value;mostrarXML('Controlador/tablasAdministrativos.php?index='+option+'$urls' );\">";
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
    echo        "<a onclick=\"mostrarXML('Controlador/tablasAdministrativos.php?index=" . ($mostrarSiguiente) + $urls  . "')\">Siguiente</a>";
    echo    "</li>";
    echo "</ul>";
    echo "</div>";
  }
}
