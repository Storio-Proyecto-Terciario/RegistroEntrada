

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="Vista/Css/botones.css"> 
    <link rel="stylesheet" href="Vista/Css/formulario_1.css">  
</head>
<body>
<script src="Vista/Js/restricciones_form.js"></script>
<?php

if(isset($_GET['login'])){
    if($_GET['login'] == '1'){
        require_once('Vista/vista_entrada.html');
    }else{
        require_once('Vista/vista_login.html');
    }
}else{
    require_once('Vista/vista_login.html');
}

    ?>
 <script type="text/javascript" src="Vista/Js/validar.js"></script>

</body>
</html>