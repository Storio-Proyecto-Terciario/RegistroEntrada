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
        echo"<script>alert('La consulta es $sql');</script>";
        if(!$this->db->query($sql)){
            die('Error SQL: ' . $this->db->error);
        }
        
    }
}
