<?php

include "../../BD/bdd.php";
require_once "../../assets/TCPDF/tcpdf.php";

date_default_timezone_set("America/Caracas");
setlocale(LC_TIME, 'es_VE.UTF-8','esp');

class MYPDF extends TCPDF {
    //Page header
    public function Header() {

        $this->Image('../../assets/img/Daco_4636508.png', 18, 8, 23, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);

        $this->Ln(5);
        $this->setFont('helvetica','I', 10);
        $this->writeHTMLCell(190, 5, '', '',"<b>República Bolivarina de Venezuela</b>", '', 1, 0, true, 'C', true);
        $this->writeHTMLCell(190, 5, '', '',"<b>Ministerio del Poder Popular para la Comunicación e Información</b>", '', 1, 0, true, 'C', true);
        $this->writeHTMLCell(190, 5, '', '',"<b>C.A Venezolana de Televisión</b>", '', 1, 0, true, 'C', true);
        $this->writeHTMLCell(190, 5, '', '',"<b>Gerencia Tecnologia de la información y Comunicación</b>", '', 1, 0, true, 'C', true);

        $this->ln(5);
        $fecha = date("d-m-Y");
        $this->setFont('helvetica','', 11);

        $variable = $_GET["rep"];

        switch ($variable) {
            
            case 'Asignado':
                $this->writeHTMLCell(190, 5, '', '',"<b>REPORTE DE LINEAS ASIGNADAS A LA FECHA $fecha</b>", '', 1, 0, true, 'C', true);
                break;

            case 'Bloqueada':
                $this->writeHTMLCell(190, 5, '', '',"<b>REPORTE DE LINEAS BLOQUEADAS A LA FECHA $fecha</b>", '', 1, 0, true, 'C', true);
            break;

            case 'Prestado':
                $this->writeHTMLCell(190, 5, '', '',"<b>REPORTE DE LINEAS PRESTADAS A LA FECHA $fecha</b>", '', 1, 0, true, 'C', true);
                break;

            case 'Activo':
                $this->writeHTMLCell(190, 5, '', '',"<b>REPORTE DE LINEAS ACTIVAS A LA FECHA $fecha</b>", '', 1, 0, true, 'C', true);
                break;
            
            default:

                $this->writeHTMLCell(190, 5, '', '',"<b>REPORTE DE LINEAS REGISTRADAS A LA FECHA $fecha</b>", '', 1, 0, true, 'C', true);
                break;
        }


        $this->ln(2);
        $this->SetFont('helvetica', 'B', 9);
        $this->Cell(31.7, 5, 'Linea', 1, 0, 'C', 0, '', 0);
        $this->Cell(31.7, 5, 'Operadora', 1, 0, 'C', 0, '', 0);
        $this->Cell(31.7, 5, 'Estado', 1, 0, 'C', 0, '', 0);
        $this->Cell(31.7, 5, 'Numero', 1, 0, 'C', 0, '', 0);
        $this->Cell(31.6, 5, 'Codigo Puk', 1, 0, 'C', 0, '', 0);
        $this->Cell(31.6, 5, 'Pin', 1, 0, 'C', 0, '', 0);
    }
    // Page footer
    public function Footer() {

        if ($this->getNumPages() == 1) { //primera pagina

        } else if ($this->getNumPages() == 2){ //segunda pagina

        }

        $fechaelaborada = date("d-m-Y");
        $this->SetY(-15);
        $this->SetFont('helvetica', 'I', 8);
        $this->Cell(0, 10, "Este documento fue generado de manera automática a través del Sistema de Gestion Telefonico, el: $fechaelaborada", 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Venezolana de television C.A');
$pdf->SetTitle('Reporte de inventario');
$pdf->SetSubject('Reporte de inventario de lineas');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
$pdf->SetMargins(10, 50, 10);

/* -------------------------- ACTA DE PRESTAMO ---------------------- */

$pdf->AddPage();

$estado = $_GET["rep"];

switch ($estado) {

    case 'IN':

        $consulta_pdf = $connect->query("SELECT * FROM Lineas 
        JOIN tipo_linea AS tl ON tl.ID_tipolinea = Lineas.FKEY_Linea
        JOIN Operadoras AS o ON o.ID_Operadora = Lineas.FKEY_Operadora
        JOIN estado_linea AS e ON e.ID_Estado_linea = Lineas.FKEY_Estado 
        ORDER BY N_tipolinea ASC;");

        break;

    default:

        $estado = $_GET["rep"];

        $consulta_pdf = $connect->query("SELECT * FROM Lineas 
        JOIN tipo_linea AS tl ON tl.ID_tipolinea = Lineas.FKEY_Linea
        JOIN Operadoras AS o ON o.ID_Operadora = Lineas.FKEY_Operadora
        JOIN estado_linea AS e ON e.ID_Estado_linea = Lineas.FKEY_Estado

        WHERE N_estado_linea = '$estado'
        ORDER BY N_tipolinea ASC");

        break;
}

while ($dato = $consulta_pdf->fetch_assoc()):

$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(31.7, 6,$dato["N_tipolinea"], 1,0, 'C', 0, '', 0);
$pdf->Cell(31.7, 6,$dato["N_Operadora"], 1, 0, 'C', 0, '', 0);
$pdf->Cell(31.7, 6,$dato["N_estado_linea"], 1,0, 'C', 0, '', 0);
$pdf->Cell(31.7, 6,$dato["Numero"], 1,  0, 'C', 0, '', 0);
$pdf->Cell(31.6, 6,$dato["Cod_puk"],1,0,'C',0,'', 0);
$pdf->Cell(31.6, 6,$dato["Pin"], 1,  1, 'C', 0, '', 0);

endwhile;

$pdf->Output('Reporte de inventario.pdf', 'I');
