<?php

//<link rel="stylesheet" href="Css/tablas.css">
function tablaFuncionario($MulArray, $indice)
{
?>
    <table id="customers">
        <tr>
            <th>Cedula</th>
            <th>Nombre</th>
            <th>Contacto</th>
            <th class="icono">Eliminar</th>
        </tr>
    <?php
    foreach ($MulArray as $fila) {
        echo "<tr>";
        foreach ($fila as $valor) {
            echo "<td>" . $valor . "</td>";
        }
        echo "<td class='icono'><img src='Img/Iconos/stop.png' alt=''></td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "<button class='boton' onclick='loadDoc(\"Controler/verUsuarios.php?u=2&index=" . ($indice - 1) . "\")'>Anterior</button>";
    echo "<button class='boton' onclick='loadDoc(\"Controler/verUsuarios.php?u=2&index=" . ($indice + 1) . "\")'>Siguiente</button>";
}
