<?php
require_once('../Modelo/clase_registro.php');
require_once('../Vista/vista_tabla_entrada.php');


$msg = "<h2>Cambio realizado</h2>";
$_SESSION['mensaje'] = $msg;
function fechaUrl()
{

    if (isset($_GET['opcionFecha'])) {
        $opcion_fecha = $_GET['opcionFecha'];
        switch ($opcion_fecha) {
            case 1:
                isset($_GET['deFecha']) ? $deFecha = $_GET['deFecha'] : $deFecha = '0000-00-00';
                isset($_GET['aFecha']) ? $aFecha = $_GET['aFecha'] : $aFecha = '9999-12-31';
               

                echo "De: $deFecha <br>";
                echo "A: $aFecha <br>";
                
                return "&opcionFecha=1&deFecha=$deFecha&aFecha=$aFecha";
                break;
            case 2:
                isset($_GET['deHora']) ? $deHora = str_pad($_GET['deHora'], 2, "0", STR_PAD_LEFT) : $deHora = 00;
                isset($_GET['deMin']) ? $deMin = str_pad($_GET['deMin'], 2, "0", STR_PAD_LEFT) : $deMin = 00;
                isset($_GET['deSeg']) ? $deSeg = str_pad($_GET['deSeg'], 2, "0", STR_PAD_LEFT) : $deSeg = 00;
                isset($_GET['aHora']) ? $aHora = str_pad($_GET['aHora'], 2, "0", STR_PAD_LEFT) : $aHora = 24;
                isset($_GET['aMin']) ? $aMin = str_pad($_GET['aMin'], 2, "0", STR_PAD_LEFT) : $aMin = 59;
                isset($_GET['aSeg']) ? $aSeg = str_pad($_GET['aSeg'], 2, "0", STR_PAD_LEFT) : $aSeg = 59;
                echo "De: $deHora:$deMin:$deSeg <br>";
                echo "A: $aHora:$aMin:$aSeg <br>";
                return "&opcionFecha=2&deHora=$deHora&deMin=$deMin&deSeg=$deSeg&aHora=$aHora&aMin=$aMin&aSeg=$aSeg";
                
                break;
            case 3:
                isset($_GET['deFecha']) ? $deFecha = $_GET['deFecha'] : $deFecha = '0000-00-00';
                isset($_GET['aFecha']) ? $aFecha = $_GET['aFecha'] : $aFecha = '9999-12-31';
                isset($_GET['deHora']) ? $deHora = str_pad($_GET['deHora'], 2, "0", STR_PAD_LEFT) : $deHora = 00;
                isset($_GET['deMin']) ? $deMin = str_pad($_GET['deMin'], 2, "0", STR_PAD_LEFT) : $deMin = 00;
                isset($_GET['deSeg']) ? $deSeg = str_pad($_GET['deSeg'], 2, "0", STR_PAD_LEFT) : $deSeg = 00;
                isset($_GET['aHora']) ? $aHora = str_pad($_GET['aHora'], 2, "0", STR_PAD_LEFT) : $aHora = 24;
                isset($_GET['aMin']) ? $aMin = str_pad($_GET['aMin'], 2, "0", STR_PAD_LEFT) : $aMin = 59;
                isset($_GET['aSeg']) ? $aSeg = str_pad($_GET['aSeg'], 2, "0", STR_PAD_LEFT) : $aSeg = 59;
                echo "De: $deFecha $deHora:$deMin:$deSeg <br>";
                echo "A: $aFecha $aHora:$aMin:$aSeg <br>";
                return"&opcionFecha=3&DeFecha=$deFecha&aFecha=$aFecha&deHora=$deHora&deMin=$deMin&deSeg=$deSeg&aHora=$aHora&aMin=$aMin&aSeg=$aSeg";
                
                break;
            default:
                return null;
                break;
        }
        // SELECT UsuarioCI, RealizaHora FROM vistaregistro WHERE RealizaHora BETWEEN '01:00:00' AND '11:00:00' and UsuarioCI LIKE '%3%';
        
    }
}


function fechaArray()
{
    $array = array();
    if (isset($_GET['opcionFecha'])) {
        $opcion_fecha = $_GET['opcionFecha'];
        switch ($opcion_fecha) {
            case 1:
                isset($_GET['deFecha']) ? $deFecha = $_GET['deFecha'] : $deFecha = '0000-00-00';
                isset($_GET['aFecha']) ? $aFecha = $_GET['aFecha'] : $aFecha = '9999-12-31';
                $array[0] = "$deFecha";
                $array[1] = "$aFecha";
                $array[4] = "1";

                return $array;
                break;
            case 2:
                isset($_GET['deHora']) ? $deHora = str_pad($_GET['deHora'], 2, "0", STR_PAD_LEFT) : $deHora = 00;
                isset($_GET['deMin']) ? $deMin = str_pad($_GET['deMin'], 2, "0", STR_PAD_LEFT) : $deMin = 00;
                isset($_GET['deSeg']) ? $deSeg = str_pad($_GET['deSeg'], 2, "0", STR_PAD_LEFT) : $deSeg = 00;
                isset($_GET['aHora']) ? $aHora = str_pad($_GET['aHora'], 2, "0", STR_PAD_LEFT) : $aHora = 24;
                isset($_GET['aMin']) ? $aMin = str_pad($_GET['aMin'], 2, "0", STR_PAD_LEFT) : $aMin = 59;
                isset($_GET['aSeg']) ? $aSeg = str_pad($_GET['aSeg'], 2, "0", STR_PAD_LEFT) : $aSeg = 59;

                $array[2] = "$deHora:$deMin:$deSeg";
                $array[3] = "$aHora:$aMin:$aSeg";
                $array[4] = "2";

                return $array;
                break;
            case 3:
                isset($_GET['deFecha']) ? $deFecha = $_GET['deFecha'] : $deFecha = '0000-00-00';
                isset($_GET['aFecha']) ? $aFecha = $_GET['aFecha'] : $aFecha = '9999-12-31';
                isset($_GET['deHora']) ? $deHora = str_pad($_GET['deHora'], 2, "0", STR_PAD_LEFT) : $deHora = 00;
                isset($_GET['deMin']) ? $deMin = str_pad($_GET['deMin'], 2, "0", STR_PAD_LEFT) : $deMin = 00;
                isset($_GET['deSeg']) ? $deSeg = str_pad($_GET['deSeg'], 2, "0", STR_PAD_LEFT) : $deSeg = 00;
                isset($_GET['aHora']) ? $aHora = str_pad($_GET['aHora'], 2, "0", STR_PAD_LEFT) : $aHora = 24;
                isset($_GET['aMin']) ? $aMin = str_pad($_GET['aMin'], 2, "0", STR_PAD_LEFT) : $aMin = 59;
                isset($_GET['aSeg']) ? $aSeg = str_pad($_GET['aSeg'], 2, "0", STR_PAD_LEFT) : $aSeg = 59;

                $array[0] = "$deFecha";
                $array[1] = "$aFecha";
                $array[2] = "$deHora:$deMin:$deSeg";
                $array[3] = "$aHora:$aMin:$aSeg";
                $array[4] = "3";
                
                return $array;
                break;
            default:
                return "";
                break;
        }
        // SELECT UsuarioCI, RealizaHora FROM vistaregistro WHERE RealizaHora BETWEEN '01:00:00' AND '11:00:00' and UsuarioCI LIKE '%3%';
        
    }
    return "";
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
$fecha=fechaUrl();
empty($fecha) ? $url = $fecha: null;
unset($fecha);





isset($_GET['invitado']) ? $invitado = $_GET['invitado'] : $invitado = 'no';

if (isset($_GET['buscarOpcion'])) {
    $que = $_GET['valor'];
    $opcion = $_GET['buscarOpcion'];
    if ( $invitado == 'si') {
        $invitado2 = true;
        $url = $url . "&invitado=si";
        switch ($_opcion) {
            case 1:
                $url = $url . "&buscarOpcion=1&valor=$que";

                echo "Buscar por cedula, cualquiera que coincida con: $que  <br>";
                break;
            case 5:
                $url = $url . "&buscarOpcion=5&valor=$que";

                echo "Buscar por descripcion, cualquiera que coincida con: $que  <br>";
                break;
            default:
                echo "No se encontro la opcion de busqueda";
                break;
        }
    
    }else{
        $url = $url . "&invitado=no";
        $invitado2 = false;
        switch ($_opcion) {
            case 1:
                $url = $url . "&buscarOpcion=1&valor=$que";
                echo "Buscar por cedula, cualquiera que coincida con: $que  <br>";
                break;
            case 2:
                $url = $url . "&buscarOpcion=2&valor=$que";
                echo "Buscar por nombre, cualquiera que coincida con: $que  <br>";
                break;
            case 3:
                $url = $url . "&buscarOpcion=3&valor=$que";
                echo "Buscar por apellido, cualquiera que coincida con: $que  <br>";
                break;
            case 4:
                $url = $url . "&buscarOpcion=4&valor=$que";
                echo "Buscar por tipo, cualquiera que coincida con: $que  <br>";
                break;
            default:
                echo "No se encontro la opcion de busqueda";
                break;
        }
    }
}else{
    $invitado2 = false;
    $opcion = null;
}

$filassMostrar = 5;

// Calcular el índice del primer resultado en la página actual
$comienzo = ($pagina_actual - 1) * $filassMostrar;


//$final = $comienzo + $filassMostrar;

// El numero de filas   $invitado,$opcion, , $array, $buscar
$total_resultados = $registro->contarFilasRegistro($invitado2,$opcion,fechaArray() , $buscar);
if(empty($total_resultados)){
    echo "<h1>No hay datos que mostrar.</h1>";
    exit();
}else{
    echo "Se encontraron un total de " . $total_resultados . " coincidencias." . "<br>";
}

// Calcular el número total de páginas
$total_paginas = ceil($total_resultados / $filassMostrar);

$ver = $registro->mostrarRegistro($comienzo, $filassMostrar, $invitado2, $buscar, fechaArray(), $opcion);

mostrarTablaEntrada($ver, $total_paginas, $pagina_actual, $url);
unset($ver, $total_paginas, $pagina_actual, $filassMostrar, $comienzo, $total_resultados);

?>