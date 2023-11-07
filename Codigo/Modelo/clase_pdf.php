<?php
require('librerias_exstenciones/fpdf.php');

class PDF extends FPDF
{


        function PdfTablaEntradaInvitado($header, $data)
{
    // Anchuras de las columnas
    $w = array(40, 35, 45, 40);
    // Cabeceras
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C');
    $this->Ln();
    // Datos
    foreach($data as $row)
    {
        $this->Cell($w[0],6,$row['UsuarioRegistroCI'],'LR');
        $this->Cell($w[1],6,$row['RegistroDesc'],'LR');
        $this->Cell($w[3],6,$row['RealizaDia'],'LR');
        $this->Cell($w[3],6,$row['RealizaHora'],'LR');
        $this->Ln();
    }
    // Línea de cierre
    $this->Cell(array_sum($w),0,'','T');
}
    
    
function PdfTablaEntradaUsuario($header, $data)
{
    // Anchuras de las columnas
    $w = array(40, 35, 45, 40);
    // Cabeceras
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C');
    $this->Ln();
    // Datos
    foreach($data as $row)
    {
        $this->Cell($w[0],6,$row['UsuarioCI'],'LR');
        $this->Cell($w[1],6,$row['UsuarioNombre'],'LR');
        $this->Cell($w[2],6,$row['UsuarioApellido'],'LR');
        $this->Cell($w[3],6,$row['UsuarioTipo'],'LR');
        $this->Cell($w[3],6,$row['RealizaDia'],'LR');
        $this->Cell($w[3],6,$row['RealizaHora'],'LR');
        $this->Ln();
    }
    // Línea de cierre
    $this->Cell(array_sum($w),0,'','T');
}
    
// Una tabla más completa
function PdfTablaUsuario($header, $data)
{
    // Anchuras de las columnas
    $w = array(40, 35, 45, 40);
    // Cabeceras
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C');
    $this->Ln();
    // Datos
    foreach($data as $row)
    {
        $this->Cell($w[0],6,$row['UsuarioCI'],'LR');
        $this->Cell($w[1],6,$row['UsuarioNombre'],'LR');
        $this->Cell($w[2],6,$row['UsuarioApellido'],'LR');
        $this->Cell($w[3],6,$row['UsuarioTipo'],'LR');
        $this->Ln();
    }
    // Línea de cierre
    $this->Cell(array_sum($w),0,'','T');
}

function PdfTablaAdministrativo($header, $data)
{
    // Anchuras de las columnas
    $w = array(40, 35, 45, 40);
    // Cabeceras
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C');
    $this->Ln();
    // Datos
    foreach($data as $row)
    {
        $this->Cell($w[0],6,$row['UsuarioCI'],'LR');
        $this->Cell($w[1],6,$row['UsuarioNombre'],'LR');
        $this->Cell($w[2],6,$row['UsuarioApellido'],'LR');
        $this->Cell($w[3],6,$row['AdministrativoContacto'],'LR');
        $this->Ln();
    }
    // Línea de cierre
    $this->Cell(array_sum($w),0,'','T');
}

}