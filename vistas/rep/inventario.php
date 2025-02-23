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
                $this->writeHTMLCell(190, 5, '', '',"<b>REPORTE DE EQUIPOS ASIGNADOS A LA FECHA $fecha</b>", '', 1, 0, true, 'C', true);
                break;

            case 'Dañado':
                $this->writeHTMLCell(190, 5, '', '',"<b>REPORTE DE EQUIPOS DAÑADOS A LA FECHA $fecha</b>", '', 1, 0, true, 'C', true);
            break;

            case 'Prestado':
                $this->writeHTMLCell(190, 5, '', '',"<b>REPORTE DE EQUIPOS PRESTADOS A LA FECHA $fecha</b>", '', 1, 0, true, 'C', true);
                break;

            case 'Bueno':
                $this->writeHTMLCell(190, 5, '', '',"<b>REPORTE DE EQUIPOS REGISTRADOS EN ALMACEN A LA FECHA $fecha</b>", '', 1, 0, true, 'C', true);
                break;
            
            default:
                $this->writeHTMLCell(190, 5, '', '',"<b>REPORTE DE EQUIPOS REGISTRADOS EN ALMACEN A LA FECHA $fecha</b>", '', 1, 0, true, 'C', true);
                break;
        }


        $this->ln(2);
        $this->SetFont('helvetica', 'B', 9);
        $this->Cell(31.7, 5, 'Equipo', 1, 0, 'C', 0, '', 0);
        $this->Cell(31.7, 5, 'Marca', 1, 0, 'C', 0, '', 0);
        $this->Cell(31.7, 5, 'Modelo', 1, 0, 'C', 0, '', 0);
        $this->Cell(31.7, 5, 'Estado', 1, 0, 'C', 0, '', 0);
        $this->Cell(31.6, 5, 'Bien Nacional', 1, 0, 'C', 0, '', 0);
        $this->Cell(31.6, 5, 'Serial', 1, 0, 'C', 0, '', 0);
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
$pdf->SetSubject('Reporte de inventario de equipos');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
$pdf->SetMargins(10, 50, 10);

/* -------------------------- ACTA DE PRESTAMO ---------------------- */

$pdf->AddPage();

$estado = $_GET["rep"];

switch ($estado) {

    case 'IN':

        $consulta_pdf = $connect->query("SELECT Bien_nacional,serial,N_Equipo,N_Marca,N_Modelo,Estado,N_division

        FROM detalle_equipo
        JOIN Equipos ON Equipos.ID_Equipo = detalle_equipo.FK_Equipo
        JOIN Marcas  ON Marcas.id_Marca = detalle_equipo.FK_Marca
        JOIN Modelo ON Modelo.ID_Modelo = detalle_equipo.FK_Modelo
        JOIN Divisiones ON Divisiones.ID_division = detalle_equipo.FK_Ubicacion
        JOIN Estado_equipo ON Estado_equipo.ID_Estado = detalle_equipo.FK_ESTADO
        ORDER BY N_Equipo ASC");

        break;

    default:

        $estado = $_GET["rep"];

        $consulta_pdf = $connect->query("SELECT Bien_nacional,serial,N_Equipo,N_Marca,N_Modelo,Estado,N_division

        FROM detalle_equipo
        JOIN Equipos ON Equipos.ID_Equipo = detalle_equipo.FK_Equipo
        JOIN Marcas  ON Marcas.id_Marca = detalle_equipo.FK_Marca
        JOIN Modelo ON Modelo.ID_Modelo = detalle_equipo.FK_Modelo
        JOIN Divisiones ON Divisiones.ID_division = detalle_equipo.FK_Ubicacion
        JOIN Estado_equipo ON Estado_equipo.ID_Estado = detalle_equipo.FK_ESTADO
        WHERE Estado = '$estado'
        ORDER BY N_Equipo ASC");

        break;
}

while ($dato = $consulta_pdf->fetch_assoc()):

$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(31.7, 6,$dato["N_Equipo"], 1,0, 'C', 0, '', 0);
$pdf->Cell(31.7, 6,$dato["N_Marca"], 1, 0, 'C', 0, '', 0);
$pdf->Cell(31.7, 6,$dato["N_Modelo"], 1,0, 'C', 0, '', 0);
$pdf->Cell(31.7, 6,$dato["Estado"], 1,  0, 'C', 0, '', 0);
$pdf->Cell(31.6, 6,$dato["Bien_nacional"],1,0,'C',0,'', 0);
$pdf->Cell(31.6, 6,$dato["serial"], 1,  1, 'C', 0, '', 0);

endwhile;

$pdf->Output('Reporte de inventario.pdf', 'I');
