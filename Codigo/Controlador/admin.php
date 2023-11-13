<?php
require_once('../Modelo/clase_administrativos.php');
session_start();
isset($_SESSION['ci']) ? $ci = $_SESSION['ci'] : header('location:../index.php');
if(isset($_GET['accion']) ){
   $accion = $_GET['accion'];
   
}else{
    isset($_POST['accion']) ? $accion = $_POST['accion'] : header('location:../menu.php'); 
}




// CR33333333
$usuario = new administrativos();

$usuario->setCi($ci);
$usuario->setNombre($_SESSION['nombre']);
$usuario->setApellido($_SESSION['apellido']);
$usuario->setContacto($_SESSION['contacto']);
$usuario->setJefe($_SESSION['jefe']);
$usuario->setTipo($_SESSION['tipo']);



switch($accion){
    case 1:
        $msg = "<h2>No se pudo realizar la accion.</h2>";
        isset($_POST['contra1']) ? $contra1 = $_POST['contra1'] : $_SESSION['mensaje'] = $msg. header('location:../menu.php');
        isset($_POST['contra2']) ? $contra2 = $_POST['contra2'] : $_SESSION['mensaje'] = $msg. header('location:../menu.php');
        if($contra1 == 'pedroPP147258' or $contra2 == 'pedroPP147258'){
            $_SESSION['mensaje'] = $msg;
            header('location:../menu.php');
            exit;
        }

        if ($contra1 != $contra2) {
            $msg = "<h2>Las contraseñas no coinciden</h2>";
            $_SESSION['mensaje'] = $msg;
            header('location:../menu.php');
        }
        if($usuario->modificarAdministrativoContra($ci,$contra1,$contra2)){
            
            $msg = "<h2>Cambio realizado</h2>";
            $_SESSION['mensaje'] = $msg;
            header('location:../menu.php');
        } else {
            $msg = "<h2>No se pudo realizar el cambio</h2>";
            $_SESSION['mensaje'] = $msg;
            header('location:../menu.php');
        }
        break;
    case 2:
        if($usuario->borrarAdministrativo($ci)){
            header('location:../index.php');
        }else{
            $msg = "<h2>No se pudo realizar la accion.</h2>";
            $_SESSION['mensaje'] = $msg;
            header('location:../menu.php');
        }
        break;

}