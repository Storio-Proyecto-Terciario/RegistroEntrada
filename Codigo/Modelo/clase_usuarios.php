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
        $sql = "SELECT UsuarioCI
        FROM Usuarios
        WHERE UsuarioCI = $ci
        AND UsuarioExiste = 1;"; //exec ValidarUsuario @id =$ci;
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
        $sql = "SELECT UsuarioCI
        FROM Usuarios
        WHERE UsuarioCI = $UsuarioCI
        AND UsuarioExiste = 1;"; // exec ValidarUsuario @id =$UsuarioCI;
        if ($resultado = $this->db->query($sql)) {
            // Valida si el usuario existe.
            // Cuenta el numero de filas que dio la consulta.
            $nfilas = mysqli_num_rows($resultado);
            if ($nfilas == 0) {
                $resultado->free();
            
                $sql = "CALL proc_insertarUsuario($UsuarioCI, '$UsuarioNombre', '$UsuarioApellido', '$UsuarioTipo');";
                //echo $sql;
                $this->db->query($sql);
            } else {
                return false;
            }
        } else {
            die('Error SQL: ' . $this->db->error);
        }
    }

    public function borrarUsuario($ci)
    {
        $sql = "UPDATE Usuarios
        SET UsuarioExiste = 0
        WHERE UsuarioCI = $ci;";
        $this->db->query($sql);
    }

    private function BuscadorUsuarioConsulta($opcion, $buscar){
        switch($opcion){
            case 1:
                return "and UsuarioCI LIKE '%$buscar%'";
                
            break;
            case 2:
                return "and UsuarioNombre LIKE '%$buscar%'";
                
            break;
            case 3:
                return "and UsuarioApellido LIKE '%$buscar%'";
                
            break;
            case 4:
                return "and UsuarioTipo LIKE '%$buscar%'";
                
            default:
                return null;
                
            break;
        }
    }



    public function contarFilasUsuario($opcion,$buscar){

        $a_buscar = $this->BuscadorUsuarioConsulta($opcion, $buscar);

        $sql="SELECT COUNT(*) as total FROM vistausuarios  where UsuarioExiste=1 $a_buscar;";
        if ($resultado = $this->db->query($sql)) {
            $cantidad = $resultado->fetch_assoc();
            $resultado->free();
            return $cantidad['total'];

        }else{}
    }

    public function usuariosMostrar($comienzo, $final,$opcion, $buscar){

        $a_buscar = $this->BuscadorUsuarioConsulta($opcion, $buscar);
        $array = array();
        
        $sql = "SELECT * FROM vistausuarios where UsuarioExiste=true $a_buscar ORDER BY UsuarioCI ASC LIMIT $comienzo , $final;";
        $resultado = $this->db->query($sql);
        
        while($row = $resultado->fetch_assoc()){
            $array[] = $row;
        }
        return $array;
    }


}


