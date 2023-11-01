<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="Css/tablas.css"> 
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<?php


// Definir la cantidad de resultados por página
$resultados_por_pagina = 2;

// Obtener el número de página actual
if (isset($_GET['pagina'])) {
  $pagina_actual = $_GET['pagina'];
} else {
  $pagina_actual = 1;
}

// Calcular el índice del primer resultado en la página actual
$indice_primer_resultado = ($pagina_actual - 1) * $resultados_por_pagina;

// Procesar el filtro
$tipo_filtro = isset($_GET['filtro']) ? $_GET['filtro'] : 'todos';


// Ejecutar la consulta SQL
$stmt = $conn->prepare($sql);
$stmt->bindParam(':resultados_por_pagina', $resultados_por_pagina, PDO::PARAM_INT);
$stmt->bindParam(':indice_primer_resultado', $indice_primer_resultado, PDO::PARAM_INT);
$stmt->execute();

// Obtener el número total de resultados para calcular el número total de páginas
$sql_count = "SELECT COUNT(*) as total FROM Usuarios";
$stmt_count = $conn->prepare($sql_count);
$stmt_count->execute();
$total_resultados = $stmt_count->fetch()['total'];


$total_paginas = ceil($total_resultados / $resultados_por_pagina);



// Generar la tabla con los resultados de la consulta
if ($stmt->rowCount() > 0) {
  echo "<table id='customers'>";
  echo "<tr>";
  echo "<th>Cedula de Identidad</th>";
  echo "<th>Nombre</th>";
  echo "<th>Apellido</th>"; 
  echo "<th>Correo Electrónico</th>";
  echo "<th>Tipo</th>"; 
  echo "</tr>";
  while ($row = $stmt->fetch()) {
    echo "<tr>";
    echo "<td>" . $row["UsuarioCI"] . "</td>";
    echo "<td>" . $row["UsuarioNombre"] . "</td>";
    echo "<td>" . $row["UsuarioApellido"] . "</td>"; 
    echo "<td>" . $row["AdministrativoContacto"] . "</td>";
    echo "<td>" . $row["UsuarioTipo"] . "</td>";
    echo "</tr>";
  }
  echo "</table>";

  // Generar los botones de navegación para cambiar entre las páginas
  echo "<nav aria-label='Paginación'>";
  echo "<ul class='pagination justify-content-center'>";
  for ($i = 1; $i <= $total_paginas; $i++) {
    if ($i == $pagina_actual) {
      echo "<li class='page-item active'><a class='page-link' href='#'>$i</a></li>";
    } else {
      echo "<li class='page-item'><a class='page-link' href='?pagina=$i&filtro=$tipo_filtro'>$i</a></li>";
    }
  }
  echo "</ul>";
  echo "</nav>";
} else {
  echo "No se encontraron resultados.";
}

// Cerrar la conexión a la base de datos
$conn = null;
?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
