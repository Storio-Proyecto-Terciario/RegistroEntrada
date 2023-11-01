<?php
require_once('../Modelo/clase_administrativos.php');
require_once('../Vista/vista_tabla_funcionario.php');

session_start();
if(!isset($_SESSION['ci'])){
    header('Location: index.php');
}

$ci = $_SESSION['ci'];
$nombre = $_SESSION['nombre'];
$apellido = $_SESSION['apellido'];
$contacto = $_SESSION['contacto'];
$jefe = $_SESSION['jefe'];


$usuarios = new administrativos();

empty($_GET['index']) ? $pagina_actual = 1 : $pagina_actual = $_GET['index'];


$filassMostrar = 2;

// Calcular el índice del primer resultado en la página actual
$comienzo = ($pagina_actual - 1) * $filassMostrar;


//$final = $comienzo + $filassMostrar;

// El numero de filas
$total_resultados = $usuarios->contarFilasAdministraivo($ci);
if(empty($total_resultados)){
    echo "<h1>No hay datos que mostrar.</h1>";
    exit();
}
// Calcular el número total de páginas
$total_paginas = ceil($total_resultados / $filassMostrar);


$ver = $usuarios->mostrarAdministrativos($ci,$comienzo, $filassMostrar);






mostrarTabla($ver, $total_paginas, $pagina_actual);
unset($ver, $total_paginas, $pagina_actual, $filassMostrar, $comienzo, $total_resultados);

?>