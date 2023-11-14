<?php
session_start();
if (!isset($_SESSION['ci'])) {
    header('Location: index.php');
}

$ci = $_SESSION['ci'];
$nombre = $_SESSION['nombre'];
$apellido = $_SESSION['apellido'];
$contacto = $_SESSION['contacto'];
$jefe = $_SESSION['jefe'];
$permiso = $_SESSION['permiso'];
$usuario = $nombre . " " . $apellido;
if ($permiso != 0) {
    $menuTipo = 2;
} else {
    $menuTipo = 1;
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
    <link rel="stylesheet" href="Vista/Css/tablas.css">


    <link rel="stylesheet" href="Vista/Css/navegador.css">

</head>

<body>
    <?php require_once('Vista/vista_navegador.php');
    ?>

    <p id='xml'>
        <?php
        if (isset($_SESSION['mensaje'])) {
            echo $_SESSION['mensaje'];
            unset($_SESSION['mensaje']);
        }

        ?>

    </p>
    <script>
        function mostrarXML(url) {
            var xml = new XMLHttpRequest();
            xml.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("xml").innerHTML = this.responseText;
                }
            };
            xml.open("GET", url, true);
            xml.send();
        }
 
    
    </script>




    <!-- <script src="Vista/Js/xml.js"></script> -->
    <script type="text/javascript" src="Vista/Js/modal_registro.js"></script>
    <script type="text/javascript" src="Vista/Js/validar.js"></script>
    <script type="text/javascript" src="Vista/Js/restricciones_form.js"></script>
    <script type="text/javascript" src="Vista/Js/navegador.js"></script>
    <script type="text/javascript" src="Vista/Js/opcion.js"></script>


</body>

</html>