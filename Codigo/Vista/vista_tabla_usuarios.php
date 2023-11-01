
    


<?php

function mostrarTabla($usuarios, $total_paginas, $pagina_actual){
    echo "<table id='customers'>";
    echo "<tr>";
    echo "<th>Cedula de Identidad</th>";
    echo "<th>Nombre</th>";
    echo "<th>Apellido</th>"; 
    echo "<th>Tipo</th>"; 
    echo "</tr>";
    foreach ($usuarios as $usuario) {
      echo "<tr>";
      echo "<td>" . $usuario['UsuarioCI'] . "</td>";
      echo "<td>" . $usuario['UsuarioNombre'] . "</td>";
      echo "<td>" . $usuario['UsuarioApellido'] . "</td>"; 
      echo "<td>" . $usuario['UsuarioTipo'] . "</td>"; 
      echo "</tr>";
    }
    echo "</table>";

    // Generar los botones de navegación para cambiar entre las páginas
    $mostrarAnterior = $pagina_actual - 1;
    if($mostrarAnterior < 1){
      $mostrarAnterior = 1;

    }

    $mostrarSiguiente = $pagina_actual + 1;
    if($mostrarSiguiente > $total_paginas){
      $mostrarSiguiente = $total_paginas;
    }
    echo "<div class='catalogo'>";
    echo "<ul>";
    echo    "<li class='sigan'>";
    echo        "<a onclick=\"mostrarXML('Controlador/tablasUsuarios.php?index=". $mostrarAnterior . "')\">Anterior</a>";
    echo    "</li>";
    echo    "<li class='seleccion'>";
    echo "<select name='cat' id='cat' onchange=\"var option=document.getElementById('cat').value;mostrarXML('Controlador/tablasUsuarios.php?index='+option);\">";
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
  echo        "<a onclick=\"mostrarXML('Controlador/tablasUsuarios.php?index=". ($mostrarSiguiente) . "')\">Siguiente</a>";
  echo    "</li>";
  echo"</ul>";
  echo"</div>";
}
?>




            

