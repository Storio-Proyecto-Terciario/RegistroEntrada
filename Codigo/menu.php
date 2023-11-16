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
    <title>Gestion de entrada</title>
    <link rel="stylesheet" href="Vista/Css/modal_registro.css">
    <link rel="stylesheet" href="Vista/Css/botones.css">
    <link rel="stylesheet" href="Vista/Css/formulario_1.css">
    
    <!-- Se Picó el modo daltonico -->
    <link rel="stylesheet" href="Vista/Css/daltonismobw.css" id="daltonismobw">
    <link rel="stylesheet" href="Vista/Css/daltonismotablasbw.css" id="daltonismotablasbw" disabled>

    <link rel="stylesheet" href="Vista/Css/daltonismoTablas.css" id="tablasraras" disabled>
    <link rel="stylesheet" href="Vista/Css/tablas.css" id="tablasNormal">

    <link rel="stylesheet" href="Vista/Css/navegador.css" id="stylesheetNormal">
    <link rel="stylesheet" href="Vista/Css/daltonismo.css" id="stylesheetDaltonism" disabled>
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
        var isDaltonismActive = false;

        document.getElementById('menuVistas').addEventListener('click', function(event) {
            var selectedVista = event.target.getAttribute('value');

            // Desactiva todos los estilos primero
            document.getElementById('daltonismobw').disabled = true;
            document.getElementById('daltonismotablasbw').disabled = true;
            document.getElementById('tablasraras').disabled = true;
            document.getElementById('tablasNormal').disabled = true;
            document.getElementById('stylesheetNormal').disabled = true;
            document.getElementById('stylesheetDaltonism').disabled = true;

            // Activa los estilos según la vista seleccionada
            if (selectedVista === 'normal') {
                document.getElementById('stylesheetNormal').disabled = false;
                document.getElementById('tablasNormal').disabled = false; // Activa estilos para la tabla de Listas de Usuarios y Administrativos
            } else if (selectedVista === 'daltonism') {
                document.getElementById('stylesheetDaltonism').disabled = false;
                document.getElementById('tablasraras').disabled = false;
            } else if (selectedVista === 'bw') {
                document.getElementById('daltonismobw').disabled = false;
                document.getElementById('daltonismotablasbw').disabled = false;
            }

            isDaltonismActive = (selectedVista !== 'normal');

            // Cambia el estilo del enlace del "home" (si se utiliza el mismo estilo para el "home" en ambos modos)
            var homeLink = document.querySelector('.topnav a[href="index.php"]');
            if (isDaltonismActive) {
                homeLink.classList.add('active');
            } else {
                homeLink.classList.remove('active');
            }
        });
    </script>

    <script src="Vista/Js/xml.js"></script>
    <script type="text/javascript" src="Vista/Js/modal_registro.js"></script>
    <script type="text/javascript" src="Vista/Js/validar.js"></script>
    <script type="text/javascript" src="Vista/Js/restricciones_form.js"></script>
    <script type="text/javascript" src="Vista/Js/navegador.js"></script>
    <script type="text/javascript" src="Vista/Js/opcion.js"></script>

</body>
</html>