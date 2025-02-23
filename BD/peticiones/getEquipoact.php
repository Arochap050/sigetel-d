<?php

include "../../BD/bdd.php";

$id = $_GET["registroId"];

$query = $connect->query("SELECT * FROM detalle_equipo
JOIN Equipos ON Equipos.ID_Equipo = detalle_equipo.FK_Equipo
JOIN Marcas ON Marcas.id_Marca = detalle_equipo.FK_Marca
JOIN Modelo ON Modelo.ID_Modelo = detalle_equipo.FK_Modelo WHERE ID_Detalle_Equipo = $id");
$row = $query->fetch_assoc();
$marca = $row['id_Marca'];
$sql = "SELECT DISTINCT ME.FKEY_Equipo, E.N_Equipo, E.ID_Equipo
FROM marcas_equipos AS ME
JOIN Equipos AS E ON E.ID_Equipo = ME.FKEY_Equipo
WHERE FKEY_Marca = $marca;";
$result = mysqli_query($connect,$sql);
$json= array();

while($roww = mysqli_fetch_array($result)){
    $json[]= array(
        'Id'=> $roww['ID_Equipo'],
        'equipo'=> $roww['N_Equipo'],
        'equiposelec' => $row['ID_Equipo']
    );
    
}

$jsonstring = json_encode($json);
echo $jsonstring;