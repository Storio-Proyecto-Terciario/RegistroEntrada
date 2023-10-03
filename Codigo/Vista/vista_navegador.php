<!--  <link rel="stylesheet" href="Css/navegador.css">  -->





<?php

function nav($n)
{

    switch ($n) {
        case 1:
?>

            <nav class="topnav" id="myTopnav">
                <a href="#home" class="active">Home</a>
                <a href="usuarios">Usuarios</a>
                <a href="#contact">Contact</a>
                <div class="dropdown">
                    <button class="dropbtn">Usuarios
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-content">
                        <a href="usuarios.php?u=1">Usuarios</a>
                        <a href="usuarios.php?u=2">Administrativo</a>
                    </div>
                </div>
                <a href="#about">About</a>
                <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="navResponsive()">&#9776;</a>
            </nav>


        <?php
        break;

        default:
        ?>

            <nav class="topnav" id="myTopnav">
                <a href="#home" class="active">Home</a>
                <a href="#news">News</a>
                <a href="#contact">Contact</a>
                <div class="dropdown">
                    <button class="dropbtn">Dropdown
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-content">
                        <a href="#">Link 1</a>
                        <a href="#">Link 2</a>
                        <a href="#">Link 3</a>
                    </div>
                </div>
                <a href="#about">About</a>
                <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="navResponsive()">&#9776;</a>
            </nav>


<?php

            break;
    }
}

?>



<script src="Js/navegador.js"></script>