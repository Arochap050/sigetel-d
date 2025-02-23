<?php

include "../../BD/bdd.php";

if (!empty($_POST["id"])) {

    $idgerencia = $connect->real_escape_string($_POST["id"]) ;
    $sql = $connect->query("SELECT ID_division, N_division FROM Divisiones WHERE FKEY_gerencia = $idgerencia ORDER BY N_division ASC;");
    $respuesta = '<option value="">Seleccione una Division';
    
    while ($row = $sql->fetch_array()) {        
        $respuesta .= '<option value="'.$row['ID_division'].'">'.$row['N_division'].'</option>';
    }
    
    echo $respuesta;
}


if (!empty($_POST["idcargo"])) {

    $idcargo =$_POST["idcargo"]; 
    $consulta_Ca = $connect->query("SELECT ID_cargo, N_cargo FROM Cargos WHERE FKEY_division = $idcargo ORDER BY N_cargo ASC");
    $respuesta = '<option value="">Seleccione un Cargo';
    
    while ($row = $consulta_Ca->fetch_array()) {
        $respuesta .= '<option value="'.$row['ID_cargo'].'">'.$row['N_cargo'].'</option>';
    }
    
    echo $respuesta;
}