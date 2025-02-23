<?php

include "../../BD/bdd.php";

if (!empty($_GET["accesorios"])) {
    
    $id = $_GET["accesorios"];
    $query = $connect->query("SELECT * FROM detalle_equipo WHERE ID_detalle_equipo = $id");
    $row = $query->fetch_assoc();
    $equipo_b = $row['FK_Equipo'];
    $sql = "SELECT * FROM equipo_accesorio AS EA JOIN Accesorios AS AC ON AC.ID_Accesorio = EA.FK_accesorio WHERE FK_equipo = $equipo_b ;";
    $result = mysqli_query($connect,$sql);
    
    $json= array();
    
    while($roww = mysqli_fetch_array($result)){
        $json[]= array(

            'Id'=> $roww['ID_Accesorio'],
            'accesorio'=> $roww['N_Accesorio'],
        );
        
    }
    
    $jsonstring = json_encode($json);
    echo $jsonstring;
}