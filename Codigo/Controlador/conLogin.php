<?php
require_once('../Modelo/clase_usuarios.php');
require_once('../Modelo/clase_administrativos.php');
require_once('../Modelo/clase_registro.php');
session_start();

if (empty($_POST['cedula'])) { // Valida si esta vacia
    $error[] = "El campo de cedual esta  vacio";
    error_log("Error de validacion:: conLogin.php - 
El campo de cedual esta  vacio", 3, "../error.log");
}
if (empty($_POST['t'])) { // Valida si esta vacia
    $error[] = "No se pudo resolver el tipo de entrada";
    error_log("Error de validacion:: conLogin.php - 
    No se pudo resolver el tipo de entrada", 3, "../error.log");
}

if (!empty($error)) {

    $ci = $_POST['cedula'];
    $tipo = $_POST['t'];
    switch ($tipo) {
        case 0:
            $usuario = new usuarios();
            if ($usuario->validarUsuario($ci)) { // Valida que el usuario exista
                $des = "Usuario registrado $ci"; // Comentario si existe

            } else {
                $des = "El usuario no esta registrado, 
                es categorizado como invitado cedula:$ci"; // Comentario si no existe el usuario
            }
            if (isset($des)) { // validar si $des esta definida
                $re = new registro();
                $re->masRegistro($ci, $des); // Cargar registro
                header('location:../entrada.php');
                unset($des);
                exit;
            } else {
                $error[] = "No se pudo resolver el tipo de entrada";
                error_log("Error de validacion:: conLogin.php - 
                Hubo un error con el usuario $ci", 3, "../error.log");
                header('location:../error.php');
                exit;
            }

            break;
        case 1:
            $administrativo = new administrativos();
            if (empty($_POST['con'])) {
                $error[] = "No se pudo resolver la contraseña";
                error_log("Error de validacion:: conLogin.php - 
                No se pudo resolver la contraseña", 3, "../error.log");
                header('location:../error?i=1.php');
                exit;
            }
            if ($administrativo->validarUsuario($ci)) { // Valida que el usuario exista
                if ($administrativo->validarAdministrativo($ci, $_POST['con'])) { // Validar si administrativo existe

                    $datos = $administrativo->buscarDatosAdministrativo($ci);

                    $_SESSION['ci'] = $datos['UsuarioCI'];
                    $_SESSION['nombre'] = $datos['UsuarioNombre'];
                    $_SESSION['apellido'] = $datos['UsuarioApellido'];
                    $_SESSION['contacto'] = $datos['AdministrativoJefe'];
                    $_SESSION['jefe'] = $datos['AdministrativoJefe'];

                    header('location:../menu.php');
                    exit;
                } else {
                    $error[] = "No se pudo validar si el administrativo existe";
                    error_log("Error de validacion:: conLogin.php - 
                    No se pudo validar si el administrativo existe $ci", 3, "../error.log");
                }
            } else {
                $error[] = "No se pudo validar si el administrativo usuario existe";
                error_log("Error de validacion:: conLogin.php - 
                No se pudo validar si el administrativo usuario existe $ci", 3, "../error.log");
            }

            break;
    }
} else {
    header('location:../error?i=1.php');
    exit;
    foreach ($error as $err) {
        echo $err . "<br>";
    }
}

/*
Notas para otro:
    
+ Se podria validar el tipo de dato y el largo.
+ Se podria validar el tipo de usuario, evitar a los que no son validos(estudiante) pasen po case 1

- Muchos error_log

*/