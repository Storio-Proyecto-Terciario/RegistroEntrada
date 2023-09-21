<?php
require_once('db.php');

class usuarios{

    private $ci;







    //Validar usuario

    function validarUsuario($ci) : Returntype {
        $sql="exec ValidarUsuario @id =$ci;";
        $resultado = $this->db->query($sql);
        $re = $resultado->fetch_assoc();
        // Cuenta el numero de filas que dio la consulta.
        $nfilas=mysqli_num_rows($resultado);
        // Valida si el usuario existe.
        if($nfilas>0){ 
            return true;
        }else{
            return false;
        }
    }


    // Busacar dato en especifico a partir de la cedula

    function buscarDato($ci, $datoABuscar) : Returntype {
        
        $sql="SELECT $datoABuscar
        FROM Usuarios
        WHERE UsuarioCI = $ci;"
        $resultado = $this->db->query($sql);
        $re = $resultado->fetch_assoc();

        return $re;
        
    }



    /*

$sql="SELECT ID_usuario, imagen, nombre, apellido, existe FROM usuarios WHERE nombre='$nombre' AND  contrasena= PASSWORD('".$contra."');";  

            $resultado -> free();
            // Se realiza la carga de datos.
            $this->id = $re['ID_usuario'];
            $this->imagen = $re['imagen'];
            $this->nombre = $re['nombre'];
            $this->apellido = $re['apellido'];
            $this->existe = $re['existe'];
            if($this->existe == 0){
                echo"<script>alert('El usuarios no ')</script>";
                return false;

    */
}