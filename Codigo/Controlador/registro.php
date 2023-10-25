<?php

require_once('../Modelo/clase_usuarios.php');
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
            echo "<h2>Usuario registrado</h2>";
        }else{
            echo "<h2>El usuario ya existe</h2>";
        }
     
    break;


    case 2:
        $usuario= new usuarios();
        if(!$usuario->validarUsuario($ci)){
            $administrador= new administrativos();
            $contra=$_POST['contraseña'];
            $con=$_POST['correo'];
            $jefe=$_SESSION['jefe'];
            if(!$administrador->validarAdministrativo($ci,$con)){
    
                $administrador->altaAdministrativo($ci,$contra,$con,$jefe);
    
            
            }else{
                echo "<h2>El administrativo ya existe</h2>";
            }
        }else{
            echo "<h2>Se nesecita un usuario para poder dar de alta un fincionario. </h2>";
        }
       

    break;
}
