<?php

require_once "../../BD/bd.php";

$tabla_accesorios = conexion::consultar()->prepare("SELECT * FROM Accesorios");
$tabla_accesorios->execute();
$tabla = array();

while ($datos = $tabla_accesorios->fetch()) {
    $tabla[] = array(
        'ID_Accesorio' => $datos['ID_Accesorio'],
        'Nombre_Accesorio' => $datos['N_Accesorio'],
        'botones' => '<div class="p-2 text-center"><button class="btn btn-info me-1 mt-1" id="editar-accesorio" data-bs-toggle="modal" data-bs-target="#accesorio-modal"><i class="fa-regular fa-pen-to-square"></i></button><button id="delete_accesorio" class="btn btn-warning mt-1"><i class="fa-solid fa-trash"></i></button></div>'
    );
}
//var_dump($tabla);
echo json_encode($tabla);