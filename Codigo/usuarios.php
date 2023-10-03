<?php
session_start();

if (empty($_SESSION['ci'])) {
    header('location:login.php');
    exit;
}

$ci = $_SESSION['ci'];
$nombre = $_SESSION['nombre'];
$apellido = $_SESSION['apellido'];
$contacto = $_SESSION['contacto'];
$jefe = $_SESSION['jefe'];

if (empty($_GET['u'])) {
    header('location:login.php');
    exit;
}
$u = $_GET['u'];
switch($u){
    case 1:

        echo "loadDoc('Controler/verUsuarios.php?u=1');";
        
    break;
    case 2:

        echo "loadDoc('Controler/verUsuarios.php?u=2');";
        
    break;

}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Vista/Css/modal_registro.css">
    <link rel="stylesheet" href="Vista/Css/botones.css">
    <link rel="stylesheet" href="Vista/Css/formulario_1.css">
</head>
<body>
<p id="demo"></p>


<script src="Vista/Js/xml.js"></script>
</body>

</html>