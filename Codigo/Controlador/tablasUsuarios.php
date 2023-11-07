<?php
require_once('../Modelo/clase_usuarios.php');
require_once('../Vista/vista_tabla_usuarios.php');

$msg = "<h2>Cambio realizado</h2>";
$_SESSION['mensaje'] = $msg;
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


empty($_GET['index']) ? $pagina_actual = 1 : $pagina_actual = $_GET['index'];
isset($_GET['borrar']) ? $usuarios->borrarUsuario($_GET['borrar']) : null;


if(isset($_GET['buscarOpcion'])){
$opcion = $_GET['buscarOpcion'];
isset($_GET['valor']) ? $buscar = $_GET['valor'] : $buscar=null;

switch($opcion){
    case 1:
        $url =  "&buscarOpcion=1&valor=$buscar";
    break;
    case 2:
        $url =  "&buscarOpcion=2&valor=$buscar";
    break;
    case 3:
        $url =  "&buscarOpcion=3&valor=$buscar";
    break;
    case 4:
        $url = "&buscarOpcion=4&valor=$buscar";
    default:
        $url =  "";
    break;
}
}else{
    $opcion = null;
    $buscar = null;
    $url = "";
}

$filassMostrar = 2;

// Calcular el índice del primer resultado en la página actual
$comienzo = ($pagina_actual - 1) * $filassMostrar;


//$final = $comienzo + $filassMostrar;

// El numero de filas
$total_resultados = $usuarios->contarFilasUsuario($opcion, $buscar);
if(empty($total_resultados)){
    echo "<h1>No hay datos que mostrar.</h1>";
    exit();
}else{
    echo "Se encontraron un total de " . $total_resultados . " coincidencias." . "<br>";
}
// Calcular el número total de páginas
$total_paginas = ceil($total_resultados / $filassMostrar);

$ver = $usuarios->usuariosMostrar($comienzo, $filassMostrar,$opcion, $buscar);

mostrarTablaUsu($ver, $total_paginas, $pagina_actual,$url);

unset($ver, $total_paginas, $pagina_actual, $filassMostrar, $comienzo, $total_resultados);
?>