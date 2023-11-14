<?php

require_once('../Modelo/clase_administrativos.php');
session_start();


$val = $_POST['re'];

$usuario = new usuarios();
switch ($val) {
    case 1:
        if (empty($_POST['cedula']) or empty($_POST['nombre']) or empty($_POST['apellido']) or empty($_POST['tipo'])) {
            $msg = "<h2>Error con los datos</h2>";
            $_SESSION['mensaje'] = $msg;
            header('location:../menu.php');
        }
        $ci = $_POST['cedula'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $tipo = $_POST['tipo'];

        if (!$usuario->validarUsuario($ci)) {
            $usuario->insertarUsuario($ci, $nombre, $apellido, $tipo);

            $msg = "<h2>Usuario registrado</h2>";
            $_SESSION['mensaje'] = $msg;
            header('location:../menu.php');
        } else {
            $msg = "<h2>El usuario ya existe</h2>";
            $_SESSION['mensaje'] = $msg;
            header('location:../menu.php');
        }

        break;


    case 2:
        $ci = $_POST['cedula'];
        if ($usuario->validarUsuario($ci)) {
            $administrador = new administrativos();
            

            // falta validar tipo de dato y largo 
            if(isset($_POST['contraseña'])){
                $contra = $_POST['contraseña'];
            }else{
                $msg = "<h2>Error con los datos contra</h2>";
                $_SESSION['mensaje'] = $msg;
                header('location:../menu.php');
            }
            if(isset($_POST['correo'])){
                $con = $_POST['correo'];
            }else{
                $msg = "<h2>Error con los datos correo</h2>";
                $_SESSION['mensaje'] = $msg;
                header('location:../menu.php');
            }
            if(isset($_SESSION['ci'])){
                $jefe = $_SESSION['ci'];
            }else{
                $msg = "<h2>Error con los datos jefe</h2>";
                $_SESSION['mensaje'] = $msg;
                header('location:../menu.php');
            }
            if(isset($_POST['permiso'])){
                $p = $_POST['permiso'];
            }else{
                $msg = "<h2>Error con los datos permiso</h2>";
                $_SESSION['mensaje'] = $msg;
                header('location:../menu.php');
            }
            

            if (!$administrador->validarAdministrativo($ci, $con)) {

                if($administrador->altaAdministrativo($ci, $contra, $con, $jefe, $p)){
                   $msg = "<h2>Administrativo registrado</h2>";
                    $_SESSION['mensaje'] = $msg;
                    header('location:../menu.php'); 
                }else{
                    $msg = "<h2>Administrativo no se registrado</h2>";
                    $_SESSION['mensaje'] = $msg;
                    header('location:../menu.php');
                }
            } else {
                $msg = "<h2>El administrativo ya existe</h2>";
                $_SESSION['mensaje'] = $msg;
                header('location:../menu.php');
            }
        } else {
            $msg = "<h2>El usuario no existe</h2>";
            $_SESSION['mensaje'] = $msg;
            header('location:../menu.php');
        }


        break;

}
