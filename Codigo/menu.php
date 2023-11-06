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
$usuario = $nombre . " " . $apellido;

$menuTipo = 1;
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

        function BuscarOpcionAdministrativo(comentario_label, buscador, oop, envia) {
            let opcion = document.getElementById(oop).value;
            opcion = Number(opcion);


            switch (opcion) {
                case 1:
                    document.getElementById(comentario_label).innerHTML = "Cedula: ";
                    document.getElementById(buscador).type = "number";
                    document.getElementById(buscador).min = "0";
                    document.getElementById(buscador).maxlength = "8";
                    document.getElementById(buscador).disabled = false;
                    document.getElementById(envia).disabled = false;
                    break;
                case 2:
                    document.getElementById(comentario_label).innerHTML = "Nombre: ";
                    document.getElementById(buscador).type = "text";
                    document.getElementById(buscador).disabled = false;
                    document.getElementById(envia).disabled = false;
                    break;
                case 3:
                    document.getElementById(comentario_label).innerHTML = "Apellido: ";
                    document.getElementById(buscador).type = "text";
                    document.getElementById(buscador).disabled = false;
                    document.getElementById(envia).disabled = false;
                    break;
                case 4:
                    document.getElementById(comentario_label).innerHTML = "Correo: ";
                    document.getElementById(buscador).type = "text";
                    document.getElementById(buscador).disabled = false;
                    document.getElementById(envia).disabled = false;
                    break;
                default:
                    document.getElementById(comentario_label).innerHTML = "";
                    document.getElementById(buscador).type = "";
                    document.getElementById(buscador).disabled = true;
                    document.getElementById(envia).disabled = true;

            }

        }

        function BuscarOpcionUsuario(comentario_label, buscador, oop, envia) {
            let opcion = document.getElementById(oop).value;
            opcion = Number(opcion);


            switch (opcion) {
                case 1:
                    document.getElementById(comentario_label).innerHTML = "Cedula: ";
                    document.getElementById(buscador).type = "number";
                    document.getElementById(buscador).min = "0";
                    document.getElementById(buscador).maxlength = "8";
                    document.getElementById(buscador).disabled = false;
                    document.getElementById(envia).disabled = false;
                    break;
                case 2:
                    document.getElementById(comentario_label).innerHTML = "Nombre: ";
                    document.getElementById(buscador).type = "text";
                    document.getElementById(buscador).disabled = false;
                    document.getElementById(envia).disabled = false;
                    break;
                case 3:
                    document.getElementById(comentario_label).innerHTML = "Apellido: ";
                    document.getElementById(buscador).type = "text";
                    document.getElementById(buscador).disabled = false;
                    document.getElementById(envia).disabled = false;
                    break;
                default:
                    document.getElementById(comentario_label).innerHTML = "";
                    document.getElementById(buscador).type = "";
                    document.getElementById(buscador).disabled = true;
                    document.getElementById(envia).disabled = true;

            }

        }
    </script>


    <script>


        function radioButton() {
            var radios = document.getElementsByName("grupoRadioInvitado");
            var value = 0;
            for (var i = 0; i < radios.length; i++) {
                if (radios[i].checked) {
                    value = radios[i].value;
                    break;
                }
            }
            if (value == 'no') {
                return "&invitado=no";
            } else {
                return "&invitado=si";
            }
            
        }

        function VerOpcionFechaScript(returnFecha) {
            let opcion = document.getElementById("OpcionFecha").value;
            opcion = Number(opcion);
            let deFecha, aFecha, deHora, deMin, deSeg, aHora, aMin, aSeg;

            switch (opcion) {
                case 1:
                    deFecha = document.getElementById("DeFecha").value;
                    aFecha = document.getElementById("AFecha").value;

                    if (returnFecha) {
                        return "&opcionFecha=" + opcion + "&deFecha=" + deFecha + "&aFecha=" + aFecha;
                    } else {
                        return "";
                    }
                    break;
                case 2:
                    deHora = document.getElementById("DeHora").value;
                    deMin = document.getElementById("DeMin").value;
                    deSeg = document.getElementById("DeSeg").value;

                    aHora = document.getElementById("AHora").value;
                    aMin = document.getElementById("AMin").value;
                    aSeg = document.getElementById("ASeg").value;


                    if (returnFecha) {
                        return "&opcionFecha=" + opcion + "&deHora=" + deHora + "&deMin=" + deMin + "&deSeg=" + deSeg + "&aHora=" + aHora + "&aMin=" + aMin + "&aSeg=" + aSeg;
                    } else {
                        return "";
                    }
                    break;
                case 3:
                    deFecha = document.getElementById("DeFecha").value;
                    aFecha = document.getElementById("AFecha").value;

                    deHora = document.getElementById("DeHora").value;
                    deMin = document.getElementById("DeMin").value;
                    deSeg = document.getElementById("DeSeg").value;

                    aHora = document.getElementById("AHora").value;
                    aMin = document.getElementById("AMin").value;
                    aSeg = document.getElementById("ASeg").value;


                    if (returnFecha) {
                        return "&opcionFecha=" + opcion + "&deFecha=" + deFecha + "&aFecha=" + aFecha + "&deHora=" + deHora + "&deMin=" + deMin + "&deSeg=" + deSeg + "&aHora=" + aHora + "&aMin=" + aMin + "&aSeg=" + aSeg;
                    } else {
                        return "";
                    }
                    break;
                default:
                    deFecha = "";
                    aFecha = "";

                    deHora = "";
                    deMin = "";
                    deSeg = "";

                    aHora = "";
                    aMin = "";
                    aSeg = "";

                    document.getElementById('DeFecha').value = "";
                    document.getElementById('AFecha').value = "";
                    document.getElementById('DeHora').value = "00";
                    document.getElementById('DeMin').value = "00";
                    document.getElementById('DeSeg').value = "00";
                    document.getElementById('AHora').value = "00";
                    document.getElementById('AMin').value = "00";
                    document.getElementById('ASeg').value = "00";


                    return "";

                    break;

            }

        }

        function OpcionFechaScript() {
            let opcion = document.getElementById("OpcionFecha").value;
            opcion = Number(opcion);

            switch (opcion) {
                case 1:
                    document.getElementById('fecha').style.display = "block";
                    document.getElementById('tiempo').style.display = "none";

                    break;
                case 2:
                    document.getElementById('tiempo').style.display = "block";
                    document.getElementById('fecha').style.display = "none";
                    break;
                case 3:
                    document.getElementById('tiempo').style.display = "block";
                    document.getElementById('fecha').style.display = "block";
                    break;
                default:
                    document.getElementById('tiempo').style.display = "none";
                    document.getElementById('fecha').style.display = "none";
                    break;
            }

        }

        function BuscarOpcionEntrada(comentario_label, buscador, oop) {
            let opcion = document.getElementById(oop).value;
            opcion = Number(opcion);


            switch (opcion) {
                case 1:
                    document.getElementById(comentario_label).innerHTML = "Cedula: ";
                    document.getElementById(buscador).type = "number";
                    document.getElementById(buscador).min = "0";
                    document.getElementById(buscador).maxlength = "8";
                    document.getElementById(buscador).disabled = false;
                    break;
                case 2:
                    document.getElementById(comentario_label).innerHTML = "Nombre: ";
                    document.getElementById(buscador).type = "text";
                    document.getElementById(buscador).disabled = false;
                    break;
                case 3:
                    document.getElementById(comentario_label).innerHTML = "Apellido: ";
                    document.getElementById(buscador).type = "text";
                    document.getElementById(buscador).disabled = false;
                    break;
                case 4:
                    document.getElementById(comentario_label).innerHTML = "Tipo: ";
                    document.getElementById(buscador).type = "text";
                    document.getElementById(buscador).disabled = false;
                    break;
                case 5:
                    document.getElementById(comentario_label).innerHTML = "Descripcion: ";
                    document.getElementById(buscador).type = "text";
                    document.getElementById(buscador).disabled = false;
                    break;
                default:
                    document.getElementById(comentario_label).innerHTML = "";
                    document.getElementById(buscador).type = "";
                    document.getElementById(buscador).disabled = true;
                    break;
            }

        }
    </script>

    <!-- <script src="Vista/Js/xml.js"></script> -->
    <script src="Vista/Js/modal_registro.js"></script>
    <script src="Vista/Js/validar.js"></script>
    <script src="Vista/Js/restricciones_form.js"></script>
    <script src="Vista/Js/navegador.js"></script>


</body>

</html>