<?php

date_default_timezone_set("America/Caracas");
setlocale(LC_TIME, 'es_VE.UTF-8','esp');

include "../../BD/bd.php";

/* LINEAS ASIGNADAS */
$tabla_lineas_dis = conexion::consultar()->prepare("SELECT ID_Linea, ID_Linea_asig, N_tipolinea,N_tipo_asig, N_Operadora, Numero, N_estado_linea, fecha_entrega, observacion, cod_puk, concat_ws(' ',EM.p_Nombre_empleado, EM.p_Apellido_empleado) as n_solicitante, (SELECT concat_ws(' ',emp.p_Nombre_empleado, emp.p_Apellido_empleado) FROM Empleados AS emp JOIN Usuarios as usr ON emp.ID_empleado = usr.FKEY_empleado WHERE ID_usuario = U.ID_usuario) as n_responsable FROM Lineas_asignadas AS LA
JOIN asig_lineas AS AL ON AL.ID_Linea_asig = LA.fkey_asig_lineas
JOIN Lineas AS L ON L.ID_Linea = LA.fkey_linea
JOIN tipo_linea AS tl ON tl.ID_tipolinea = L.FKEY_Linea
JOIN Operadoras AS o ON o.ID_Operadora = L.FKEY_Operadora
JOIN estado_linea AS e ON e.ID_Estado_linea = L.FKEY_Estado
JOIN Empleados AS EM ON EM.ID_empleado = AL.solicitante
JOIN Usuarios AS U ON U.ID_usuario = AL.responsable
JOIN estado_asignaciones AS EA ON EA.id_estado_asig = AL.status
JOIN tipo_asignacion AS TPASG ON TPASG.ID_tipo_asig = AL.tipo_asg
WHERE status = 1; ");
$tabla_lineas_dis->execute();

$resultado = [];

while ($fila = $tabla_lineas_dis->fetch()){

    if ($fila["N_tipo_asig"] == "Asignacion") {
        $botones = '<a title="Imprimir" href="../rep/acta_asignacion.php?sim='.$fila["ID_Linea_asig"].'" target="_blank" type="submit" class="btn btn-success" name="btn_asignar_equipo"><i class="fa-solid fa-print"></i></a>';
    }
    if ($fila["N_tipo_asig"] == "Prestamo") {
        $botones = '<a title="Imprimir" href="../rep/acta_prestamo.php?sim='.$fila["ID_Linea_asig"].'" target="_blank" type="submit" class="btn btn-success" name="btn_asignar_equipo"><i class="fa-solid fa-print"></i></a>';
    }

    $fechaP = strtotime($fila["fecha_entrega"]);
    $fecha = date('d-m-Y',$fechaP);

    $resultado[] = array(

        'id_linea_inv' => $fila["ID_Linea"],
        'id_linea_asg' => $fila["ID_Linea_asig"],
        'tipolinea' => $fila["N_tipolinea"],
        'operadora' => $fila["N_Operadora"],
        'numero' => $fila["Numero"],
        'estado' => $fila["N_estado_linea"],
        'empleado' => $fila["n_solicitante"],
        'responsable' => $fila["n_responsable"],
        'fecha' => $fecha,
        'observacion' => $fila["observacion"],
        'cod' => $fila["cod_puk"],
        'botones' => '<button title="Regresar linea" id="recepcion-linea" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#retornolinea"><i class="fa-solid fa-right-to-bracket"></i></button><button title="Informacion" id="info-asg-pres-linea" class="btn btn-info m-1" data-bs-toggle="modal" data-bs-target="#infolineas"><i class="far fa-file-alt "></i></button>'.$botones,
    );
}

echo json_encode($resultado);