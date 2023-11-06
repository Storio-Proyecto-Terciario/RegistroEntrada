<?php


require_once('db.php');

class registro
{

    private $db;
    private $ci;
    private $des;
    private $dia;
    private $hora;


    public function __construct()
    {
        $this->db = Conectar::conexion();
    }


    public function getDb()
    {
        return $this->db;
    }


    public function setDb($db): self
    {
        $this->db = $db;

        return $this;
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


    public function getDes()
    {
        return $this->des;
    }


    public function setDes($des): self
    {
        $this->des = $des;

        return $this;
    }


    public function getDia()
    {
        return $this->dia;
    }


    public function setDia($dia): self
    {
        $this->dia = $dia;

        return $this;
    }


    public function getHora()
    {
        return $this->hora;
    }


    public function setHora($hora): self
    {
        $this->hora = $hora;

        return $this;
    }


    // Añadir registro

    public function masRegistro($ci, $des)
    {
        $sql = "call insertarRegistro($ci,'$des')";
        if(!$this->db->query($sql)){
            die('Error SQL: ' . $this->db->error);
        }
        
    }

    
    public function contarFilasRegistro($invitado, $buscar){
    

        if($invitado){
            $sql="SELECT COUNT(*) as total FROM  vistaregistro WHERE RegistroInvitado = 1 $buscar;";
        }else{
            $sql="SELECT COUNT(*) as total FROM  vistaregistro WHERE RegistroInvitado = 0 $buscar;";
        }
        if ($resultado = $this->db->query($sql)) {
            $cantidad = $resultado->fetch_assoc();
            $resultado->free();
            return $cantidad['total'];

        }else{

        }
        
    }

    public function mostrarRegistro( $comienzo, $final, $invitado, $buscar){

        if($invitado){
            $sql = "SELECT UsuarioRegistroCI, RegistroDesc, RealizaDia, RealizaHora from 
            vistaregistro WHERE RegistroInvitado = 1 $buscar limit $comienzo, $final;";
        }else{
            $sql = "SELECT UsuarioCI, UsuarioNombre, UsuarioApellido,UsuarioTipo, RealizaDia, RealizaHora from 
            vistaregistro WHERE RegistroInvitado = 0 $buscar limit $comienzo, $final;";
        }
        if ($resultado = $this->db->query($sql)) {
            if ($resultado->num_rows <= 0) {
                
                return null;
            }
            while($row = $resultado->fetch_assoc()){
                $array[] = $row;
            }
            return $array;
        } else {
            die('Error SQL: ' . $this->db->error);
        }
    }
}
