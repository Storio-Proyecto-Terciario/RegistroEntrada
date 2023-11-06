<?php
require_once('../Modelo/clase_registro.php');
require_once('../Vista/vista_tabla_entrada.php');

function fecha()
{
    $array = array();
    if (isset($_GET['opcionFecha'])) {

        switch ($_GET['opcionFecha']) {
            case 1:
                $deFecha = $_GET['deFecha'];
                $aFecha = $_GET['aFecha'];
                $array[0] = "and RealizaDia BETWEEN '$deFecha' AND '$aFecha'";
                $array[1] = "&opcionFecha=1&deFecha=$deFecha&aFecha=$aFecha";

                echo "De: $deFecha <br>";
                echo "A: $aFecha <br>";
                break;
            case 2:
                $deHora = str_pad($_GET['deHora'], 2, "0", STR_PAD_LEFT);
                $deMin = str_pad($_GET['deMin'], 2, "0", STR_PAD_LEFT);
                $deSeg = str_pad($_GET['deSeg'], 2, "0", STR_PAD_LEFT);
                $aHora = str_pad($_GET['aHora'], 2, "0", STR_PAD_LEFT);
                $aMin = str_pad($_GET['aMin'], 2, "0", STR_PAD_LEFT);
                $aSeg = str_pad($_GET['aSeg'], 2, "0", STR_PAD_LEFT);
                $array[0] = "and RealizaHora BETWEEN '$deHora:$deMin:$deSeg' AND '$aHora:$aMin:$aSeg'";
                $array[1] = "&opcionFecha=2&deHora=$deHora&deMin=$deMin&deSeg=$deSeg&aHora=$aHora&aMin=$aMin&aSeg=$aSeg";
                echo "De: $deHora:$deMin:$deSeg <br>";
                echo "A: $aHora:$aMin:$aSeg <br>";
                break;
            case 3:
                $deFecha = $_GET['deFecha'];
                $aFecha = $_GET['aFecha'];
                $deHora = str_pad($_GET['deHora'], 2, "0", STR_PAD_LEFT);
                $deMin = str_pad($_GET['deMin'], 2, "0", STR_PAD_LEFT);
                $deSeg = str_pad($_GET['deSeg'], 2, "0", STR_PAD_LEFT);
                $aHora = str_pad($_GET['aHora'], 2, "0", STR_PAD_LEFT);
                $aMin = str_pad($_GET['aMin'], 2, "0", STR_PAD_LEFT);
                $aSeg = str_pad($_GET['aSeg'], 2, "0", STR_PAD_LEFT);
                $array[0] = "and RealizaDia BETWEEN $deFecha AND $aFecha and RealizaHora BETWEEN '$deHora:$deMin:$deSeg' AND '$aHora:$aMin:$aSeg'";
                $array[1] = "&opcionFecha=3&DeFecha=$deFecha&aFecha=$aFecha&deHora=$deHora&deMin=$deMin&deSeg=$deSeg&aHora=$aHora&aMin=$aMin&aSeg=$aSeg";
                echo "De: $deFecha $deHora:$deMin:$deSeg <br>";
                echo "A: $aFecha $aHora:$aMin:$aSeg <br>";
                break;
            default:
                $array[0] = null;
                $array[1] = null;
                break;
        }
        // SELECT UsuarioCI, RealizaHora FROM vistaregistro WHERE RealizaHora BETWEEN '01:00:00' AND '11:00:00' and UsuarioCI LIKE '%3%';
        return $array;
    }
}

session_start();
if (!isset($_SESSION['ci'])) {
    header('Location: index.php');
}

$ci = $_SESSION['ci'];
$nombre = $_SESSION['nombre'];
$apellido = $_SESSION['apellido'];
$contacto = $_SESSION['contacto'];
$jefe = $_SESSION['jefe'];


$registro = new registro();

empty($_GET['index']) ? $pagina_actual = 1 : $pagina_actual = $_GET['index'];
$buscar = "";
$url = "";

$arrayFecha = fecha();
if (!empty($arrayFecha[0])) {
    empty($buscar) ? $buscar = $arrayFecha[0] :$buscar = $buscar . $arrayFecha[0];
    empty($url) ? $url = $arrayFecha[1] : $url = $url . $arrayFecha[1];
}




isset($_GET['invitado']) ? $invitado = $_GET['invitado'] : $invitado = 'no';

if ( $invitado == 'si') {
    $invitado2 = true;
    $url = $url . "&invitado=si";

    if (isset($_GET['buscarOpcion'])) {
        $que = $_GET['valor'];
        switch ($_GET['buscarOpcion']) {
            case 1:
                $buscar = $buscar . "and UsuarioRegistroCI LIKE '%$que%' ";
                $url = $url . "&buscarOpcion=1&valor=$que";

                echo "Buscar por cedula, cualquiera que coincida con: $que  <br>";
                break;
            case 5:
                $buscar = $buscar . "and RegistroDesc LIKE '%$que%' ";
                $url = $url . "&buscarOpcion=5&valor=$que";

                echo "Buscar por descripcion, cualquiera que coincida con: $que  <br>";
                break;
            default:
                echo "No se encontro la opcion de busqueda";
                break;
        }
    }
} else{
    $url = $url . "&invitado=no";
    $invitado2 = false;
   
    if (isset($_GET['buscarOpcion'])) {
        $que = $_GET['valor'];
        switch ($_GET['buscarOpcion']) {
            case 1:
                $buscar = $buscar . "and UsuarioCI LIKE '%$que%'";
                $url = $url . "&buscarOpcion=1&valor=$que";
                
                echo "Buscar por cedula, cualquiera que coincida con: $que  <br>";
                break;
            case 2:
                $buscar = $buscar . "and UsuarioNombre LIKE '%$que%'";
                $url = $url . "&buscarOpcion=2&valor=$que";

                echo "Buscar por nombre, cualquiera que coincida con: $que  <br>";
                break;
            case 3:
                $buscar = $buscar . "and UsuarioApellido LIKE '%$que%'";
                $url = $url . "&buscarOpcion=3&valor=$que";

                echo "Buscar por apellido, cualquiera que coincida con: $que  <br>";
                break;
            case 4:
                $buscar = $buscar . "and UsuarioTipo LIKE '%$que%'";
                $url = $url . "&buscarOpcion=4&valor=$que";

                echo "Buscar por tipo, cualquiera que coincida con: $que  <br>";
                break;
            default:
                echo "No se encontro la opcion de busqueda";
                break;
                
        }
    }
}

$filassMostrar = 5;

// Calcular el índice del primer resultado en la página actual
$comienzo = ($pagina_actual - 1) * $filassMostrar;


//$final = $comienzo + $filassMostrar;

// El numero de filas
$total_resultados = $registro->contarFilasRegistro($invitado2, $buscar);
if (empty($total_resultados)) {
    echo "<h1>No hay datos que mostrar.</h1>";
    exit();
}

// Calcular el número total de páginas
$total_paginas = ceil($total_resultados / $filassMostrar);


$ver = $registro->mostrarRegistro($comienzo, $filassMostrar, $invitado2, $buscar);

mostrarTablaEntrada($ver, $total_paginas, $pagina_actual, $url);
unset($ver, $total_paginas, $pagina_actual, $filassMostrar, $comienzo, $total_resultados);
