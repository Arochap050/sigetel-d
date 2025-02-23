<?php

include "../../BD/bd.php";

$tabla_lineas_dis = $conectado->prepare("SELECT * FROM Lineas 
JOIN tipo_linea AS tl ON tl.ID_tipolinea = Lineas.FKEY_Linea
JOIN Operadoras AS o ON o.ID_Operadora = Lineas.FKEY_Operadora
JOIN estado_linea AS e ON e.ID_Estado_linea = Lineas.FKEY_Estado; ");
$tabla_lineas_dis->execute();
$resultado = [];

while ($fila = $tabla_lineas_dis->fetch()){
    $resultado[] = $fila;
}

echo json_encode($resultado);