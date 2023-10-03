

<?php
//<link rel="stylesheet" href="Css/tablas.css">
function tablaUsuarios($MulArray)
{
?>
    <table id="customers">
        <tr>
            <th>Cedula</th>
            <th>Nombre</th>
            <th>Tipo</th>
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
    echo "</table>
 ";
}
    ?>



<?php
/*

// Obtener el índice del array actual desde la URL
$currentIndex = isset($_GET['index']) ? intval($_GET['index']) : 0;

// Asegurarse de que el índice esté dentro del rango válido
if ($currentIndex < 0) {
    $currentIndex = 0;
} elseif ($currentIndex >= count($array)) {
    $currentIndex = count($array) - 1;
}

// Obtener el array actual
$currentArray = $array[$currentIndex];
?>

    
    <!-- Botones para navegar entre los arrays -->
    <div>
        <?php if ($currentIndex > 0): ?>
            <a href="?index=<?php echo $currentIndex - 1; ?>">Anterior</a>
        <?php endif; ?>

        <?php if ($currentIndex < count($array) - 1): ?>
            <a href="?index=<?php echo $currentIndex + 1; ?>">Siguiente</a>
        <?php endif; ?>
    </div>
