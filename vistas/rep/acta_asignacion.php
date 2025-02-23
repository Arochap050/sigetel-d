<?php

include "../../BD/bdd.php";
require_once "../../assets/TCPDF/tcpdf.php";

date_default_timezone_set("America/Caracas");
setlocale(LC_TIME, 'es_VE.UTF-8','esp');

if (!empty($_GET["rep"])) {

$registro = $_GET["rep"]; 

$verificar =
$connect->query("SELECT * FROM equipo_asig AS EA 
                    JOIN Asignaciones AS A ON A.ID_Asignado = EA.fkey_asig
                    JOIN detalle_equipo AS DE ON DE.ID_Detalle_Equipo = EA.fkey_equipo
                    JOIN equipo_accesorio_asig AS EQ_A ON EQ_A.FK_equipo_asg = A.ID_Asignado
                    JOIN Accesorios AS ACC ON ACC.ID_Accesorio = EQ_A.FK_accesorio_asg
                    WHERE ID_Equipo_asig = $registro AND tipo_asg = 1; ");

$result_v = $verificar->fetch_assoc();

if ($result_v) {

$consulta_pdf =
$connect->query("SELECT * FROM equipo_asig AS EA 
                    JOIN Asignaciones AS A ON A.ID_Asignado = EA.fkey_asig
                    JOIN detalle_equipo AS DE ON DE.ID_Detalle_Equipo = EA.fkey_equipo
                    JOIN Empleados AS EM ON EM.ID_empleado = A.Solicitante
                    JOIN Gerencia AS G ON G.ID_gerencia = EM.FKEY_gerencia
                    JOIN Divisiones AS DV ON DV.ID_division = EM.FKEY_division
                    JOIN Equipos AS EQ ON EQ.ID_Equipo = DE.FK_Equipo
                    JOIN Marcas AS M ON M.id_Marca = DE.FK_Marca
                    JOIN Modelo AS MD ON MD.ID_Modelo = DE.FK_Modelo
                    JOIN Usuarios AS U ON U.ID_usuario = A.Responsable
                    JOIN equipo_accesorio_asig AS EQ_A ON EQ_A.FK_equipo_asg = A.ID_Asignado
                    JOIN Accesorios AS ACC ON ACC.ID_Accesorio = EQ_A.FK_accesorio_asg                    
                    WHERE ID_Equipo_asig = $registro AND tipo_asg = 1; ");
} else {

$consulta_pdf =
$connect->query("SELECT * FROM equipo_asig AS EA 
                    JOIN Asignaciones AS A ON A.ID_Asignado = EA.fkey_asig
                    JOIN detalle_equipo AS DE ON DE.ID_Detalle_Equipo = EA.fkey_equipo
                    JOIN Empleados AS EM ON EM.ID_empleado = A.Solicitante
                    JOIN Gerencia AS G ON G.ID_gerencia = EM.FKEY_gerencia
                    JOIN Divisiones AS DV ON DV.ID_division = EM.FKEY_division
                    JOIN Equipos AS EQ ON EQ.ID_Equipo = DE.FK_Equipo
                    JOIN Marcas AS M ON M.id_Marca = DE.FK_Marca
                    JOIN Modelo AS MD ON MD.ID_Modelo = DE.FK_Modelo
                    JOIN Usuarios AS U ON U.ID_usuario = A.Responsable                   
                    WHERE ID_Equipo_asig = $registro AND tipo_asg = 1; ");
}

//INFORMACION DEL DOCUMENTO

$dato = $consulta_pdf->fetch_assoc();
$empleado = strtoupper($dato["p_Nombre_empleado"]." ".$dato["p_Apellido_empleado"]);
$equipoasg = $dato["N_Equipo"]." ".$dato["N_Marca"];
$CedEmplaedo = $dato["cedula"];
$DivEmpleado = $dato["N_division"];
$gerEmpleado = $dato["N_gerencia"];
$n_control = $dato["n_control_a"];
// $accesorio = $dato["N_Accesorio"];

$fechaEntrega = strtotime($dato["fecha_entrega"]);
$fechaAsignacion = strftime( '%e de %B de %Y',$fechaEntrega);

//INFORMACION DEL DOCUMENTO: DETALLES GENERALES
$consulta_detalle = 
$connect->query("SELECT p_Nombre_empleado, p_Apellido_empleado, cedula, N_gerencia, N_division FROM Empleados AS E
                    JOIN Gerencia AS G ON G.ID_gerencia = E.FKEY_gerencia
                    JOIN Divisiones AS D ON D.ID_division = E.FKEY_division
                    JOIN Cargos AS C ON C.ID_cargo = E.FKEY_cargo
                    WHERE N_gerencia = 'Tecnologia' AND N_division = 'Soporte Técnico y Mesa De Ayuda' AND N_Cargo = 'Jefe De Division (E)';");

$detalles = $consulta_detalle->fetch_assoc();
$jefeSoporte = strtoupper($detalles["p_Nombre_empleado"]." ".$detalles["p_Apellido_empleado"]);
$cedulaJefe = $detalles["cedula"];
$gerenciaAsg = $detalles["N_gerencia"];
$divasg = $detalles["N_division"];


class MYPDF extends TCPDF {
    //Page header
    public function Header() {

        $this->Image('../../assets/img/Daco_4636508.png', 18, 8, 23, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        $this->Ln(10);

    }
    // Page footer
    public function Footer() {

        include "../../BD/bdd.php";

        $registro = $_GET["rep"]; 

        $consulta_pdf = $connect->query("SELECT p_Nombre_empleado, p_Apellido_empleado
        FROM equipo_asig AS EA 
        JOIN Asignaciones AS A ON A.ID_Asignado = EA.fkey_asig
        JOIN Empleados AS EM ON EM.ID_empleado = A.Solicitante
        WHERE ID_Equipo_asig = $registro");

        $dato = $consulta_pdf->fetch_assoc();
        $empleado = $dato["p_Nombre_empleado"]." ".$dato["p_Apellido_empleado"];
        $consulta_detalle = $connect->query("SELECT p_Nombre_empleado, p_Apellido_empleado, N_gerencia, N_division, N_cargo FROM Empleados AS E
                                JOIN Gerencia AS G ON G.ID_gerencia = E.FKEY_gerencia
                                JOIN Divisiones AS D ON D.ID_division = E.FKEY_division
                                JOIN Cargos AS C ON C.ID_cargo = E.FKEY_cargo
                                WHERE N_gerencia = 'Tecnologia' AND N_division = 'Soporte Técnico y Mesa De Ayuda' AND N_Cargo = 'Jefe De Division (E)';");

        $detalles = $consulta_detalle->fetch_assoc();
        $jefeSoporte = strtoupper($detalles["p_Nombre_empleado"]." ".$detalles["p_Apellido_empleado"]);
        $cargo = $detalles["N_cargo"];
        $gerencia = $detalles["N_gerencia"];

        $this->SetY(-35);
        $this->SetFont('helvetica', 'B', 7);
    
        if ($this->getNumPages() == 1) { //primera pagina

            $this->Cell(1.4,5,'',0,0, 'L', 0, '',0);
            $this->Cell(85, 6, " Autorizado por: $jefeSoporte", 1, false, 'L', 0, '', 0, false, 'T', 'M');
            $this->Cell(86.5, 6, " Entregado por: $gerencia" , 1, true, 'L', 0, '', 0, false, 'T', 'M');
            $this->Cell(1.4,5,'',0,0, 'L', 0, '',0);
            $this->Cell(85, 6, " Cargo: $cargo", 1, false, 'L', 0, '', 0, false, 'T', 'M');
            $this->Cell(86.5, 6, " Recibido por: $empleado", 1, false, 'L', 0, '', 0, false, 'T', 'M');

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
$pdf->SetTitle('Acta de asignacion');
$pdf->SetSubject('Acta de asignacion de equipo');
$pdf->SetKeywords('');
$pdf->SetMargins(19, 17, 19);


/* -------------------------- ACTA DE ASIGNACION DE ACTIVO ---------------------- */

$pdf->AddPage();

$pdf->SetFont('helvetica', 'B', 10);
$pdf->Cell(128, 5, '', 0, false, 'L', 0, '', 0, false, 'M', 'M');
$pdf->Cell(47, 5, "Nº Control: $n_control", 0, true, 'L', 0, '', 0, false, 'M', 'M');

$pdf->Ln(10);

$pdf->SetFont('helvetica', 'B', 12);
$pdf->Cell(175, 5, 'ACTA DE ASIGNACIÓN DE EQUIPO', 0, true, 'C', 0, '', 0, false, 'M', 'M');

$pdf->Ln(5);

$pdf->SetFont('helvetica', '', 10);
$html = "<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;En la ciudad de Caracas, el dia $fechaAsignacion, entre el Jefe de div. de Soporte y mesa de ayuda(E) de <b>TECNOLOGIA, $jefeSoporte</b>, titular de la cédula de identidad Nº $cedulaJefe, y el(la) trabajador(a) <b>$empleado</b>, titular de la cédula de identidad Nº $CedEmplaedo, de la <b>Div de $DivEmpleado.</b></p>";

$pdf->writeHTMLCell(175, 0, '', '',$html, '', 1, 0, false, 'J', true);

$pdf->Ln(5);

$pdf->writeHTMLCell(175, 0, '', ''," <b>CONCUERDAN CON LO SIGUIENTE: </b>", '', 1, 0, true, 'J', true);
$pdf->writeHTMLCell(175, 0, '', ''," <b>PRIMERO: </b>La asignación de los siguientes equipos:", '', 1, 0, true, '', true);

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
$pdf->Cell(47.5, 5, (string) $dato["N_Equipo"], 1, 0, 'C', 0, '', 0);
$pdf->Cell(31, 5, (string) $dato["serial"], 1, 0, 'C', 0, '', 0);
$pdf->Cell(31, 5, (string) $dato["N_Marca"], 1, 0, 'C', 0, '', 0);
$pdf->Cell(31, 5, (string) $dato["N_Modelo"], 1, 0, 'C', 0, '', 0);
$pdf->Cell(31, 5, (string) $dato["Bien_nacional"], 1, 1, 'C', 0, '', 0);


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

}

$pdf->Ln(8);

$pdf->writeHTMLCell(175, 0, '', ''," <b>SEGUNDO:</b> La Gerencia de Tecnologia, asigna los equipos descritos en el acuerdo PRIMERO, a la Div $DivEmpleado, a fin de dar respuesta a la solicitud emanada de esa Dirección o Coordinación, realizada mediante Instrucciones del Gerente Tecnología de la Información y Comunicación de fecha $fechaAsignacion.", '', 1, 0, true, 'J', true);

$pdf->Ln(2);

$pdf->writeHTMLCell(175, 0, '', ''," <b>TERCERO:</b> Se entregan estos equipos, propiedad de Venezolana de Televisión C.A., (VTV), para efectos de su desempeño laboral, dentro y fuera de la oficina, para lo cual esta Acta deberá presentarse ante los funcionarios de Seguridad de VTV como Pase de Equipos y Materiales. El bien antes descrito deberá ser transportado por la persona a quien se le asigna en esta acta.", '', 1, 0, true, 'J', true);

$pdf->Ln(2);

$pdf->writeHTMLCell(175, 0, '', ''," <b>CUARTO:</b> En virtud de lo antes expuesto y de común acuerdo se establece que: <br>

<b>a.</b> Todos los elementos se encuentran en perfectas condiciones y funcionando.<br>
<b>b.</b> La conservación del equipo y sus accesorios es de entera responsabilidad del (la) trabajador(a).<br>
<b>c.</b> Las reparaciones de los equipos asignados que sean causadas por el uso indebido o negligencia del
usuario, deberán ser cancelada por el(la) trabajador(a).<br>
<b>d.</b> El equipo debe ser usado exclusivamente para los fines que fueron acordados.<br>
<b>e.</b> El equipo deberá ser devuelto a la GERENCIA DE TECNOLOGIA, en las condiciones que fue recibido y con todos sus accesorios, cuando sea requerido.<br>
<b>f.</b> En caso de robo o hurto fuera de las instalaciones de VTV deberá presentar a la GERENCIA DE
TECNOLOGIA la denuncia ante el CICPC, a fin de notificar a la
Coordinación de Bienes Nacionales.<br>
<b>g.</b> En caso de robo o hurto dentro de las instalaciones de VTV deberá presentar a la GERENCIA DE
TECNOLOGIA la denuncia emitida al DPTO encargado de la
seguridad de VTV, a fin de notificar a la Coordinación de Bienes Nacionales.<br>
<b>h.</b> En caso de perdida o extravío, el monto a pagar por el equipo sera notificado por memorándum.", '', 1, 0, true, 'J', true);


$pdf->Ln(5);

$pdf->Cell(1.4,5,'',0,0, 'L', 0, '',0);
$pdf->writeHTMLCell(171.5, 0, '', '',"<b>Observaciones</b>", 'LRTB', 1, 0, true, 'C', true);
$pdf->Cell(1.4,5,'',0,0, 'L', 0, '',0);
$pdf->writeHTMLCell(171.5, 0, '', '',(string) $dato["observacion"], 'LRTB', 1, 0, true, 'J', true);

$pdf->Ln(5);

$dia = date("j");
$mes = strftime("%B");
$año = date("Y");

$pdf->writeHTMLCell(175, 0, '', '',"Como constancia de lo acordado, se firman dos ejemplares, en Caracas a los $dia días del mes de $mes de $año.", '', 1, 0, true, 'J', true);

$pdf->lastPage();


/* -------------------------- ACTA DE ASIGNACION DE ACTIVO: FIN ---------------------- */



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

$pdf->Cell(88, 10, 'Translado:  X', 'LRB', false, 'L', 0, '', 0, false, 'M', 'M');
$pdf->Cell(87, 10, 'Deterioro:', 'LRB', true, 'L', 0, '', 0, false, 'M', 'M');

//----------------------------- EQUIPOS ASIGNADOS - TITULO -----------------------------------

$pdf->SetFont('helvetica', '', 9);
$pdf->writeHTMLCell(175, 4, '', '',"<b>Entregado por:</b>", 'LRB', 1, 0, true, 'C', true);
$pdf->writeHTMLCell(88, 10, '', '',"<b>Division:</b><br>$divasg", 'LRB', 0, 0, true, 'L', true);
$pdf->writeHTMLCell(87, 10, '', '',"<b>Gerencia:</b><br>$gerenciaAsg", 'LRB', 1, 0, true, 'L', true);

//----------------------------- EQUIPOS ASIGNADOS - TITULO -----------------------------------

$pdf->writeHTMLCell(175, 4, '', '',"<b>Recibido por:</b>", 'LRB', 1, 0, true, 'C', true);
$pdf->writeHTMLCell(88, 10, '', '',"<b>Division:</b><br>$DivEmpleado", 'LRB', 0, 0, true, 'L', true);
$pdf->writeHTMLCell(87, 10, '', '',"<b>Gerencia:</b><br>$gerEmpleado", 'LRB', 1, 0, true, 'L', true);

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

$pdf->SetFont('helvetica', 'B', 9);
$pdf->Cell(10, 10, 'X', 'LTB', false, 'C', 0, '', 0, false, '', '');
$pdf->Cell(10, 10, '', 'LTB', false, 'C', 0, '', 0, false, '', '');
$pdf->Cell(10, 10, '', 'LTBR', false, 'C', 0, '', 0, false, '', '');

$pdf->SetFont('helvetica', '', 9);
$pdf->writeHTMLCell(29, 10, '', '',(string) $dato["N_Modelo"], 'RTB', 1, 0, true, 'C', true);

//------------------------------------- OBSERVACION ------------------------------------------

$pdf->writeHTMLCell(175, 9, '', '','<div><br><b>Observaciones:</b></div>', 'LR', 1, 0, true, 'L', true);
$pdf->writeHTMLCell(175, 40, '', '',(string) $dato["observacion"], 'LR', 1, 0, true, 'J', true);

//--------------------------------------- UNIDADES DE APROBACION -------------------------------------------

$pdf->SetFont('helvetica', '', 9);
$pdf->writeHTMLCell(175, 4, '', '',"<b>Unidades de Aprobacion</b>", 'LRTB', 1, 0, true, 'C', true);

//quien realizo la asignacion
$responsablec = $dato["usuario"];
$r = $connect->query("SELECT p_Nombre_empleado, p_Apellido_empleado FROM Empleados AS E JOIN Usuarios AS U ON E.ID_empleado = U.FKEY_empleado WHERE usuario = '$responsablec'");
$nombreT = mysqli_fetch_assoc($r);
$responsable = strtoupper($nombreT["p_Nombre_empleado"]." ".$nombreT["p_Apellido_empleado"]);

$pdf->writeHTMLCell(40, 10, '', '',"<b>Elaborado por:</b> <br>$responsable", 'L', 0, 0, true, 'C', true);
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

$pdf->Output('Acta de asignacion.pdf', 'I');







/* ------------------------------- ACTA DE ASIGANCION DE LINEA ------------------------------ */
} else if (!empty($_GET["sim"])) {


$registro = $_GET["sim"]; 

//INFORMACION DEL DOCUMENTO 
$consulta_pdf = 
$connect->query("SELECT * FROM Lineas_asignadas AS LA
                JOIN asig_lineas AS AL ON AL.ID_Linea_asig = LA.fkey_asig_lineas
                JOIN Lineas AS L ON L.ID_Linea = LA.fkey_linea
                JOIN tipo_linea AS tl ON tl.ID_tipolinea = L.FKEY_Linea
                JOIN Operadoras AS o ON o.ID_Operadora = L.FKEY_Operadora
                JOIN estado_linea AS e ON e.ID_Estado_linea = L.FKEY_Estado
                JOIN Empleados AS EM ON EM.ID_empleado = AL.solicitante
                
                JOIN Gerencia AS G ON G.ID_gerencia = EM.FKEY_gerencia
                JOIN Divisiones AS DV ON DV.ID_division = EM.FKEY_division
                JOIN Usuarios AS U ON U.ID_usuario = AL.responsable
                JOIN estado_asignaciones AS EA ON EA.id_estado_asig = AL.status

                WHERE ID_Linea_asig = $registro AND tipo_asg = 1; ");

$dato = $consulta_pdf->fetch_assoc();

$empleado = $dato["p_Nombre_empleado"]." ".$dato["p_Apellido_empleado"];
$equipoasg = $dato["N_Operadora"]." ".$dato["N_tipolinea"];
$CedEmplaedo = $dato["cedula"];
$DivEmpleado = $dato["N_division"];
$gerEmpleado = $dato["N_gerencia"];
$n_control = $dato["n_control_a"];


$fechaEntrega = strtotime($dato["fecha_entrega"]);
$fechaAsignacion = strftime( '%e de %B de %Y',$fechaEntrega);


//INFORMACION DEL DOCUMENTO: DETALLES GENERALES
$consulta_detalle = 
$connect->query("SELECT p_Nombre_empleado, p_Apellido_empleado, cedula, N_gerencia, N_division FROM Empleados AS E
                    JOIN Gerencia AS G ON G.ID_gerencia = E.FKEY_gerencia
                    JOIN Divisiones AS D ON D.ID_division = E.FKEY_division
                    JOIN Cargos AS C ON C.ID_cargo = E.FKEY_cargo
                    WHERE N_gerencia = 'Tecnologia' AND N_division = 'Soporte Técnico y Mesa De Ayuda' AND N_Cargo = 'Jefe De Division (E)';");

$detalles = $consulta_detalle->fetch_assoc();
$jefeSoporte = $detalles["p_Nombre_empleado"]." ".$detalles["p_Apellido_empleado"];
$cedulaJefe = $detalles["cedula"];
$gerenciaAsg = $detalles["N_gerencia"];
$divasg = $detalles["N_division"];


class MYPDF extends TCPDF {
    
    //Page header
    public function Header() {

        $this->Image('../../assets/img/Daco_4636508.png', 18, 8, 23, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        $this->Ln(10);

    }

    // Page footer
    public function Footer() {

        include "../../BD/bdd.php";

        $registro = $_GET["sim"]; 

        $consulta_pdf = $connect->query("SELECT p_Nombre_empleado, p_Apellido_empleado
        FROM Lineas_asignadas AS EA 
        JOIN asig_lineas AS A ON A.ID_Linea_asig = EA.fkey_asig_lineas
        JOIN Empleados AS EM ON EM.ID_empleado = A.solicitante
        WHERE ID_Linea_asig = $registro");

        $dato = $consulta_pdf->fetch_assoc();
        $empleado = $dato["p_Nombre_empleado"]." ".$dato["p_Apellido_empleado"];
            
        $consulta_detalle = $connect->query("SELECT p_Nombre_empleado, p_Apellido_empleado, N_gerencia, N_division, N_cargo FROM Empleados AS E
                                JOIN Gerencia AS G ON G.ID_gerencia = E.FKEY_gerencia
                                JOIN Divisiones AS D ON D.ID_division = E.FKEY_division
                                JOIN Cargos AS C ON C.ID_cargo = E.FKEY_cargo
                                WHERE N_gerencia = 'Tecnologia' AND N_division = 'Soporte Técnico y Mesa De Ayuda' AND N_Cargo = 'Jefe De Division (E)'; ");

        $detalles = $consulta_detalle->fetch_assoc();
        $jefeSoporte = $detalles["p_Nombre_empleado"]." ".$detalles["p_Apellido_empleado"];
        $cargo = $detalles["N_cargo"];
        $gerencia = $detalles["N_gerencia"];

        $this->SetY(-35);
        $this->SetFont('helvetica', 'B', 7);
    
        if ($this->getNumPages() == 1) { //primera pagina

            $this->Cell(1.4,5,'',0,0, 'L', 0, '',0);
            $this->Cell(85, 6, " Autorizado por: $jefeSoporte", 1, false, 'L', 0, '', 0, false, 'T', 'M');
            $this->Cell(86.5, 6, " Entregado por: $gerencia" , 1, true, 'L', 0, '', 0, false, 'T', 'M');
            $this->Cell(1.4,5,'',0,0, 'L', 0, '',0);
            $this->Cell(85, 6, " Cargo: $cargo", 1, false, 'L', 0, '', 0, false, 'T', 'M');
            $this->Cell(86.5, 6, " Recibido por: $empleado", 1, false, 'L', 0, '', 0, false, 'T', 'M');

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
$pdf->SetTitle('Acta de asignacion');
$pdf->SetSubject('Acta de asignacion de linea');
$pdf->SetKeywords('');
$pdf->SetMargins(19, 17, 19);


/* -------------------------- ACTA DE ASIGNACION DE ACTIVO ---------------------- */


$pdf->AddPage();

$pdf->SetFont('helvetica', 'B', 10);
$pdf->Cell(128, 5, '', 0, false, 'L', 0, '', 0, false, 'M', 'M');
$pdf->Cell(47, 5, "Nº Control: $n_control", 0, true, 'L', 0, '', 0, false, 'M', 'M');

$pdf->Ln(10);

$pdf->SetFont('helvetica', 'B', 12);
$pdf->Cell(175, 5, 'ACTA DE ASIGNACIÓN DE LINEA', 0, true, 'C', 0, '', 0, false, 'M', 'M');

$pdf->Ln(5);

$pdf->SetFont('helvetica', '', 10);
$html = "<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;En la ciudad de Caracas, el dia $fechaAsignacion, entre el Jefe de div. de Soporte y mesa de ayuda(E) de <b>TECNOLOGIA, $jefeSoporte</b>, titular de la cédula de identidad Nº $cedulaJefe, y el(la) trabajador(a) <b>$empleado</b>, titular de la cédula de identidad Nº $CedEmplaedo, de la <b>Div de $DivEmpleado.</b></p>";

$pdf->writeHTMLCell(175, 0, '', '',$html, '', 1, 0, false, 'J', true);

$pdf->Ln(5);

$pdf->writeHTMLCell(175, 0, '', ''," <b>CONCUERDAN CON LO SIGUIENTE: </b>", '', 1, 0, true, 'J', true);
$pdf->writeHTMLCell(175, 0, '', ''," <b>PRIMERO: </b>La asignación de los siguientes equipos:", '', 1, 0, true, '', true);

$pdf->Ln(2);

//tabla de linea asignada:::
$pdf->SetFont('helvetica', 'B', 10);
$pdf->Cell(1.4,5,'',0,0, 'L', 0, '',0);
$pdf->Cell(47.5, 5, 'Linea', 1, 0, 'C', 0, '', 0);
$pdf->Cell(31, 5, 'Marca', 1, 0, 'C', 0, '', 0);
$pdf->Cell(31, 5, 'Numero', 1, 0, 'C', 0, '', 0);
$pdf->Cell(31, 5, 'PIN', 1, 0, 'C', 0, '', 0);
$pdf->Cell(31, 5, 'Codigo puk', 1, 1, 'C', 0, '', 0);

$pdf->SetFont('helvetica', '', 10);
$pdf->Cell(1.4,5,'',0,0, 'L', 0, '',0);
$pdf->Cell(47.5, 5, (string) $dato["N_tipolinea"], 1, 0, 'C', 0, '', 0);
$pdf->Cell(31, 5, (string) $dato["N_Operadora"], 1, 0, 'C', 0, '', 0);
$pdf->Cell(31, 5, (string) $dato["Numero"], 1, 0, 'C', 0, '', 0);
$pdf->Cell(31, 5, (string) $dato["Pin"], 1, 0, 'C', 0, '', 0);
$pdf->Cell(31, 5, (string) $dato["Cod_puk"], 1, 1, 'C', 0, '', 0);

$pdf->Ln(5);

$pdf->writeHTMLCell(175, 0, '', ''," <b>SEGUNDO:</b> La Gerencia de Tecnologia, asigna los equipos descritos en el acuerdo PRIMERO, a la Div $DivEmpleado, a fin de dar respuesta a la solicitud emanada de esa Dirección o Coordinación, realizada mediante Instrucciones del Gerente Tecnología de la Información y Comunicación de fecha $fechaAsignacion.", '', 1, 0, true, 'J', true);

$pdf->Ln(2);

$pdf->writeHTMLCell(175, 0, '', ''," <b>TERCERO:</b> Se entregan estos equipos, propiedad de Venezolana de Televisión C.A., (VTV), para efectos de su desempeño laboral, dentro y fuera de la oficina, para lo cual esta Acta deberá presentarse ante los funcionarios de Seguridad de VTV como Pase de Equipos y Materiales. El bien antes descrito deberá ser transportado por la persona a quien se le asigna en esta acta.", '', 1, 0, true, 'J', true);

$pdf->Ln(2);

$pdf->writeHTMLCell(175, 0, '', ''," <b>CUARTO:</b> En virtud de lo antes expuesto y de común acuerdo se establece que: <br>

<b>a.</b> Todos los elementos se encuentran en perfectas condiciones y funcionando.<br>
<b>b.</b> La conservación del equipo y sus accesorios es de entera responsabilidad del (la) trabajador(a).<br>
<b>c.</b> Las reparaciones de los equipos asignados que sean causadas por el uso indebido o negligencia del
usuario, deberán ser cancelada por el(la) trabajador(a).<br>
<b>d.</b> El equipo debe ser usado exclusivamente para los fines que fueron acordados.<br>
<b>e.</b> El equipo deberá ser devuelto a la GERENCIA DE TECNOLOGIA, en las condiciones que fue recibido y con todos sus accesorios, cuando sea requerido.<br>
<b>f.</b> En caso de robo o hurto fuera de las instalaciones de VTV deberá presentar a la GERENCIA DE
TECNOLOGIA la denuncia ante el CICPC, a fin de notificar a la
Coordinación de Bienes Nacionales.<br>
<b>g.</b> En caso de robo o hurto dentro de las instalaciones de VTV deberá presentar a la GERENCIA DE
TECNOLOGIA la denuncia emitida al DPTO encargado de la
seguridad de VTV, a fin de notificar a la Coordinación de Bienes Nacionales.<br>
<b>h.</b> En caso de perdida o extravío, el monto a pagar por el equipo sera notificado por memorándum.", '', 1, 0, true, 'J', true);


$pdf->Ln(5);

$pdf->Cell(1.4,5,'',0,0, 'L', 0, '',0);
$pdf->writeHTMLCell(171.5, 0, '', '',"<b>Observaciones</b>", 'LRTB', 1, 0, true, 'C', true);
$pdf->Cell(1.4,5,'',0,0, 'L', 0, '',0);
$pdf->writeHTMLCell(171.5, 0, '', '',(string) $dato["observacion"], 'LRTB', 1, 0, true, 'J', true);

$pdf->Ln(5);

$dia = date("j");
$mes = strftime("%B");
$año = date("Y");

$pdf->writeHTMLCell(175, 0, '', '',"Como constancia de lo acordado, se firman dos ejemplares, en Caracas a los $dia días del mes de $mes de $año.", '', 1, 0, true, 'J', true);

$pdf->lastPage();


/* -------------------------- ACTA DE ASIGNACION DE ACTIVO: FIN ---------------------- */



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

$pdf->Cell(88, 10, 'Translado:  X', 'LRB', false, 'L', 0, '', 0, false, 'M', 'M');
$pdf->Cell(87, 10, 'Deterioro:', 'LRB', true, 'L', 0, '', 0, false, 'M', 'M');

//----------------------------- EQUIPOS ASIGNADOS - TITULO -----------------------------------

$pdf->SetFont('helvetica', '', 9);
$pdf->writeHTMLCell(175, 4, '', '',"<b>Entregado por:</b>", 'LRB', 1, 0, true, 'C', true);
$pdf->writeHTMLCell(88, 10, '', '',"<b>Division:</b><br>$divasg", 'LRB', 0, 0, true, 'L', true);
$pdf->writeHTMLCell(87, 10, '', '',"<b>Gerencia:</b><br>$gerenciaAsg", 'LRB', 1, 0, true, 'L', true);

//----------------------------- EQUIPOS ASIGNADOS - TITULO -----------------------------------

$pdf->writeHTMLCell(175, 4, '', '',"<b>Recibido por:</b>", 'LRB', 1, 0, true, 'C', true);
$pdf->writeHTMLCell(88, 10, '', '',"<b>Division:</b><br>$DivEmpleado", 'LRB', 0, 0, true, 'L', true);
$pdf->writeHTMLCell(87, 10, '', '',"<b>Gerencia:</b><br>$gerEmpleado", 'LRB', 1, 0, true, 'L', true);

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
$pdf->writeHTMLCell(58, 10, '', '',(string) $dato["Pin"], 'LTB', 0, 0, true, 'C', true);

$pdf->SetFont('helvetica', 'B', 9);
$pdf->Cell(10, 10, 'X', 'LTB', false, 'C', 0, '', 0, false, '', '');
$pdf->Cell(10, 10, '', 'LTB', false, 'C', 0, '', 0, false, '', '');
$pdf->Cell(10, 10, '', 'LTBR', false, 'C', 0, '', 0, false, '', '');

$pdf->SetFont('helvetica', '', 9);
$pdf->writeHTMLCell(29, 10, '', '',(string) $dato["N_tipolinea"], 'RTB', 1, 0, true, 'C', true);

//------------------------------------- OBSERVACION ------------------------------------------

$pdf->writeHTMLCell(175, 9, '', '','<div><br><b>Observaciones:</b></div>', 'LR', 1, 0, true, 'L', true);
$pdf->writeHTMLCell(175, 40, '', '',(string) $dato["observacion"], 'LR', 1, 0, true, 'J', true);

//--------------------------------------- UNIDADES DE APROBACION -------------------------------------------

$pdf->SetFont('helvetica', '', 9);
$pdf->writeHTMLCell(175, 4, '', '',"<b>Unidades de Aprobacion</b>", 'LRTB', 1, 0, true, 'C', true);

//quien realizo la asignacion
$responsablec = $dato["usuario"];
$r = $connect->query("SELECT p_Nombre_empleado, p_Apellido_empleado FROM Empleados AS E JOIN Usuarios AS U ON E.ID_empleado = U.FKEY_empleado WHERE usuario = '$responsablec'");
$nombreT = mysqli_fetch_assoc($r);
$responsable = $nombreT["p_Nombre_empleado"]." ".$nombreT["p_Apellido_empleado"];

$pdf->writeHTMLCell(40, 10, '', '',"<b>Elaborado por:</b> <br>$responsable", 'L', 0, 0, true, 'C', true);
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

$pdf->Output('Acta de asignacion.pdf', 'I');

}