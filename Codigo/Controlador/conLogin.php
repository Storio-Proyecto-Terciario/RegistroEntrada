<?php
require_once('../Modelo/clase_usuarios.php');
require_once('../Modelo/clase_administrativos.php');
require_once('../Modelo/clase_registro.php');
session_start();

if (empty($_POST['t']) and empty($_POST['cedula'])) {
    header('location:../index.php');
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
        header('location:../index.php?login=1');
        break;
    case 1:

        if (empty($_POST['con'])) {
            header('location:../index.php');
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
                $_SESSION['tipo'] = $datos['UsuarioTipo'];
                $msg = "Inicio de sesion correcto";
                $_SESSION['mensaje'] = $msg;

                header('location:../menu.php');
            } else {

                header('location:../index.php');
            }
        } else {
            header('location:../index.php');
        }

        break;
}
