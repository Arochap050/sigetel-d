<?php

include "../../BD/bdd.php";
    
$query="SELECT * FROM `Marcas` ";
$result = mysqli_query($connect,$query);
$json= array();

while($row = mysqli_fetch_array($result)){
    $json[]= array(
        'Id'=> $row['id_Marca'],
        'marca'=> $row['N_Marca']
    );
}

$jsonstring = json_encode($json);
echo $jsonstring;