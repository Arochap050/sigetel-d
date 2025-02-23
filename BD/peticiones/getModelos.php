<?php

include "../../BD/bdd.php";

$idModelo = $connect->real_escape_string($_POST["equipo_e"]) ;
$idMarca = $connect->real_escape_string($_POST["marca_e"]) ;
$sql = $connect->query("SELECT * 
FROM Modelo 
JOIN marcas_equipos ON marcas_equipos.ID_marca_equipo = FK_Marca_equipo 
WHERE FKEY_Equipo = $idModelo
AND FKEY_Marca = $idMarca;");
$respuesta = "<option value=''>Seleccione un modelo</option>";

while ($datos = $sql->fetch_assoc()) {
    $respuesta .= "<option value='".$datos['ID_Modelo']."'>".$datos['N_Modelo']."</option>";
}

echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);