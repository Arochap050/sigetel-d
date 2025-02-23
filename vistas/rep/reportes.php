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

        include "../../BD/bd.php";

        $pa = $_POST["PA"];
        $variable = $_POST["tipo"];
        $empleado = $_POST["empleado"];
        $fecha_p = $_POST["fecha1"];
        $fecha_s = $_POST["fecha2"];

        if ($empelado) {
            $c_empleado = $connect->query("SELECT p_Nombre_empleado, p_Apellido_empleado FROM Empleados WHERE ID_Empleado = $empleado");
            $empleado_result = $c_empleado->fetch_assoc();
            $empleado_f= $empleado_result["p_Nombre_empleado"]." ".$empleado_result["p_Apellido_empleado"];
        }


        if ($empleado) {

            switch ($variable) {
            
                case 'equipo':
        
                    switch ($pa) {
                        case 'Asignacion':
                            $this->writeHTMLCell(190, 5, '', '',"<b>Reporte de Equipos Asignados a: $empleado_f</b>", '', 1, 0, true, 'C', true);
                            break;
                        
                        case 'Prestamo':
                            $this->writeHTMLCell(190, 5, '', '',"<b>Reporte de Equipos Prestados a: $empleado_f</b>", '', 1, 0, true, 'C', true);
                            break;
        
                        case 'Devolucion':
                            $this->writeHTMLCell(190, 5, '', '',"<b>Reporte de Equipos Devueltos por: $empleado_f</b>", '', 1, 0, true, 'C', true);
                            break;
                    }
        
                    break;
        
                case 'linea':
                    switch ($pa) {
                        case 'Asignacion':
                            $this->writeHTMLCell(190, 5, '', '',"<b>Reporte de Lineas Asignadas a: $empleado_f</b>", '', 1, 0, true, 'C', true);
                            break;
        
                        case 'Prestamo':
                            $this->writeHTMLCell(190, 5, '', '',"<b>Reporte de Lineas Prestadas a: $empleado_f</b>", '', 1, 0, true, 'C', true);
                            break;
        
                        case 'Devolucion':
                            $this->writeHTMLCell(190, 5, '', '',"<b>Reporte de Lineas Devueltas por: $empleado_f</b>", '', 1, 0, true, 'C', true);
                            break;
                    }
                    break;
                }
            
        } elseif ($fecha_p) {

            switch ($variable) {
            
                case 'equipo':
        
                    switch ($pa) {
                        case 'Asignacion':
                            $this->writeHTMLCell(190, 5, '', '',"<b>Reporte de Equipos Asignados del $fecha_p al $fecha_s</b>", '', 1, 0, true, 'C', true);
                            break;
                        
                        case 'Prestamo':
                            $this->writeHTMLCell(190, 5, '', '',"<b>Reporte de Equipos Prestados del $fecha_p al $fecha_s</b>", '', 1, 0, true, 'C', true);
                            break;
        
                        case 'Devolucion':
                            $this->writeHTMLCell(190, 5, '', '',"<b>Reporte de Equipos Devueltos del $fecha_p al $fecha_s</b>", '', 1, 0, true, 'C', true);
                            break;
                    }
        
                    break;
        
                case 'linea':
                    switch ($pa) {
                        case 'Asignacion':
                            $this->writeHTMLCell(190, 5, '', '',"<b>Reporte de Lineas Asignadas del $fecha_p al $fecha_s</b>", '', 1, 0, true, 'C', true);
                            break;
        
                        case 'Prestamo':
                            $this->writeHTMLCell(190, 5, '', '',"<b>Reporte de Lineas Prestadas del $fecha_p al $fecha_s</b>", '', 1, 0, true, 'C', true);
                            break;
        
                        case 'Devolucion':
                            $this->writeHTMLCell(190, 5, '', '',"<b>Reporte de Lineas Devueltas del $fecha_p al $fecha_s</b>", '', 1, 0, true, 'C', true);
                            break;
                    }
                    break;
                }
            }

$tipo = $_POST["tipo"];
       
switch ($tipo) {

    case 'equipo':

        $this->ln(2);
        $this->SetFont('helvetica', 'B', 9);
        $this->Cell(31.7, 5, 'Equipo', 1, 0, 'C', 0, '', 0);
        $this->Cell(31.7, 5, 'Marca', 1, 0, 'C', 0, '', 0);
        $this->Cell(31.7, 5, 'Modelo', 1, 0, 'C', 0, '', 0);
        $this->Cell(31.7, 5, 'Estado', 1, 0, 'C', 0, '', 0);
        $this->Cell(31.6, 5, 'Bien Nacional', 1, 0, 'C', 0, '', 0);
        $this->Cell(31.6, 5, 'Serial', 1, 0, 'C', 0, '', 0);
        break;

    case 'linea':

        $this->ln(2);
        $this->SetFont('helvetica', 'B', 9);
        $this->Cell(31.7, 5, 'Linea', 1, 0, 'C', 0, '', 0);
        $this->Cell(31.7, 5, 'Operadora', 1, 0, 'C', 0, '', 0);
        $this->Cell(31.7, 5, 'Estado', 1, 0, 'C', 0, '', 0);
        $this->Cell(31.7, 5, 'Numero', 1, 0, 'C', 0, '', 0);
        $this->Cell(31.6, 5, 'Codigo Puk', 1, 0, 'C', 0, '', 0);
        $this->Cell(31.6, 5, 'Pin', 1, 0, 'C', 0, '', 0);
        break;
}

    }
    // Page footer
    public function Footer() {

        switch ($this->getNumPages()) {
            case 1:

                break;

            case 2:

                break;
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
$pdf->SetTitle('Reporte');
$pdf->SetSubject('Reporte de equipos');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
$pdf->SetMargins(10, 50, 10);

/* -------------------------- REPORTES ---------------------- */

$pdf->AddPage();

$reporte = $_POST["reportee"];
$tipo = $_POST["tipo"];
$pa = $_POST["PA"];

$empleado = $_POST["empleado"];
$fecha_p = $_POST["fecha1"];
$fecha_s = $_POST["fecha2"];

if ($reporte == 'Devolucion') {

switch ($tipo) {

case 'equipo':

if ($empleado) {

$equipo_asg = $connect->query("SELECT * FROM equipo_asig AS EA
JOIN Asignaciones AS A ON A.ID_Asignado = EA.fkey_asig
JOIN detalle_equipo AS DE ON DE.ID_Detalle_Equipo = EA.fkey_equipo
JOIN Empleados AS EM ON EM.ID_empleado = Solicitante
JOIN Equipos AS EQ ON EQ.ID_Equipo = DE.FK_Equipo
JOIN Marcas AS M ON M.id_Marca = DE.FK_Marca
JOIN Modelo AS MD ON MD.ID_Modelo = DE.FK_Modelo
JOIN Usuarios AS U ON U.ID_usuario = A.Responsable
JOIN Estado_equipo AS ESS ON ESS.ID_Estado = DE.FK_Estado
JOIN tipo_asignacion AS TP ON TP.ID_tipo_asig = A.tipo_asg
WHERE status = 2 AND ID_empleado = $empleado;");

} else if ($fecha_p) {

$equipo_asg = $connect->query("SELECT * FROM equipo_asig AS EA 
JOIN Asignaciones AS A ON A.ID_Asignado = EA.fkey_asig
JOIN detalle_equipo AS DE ON DE.ID_Detalle_Equipo = EA.fkey_equipo
JOIN Empleados AS EM ON EM.ID_empleado = Solicitante
JOIN Equipos AS EQ ON EQ.ID_Equipo = DE.FK_Equipo
JOIN Marcas AS M ON M.id_Marca = DE.FK_Marca
JOIN Modelo AS MD ON MD.ID_Modelo = DE.FK_Modelo
JOIN Usuarios AS U ON U.ID_usuario = A.Responsable
JOIN Estado_equipo AS ESS ON ESS.ID_Estado = DE.FK_Estado 
JOIN tipo_asignacion AS TP ON TP.ID_tipo_asig = A.tipo_asg
WHERE status = 2 AND fecha_devolucion BETWEEN '$fecha_p' AND '$fecha_s'");
}

while ($dato = $equipo_asg->fetch_assoc()):

$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(31.7, 6,$dato["N_Equipo"], 1,0, 'C', 0, '', 0);
$pdf->Cell(31.7, 6,$dato["N_Marca"], 1, 0, 'C', 0, '', 0);
$pdf->Cell(31.7, 6,$dato["N_Modelo"], 1,0, 'C', 0, '', 0);
$pdf->Cell(31.7, 6,$dato["Estado"], 1,  0, 'C', 0, '', 0);
$pdf->Cell(31.6, 6,$dato["Bien_nacional"],1,0,'C',0,'', 0);
$pdf->Cell(31.6, 6,$dato["serial"], 1,  1, 'C', 0, '', 0);

endwhile;

break;

case 'linea':

if ($empleado) {

$lineas_asg = $connect->query("SELECT * FROM Lineas_asignadas AS LA
JOIN asig_lineas AS AL ON AL.ID_Linea_asig = LA.fkey_asig_lineas
JOIN Lineas AS L ON L.ID_Linea = LA.fkey_linea
JOIN tipo_linea AS tl ON tl.ID_tipolinea = L.FKEY_Linea
JOIN Operadoras AS o ON o.ID_Operadora = L.FKEY_Operadora
JOIN estado_linea AS e ON e.ID_Estado_linea = L.FKEY_Estado
JOIN Empleados AS# code... EM ON EM.ID_empleado = AL.solicitante
JOIN Usuarios AS U ON U.ID_usuario = AL.responsable
JOIN estado_asignaciones AS EA ON EA.id_estado_asig = AL.status
JOIN tipo_asignacion AS TP ON TP.ID_tipo_asig = AL.tipo_asg
WHERE status = 2 AND ID_empleado = $empleado;");

} else if ($fecha_p) {

$lineas_asg = $connect->query("SELECT * FROM Lineas_asignadas AS LA
JOIN asig_lineas AS AL ON AL.ID_Linea_asig = LA.fkey_asig_lineas
JOIN Lineas AS L ON L.ID_Linea = LA.fkey_linea
JOIN tipo_linea AS tl ON tl.ID_tipolinea = L.FKEY_Linea
JOIN Operadoras AS o ON o.ID_Operadora = L.FKEY_Operadora
JOIN estado_linea AS e ON e.ID_Estado_linea = L.FKEY_Estado
JOIN Empleados AS EM ON EM.ID_empleado = AL.solicitante
JOIN Usuarios AS U ON U.ID_usuario = AL.responsable
JOIN estado_asignaciones AS EA ON EA.id_estado_asig = AL.status
JOIN tipo_asignacion AS TP ON TP.ID_tipo_asig = AL.tipo_asg
WHERE status = 2 AND fecha_devolucion BETWEEN '$fecha_p' AND '$fecha_s'");
}

while ($dato = $lineas_asg->fetch_assoc()):

$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(31.7, 6,$dato["N_tipolinea"], 1,0, 'C', 0, '', 0);
$pdf->Cell(31.7, 6,$dato["N_Operadora"], 1, 0, 'C', 0, '', 0);
$pdf->Cell(31.7, 6,$dato["N_estado_linea"], 1,0, 'C', 0, '', 0);
$pdf->Cell(31.7, 6,$dato["Numero"], 1,  0, 'C', 0, '', 0);
$pdf->Cell(31.6, 6,$dato["Cod_puk"],1,0,'C',0,'', 0);
$pdf->Cell(31.6, 6,$dato["Pin"], 1,  1, 'C', 0, '', 0);

endwhile;

break;

}

} else {

switch ($tipo) {

case 'equipo':

if ($empleado) {

$equipo_asg = $connect->query("SELECT * FROM equipo_asig AS EA
JOIN Asignaciones AS A ON A.ID_Asignado = EA.fkey_asig
JOIN detalle_equipo AS DE ON DE.ID_Detalle_Equipo = EA.fkey_equipo
JOIN Empleados AS EM ON EM.ID_empleado = Solicitante
JOIN Equipos AS EQ ON EQ.ID_Equipo = DE.FK_Equipo
JOIN Marcas AS M ON M.id_Marca = DE.FK_Marca
JOIN Modelo AS MD ON MD.ID_Modelo = DE.FK_Modelo
JOIN Usuarios AS U ON U.ID_usuario = A.Responsable
JOIN Estado_equipo AS ESS ON ESS.ID_Estado = DE.FK_Estado
JOIN tipo_asignacion AS TP ON TP.ID_tipo_asig = A.tipo_asg
WHERE ID_empleado = $empleado AND N_tipo_asig = '$pa';");

} else if ($fecha_p) {

$equipo_asg = $connect->query("SELECT * FROM equipo_asig AS EA
JOIN Asignaciones AS A ON A.ID_Asignado = EA.fkey_asig
JOIN detalle_equipo AS DE ON DE.ID_Detalle_Equipo = EA.fkey_equipo
JOIN Empleados AS EM ON EM.ID_empleado = Solicitante
JOIN Equipos AS EQ ON EQ.ID_Equipo = DE.FK_Equipo
JOIN Marcas AS M ON M.id_Marca = DE.FK_Marca
JOIN Modelo AS MD ON MD.ID_Modelo = DE.FK_Modelo
JOIN Usuarios AS U ON U.ID_usuario = A.Responsable
JOIN Estado_equipo AS ESS ON ESS.ID_Estado = DE.FK_Estado
JOIN tipo_asignacion AS TP ON TP.ID_tipo_asig = A.tipo_asg
WHERE fecha_entrega BETWEEN '$fecha_p' and '$fecha_s' AND N_tipo_asig = '$pa';");
}

while ($dato = $equipo_asg->fetch_assoc()):

$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(31.7, 6,$dato["N_Equipo"], 1,0, 'C', 0, '', 0);
$pdf->Cell(31.7, 6,$dato["N_Marca"], 1, 0, 'C', 0, '', 0);
$pdf->Cell(31.7, 6,$dato["N_Modelo"], 1,0, 'C', 0, '', 0);
$pdf->Cell(31.7, 6,$dato["Estado"], 1,  0, 'C', 0, '', 0);
$pdf->Cell(31.6, 6,$dato["Bien_nacional"],1,0,'C',0,'', 0);
$pdf->Cell(31.6, 6,$dato["serial"], 1,  1, 'C', 0, '', 0);

endwhile;

break;

case 'linea':

if ($empleado) {

$lineas_asg = $connect->query("SELECT * FROM Lineas_asignadas AS LA
JOIN asig_lineas AS AL ON AL.ID_Linea_asig = LA.fkey_asig_lineas
JOIN Lineas AS L ON L.ID_Linea = LA.fkey_linea
JOIN tipo_linea AS tl ON tl.ID_tipolinea = L.FKEY_Linea
JOIN Operadoras AS o ON o.ID_Operadora = L.FKEY_Operadora
JOIN estado_linea AS e ON e.ID_Estado_linea = L.FKEY_Estado
JOIN Empleados AS# code... EM ON EM.ID_empleado = AL.solicitante
JOIN Usuarios AS U ON U.ID_usuario = AL.responsable
JOIN estado_asignaciones AS EA ON EA.id_estado_asig = AL.status
JOIN tipo_asignacion AS TP ON TP.ID_tipo_asig = AL.tipo_asg
WHERE ID_empleado = $empleado AND N_tipo_asig = '$pa';");

} else if ($fecha_p) {

$lineas_asg = $connect->query("SELECT * FROM Lineas_asignadas AS LA
JOIN asig_lineas AS AL ON AL.ID_Linea_asig = LA.fkey_asig_lineas
JOIN Lineas AS L ON L.ID_Linea = LA.fkey_linea
JOIN tipo_linea AS tl ON tl.ID_tipolinea = L.FKEY_Linea
JOIN Operadoras AS o ON o.ID_Operadora = L.FKEY_Operadora
JOIN estado_linea AS e ON e.ID_Estado_linea = L.FKEY_Estado
JOIN Empleados AS EM ON EM.ID_empleado = AL.solicitante
JOIN Usuarios AS U ON U.ID_usuario = AL.responsable
JOIN estado_asignaciones AS EA ON EA.id_estado_asig = AL.status
JOIN tipo_asignacion AS TP ON TP.ID_tipo_asig = AL.tipo_asg
WHERE fecha_entrega BETWEEN '$fecha_p' and '$fecha_s' AND N_tipo_asig = '$pa';");
}

while ($dato = $lineas_asg->fetch_assoc()):

$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(31.7, 6,$dato["N_tipolinea"], 1,0, 'C', 0, '', 0);
$pdf->Cell(31.7, 6,$dato["N_Operadora"], 1, 0, 'C', 0, '', 0);
$pdf->Cell(31.7, 6,$dato["N_estado_linea"], 1,0, 'C', 0, '', 0);
$pdf->Cell(31.7, 6,$dato["Numero"], 1,  0, 'C', 0, '', 0);
$pdf->Cell(31.6, 6,$dato["Cod_puk"],1,0,'C',0,'', 0);
$pdf->Cell(31.6, 6,$dato["Pin"], 1,  1, 'C', 0, '', 0);

endwhile;

break;
}
}


$pdf->Output('Reporte.pdf', 'I');