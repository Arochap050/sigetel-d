<?php

include "../../BD/bd.php";
/* equipos disponibles */
$tabla_equipo_dis = conexion::consultar()->prepare("SELECT ID_Detalle_Equipo,Bien_nacional,serial,N_Equipo,N_Marca,N_Modelo,Estado,N_division,img_equipo,'x' as acciones, id_Marca, ID_Equipo, ID_Modelo
FROM detalle_equipo
JOIN Equipos ON Equipos.ID_Equipo = detalle_equipo.FK_Equipo
JOIN Marcas  ON Marcas.id_Marca = detalle_equipo.FK_Marca
JOIN Modelo ON Modelo.ID_Modelo = detalle_equipo.FK_Modelo
JOIN Divisiones ON Divisiones.ID_division = detalle_equipo.FK_Ubicacion
JOIN Estado_equipo ON Estado_equipo.ID_Estado = detalle_equipo.FK_ESTADO
WHERE FK_Estado = 2; ");
$tabla_equipo_dis->execute();

$resultado = [];

while($fila = $tabla_equipo_dis->fetch()) {
    $resultado[] = $fila;
}

echo json_encode($resultado);