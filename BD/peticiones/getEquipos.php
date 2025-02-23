<?php

include "../../BD/bdd.php";

$idMarca = $connect->real_escape_string($_POST["marca_e"]) ;
$sql = $connect->query("SELECT DISTINCT ME.FKEY_Equipo, E.N_Equipo, E.ID_Equipo 
FROM marcas_equipos AS ME
JOIN Equipos AS E ON E.ID_Equipo = FKEY_Equipo
WHERE FKEY_Marca = $idMarca;");
$respuesta = "<option value=''>Seleccione un equipo</option>";

while ($row = $sql->fetch_assoc()) {
    $respuesta .= "<option value='".$row['ID_Equipo']."'>".$row['N_Equipo']."</option>";
}

echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);