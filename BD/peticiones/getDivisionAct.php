<?php

include "../../BD/bdd.php";

if (!empty($_GET["gerencia"])) {
    
    $id = $_GET["gerencia"];
    $query = $connect->query("SELECT * FROM Empleados WHERE ID_empleado = $id");
    $row = $query->fetch_assoc();
    $division = $row['FKEY_division'];
    $gerencia = $row['FKEY_gerencia'];
    $sql = "SELECT * FROM Divisiones WHERE FKEY_gerencia = $gerencia ;";
    $result = mysqli_query($connect,$sql);
    $json= array();
    
    while($roww = mysqli_fetch_array($result)){
        $json[]= array(
            'Id'=> $roww['ID_division'],
            'division'=> $roww['N_division'],
            'divselec' => $row['FKEY_division']
        );
        
    }
    
    $jsonstring = json_encode($json);
    echo $jsonstring;
}

if (!empty($_GET["division"])) {

    $id = $_GET["division"];
    $query = $connect->query("SELECT * FROM Empleados WHERE ID_empleado = $id");
    $row = $query->fetch_assoc();
    $cargo = $row['FKEY_cargo'];
    $division = $row['FKEY_division'];
    $sql = "SELECT * FROM Cargos WHERE FKEY_division = $division;";
    $result = mysqli_query($connect,$sql);
    $json= array();
    
    while($roww = mysqli_fetch_array($result)){
        $json[]= array(
            'Id'=> $roww['ID_cargo'],
            'cargo'=> $roww['N_cargo'],
            'divselec' => $row['FKEY_cargo']
        );
        
    }
    
    $jsonstring = json_encode($json);
    echo $jsonstring;
}

if (!empty($_GET["division_cargo"])) {

    $id = $_GET["division_cargo"];
    $query = $connect->query("SELECT * FROM Cargos AS C JOIN Divisiones AS D ON D.ID_division = C.FKEY_division JOIN Gerencia AS G ON G.ID_gerencia = D.FKEY_gerencia WHERE ID_cargo = $id");
    $row = $query->fetch_assoc();
    $division = $row['FKEY_division'];
    $gerencia = $row['FKEY_gerencia'];
    $sql = "SELECT * FROM Divisiones WHERE FKEY_gerencia = $gerencia ;";
    $result = mysqli_query($connect,$sql);
    $json= array();
    
    while($roww = mysqli_fetch_array($result)){
        $json[]= array(
            'Id'=> $roww['ID_division'],
            'division'=> $roww['N_division'],
            'divselec' => $row['FKEY_division']
        );
        
    }
    
    $jsonstring = json_encode($json);
    echo $jsonstring;
}