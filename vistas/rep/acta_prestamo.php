<?php

include "../../BD/bdd.php";
require_once "../../assets/TCPDF/tcpdf.php";

date_default_timezone_set("America/Caracas");
setlocale(LC_TIME, 'es_VE.UTF-8','esp');

if (!empty($_GET["rep"])) {

    $registro = $_GET["rep"]; 
    //INFOrMACION DEL DOCUMENTO 
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
                        WHERE ID_Equipo_asig = $registro AND tipo_asg = 2; ");
    
    $dato = $consulta_pdf->fetch_assoc();
    
    $empleado = $dato["p_Nombre_empleado"]." ".$dato["p_Apellido_empleado"];
    $equipop = $dato["N_Equipo"]." ".$dato["N_Marca"]." ".$dato["N_Modelo"];
    $CedEmplaedo = $dato["cedula"];
    $DivEmpleado = $dato["N_division"];
    $gerEmpleado = $dato["N_gerencia"];
    $bnacional = $dato["Bien_nacional"];
    $numero = $dato["telefono"];
    $extension = $dato["extension"];
    
    $fechaEntrega = strtotime($dato["fecha_entrega"]);
    $fechaPrestamo = date( 'd-m-Y',$fechaEntrega);
    
    class MYPDF extends TCPDF {
        //Page header
        public function Header() {
    
            $this->Image('../../assets/img/Daco_4636508.png', 18, 8, 23, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
    
            $this->Ln(12);
    
            $this->setFont('helvetica','I', 12);
            $this->writeHTMLCell(190, 5, '', '',"<b>Gerencia de Tecnologia.</b>", '', 1, 0, true, 'C', true);
            $this->writeHTMLCell(190, 5, '', '',"<b>Division de Soporte y Mesa de Ayuda.</b>", '', 1, 0, true, 'C', true);
    
            $this->ln(10);
    
            $this->writeHTMLCell(190, 5, '', '',"<b>Comprobante de Prestamo</b>", '', 1, 0, true, 'C', true);
        }
        // Page footer
        public function Footer() {
    
            if ($this->getNumPages() == 1) { //primera pagina
    
            } else if ($this->getNumPages() == 2){ //segunda pagina
    
            }
    
            $this->SetY(-100);    
            $this->writeHTMLCell(190, 0, '', '',"<b>Condiciones de prestamo:</b>", '', 1, 0, true, 'J', true);
            $this->Ln(8);
            $this->SetFont('helvetica', 'B', 12);
            $this->Cell(17.5, 8, '', 0, 0, 'C', 0, '', 0);
            $this->writeHTMLCell(155, 0, '', '',"- Los equipos que se prestan son asignados a la Mesa de Ayuda de Tecnologia par apoyar a la demas gerencias de la empresa, por lo cual tendran un limite de uso de 72 horas, si se necisita por otro periodo de 72 horas se debe de notificar a la mesa de ayuda.<br><br>- Los equipos se entregan en perfecto estado y buen funcionamiento, cualquier desperfecto o daño provocado al equipo sera responsabilidaddel solicitante. <br><br>- En caso de robo o extravio debe notificar al CICPC y traer la denuncia respectiva.", '', 1, 0, true, 'J', true);
    
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
    $pdf->SetTitle('Acta de prestamo');
    $pdf->SetSubject('Acta de prestamo de equipo');
    $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
    $pdf->SetMargins(10, 52, 10);
    
    
    /* -------------------------- ACTA DE PRESTAMO ---------------------- */
    
    
    $pdf->AddPage();
    
    $pdf->SetFont('helvetica', 'B', 7);
    $pdf->Cell(15, 5, 'Fecha', 1, 0, 'C', 0, '', 0);
    $pdf->Cell(23, 5, 'solicitante', 1, 0, 'C', 0, '', 0);
    $pdf->Cell(22, 5, 'Cedula', 1, 0, 'C', 0, '', 0);
    $pdf->Cell(40, 5, 'Equipo', 1, 0, 'C', 0, '', 0);
    $pdf->Cell(20, 5, 'Bien Nacional', 1, 0, 'C', 0, '', 0);
    $pdf->Cell(30, 5, 'Gerencia Solicitante', 1, 0, 'C', 0, '', 0);
    $pdf->Cell(15, 5, 'Extension', 1, 0, 'C', 0, '', 0);
    $pdf->Cell(25, 5, 'Telefono Solicitante', 1, 1, 'C', 0, '', 0);
    
    $pdf->SetFont('helvetica', 'B', 7);
    $pdf->Cell(15, 9,$fechaPrestamo, 1, 0, 'C', 0, '', 0);
    $pdf->Cell(23, 9,$empleado, 1, 0, 'C', 0, '', 0);
    $pdf->Cell(22, 9,$CedEmplaedo, 1, 0, 'C', 0, '', 0);
    $pdf->Cell(40, 9,$equipop, 1, 0, 'C', 0, '', 0);
    $pdf->Cell(20, 9,$bnacional, 1, 0, 'C', 0, '', 0);
    $pdf->SetFont('helvetica', 'B', 6.5);
    $pdf->writeHTMLCell(30, 9, '', '',$gerEmpleado, 'LRTB', 0, 0, true, 'C', true);
    $pdf->SetFont('helvetica', 'B', 7);
    $pdf->Cell(15, 9, $extension, 1, 0, 'C', 0, '', 0);
    $pdf->Cell(25, 9, $numero, 1, 1, 'C', 0, '', 0);
    
    $pdf->Cell(15, 9,"", 1, 0, 'C', 0, '', 0);
    $pdf->Cell(23, 9,"", 1, 0, 'C', 0, '', 0);
    $pdf->Cell(22, 9,"", 1, 0, 'C', 0, '', 0);
    $pdf->Cell(40, 9,"", 1, 0, 'C', 0, '', 0);
    $pdf->Cell(20, 9,"", 1, 0, 'C', 0, '', 0);
    $pdf->SetFont('helvetica', 'B', 6.5);
    $pdf->writeHTMLCell(30, 9, '', '',"", 'LRTB', 0, 0, true, 'C', true);
    $pdf->SetFont('helvetica', 'B', 7);
    $pdf->Cell(15, 9, "", 1, 0, 'C', 0, '', 0);
    $pdf->Cell(25, 9, "", 1, 1, 'C', 0, '', 0);
    
    $pdf->Cell(15, 9,"", 1, 0, 'C', 0, '', 0);
    $pdf->Cell(23, 9,"", 1, 0, 'C', 0, '', 0);
    $pdf->Cell(22, 9,"", 1, 0, 'C', 0, '', 0);
    $pdf->Cell(40, 9,"", 1, 0, 'C', 0, '', 0);
    $pdf->Cell(20, 9,"", 1, 0, 'C', 0, '', 0);
    $pdf->SetFont('helvetica', 'B', 6.5);
    $pdf->writeHTMLCell(30, 9, '', '',"", 'LRTB', 0, 0, true, 'C', true);
    $pdf->SetFont('helvetica', 'B', 7);
    $pdf->Cell(15, 9, "", 1, 0, 'C', 0, '', 0);
    $pdf->Cell(25, 9, "", 1, 1, 'C', 0, '', 0);
    
    $pdf->Cell(15, 9,"", 1, 0, 'C', 0, '', 0);
    $pdf->Cell(23, 9,"", 1, 0, 'C', 0, '', 0);
    $pdf->Cell(22, 9,"", 1, 0, 'C', 0, '', 0);
    $pdf->Cell(40, 9,"", 1, 0, 'C', 0, '', 0);
    $pdf->Cell(20, 9,"", 1, 0, 'C', 0, '', 0);
    $pdf->SetFont('helvetica', 'B', 6.5);
    $pdf->writeHTMLCell(30, 9, '', '',"", 'LRTB', 0, 0, true, 'C', true);
    $pdf->SetFont('helvetica', 'B', 7);
    $pdf->Cell(15, 9, "", 1, 0, 'C', 0, '', 0);
    $pdf->Cell(25, 9, "", 1, 1, 'C', 0, '', 0);
    
    $pdf->Ln(8);
    
    $pdf->SetFont('helvetica', 'B', 9);
    $pdf->Cell(22, 5, '', 0, 0, 'C', 0, '', 0);
    $pdf->Cell(35, 5, 'Recibido Conforme:', 0, 0, 'C', 0, '', 0);
    $pdf->Cell(76, 5, '', 0, 0, 'C', 0, '', 0);
    $pdf->Cell(35, 5, 'Despachado por:', 0, 0, 'C', 0, '', 0);
    $pdf->Cell(22, 5, '', 0, 1, 'C', 0, '', 0);
    $pdf->Cell(22, 8, '', 0, 0, 'C', 0, '', 0);
    $pdf->Cell(35, 8, '', 'B', 0, 'C', 0, '', 0);
    $pdf->Cell(76, 8, '', '', 0, 'C', 0, '', 0);
    $pdf->Cell(35, 8, '', 'B', 0, 'C', 0, '', 0);
    $pdf->Cell(22, 8, '', 0, 1, 'C', 0, '', 0);
    
    $pdf->Ln(25);
    
    $pdf->SetFont('helvetica', 'B', 11);
    $pdf->writeHTMLCell(190, 0, '', '',"<b>Observaciones:</b>", '', 1, 0, true, 'J', true);
    $pdf->SetFont('helvetica', '', 11);
    $pdf->writeHTMLCell(190, 0, '', '',$dato["observacion"], '', 1, 0, true, 'J', true);
    
    $pdf->Ln(10);
    
    // $pdf->writeHTMLCell(190, 0, '', '',"<b>Condiciones de prestamo:</b>", '', 1, 0, true, 'J', true);
    // $pdf->Ln(8);
    // $pdf->SetFont('helvetica', 'B', 12);
    // $pdf->Cell(17.5, 8, '', 0, 0, 'C', 0, '', 0);
    // $pdf->writeHTMLCell(155, 0, '', '',"- Los equipos que se prestan son asignados a la Mesa de Ayuda de Tecnologia par apoyar a la demas gerencias de la empresa, por lo cual tendran un limite de uso de 72 horas, si se necisita por otro periodo de 72 horas se debe de notificar a la mesa de ayuda.<br><br>- Los equipos se entregan en perfecto estado y buen funcionamiento, cualquier desperfecto o daño provocado al equipo sera responsabilidaddel solicitante. <br><br>- En caso de robo o extravio debe notificar al CICPC y traer la denuncia respectiva.", '', 1, 0, true, 'J', true);
    
    $pdf->Output('Acta de prestamo.pdf', 'I');




//------------------------------ prestamo de lineas-------------------------
} else if (!empty($_GET["sim"])) {




    $registro = $_GET["sim"];
    //INFOrMACION DEL DOCUMENTO
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

                WHERE ID_Linea_asig = $registro AND tipo_asg = 2; ");
    
    $dato = $consulta_pdf->fetch_assoc();
    
    $empleado = $dato["p_Nombre_empleado"]." ".$dato["p_Apellido_empleado"];
    $equipop = $dato["N_Operadora"]." ".$dato["N_tipolinea"];
    $CedEmplaedo = $dato["cedula"];
    $DivEmpleado = $dato["N_division"];
    $gerEmpleado = $dato["N_gerencia"];
    $bnacional = $dato["Numero"];
    $numero = $dato["telefono"];
    $extension = $dato["extension"];
    
    $fechaEntrega = strtotime($dato["fecha_entrega"]);
    $fechaPrestamo = date( 'd-m-Y',$fechaEntrega);
    
    class MYPDF extends TCPDF {
        //Page header
        public function Header() {
    
            $this->Image('../../assets/img/Daco_4636508.png', 18, 8, 23, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
    
            $this->Ln(12);
    
            $this->setFont('helvetica','I', 12);
            $this->writeHTMLCell(190, 5, '', '',"<b>Gerencia de Tecnologia de la Informacion y la Comunicacion</b>", '', 1, 0, true, 'C', true);
            $this->writeHTMLCell(190, 5, '', '',"<b>Division de Soporte y Mesa de Ayuda</b>", '', 1, 0, true, 'C', true);
    
            $this->ln(10);
    
            $this->writeHTMLCell(190, 5, '', '',"<b>Comprobante de Prestamo</b>", '', 1, 0, true, 'C', true);
        }
        // Page footer
        public function Footer() {
    
            if ($this->getNumPages() == 1) { //primera pagina
    
            } else if ($this->getNumPages() == 2){ //segunda pagina
    
            }
    
            $this->SetY(-100);    
            $this->writeHTMLCell(190, 0, '', '',"<b>Condiciones de prestamo:</b>", '', 1, 0, true, 'J', true);
            $this->Ln(8);
            $this->SetFont('helvetica', 'B', 12);
            $this->Cell(17.5, 8, '', 0, 0, 'C', 0, '', 0);
            $this->writeHTMLCell(155, 0, '', '',"- Los equipos que se prestan son asignados a la Mesa de Ayuda de Tecnologia par apoyar a la demas gerencias de la empresa, por lo cual tendran un limite de uso de 72 horas, si se necisita por otro periodo de 72 horas se debe de notificar a la mesa de ayuda.<br><br>- Los equipos se entregan en perfecto estado y buen funcionamiento, cualquier desperfecto o daño provocado al equipo sera responsabilidaddel solicitante. <br><br>- En caso de robo o extravio debe notificar al CICPC y traer la denuncia respectiva.", '', 1, 0, true, 'J', true);
    
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
    $pdf->SetTitle('Acta de prestamo');
    $pdf->SetSubject('Acta de prestamo de equipo');
    $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
    $pdf->SetMargins(10, 52, 10);
    
    
    /* -------------------------- ACTA DE PRESTAMO ---------------------- */
    
    
    $pdf->AddPage();
    
    $pdf->SetFont('helvetica', 'B', 7);
    $pdf->Cell(15, 5, 'Fecha', 1, 0, 'C', 0, '', 0);
    $pdf->Cell(23, 5, 'solicitante', 1, 0, 'C', 0, '', 0);
    $pdf->Cell(22, 5, 'Cedula', 1, 0, 'C', 0, '', 0);
    $pdf->Cell(40, 5, 'Equipo', 1, 0, 'C', 0, '', 0);
    $pdf->Cell(20, 5, 'Num. prestado', 1, 0, 'C', 0, '', 0);
    $pdf->Cell(30, 5, 'Gerencia Solicitante', 1, 0, 'C', 0, '', 0);
    $pdf->Cell(15, 5, 'Extension', 1, 0, 'C', 0, '', 0);
    $pdf->Cell(25, 5, 'Telefono Solicitante', 1, 1, 'C', 0, '', 0);
    
    $pdf->SetFont('helvetica', 'B', 7);
    $pdf->Cell(15, 9,$fechaPrestamo, 1, 0, 'C', 0, '', 0);
    $pdf->Cell(23, 9,$empleado, 1, 0, 'C', 0, '', 0);
    $pdf->Cell(22, 9,$CedEmplaedo, 1, 0, 'C', 0, '', 0);
    $pdf->Cell(40, 9,$equipop, 1, 0, 'C', 0, '', 0);
    $pdf->Cell(20, 9,$bnacional, 1, 0, 'C', 0, '', 0);
    $pdf->SetFont('helvetica', 'B', 6.5);
    $pdf->writeHTMLCell(30, 9, '', '',$gerEmpleado, 'LRTB', 0, 0, true, 'C', true);
    $pdf->SetFont('helvetica', 'B', 7);
    $pdf->Cell(15, 9, $extension, 1, 0, 'C', 0, '', 0);
    $pdf->Cell(25, 9, $numero, 1, 1, 'C', 0, '', 0);
    
    $pdf->Cell(15, 9,"", 1, 0, 'C', 0, '', 0);
    $pdf->Cell(23, 9,"", 1, 0, 'C', 0, '', 0);
    $pdf->Cell(22, 9,"", 1, 0, 'C', 0, '', 0);
    $pdf->Cell(40, 9,"", 1, 0, 'C', 0, '', 0);
    $pdf->Cell(20, 9,"", 1, 0, 'C', 0, '', 0);
    $pdf->SetFont('helvetica', 'B', 6.5);
    $pdf->writeHTMLCell(30, 9, '', '',"", 'LRTB', 0, 0, true, 'C', true);
    $pdf->SetFont('helvetica', 'B', 7);
    $pdf->Cell(15, 9, "", 1, 0, 'C', 0, '', 0);
    $pdf->Cell(25, 9, "", 1, 1, 'C', 0, '', 0);
    
    $pdf->Cell(15, 9,"", 1, 0, 'C', 0, '', 0);
    $pdf->Cell(23, 9,"", 1, 0, 'C', 0, '', 0);
    $pdf->Cell(22, 9,"", 1, 0, 'C', 0, '', 0);
    $pdf->Cell(40, 9,"", 1, 0, 'C', 0, '', 0);
    $pdf->Cell(20, 9,"", 1, 0, 'C', 0, '', 0);
    $pdf->SetFont('helvetica', 'B', 6.5);
    $pdf->writeHTMLCell(30, 9, '', '',"", 'LRTB', 0, 0, true, 'C', true);
    $pdf->SetFont('helvetica', 'B', 7);
    $pdf->Cell(15, 9, "", 1, 0, 'C', 0, '', 0);
    $pdf->Cell(25, 9, "", 1, 1, 'C', 0, '', 0);
    
    $pdf->Cell(15, 9,"", 1, 0, 'C', 0, '', 0);
    $pdf->Cell(23, 9,"", 1, 0, 'C', 0, '', 0);
    $pdf->Cell(22, 9,"", 1, 0, 'C', 0, '', 0);
    $pdf->Cell(40, 9,"", 1, 0, 'C', 0, '', 0);
    $pdf->Cell(20, 9,"", 1, 0, 'C', 0, '', 0);
    $pdf->SetFont('helvetica', 'B', 6.5);
    $pdf->writeHTMLCell(30, 9, '', '',"", 'LRTB', 0, 0, true, 'C', true);
    $pdf->SetFont('helvetica', 'B', 7);
    $pdf->Cell(15, 9, "", 1, 0, 'C', 0, '', 0);
    $pdf->Cell(25, 9, "", 1, 1, 'C', 0, '', 0);
    
    $pdf->Ln(8);
    
    $pdf->SetFont('helvetica', 'B', 9);
    $pdf->Cell(22, 5, '', 0, 0, 'C', 0, '', 0);
    $pdf->Cell(35, 5, 'Recibido Conforme:', 0, 0, 'C', 0, '', 0);
    $pdf->Cell(76, 5, '', 0, 0, 'C', 0, '', 0);
    $pdf->Cell(35, 5, 'Despachado por:', 0, 0, 'C', 0, '', 0);
    $pdf->Cell(22, 5, '', 0, 1, 'C', 0, '', 0);
    $pdf->Cell(22, 8, '', 0, 0, 'C', 0, '', 0);
    $pdf->Cell(35, 8, '', 'B', 0, 'C', 0, '', 0);
    $pdf->Cell(76, 8, '', '', 0, 'C', 0, '', 0);
    $pdf->Cell(35, 8, '', 'B', 0, 'C', 0, '', 0);
    $pdf->Cell(22, 8, '', 0, 1, 'C', 0, '', 0);
    
    $pdf->Ln(25);
    
    $pdf->SetFont('helvetica', 'B', 11);
    $pdf->writeHTMLCell(190, 0, '', '',"<b>Observaciones:</b>", '', 1, 0, true, 'J', true);
    $pdf->SetFont('helvetica', '', 11);
    $pdf->writeHTMLCell(190, 0, '', '',$dato["observacion"], '', 1, 0, true, 'J', true);
    
    $pdf->Ln(10);
    
    // $pdf->writeHTMLCell(190, 0, '', '',"<b>Condiciones de prestamo:</b>", '', 1, 0, true, 'J', true);
    // $pdf->Ln(8);
    // $pdf->SetFont('helvetica', 'B', 12);
    // $pdf->Cell(17.5, 8, '', 0, 0, 'C', 0, '', 0);
    // $pdf->writeHTMLCell(155, 0, '', '',"- Los equipos que se prestan son asignados a la Mesa de Ayuda de Tecnologia par apoyar a la demas gerencias de la empresa, por lo cual tendran un limite de uso de 72 horas, si se necisita por otro periodo de 72 horas se debe de notificar a la mesa de ayuda.<br><br>- Los equipos se entregan en perfecto estado y buen funcionamiento, cualquier desperfecto o daño provocado al equipo sera responsabilidaddel solicitante. <br><br>- En caso de robo o extravio debe notificar al CICPC y traer la denuncia respectiva.", '', 1, 0, true, 'J', true);
    
    $pdf->Output('Acta de prestamo.pdf', 'I');


}
