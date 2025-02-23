<?php

include "../../BD/bdd.php";

$idivision = $connect->real_escape_string($_POST["id"]) ;
$sql = $connect->query("SELECT ID_empleado, p_Nombre_empleado, p_Apellido_empleado  FROM Empleados WHERE FKEY_division = $idivision ORDER BY p_Nombre_empleado ASC;");
$respuesta = '<option value="">Seleccione un Empleado';

while ($row = $sql->fetch_array()) {
    $respuesta .= '<option value="'.$row['ID_empleado'].'">'.$row['p_Nombre_empleado'].' '.$row['p_Apellido_empleado'].'</option>';
}

echo $respuesta;