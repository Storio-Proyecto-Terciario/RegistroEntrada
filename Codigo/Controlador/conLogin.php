<?php
require_once('../Modelo/clase_usuarios.php');
require_once('../Modelo/clase_administrativos.php');
require_once('../Modelo/clase_registro.php');
session_start();


if (empty($_POST['t'] and empty($_POST['cedula']))) {
   // header('location:../login.php');
}
$ci = $_POST['cedula'];
$tipo = $_POST['t'];
$usuario = new usuarios();

switch ($tipo) {
    case 0:

        $re = new registro();

        if ($usuario->validarUsuario($ci)) {
            $des = "Usuario registrado";
        } else {
            $des = "Usuario no registrado cedula: " . $ci;
        }
        $re->masRegistro($ci, $des);
        header('location:../entrada.php');
        break;
    case 1:
        if (empty($_POST['con'])) {
            echo "no hay contraseña";
        }
        if ($usuario->validarUsuario($ci)) {
            $administrativo = new administrativos();
            if ($administrativo->validarAdministrativo($ci, $_POST['con'])) {

                $datos = $administrativo->buscarDatosAdministrativo($ci);
                $_SESSION['ci'] = $datos['UsuarioCI'];
                $_SESSION['nombre'] = $datos['UsuarioNombre'];
                $_SESSION['apellido'] = $datos['UsuarioApellido'];
                $_SESSION['contacto'] = $datos['AdministrativoJefe'];
                $_SESSION['jefe'] = $datos['AdministrativoJefe'];

                header('location:../menu.php');
            } else {
                echo "contraseña incorrecta";
                echo "<script> console.log('contraseña incorrecta". $_POST['con']."');</script>";
                header('location:../login.php');
            }
        }else{
            echo "<script> console.log('usuario no registrado');</script>";
            header('location:../login.php');
        }

        break;
}
