<?php
require_once('db.php');
require_once('clase_usuarios.php');

class administrativos extends usuarios
{

    private $db;

    private $jefe;
    private $contra;
    private $contacto;




    public function __construct()
    {
        $this->db = Conectar::conexion();
    }



    public function getJefe()
    {
        return $this->jefe;
    }

    public function setJefe($jefe): self
    {
        $this->jefe = $jefe;

        return $this;
    }

    public function getContra()
    {
        return $this->contra;
    }

    public function setContra($contra): self
    {
        $this->contra = $contra;

        return $this;
    }

    public function getContacto()
    {
        return $this->contacto;
    }

    public function setContacto($contacto): self
    {
        $this->contacto = $contacto;

        return $this;
    }






    //Validar Administrativo

    function validarAdministrativo($ci, $con)
    {
        $sql = "SELECT UsuarioCI FROM Administrativos WHERE UsuarioCI =$ci and AdministrativoContra='$con' and AdministrativoExiste=1"; //exec ValidarAdministrativo @id =$ci;
        if ($resultado = $this->db->query($sql)) {
            // Cuenta el numero de filas que dio la consulta.
            $nfilas = mysqli_num_rows($resultado);
            $resultado->free();

            // Valida si el usuario existe.
            if ($nfilas > 0) {
                echo "asd";
                return true;
            } else {
                return false;
            }
        } else {
            die('Error SQL: ' . $this->db->error);
        }
    }

    // Datos
    function buscarDatosAdministrativo($ci)
    {
        $sql = "SELECT *
        FROM vistausuarioadministrativo
        WHERE UsuarioCI = '$ci';";

        if ($rel = $this->db->query($sql)) {
            $re = $rel->fetch_assoc();

            return $re;
        } else {
            die('Error SQL: ' . $this->db->error);
        }
    }

    // Busacar dato en especifico a partir de la cedula
    function buscarDatoAdministrativo($ci, $datoABuscar)
    {
        $sql = "SELECT $datoABuscar
        FROM vistausuariosadministrativos
        WHERE UsuarioCI = $ci;";
        if ($resultado = $this->db->query($sql)) {
            $re = $resultado->fetch_assoc();
            $resultado->free();

            return $re;
        } else {
            die('Error SQL: ' . $this->db->error);
        }
    }

    //insertar administrativa

    public function altaAdministrativo($ci, $contra, $con, $jefe)
    {
        // Valida si el admistrativo ya existe
        $sql = "SELECT UsuarioCi FROM Administrativos WHERE UsuarioCi =$ci and AdministrativoContra='$contra' and AdministrativoExiste=1";
        if ($resultado = $this->db->query($sql)) {
            $nfilas = mysqli_num_rows($resultado);
            $resultado->free();

            if ($nfilas == 0) {
                $sql = "CALL InsertarAdministrativoSupervisa($ci, '$contra', '$con', $jefe);";
                $this->db->query($sql);
            }
        } else {
            die('Error SQL: ' . $this->db->error);
        }
    }
}
