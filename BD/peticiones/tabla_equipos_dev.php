<?php

date_default_timezone_set("America/Caracas");
setlocale(LC_TIME, 'es_VE.UTF-8','esp');

include "../../BD/bd.php";
/* equipos devueltos */
$tabla_equipo_asg_pres = conexion::consultar()->prepare("SELECT ID_Asignado, ID_Detalle_Equipo, ID_Equipo_asig, N_Equipo, N_Marca, N_Modelo, Estado, fecha_entrega, fecha_devolucion, img_equipo, observacion_rec, Bien_nacional, N_tipo_asig, concat_ws(' ',EM.p_Nombre_empleado, EM.p_Apellido_empleado) as n_solicitante, (SELECT concat_ws(' ',emp.p_Nombre_empleado, emp.p_Apellido_empleado) FROM Empleados AS emp JOIN Usuarios as usr ON emp.ID_empleado = usr.FKEY_empleado WHERE ID_usuario = U.ID_usuario) as n_responsable FROM equipo_asig AS EA 
JOIN Asignaciones AS A ON A.ID_Asignado = EA.fkey_asig
JOIN detalle_equipo AS DE ON DE.ID_Detalle_Equipo = EA.fkey_equipo
JOIN Empleados AS EM ON EM.ID_empleado = Solicitante
JOIN Equipos AS EQ ON EQ.ID_Equipo = DE.FK_Equipo
JOIN Marcas AS M ON M.id_Marca = DE.FK_Marca
JOIN Modelo AS MD ON MD.ID_Modelo = DE.FK_Modelo
JOIN Usuarios AS U ON U.ID_usuario = A.Responsable
JOIN Estado_equipo AS ESS ON ESS.ID_Estado = A.status_eq_asg
JOIN tipo_asignacion AS TPASG ON TPASG.ID_tipo_asig = A.tipo_asg
WHERE status = 2;");
$tabla_equipo_asg_pres->execute();

$resultado = [];

while($fila = $tabla_equipo_asg_pres->fetch()) {

    if ($fila["N_tipo_asig"] == "Asignacion") {
        $botones = '<a href="#" class="btn btn-success" data-bs-toggle="dropdown">
                        <span class="d-none d-lg-inline-flex"><i class="fa-solid fa-print"></i></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-end bg-transparent border-0 rounded-0 rounded-bottom">

                        <a target="_blank" href="../rep/acta_devolucion.php?rep='.$fila["ID_Equipo_asig"].'" class="dropdown-item2 pi"><i class="fa-solid fa-print ms-4 me-2"></i>Devolucion</a>
                        <a target="_blank" href="../rep/acta_asignacion.php?rep='.$fila["ID_Equipo_asig"].'" class="dropdown-item2 pi"><i class="fa-solid fa-print ms-4 me-2"></i>Asignacion</a>

                    </div>';
    }
    if ($fila["N_tipo_asig"] == "Prestamo") {
        $botones = '<a title="Imprimir" href="../rep/acta_prestamo.php?rep='.$fila["ID_Equipo_asig"].'" target="_blank" type="submit" class="btn btn-success" name=""><i class="fa-solid fa-print"></i></a>';
    }

    $fecha_en = strtotime($fila["fecha_entrega"]);
    $fecha_dev = strtotime($fila["fecha_devolucion"]);
    $fecha = date('d-m-Y',$fecha_en);
    $fecha_d = date('d-m-Y',$fecha_dev);


    $resultado[] = array(
        // 'id' => $fila["ID_Asignado"],
        'id_equipo' => $fila["ID_Detalle_Equipo"],
        'marca' => $fila["N_Marca"],
        'equipo' => $fila["N_Equipo"],
        'modelo' => $fila["N_Modelo"],
        'estado' => $fila["Estado"],
        'fecha' => $fecha,
        'fecha_dev' => $fecha_d,
        'tipo' => $fila["N_tipo_asig"],
        'foto' => $fila["img_equipo"],
        'solicitante' => $fila["n_solicitante"],
        'responsable' => $fila["n_responsable"],
        'bien_nacional' => $fila["Bien_nacional"],
        'observacion' => $fila["observacion_rec"],

        'botones' => '<button title="Informacion" id="info-asg-pres-dev" class="btn btn-info me-1" data-bs-toggle="modal" data-bs-target="#infoEquipo"><i class="far fa-file-alt"></i></button>'.$botones,
    );
}

echo json_encode($resultado);