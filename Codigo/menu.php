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

    
    <?php
    session_start();

    echo"<h1>El usuariio actual es ".$_SESSION['ci']."</h1>";

    require('Vista/vista_registro_usuario_modal.html');
    require('Vista/vista_registo_funcionario_modal.html');
?>
<button onclick="abrirModal('modalRegUsu',true)">re usuario</button>
<button onclick="abrirModal('modalRegFun',true)"> re funcionario</button>

<script src="Vista/Js/modal_registro.js"></script>
<script src="Vista/Js/validar.js"></script>
<script src="Vista/Js/restricciones_form.js"></script>

</body>
</html>