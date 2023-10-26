<!--  <link rel="stylesheet" href="Css/navegador.css">  -->
<?php
require_once("Vista/vista_registro_funcionario_modal.html");
require_once("Vista/vista_registro_usuario_modal.html");


switch($menuTipo){
    case 1:
    ?>

<nav class="topnav" id="myTopnav">
    <a href="#home" class="active">Home</a>
    <a href="#retrada">Entrada</a>
    <div class="dropdown">
        <button class="dropbtn">Listas
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            <a href="#" onclick="mostrar('?op=1')">Usuarios</a>
            <a href="#" onclick="mostrar('?op=2')">Administraivo</a>
        </div>
    </div>
    <div class="dropdown">
        <button class="dropbtn">Registro
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            <a href="#" onclick="abrirModal('modalRegUsu',true)" >Usuarios</a>
            <a href="#" onclick="abrirModal('modalRegFun',true)" >Administraivo</a>
        </div>
    </div>
    <a href="#about" class="usuario"><?php echo $usuario ?></a>
    <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="navResponsive()">&#9776;</a>
</nav>

    <?php
    break;
    default:
    ?>

<nav class="topnav" id="myTopnav">
    <a href="#home" class="active">Home</a>
    <a href="#retrada">Entrada</a>
    <div class="dropdown">
        <button class="dropbtn">Listas
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            <a href="#" onclick="mostrarXML('Controlador/listar.php?index=1&op=1')">Usuarios</a>
            <a href="#" onclick="mostrarXML('Controlador/listar.php?index=1&op=2')">Administraivo</a>
        </div>
    </div>
    <div class="dropdown">
        <button class="dropbtn">Registro
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            <a href="#" onclick="abrirModal('modalRegUsu',true)" >Usuarios</a>
            <a href="#" onclick="abrirModal('modalRegFun',true)" >Administraivo</a>
        </div>
    </div>
    <a href="#about" class="usuario">usuario</a>
    <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="navResponsive()">&#9776;</a>
</nav>

    <?php
    break;
}




// <script src="Js/navegador.js"></script>