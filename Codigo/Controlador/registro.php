<?php

require_once('../Modelo/clase_administrativos.php');
session_start();


$val = $_POST['re'];

$usuario = new usuarios();
switch ($val) {
    case 1:
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
            $contra = $_POST['contraseña'];
            $con = $_POST['correo'];
            $jefe = $_SESSION['ci'];


            if (!$administrador->validarAdministrativo($ci, $con)) {

                $administrador->altaAdministrativo($ci, $contra, $con, $jefe);

                $msg = "<h2>Administrativo registrado</h2>";
                $_SESSION['mensaje'] = $msg;
                header('location:../menu.php');
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
    case 3:
        $administrador = new administrativos();
        $contra1 = $_POST['con1'];
        $contra2 = $_POST['con2'];
        if($contra1 == '***'){
            $msg = "<h2>No se pudo realizar el cambio</h2>";
            $_SESSION['mensaje'] = $msg;
            header('location:../menu.php');
        }
        
        if ($administrador->modificarAdministrativoContra($_SESSION['ci'], $contra1, $contra2)) {
            $msg = "<h2>Cambio realizado</h2>";
            $_SESSION['mensaje'] = $msg;
            header('location:../menu.php');
        } else {
            $msg = "<h2>No se pudo realizar el cambio</h2>";
            $_SESSION['mensaje'] = $msg;
            header('location:../menu.php');
        }
        break;
}
