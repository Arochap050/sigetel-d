<?php
include "../../BD/bd.php";
//cargos
$tabla_cargos = $conectado->prepare("SELECT * FROM Cargos AS C JOIN Divisiones AS D ON D.ID_division = C.FKEY_division JOIN Gerencia AS G ON G.ID_gerencia = D.FKEY_gerencia");
$tabla_cargos->execute();

$tabla = [];

while ($filas = $tabla_cargos->fetch()) {
    $tabla[] = $filas;
}

echo json_encode($tabla);