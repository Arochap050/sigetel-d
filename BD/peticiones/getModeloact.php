<?php

include "../../BD/bdd.php";

$id = $_GET["registroId"];
$query = $connect->query("SELECT * FROM detalle_equipo
JOIN Equipos ON Equipos.ID_Equipo = detalle_equipo.FK_Equipo
JOIN Marcas ON Marcas.id_Marca = detalle_equipo.FK_Marca
JOIN Modelo ON Modelo.ID_Modelo = detalle_equipo.FK_Modelo WHERE ID_Detalle_Equipo = $id");
$row = $query->fetch_assoc();
//$equipoId = $row['ID_Modelo'];
// prueba para los select de equipo filtrando por equipo-modelo
$idEquipo = $row["ID_Equipo"];
$idMarca = $row["id_Marca"];
$sqlmodelo = "SELECT * 
FROM Modelo 
JOIN marcas_equipos ON marcas_equipos.ID_marca_equipo = FK_Marca_equipo 
WHERE FKEY_Equipo = $idEquipo
AND FKEY_Marca = $idMarca;";
$result = mysqli_query($connect,$sqlmodelo);
$json= array();

while($roww = mysqli_fetch_array($result)){
    $json[]= array(
        'Id'=> $roww['ID_Modelo'],
        'modelo'=> $roww['N_Modelo'],
        'equiposelec' => $row['ID_Modelo']
    );
    
}

$jsonstring = json_encode($json);
echo $jsonstring;