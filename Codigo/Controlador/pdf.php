<?php    
   
    require_once('../Modelo/clase_pdf.php');

    session_start();
    if(!isset($_SESSION['ci'])){
        header('Location: index.php');
    }
    $datos = $_SESSION['Datos'];

    foreach ($datos as $key => $value) {
        $datos[$key] = array_map('utf8_decode', $value);
    }
    if(isset($_GET['que'])){
        $que = $_GET['que'];

        switch($que){
            case 1:
                $header = array('Cedula de Identidad', 'Nombre', 'Apellido', 'Tipo');
                $pdf = new PDF();
                $pdf->SetFont('Arial','',14);
                $pdf->AddPage();
                $pdf->PdfTablaUsuario($header,$datos);
                $pdf->Output();
            break;
            case 2:
                $header = array('Cedula de Identidad', 'Nombre', 'Apellido', 'Contacto');
                $pdf = new PDF();
                $pdf->SetFont('Arial','',14);
                $pdf->AddPage();
                $pdf->PdfTablaAdministrativo($header,$datos);
                $pdf->Output();
            break;
            case 3:
                $header = array('Cedula de Identidad', 'Nombre', 'Apellido', 'Tipo', 'Descripcion', 'Fecha', 'Hora');
                $pdf = new PDF();
                $pdf->SetFont('Arial','',14);
                $pdf->AddPage();
                $pdf->PdfTablaEntradaUsuario($header,$datos);
                $pdf->Output();
            break;
            case 4:
                $header = array('Cedula de Identidad', 'Descripcion', 'Fecha', 'Hora');
                $pdf = new PDF();
                $pdf->SetFont('Arial','',14);
                $pdf->AddPage();
                $pdf->PdfTablaEntradaInvitado($header,$datos);
                $pdf->Output();
            break;
        }



    }
?>