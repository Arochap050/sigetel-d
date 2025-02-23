<?php

date_default_timezone_set("America/Caracas");
setlocale(LC_TIME, 'es_VE.UTF-8','esp');

include "../../BD/bd.php";

/* LINEAS ASIGNADAS */
$tabla_lineas_dis = conexion::consultar()->prepare("SELECT ID_Linea, ID_Linea_asig, N_tipolinea,N_tipo_asig, N_Operadora, Numero, N_estado_linea, fecha_entrega, fecha_devolucion, observacion, cod_puk, concat_ws(' ',EM.p_Nombre_empleado, EM.p_Apellido_empleado) as n_solicitante, (SELECT concat_ws(' ',emp.p_Nombre_empleado, emp.p_Apellido_empleado) FROM Empleados AS emp JOIN Usuarios as usr ON emp.ID_empleado = usr.FKEY_empleado WHERE ID_usuario = U.ID_usuario) as n_responsable FROM Lineas_asignadas AS LA
JOIN asig_lineas AS AL ON AL.ID_Linea_asig = LA.fkey_asig_lineas
JOIN Lineas AS L ON L.ID_Linea = LA.fkey_linea
JOIN tipo_linea AS tl ON tl.ID_tipolinea = L.FKEY_Linea
JOIN Operadoras AS o ON o.ID_Operadora = L.FKEY_Operadora
JOIN estado_linea AS e ON e.ID_Estado_linea = L.FKEY_Estado
JOIN Empleados AS EM ON EM.ID_empleado = AL.solicitante
JOIN Usuarios AS U ON U.ID_usuario = AL.responsable
JOIN estado_asignaciones AS EA ON EA.id_estado_asig = AL.status
JOIN tipo_asignacion AS TPASG ON TPASG.ID_tipo_asig = AL.tipo_asg
WHERE status = 2; ");
$tabla_lineas_dis->execute();

$resultado = [];

while ($fila = $tabla_lineas_dis->fetch()){

    if ($fila["N_tipo_asig"] == "Asignacion") {
        $botones = '<a href="#" class="btn btn-success" data-bs-toggle="dropdown">
                        <span class="d-none d-lg-inline-flex"><i class="fa-solid fa-print"></i></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-end bg-transparent border-0 rounded-0 rounded-bottom">

                        <a target="_blank" href="../rep/acta_devolucion.php?sim='.$fila["ID_Linea_asig"].'" class="dropdown-item2 pi"><i class="fa-solid fa-print ms-4 me-2"></i>Devolucion</a>
                        <a target="_blank" href="../rep/acta_asignacion.php?sim='.$fila["ID_Linea_asig"].'" class="dropdown-item2 pi"><i class="fa-solid fa-print ms-4 me-2"></i>Asignacion</a>

                    </div>';
    }
    if ($fila["N_tipo_asig"] == "Prestamo") {
        $botones = '<a title="Imprimir" href="../rep/acta_prestamo.php?sim='.$fila["ID_Linea_asig"].'" target="_blank" type="submit" class="btn btn-success" name="btn_asignar_equipo"><i class="fa-solid fa-print"></i></a>';
    }

    $fecha_en = strtotime($fila["fecha_entrega"]);
    $fecha_dev = strtotime($fila["fecha_devolucion"]);
    $fecha = date('d-m-Y',$fecha_en);
    $fecha_d = date('d-m-Y',$fecha_dev);

    $resultado[] = array(

        //'id_linea_inv' => $fila["ID_Linea"],
        //'id_linea_asg' => $fila["ID_Linea_asig"],
        'tipolinea' => $fila["N_tipolinea"],
        'operadora' => $fila["N_Operadora"],
        'numero' => $fila["Numero"],
        'estado' => $fila["N_estado_linea"],
        'empleado' => $fila["n_solicitante"],
        'responsable' => $fila["n_responsable"],
        'fecha' => $fecha,
        'fecha_dev' => $fecha_d,
        'observacion' => $fila["observacion"],
        'cod' => $fila["cod_puk"],
        'botones' => '<button title="Informacion" id="info-asg-pres-linea" class="btn btn-info m-1" data-bs-toggle="modal" data-bs-target="#infolineas"><i class="far fa-file-alt "></i></button>'.$botones,
    );
}

echo json_encode($resultado);