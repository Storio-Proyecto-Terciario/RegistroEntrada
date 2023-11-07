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
    private function fechaConsulta( $array){
        if(is_array($array)){
            isset($array[4])?$array[4]:$array[4]=false;
        }else{
            return "";   
        }
           
        switch($array[4]){
            case   1:
                return "AND RealizaDia BETWEEN '".$array[0]."' AND '".$array[1]."'";
                break;
            case   2:
                return "AND RealizaHora BETWEEN '".$array[2]."' AND '".$array[3]."'";
                break;
            case   3:
                return "AND RealizaDia BETWEEN '".$array[0]."' AND '".$array[1]."' AND RealizaHora BETWEEN '".$array[2]."' AND '".$array[3]."'";
                break;
            default:
                return "";
                break;
        }
    }

    private function invitado($invitado, $opcion, $buscar){
        if ( $invitado) {
            switch ($opcion) {
                case 1:
                    return "and UsuarioRegistroCI LIKE '%$buscar%' ";
                    break;
                case 5:
                    return "and RegistroDesc LIKE '%$buscar%' ";
                    break;
                default:
                    return "";
                    break;
            }
        }else{
            switch ($opcion) {
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
                    break;
                default:
                    return "";
                    break;  
            }
        }
    }
    
    public function contarFilasRegistro($invitado,$opcion, $array, $buscar){

        $a_buscar = $this->fechaConsulta( $array) . $this->invitado($invitado, $opcion, $buscar);
    

        if($invitado){
            $sql="SELECT COUNT(*) as total FROM  vistaregistro WHERE RegistroInvitado = 1 $a_buscar;";
        }else{
            $sql="SELECT COUNT(*) as total FROM  vistaregistro WHERE RegistroInvitado = 0 $a_buscar;";
        }
        if ($resultado = $this->db->query($sql)) {
            $cantidad = $resultado->fetch_assoc();
            $resultado->free();
            return $cantidad['total'];

        }else{

        }
        
    }

    public function mostrarRegistro( $comienzo, $final, $invitado, $buscar,$array_fecha, $opcion){
        $a_buscar = $this->fechaConsulta( $array_fecha) . $this->invitado($invitado, $opcion, $buscar);
    
        if($invitado){
            $sql = "SELECT UsuarioRegistroCI, RegistroDesc, RealizaDia, RealizaHora from 
            vistaregistro WHERE RegistroInvitado = 1 $a_buscar limit $comienzo, $final;";
        }else{
            $sql = "SELECT UsuarioCI, UsuarioNombre, UsuarioApellido,UsuarioTipo, RealizaDia, RealizaHora from 
            vistaregistro WHERE RegistroInvitado = 0 $a_buscar limit $comienzo, $final;";
        }
        if ($resultado = $this->db->query($sql)) {
            if ($resultado->num_rows <= 0) {
                
                return null;
            }
            while($row = $resultado->fetch_assoc()){
                $array[] = $row;
            }
            $_SESSION['Datos'] = $array;
            return $array;
        } else {
            die('Error SQL: ' . $this->db->error);
        }
    }
}

?>