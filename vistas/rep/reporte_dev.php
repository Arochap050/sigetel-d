<?php

require_once "../../assets/TCPDF/tcpdf.php";

date_default_timezone_set("America/Caracas");
setlocale(LC_TIME, 'es_VE.UTF-8','esp');

//INFORMACION DEL DOCUMENTO: DETALLES GENERALES

class MYPDF extends TCPDF {

    //Page header
    public function Header() {

        $this->Image('../../assets/img/Daco_4636508.png', 18, 8, 23, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        $this->Ln(10);
    }

    // Page footer
    public function Footer() {

        $this->SetY(-35);
        $this->SetFont('helvetica', 'B', 7);
    
        if ($this->getNumPages() == 1) { //primera pagina

            $this->Cell(1.4,5,'',0,0, 'L', 0, '',0);
            $this->Cell(85, 6, " Autorizado por: ", 1, false, 'L', 0, '', 0, false, 'T', 'M');
            $this->Cell(86.5, 6, " Entregado por: " , 1, true, 'L', 0, '', 0, false, 'T', 'M');
            $this->Cell(1.4,5,'',0,0, 'L', 0, '',0);
            $this->Cell(85, 6, " Cargo: ", 1, false, 'L', 0, '', 0, false, 'T', 'M');
            $this->Cell(86.5, 6, " Recibido por: ", 1, false, 'L', 0, '', 0, false, 'T', 'M');

        } else if ($this->getNumPages() == 2){ //segunda pagina

            $this->setY(-30);
            $this->SetFont('helvetica', 'I', 8);
            $this->writeHTMLCell(175, 0, '', ''," OyS N°20401-032005 <b>Original:</b> Área de Bienes Nacionales. <b>Duplicado:</b> Unidad que entrega. <b>Triplicado:</b> Unidad que recibe Leyenda <b>B:</b>Buen Estado <b>R:</b> Recuperable <b>I:</b>Inservible", '', 1, 0, true, 'J', true);
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
$pdf->SetTitle('Acta de devolucion');
$pdf->SetSubject('Acta de devolucion de equipo');
$pdf->SetKeywords('');

$pdf->SetMargins(19, 17, 19);


/* -------------------------- ACTA DE DEVOLUCION DE ACTIVO ---------------------- */


$pdf->AddPage();
$pdf->SetFont('helvetica', 'B', 10);

$pdf->Cell(128, 5, '', 0, false, 'L', 0, '', 0, false, 'M', 'M');
$pdf->Cell(47, 5, 'Nº Control:', 0, true, 'L', 0, '', 0, false, 'M', 'M');

$pdf->Ln(10);

$pdf->SetFont('helvetica', 'B', 12);
$pdf->Cell(175, 5, 'ACTA DE DEVOLUCIÓN DE EQUIPO', 0, true, 'C', 0, '', 0, false, 'M', 'M');

$pdf->Ln(5);

$pdf->SetFont('helvetica', '', 10);
$html = "<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;En la ciudad de Caracas, el día , entre el Jefe de div. de Soporte y mesa de ayuda(E) de <b> TECNOLOGIA DE LA INFORMACIÓN Y COMUNICACIÓN</b> <b></b>, titular de la cédula de identidad Nº , y el(la) trabajador(a)<b> </b>, titular de la cédula de identidad Nº $CedEmplaedo, de la <b>Div de .</b></p>";

$pdf->writeHTMLCell(175, 0, '', '',$html, '', 1, 0, false, 'J', true);

$pdf->Ln(5);

$pdf->writeHTMLCell(175, 0, '', ''," <b>CONCUERDAN CON LO SIGUIENTE: </b>", '', 1, 0, true, 'J', true);
$pdf->writeHTMLCell(175, 0, '', ''," <b>PRIMERO: </b>La devolución de los equipos tecnológicos descritos a continuación:", '', 1, 0, true, 'J', true);

$pdf->Ln(2);

//tabla de equipo que se asigno:::
$pdf->SetFont('helvetica', 'B', 10);

$pdf->Cell(1.4,5,'',0,0, 'L', 0, '',0);

$pdf->Cell(47.5, 5, 'Equipo', 1, 0, 'C', 0, '', 0);
$pdf->Cell(31, 5, 'Serial', 1, 0, 'C', 0, '', 0);
$pdf->Cell(31, 5, 'Marca', 1, 0, 'C', 0, '', 0);
$pdf->Cell(31, 5, 'Modelo', 1, 0, 'C', 0, '', 0);
$pdf->Cell(31, 5, 'Bien nacional', 1, 1, 'C', 0, '', 0);

$pdf->SetFont('helvetica', '', 10);

$pdf->Cell(1.4,5,'',0,0, 'L', 0, '',0);

$pdf->Cell(47.5, 5, '', 1, 0, 'C', 0, '', 0);
$pdf->Cell(31, 5, '', 1, 0, 'C', 0, '', 0);
$pdf->Cell(31, 5, '', 1, 0, 'C', 0, '', 0);
$pdf->Cell(31, 5, '', 1, 0, 'C', 0, '', 0);
$pdf->Cell(31, 5, '', 1, 1, 'C', 0, '', 0);


if ($result_v) {
    

    $registro_info = $dato["ID_Asignado"];
    $c_acce = $connect->query("SELECT * FROM equipo_accesorio_asig AS EA JOIN Accesorios AS A ON A.ID_Accesorio = EA.FK_accesorio_asg WHERE FK_equipo_asg = $registro_info");

    $pdf->Ln(5);
    $pdf->SetFont('helvetica', 'B', 10);
    $pdf->Cell(1.4,5,'',0,0, 'L', 0, '',0);
    $pdf->Cell(22.5,5,"Accesorios:",'LTB',0, 'L', 0, '',0);

    $pdf->SetFont('helvetica', '', 10);
    while ($resultado_acc = $c_acce->fetch_assoc()) {

        $pdf->Cell(20,5,$resultado_acc["N_Accesorio"],'TB',0, 'C', 0, '',0);

    }
    $pdf->Cell(17,5,"",'L',0, 'C', 0, '',0);
    $pdf->Ln(3);

}

$pdf->Ln(5);

$pdf->writeHTMLCell(175, 0, '', ''," <b>SEGUNDO:</b> Se reciben estos equipos, propiedad de Venezolana de Televisión C.A., (VTV), en concordancia con el acta de asignación de equipo <b>Nº Control: A-2111-072776.</b>", '', 1, 0, true, 'J', true);

$pdf->Ln(2);

$pdf->writeHTMLCell(175, 0, '', ''," <b>TERCERO:</b> Los equipos tecnológicos descritos en el item PRIMERO, se reciben el dia $fechaAsignacion.", '', 1, 0, true, 'J', true);

$pdf->Ln(2);

$pdf->writeHTMLCell(175, 0, '', ''," <b>CUARTO:</b> En virtud de lo antes expuesto y de común acuerdo se establece que: <br>

<b>a.</b> Todos los elementos se encuentran en perfectas condiciones y funcionando.<br>
<b>b.</b> La conservación del equipo y sus accesorios es de entera responsabilidad del (la) trabajador(a).<br>
<b>c.</b> Las reparaciones de los equipos asignados que sean causadas por el uso indebido o negligencia del
usuario, deberán ser cancelada por el(la) trabajador(a).<br>
<b>d.</b> El equipo debe ser usado exclusivamente para los fines que fueron acordados.<br>
<b>e.</b> El equipo deberá ser devuelto a la GERENCIA DE TECNOLOGIA DE LA INFORMACIÓN Y
COMUNICACIÓN, en las condiciones que fue recibido y con todos sus accesorios, cuando sea requerido.<br>
<b>f.</b> En caso de robo o hurto fuera de las instalaciones de VTV deberá presentar a la GERENCIA DE
TECNOLOGIA DE LA INFORMACIÓN Y COMUNICACIÓN la denuncia ante el CICPC, a fin de notificar a la
Coordinación de Bienes Nacionales.<br>
<b>g.</b> En caso de robo o hurto dentro de las instalaciones de VTV deberá presentar a la GERENCIA DE
TECNOLOGIA DE LA INFORMACIÓN Y COMUNICACIÓN la denuncia emitida al DPTO encargado de la
seguridad de VTV, a fin de notificar a la Coordinación de Bienes Nacionales.<br>
<b>h.</b> En caso de perdida o extravío, el monto a pagar por el equipo sera notificado por memorándum.", '', 1, 0, true, 'J', true);


$pdf->Ln(5);

$pdf->Cell(1.4,5,'',0,0, 'L', 0, '',0);
$pdf->writeHTMLCell(171.5, 0, '', '',"<b>Observaciones</b>", 'LRTB', 1, 0, true, 'C', true);

$pdf->Cell(1.4,5,'',0,0, 'L', 0, '',0);
$pdf->writeHTMLCell(171.5, 0, '', '','', 'LRTB', 1, 0, true, 'J', true);

$pdf->Ln(5);

$dia = date("j");
$mes = strftime("%B");
$año = date("Y");

$pdf->writeHTMLCell(175, 0, '', '',"Como constancia de lo acordado, se firman dos ejemplares, en Caracas a los $dia días del mes de $mes de $año.", '', 1, 0, true, 'J', true);

$pdf->lastPage();


/* -------------------------- ACTA DE DEVOLUCION DE ACTIVO: FIN ---------------------- */


/* ------------------------------- ACTA DE MOVILIZACION DE ACTIVO FIJO ------------------------------ */

$pdf->AddPage();
$pdf->SetFont('helvetica', '', 9);

//celda para los espacios de las columnas
$pdf->Cell(128, 5, '', 0, true, 'L', 0, '', 0, false, 'M', 'M');
$pdf->Cell(128, 5, '', 0, true, 'L', 0, '', 0, false, 'M', 'M');
$pdf->Cell(128, 5, '', 0, true, 'L', 0, '', 0, false, 'M', 'M');

//$fechadeDoc = date("Y-m-d");
$fechadeDoc = strftime("%d-%m-%Y");
$pdf->writeHTMLCell(120, 5, '', '',"", '', 0, 0, true, 'C', true);

$pdf->writeHTMLCell(55, 5, '', '',"<b>Fecha de elaboracion:</b> $fechadeDoc", 'LRTB', 1, 0, true, 'C', true);
$pdf->Ln(5);

//----------------------------- EQUIPOS ASIGNADOS - TITULO -----------------------------------
$pdf->SetFont('helvetica', 'B', 9);
$pdf->Cell(175, 10, 'MOVILIZACION DE ACTIVO FIJO', 1, true, 'C', 0, '', 0, false, 'M', 'M');
$pdf->writeHTMLCell(175, 4, '', '',"Motivo", 'LRB', 1, 0, true, 'C', true);

$pdf->Ln(5);

switch ($estadoEq) {

    case 'Bueno':

        $pdf->Cell(88, 10, 'Translado:  X', 'LRB', false, 'L', 0, '', 0, false, 'M', 'M');
        $pdf->Cell(87, 10, 'Deterioro:', 'LRB', true, 'L', 0, '', 0, false, 'M', 'M');

        break;

    case 'Dañado':

        $pdf->Cell(88, 10, 'Translado:  ', 'LRB', false, 'L', 0, '', 0, false, 'M', 'M');
        $pdf->Cell(87, 10, 'Deterioro:  X', 'LRB', true, 'L', 0, '', 0, false, 'M', 'M');

        break;

    case 'Recuperable':

        $pdf->Cell(88, 10, 'Translado:  ', 'LRB', false, 'L', 0, '', 0, false, 'M', 'M');
        $pdf->Cell(87, 10, 'Deterioro:  X', 'LRB', true, 'L', 0, '', 0, false, 'M', 'M');

        break;
}
//----------------------------- EQUIPOS ASIGNADOS - TITULO -----------------------------------

$pdf->SetFont('helvetica', '', 9);
$pdf->writeHTMLCell(175, 4, '', '',"<b>Entregado por:</b>", 'LRB', 1, 0, true, 'C', true);
$pdf->writeHTMLCell(88, 10, '', '',"<b>Division:</b><br>$DivEmpleado", 'LRB', 0, 0, true, 'L', true);
$pdf->writeHTMLCell(87, 10, '', '',"<b>Gerencia:</b><br>$gerEmpleado", 'LRB', 1, 0, true, 'L', true);

//----------------------------- EQUIPOS ASIGNADOS - TITULO -----------------------------------

$pdf->writeHTMLCell(175, 4, '', '',"<b>Recibido por:</b>", 'LRB', 1, 0, true, 'C', true);
$pdf->writeHTMLCell(88, 10, '', '',"<b>Division:</b><br>$divasg", 'LRB', 0, 0, true, 'L', true);
$pdf->writeHTMLCell(87, 10, '', '',"<b>Gerencia:</b><br>$gerenciaAsg", 'LRB', 1, 0, true, 'L', true);

//----------------------------- EQUIPOS ASIGNADOS - TITULO INFORMACON GENERAL ------------------------

$pdf->setFont('helvetica', 'B', 9);
$pdf->writeHTMLCell(175, 4, '', '',"Especificacion del activo", 'LRB', 1, 0, true, 'C', true);

$pdf->Ln(5.5);

$pdf->SetFont('helvetica', 'B', 9);
$pdf->Cell(58, 10.5, 'Descripcion', 'L', false, 'C', 0, '', 0, false, 'M', 'M');
$pdf->Cell(58, 10.5, 'Codigo', 'LR', false, 'C', 0, '', 0, false, 'M', 'M');

$pdf->SetXY(135, 86); // AjustaR las coordenadas 
$pdf->Cell(30, 5, 'Estado Fisico', 'B', true, 'C', 0, '', 0, false, 'T', 'M');

$pdf->SetXY(135, 91);// AjustaR las coordenadas 
$pdf->Cell(10, 5, 'B', 'R', false, 'C', 0, '', 0, true, 'T', 'M');
$pdf->Cell(10, 5, 'R', 'R', false, 'C', 0, '', 0, true, 'T', 'M');
$pdf->Cell(10, 5, 'I', '', false, 'C', 0, '', 0, true, 'T', 'M');
$pdf->Cell(29, 10.6, 'Modelo', 'LRB', true, 'C', 0, '', 0, false, 'M', 'M');

//----------------------------- EQUIPOS ASIGNADOS - DESCRIPCION --------------------------------

$pdf->SetFont('helvetica', '', 9);
$pdf->writeHTMLCell(58, 10, '', '',"<div class='p-1'>$equipoasg</div>", 'LTB', 0, 0, true, 'C', true);
$pdf->writeHTMLCell(58, 10, '', '',(string) $dato["serial"], 'LTB', 0, 0, true, 'C', true);


switch ($estadoEq) {

    case 'Bueno':
        $pdf->SetFont('helvetica', 'B', 9);
        $pdf->Cell(10, 10, 'X', 'LTB', false, 'C', 0, '', 0, false, '', '');
        $pdf->Cell(10, 10, '', 'LTB', false, 'C', 0, '', 0, false, '', '');
        $pdf->Cell(10, 10, '', 'LTBR', false, 'C', 0, '', 0, false, '', '');
        break;

    case 'Dañado':
        $pdf->SetFont('helvetica', 'B', 9);
        $pdf->Cell(10, 10, '', 'LTB', false, 'C', 0, '', 0, false, '', '');
        $pdf->Cell(10, 10, '', 'LTB', false, 'C', 0, '', 0, false, '', '');
        $pdf->Cell(10, 10, 'X', 'LTBR', false, 'C', 0, '', 0, false, '', '');
        break;

    case 'Recuperable':
        $pdf->SetFont('helvetica', 'B', 9);
        $pdf->Cell(10, 10, '', 'LTB', false, 'C', 0, '', 0, false, '', '');
        $pdf->Cell(10, 10, 'X', 'LTB', false, 'C', 0, '', 0, false, '', '');
        $pdf->Cell(10, 10, '', 'LTBR', false, 'C', 0, '', 0, false, '', '');
        break;
}


$pdf->SetFont('helvetica', '', 9);
$pdf->writeHTMLCell(29, 10, '', '','', 'RTB', 1, 0, true, 'C', true);

//------------------------------------- OBSERVACION ------------------------------------------

$pdf->writeHTMLCell(175, 9, '', '','<div><br><b>Observaciones:</b></div>', 'LR', 1, 0, true, 'L', true);
$pdf->writeHTMLCell(175, 40, '', '','', 'LR', 1, 0, true, 'J', true);

//--------------------------------------- UNIDADES DE APROBACION -------------------------------------------

$pdf->SetFont('helvetica', '', 9);
$pdf->writeHTMLCell(175, 4, '', '',"<b>Unidades de Aprobacion</b>", 'LRTB', 1, 0, true, 'C', true);

//quien realizo la asignacion

$pdf->writeHTMLCell(40, 10, '', '',"<b>Elaborado por:</b> <br>", 'L', 0, 0, true, 'C', true);
$pdf->Cell(87, 10, 'Gestionado por:', 'LR', true, 'C', 0, '', 0, false, '', '');
$pdf->writeHTMLCell(40, 9.9, '', '',"<b>Aprobado Por Gerencia</b>", 'LT', 0, 0, true, 'C', true);
$pdf->writeHTMLCell(44, 9.9, '', '',"<b>Area de Bienes Nacionales</b>", 'LT', 0, 0, true, 'C', true);
$pdf->writeHTMLCell(43, 9.9, '', '',"<b>Gerencia de Servicios Generales</b>", 'LRT', 0, 0, true, 'C', true);

$pdf->setFont('helvetica', 'B',9);
$pdf->Cell(48, 20, 'Unidad que Recibe', 'R', true, 'C', 0, '', 0, false, 'M', 'M');

$pdf->setFont('helvetica', '',9);
$pdf->writeHTMLCell(40, 9.9, '', '',"<b>&nbsp;Nombre:</b>", 'LT', 0, 0, true, 'L', true);
$pdf->writeHTMLCell(44, 9.9, '', '',"<b>&nbsp;Nombre:</b>", 'LT', 0, 0, true, 'L', true);
$pdf->writeHTMLCell(43, 9.9, '', '',"<b>&nbsp;Nombre:</b>", 'LT', 0, 0, true, 'L', true);
$pdf->writeHTMLCell(48, 9.9, '', '',"<b>&nbsp;Nombre:</b>", 'LRT', 1, 0, true, 'L', true);

$pdf->writeHTMLCell(40, 9.9, '', '',"<b>&nbsp;Fecha:</b> $fechadeDoc", 'L', 0, 0, true, 'L', true);
$pdf->writeHTMLCell(44, 9.9, '', '',"<b>&nbsp;Fecha:</b> $fechadeDoc", 'L', 0, 0, true, 'L', true);
$pdf->writeHTMLCell(43, 9.9, '', '',"<b>&nbsp;Fecha:</b> $fechadeDoc", 'L', 0, 0, true, 'L', true);
$pdf->writeHTMLCell(48, 9.9, '', '',"<b>&nbsp;Fecha:</b> $fechadeDoc", 'LR', 1, 0, true, 'L', true);

$pdf->writeHTMLCell(40, 9.9, '', '',"<b>&nbsp;Firma:</b>", 'LB', 0, 0, true, 'L', true);
$pdf->writeHTMLCell(44, 9.9, '', '',"<b>&nbsp;Firma:</b>", 'LB', 0, 0, true, 'L', true);
$pdf->writeHTMLCell(43, 9.9, '', '',"<b>&nbsp;Firma:</b>", 'LB', 0, 0, true, 'L', true);
$pdf->writeHTMLCell(48, 9.9, '', '',"<b>&nbsp;Firma y Sello:</b>", 'LRB', 1, 0, true, 'L', true);

/* ------------------------------- ACTA DE MOVILIZACION DE ACTIVO FIJO: FIN ------------------------------ */

$pdf->Output('Acta de devolucion.pdf', 'I');