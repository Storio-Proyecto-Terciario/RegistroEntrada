<?php
session_start();
$ci=$_POST['cedula'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$tipo=$_POST['tipo'];

$val=$_POST['re'];

switch($val){
    case 1:
        $usuario= new usuarios();
        if(!$usuario->validarUsuario($ci)){
            $usuario->insertarUsuario($ci,$nombre,$apellido,$tipo);
        }
     
    break;


    case 2:

        $administrador= new administrativos();
        $contra=$_POST['contraseña'];
        $con=$_POST['correo'];
        $jefe=$_SESSION['jefe'];
        if(!$administrador->validarAdministrativo($ci,$con)){

            if($administrador->validarUsuario($ci)){
                $administrador->altaAdministrativo($ci,$contra,$con,$jefe);

            }else{
                $administrador->insertarUsuario($ci,$nombre,$apellido,$tipo);
            }

        }

    break;
}

?>