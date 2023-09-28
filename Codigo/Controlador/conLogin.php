<?php
require_once('../Modelo/clase_usuarios.php');
require_once('../Modelo/clase_administrativos.php');
require_once('../Modelo/clase_registro.php');
session_start();

$ci = $_POST['cedula'];

$tipo =$_POST['t'];


$administrativo = new administrativos();
$re=new registro();
switch($tipo){
    case 0:
        $usuario= new usuarios();
        if($usuario->validarUsuario($ci)){
            $des="Usuario registro";
            $re->masRegistro($ci,$des);
            header('location:../entrada.php');
        }else{
            
        }
    break;
    case 1:
 
    if($administrativo->validarAdministrativo($ci,$_POST['con'])){

        $datos = $administrativo->buscarDatosAdministrativo($ci);

        $_SESSION['ci'] = $datos['UsuarioCI'];
        $_SESSION['nombre'] = $datos['UsuarioNombre'];
        $_SESSION['apellido'] = $datos['UsuarioApellido'];
        $_SESSION['contacto'] = $datos['AdministrativoJefe'];
        $_SESSION['jefe'] = $datos['AdministrativoJefe'];

        header('location:../menu.php');
    }else{       
    }
    break;
}
