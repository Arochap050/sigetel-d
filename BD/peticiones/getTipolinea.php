<?php

include "../../BD/bdd.php";

if (!empty($_POST["id"])) {

    $idoperadora = $connect->real_escape_string($_POST["id"]) ;
    $sql = $connect->query("SELECT ID_tipolinea, N_tipolinea FROM tipo_linea WHERE FK_operadora = $idoperadora;");
    $respuesta = '<option value="">Seleccione un tipo de linea';
    
    while ($row = $sql->fetch_array()) {
        $respuesta .= '<option value="'.$row['ID_tipolinea'].'">'.$row['N_tipolinea'].'</option>';
    }
    
    echo $respuesta;
}

if (!empty($_GET["lineaact"])) {
    
    $tipolinea = $_GET["lineaact"];
    $query = $connect->query("SELECT * FROM Lineas WHERE ID_Linea = $tipolinea");
    $row = $query->fetch_assoc();
    $operadora = $row['FKEY_Operadora'];
    $sql = "SELECT * FROM tipo_linea WHERE FK_operadora = $operadora;";
    $result = mysqli_query($connect,$sql);
    $json= array();
    
    while($roww = mysqli_fetch_array($result)){
        $json[]= array(
            'Id'=> $roww['ID_tipolinea'],
            'tipolinea'=> $roww['N_tipolinea'],
            'divselec' => $row['FKEY_Linea']
        );
    }
    
    $jsonstring = json_encode($json);
    echo $jsonstring;
}