<?php
require_once('../Modelo/clase_usuarios.php');
require_once('../Vista/vista_tabla_usuarios.php');



session_start();
if(!isset($_SESSION['ci'])){
    header('Location: index.php');
}

$ci = $_SESSION['ci'];
$nombre = $_SESSION['nombre'];
$apellido = $_SESSION['apellido'];
$contacto = $_SESSION['contacto'];
$jefe = $_SESSION['jefe'];

$usuarios = new usuarios();

if (empty($_GET['index'])) {
    $pagina_actual = 1;
} else {
    $pagina_actual = $_GET['index'];
}


$filassMostrar = 2;

// Calcular el índice del primer resultado en la página actual
$comienzo = ($pagina_actual - 1) * $filassMostrar;


//$final = $comienzo + $filassMostrar;

// El numero de filas
$total_resultados = $usuarios->contarFilasUsuario();

// Calcular el número total de páginas
$total_paginas = ceil($total_resultados / $filassMostrar);


$ver = $usuarios->usuariosMostrar($comienzo, $filassMostrar);



mostrarTabla($ver, $total_paginas, $pagina_actual);
unset($ver, $total_paginas, $pagina_actual, $filassMostrar, $comienzo, $total_resultados);

?>