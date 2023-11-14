<!--  <link rel="stylesheet" href="Css/navegador.css">  -->
<?php
require_once("Vista/vista_registro_funcionario_modal.html");
require_once("Vista/vista_registro_usuario_modal.html");
require_once("Vista/vista_editar_contraseña_funcionario_modal.php");

switch($menuTipo){
    case 1:
        ?>
        <nav class="topnav" id="myTopnav">
            <a href="#home" class="active">Home</a>
            <a href="#" onclick="mostrarXML('Controlador/tablasEntrada.php');">Entrada</a>
            <div class="dropdown">
                <button class="dropbtn">Listas
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="#" onclick="mostrarXML('Controlador/tablasUsuarios.php');">Usuarios</a>
                    <a href="#" onclick="mostrarXML('Controlador/tablasAdministrativos.php');">Administrativo</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn">Registro
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="#" onclick="abrirModal('modalRegUsu',true)" >Usuarios</a>
                    <a href="#" onclick="abrirModal('modalRegFun',true)" >Administrativo</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn"><?php echo $usuario ?>
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="Controlador/cerrar.php" >Cerrar</a>
                    <a href="#" onclick="abrirModal('editarFun',true)" >Contraseña</a>
                </div>
            </div>
        
            <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="navResponsive()">&#9776;</a>
        </nav>
        
            <?php
        break;
    case 2:
    ?>
<nav class="topnav" id="myTopnav">
    <a href="#home" class="active">Home</a>
    <a href="#" onclick="mostrarXML('Controlador/tablasEntrada.php');">Entrada</a>
    <div class="dropdown">
        <button class="dropbtn">Listas
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            <a href="#" onclick="mostrarXML('Controlador/tablasUsuarios.php');">Usuarios</a>
            <a href="#" onclick="mostrarXML('Controlador/tablasAdministrativos.php');">Administrativo</a>
        </div>
    </div>
    <div class="dropdown">
        <button class="dropbtn"><?php echo $usuario ?>
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            <a href="Controlador/cerrar.php" >Cerrar</a>
            <a href="#" onclick="abrirModal('editarFun',true)" >Contraseña</a>
        </div>
    </div>

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
            <a href="index.php" onclick="">Usuarios</a>
            <a href="index.php" onclick="">Administraivo</a>
        </div>
    </div>
    <div class="dropdown">
        <button class="dropbtn">Registro
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            <a href="index.php" onclick="" >Usuarios</a>
            <a href="index.php" onclick="" >Administraivo</a>
        </div>
    </div>
    <a href="#about" class="usuario">usuario</a>
    <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="navResponsive()">&#9776;</a>
</nav>

    <?php
    break;
}




// <script src="Js/navegador.js"></script>