<?php
require_once('../Modelo/clase_administrativos.php');
require_once('../Vista/vista_tabla_usuario.php');
require_once('../Vista/vista_tabla_funcionario.php');


if (empty($_GET['u'])) {
    header('location:login.php');
    exit;
}
$u = $_GET['u'];
$index = $_GET['index'];
if($index <1){
    $index=1;
}
$canFilas=20;
$empiezaTabla = ($index-1) * $canFilas;
$terminaTabla = $empiezaTabla + $canFilas;

switch($u){
    case 1:
        $usuarios = new usuarios();
        $tablaUsuarios = $usuarios->datosUsuarios($terminaTabla, $empiezaTabla);
        tablaUsuarios($tablaUsuarios, $index);
        
    break;
    case 2:

        $funcionario = new administrativos();
        $tablaFuncionario = $funcionario->DatosAdministrativo($terminaTabla, $empiezaTabla);
        tablaFuncionario($tablaFuncionario, $index);
        
    break;
    }