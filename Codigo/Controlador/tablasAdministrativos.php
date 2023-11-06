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

$msg = "<h2>Cambio realizado</h2>";
$_SESSION['mensaje'] = $msg;


$usuarios = new administrativos();

empty($_GET['index']) ? $pagina_actual = 1 : $pagina_actual = $_GET['index'];

isset($_GET['borrar']) ? $usuarios->borrarAdministrativo($_GET['borrar']) : null;

$buscar = null;
$url = null;
if(isset($_GET['buscarOpcion'])){
    $que =$_GET['valor'];
    switch($_GET['buscarOpcion']){
        case 1:
            $buscar = "and UsuarioCI LIKE '%$que%'";
            $url="&buscarOpcion=1&valor=$que";
        break;
        case 2:
            $buscar = "and UsuarioNombre LIKE '%$que%'";
            $url="&buscarOpcion=2&valor=$que";
        break;
        case 3:
            $buscar = "and UsuarioApellido LIKE '%$que%'";
            $url="&buscarOpcion=3&valor=$que";
        break;
        case 4:
            $buscar = "and AdministrativoContacto LIKE '%$que%'";
            $url="&buscarOpcion=4&valor=$que";
        default:
            $buscar = null;
            $url="";
        break;
    }
}


$filassMostrar = 2;

// Calcular el índice del primer resultado en la página actual
$comienzo = ($pagina_actual - 1) * $filassMostrar;


//$final = $comienzo + $filassMostrar;

// El numero de filas
$total_resultados = $usuarios->contarFilasAdministraivo($ci, $buscar);
if(empty($total_resultados)){
    echo "<h1>No hay datos que mostrar.</h1>";
    exit();
}
// Calcular el número total de páginas
$total_paginas = ceil($total_resultados / $filassMostrar);


$ver = $usuarios->mostrarAdministrativos($ci,$comienzo, $filassMostrar, $buscar);






mostrarTablaFun($ver, $total_paginas, $pagina_actual,$url);
unset($ver, $total_paginas, $pagina_actual, $filassMostrar, $comienzo, $total_resultados);

?>