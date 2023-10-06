<?php
require_once('db.php');

class usuarios
{

    private $db;

    protected $ci;
    protected $nombre;
    protected $apellido;
    protected $tipo;
    protected $existe;



    public function __construct()
    {
        $this->db = Conectar::conexion();
    }

    public function getCi()
    {
        return $this->ci;
    }

    public function setCi($ci): self
    {
        $this->ci = $ci;

        return $this;
    }


    public function getNombre()
    {
        return $this->nombre;
    }


    public function setNombre($nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }


    public function getApellido()
    {
        return $this->apellido;
    }


    public function setApellido($apellido): self
    {
        $this->apellido = $apellido;

        return $this;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo($tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }


    public function getExiste()
    {
        return $this->existe;
    }


    public function setExiste($existe): self
    {
        $this->existe = $existe;

        return $this;
    }




    //Validar usuario

    function validarUsuario($ci)
    {
        $sql = "call ValidarUsuario('$ci');"; //exec ValidarUsuario @id =$ci;
        echo $sql;
        exit;
        if ($resultado = $this->db->query($sql)) {
            // Cuenta el numero de filas que dio la consulta.
            $nfilas = mysqli_num_rows($resultado);
            // Valida si el usuario existe.
            if ($nfilas > 0) {
                $resultado->free();
                return true;
            } else {
                return false;
            }
        }else{
            die('Error SQL: ' . $this->db->error);
            echo"validarUsuario";
            echo"<script>alert('Error SQL: ' . $this->db->error);</script>";
        
        }
    }


    // Busacar dato en especifico a partir de la cedula

    function buscarDato($ci, $datoABuscar)
    {

        $sql = "SELECT $datoABuscar
        FROM Usuarios
        WHERE UsuarioCI = $ci;";;
        if ($resultado = $this->db->query($sql)) {
            $re = $resultado->fetch_assoc();
            $resultado->free();
            return $re;
        } else {
            die('Error SQL: ' . $this->db->error);
        }
    }


    // Insertar usuario

    function insertarUsuario($UsuarioCI, $UsuarioNombre, $UsuarioApellido, $UsuarioTipo)
    {
        $sql = "call ValidarUsuario($UsuarioCI);"; // exec ValidarUsuario @id =$UsuarioCI;
        if ($resultado = $this->db->query($sql)) {
            // Valida si el usuario existe.
            // Cuenta el numero de filas que dio la consulta.
            $nfilas = mysqli_num_rows($resultado);
            if ($nfilas == 0) {
                $resultado->free();
                $sql = "INSERT INTO Usuarios (UsuarioCI, UsuarioNombre, UsuarioApellido, UsuarioTipo)
                VALUES
                ($UsuarioCI, $UsuarioNombre, $UsuarioApellido, $UsuarioTipo);";
                $this->db->query($sql);
            } else {
                return false;
            }
        } else {
            die('Error SQL: ' . $this->db->error);
        }
    }

    // Ver usuarios

    function datosUsuarios($terminaTabla, $empiezaTabla){


        $sql="SELECT UsuarioCI, CONCAT(UsuarioNombre, ' ', UsuarioApellido) AS NombreCompleto, UsuarioTipo 
        FROM vistausuarios 
        WHERE UsuarioExiste=1
        LIMIT $terminaTabla  OFFSET $empiezaTabla;";

        if ($resultado = $this->db->query($sql)) {
            while ($fila = $resultado->fetch_assoc()) {
                $resultados[] = $fila;
            }
            $resultado->free();
            return $resultados;
        } else {
            die('Error SQL: ' . $this->db->error);
        }
    }
}
