<?php

require_once "../../BD/bd.php";

$tabla_acc_equipo = conexion::consultar()->prepare("SELECT * FROM equipo_accesorio AS EA JOIN Equipos AS E ON E.ID_equipo = EA.FK_equipo JOIN Accesorios AS A ON A.ID_Accesorio = EA.FK_accesorio");
$tabla_acc_equipo->execute();
$tabla = array();

while ($datos = $tabla_acc_equipo->fetch()) {
    $tabla[] = array(
        'ID_Equipo_accesorio' => $datos['ID_Equipo_accesorio'],
        'Nombre_Accesorio' => $datos['N_Accesorio'],
        'Nombre_equipo' => $datos['N_Equipo'],
        'equipo' => $datos['FK_equipo'],
        'accesorio' => $datos['FK_accesorio'],
        'botones' => '<div class="p-2 text-center"><button id="editar-acc-equipo" class="btn btn-info me-1 mt-1" data-bs-toggle="modal" data-bs-target="#accesorio_eq_modal"><i class="fa-regular fa-pen-to-square"></i></button><button id="delete_acc_eq" class="btn btn-warning mt-1"><i class="fa-solid fa-trash"></i></button></div>'
    );
}
//var_dump($tabla);
echo json_encode($tabla);