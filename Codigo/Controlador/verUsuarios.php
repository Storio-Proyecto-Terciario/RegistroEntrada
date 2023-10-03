<?php
require_once('../Modelo/clase_usuarios.php');
require_once('../Vista/vista_tabla_usuario.php');

if (empty($_GET['u'])) {
    header('location:login.php');
    exit;
}
$u = $_GET['u'];
switch($u){
    case 1:
        $usuarios = new usuarios();
        tablaUsuarios($usuarios->datosUsuarios());
        
    break;
    case 2:

        echo "loadDoc('Controler/verUsuarios.php?u=2');";
        
    break;
    }