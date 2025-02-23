<?php

include "../../BD/bdd.php";
    
$query="SELECT * FROM Gerencia order by N_gerencia asc; ";
$result = mysqli_query($connect,$query);
$json= array();

while($row = mysqli_fetch_array($result)){
    $json[]= array(
        'Id'=> $row['ID_gerencia'],
        'gerencia'=> $row['N_gerencia']
    );
}

$jsonstring = json_encode($json);
echo $jsonstring;

