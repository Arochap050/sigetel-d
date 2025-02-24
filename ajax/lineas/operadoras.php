<?php

require_once "../../controladores/lineas/operadora.php";
require_once "../../modelos/lineas/operadoras.php";

class ajax_operadoras {

    public function tabla_operadora(){
        $tabla_operadora = conoperadora::conmostrar_operadora();
        echo json_encode($tabla_operadora);
    }
}

$accion = isset($_POST["accion"]) ? $_POST["accion"]:"";

$operadora = new ajax_operadoras;

switch ($accion){
    case 'registrar':
        # code...
        break;
    case 'editar':
        # code...
        break;
    case 'eliminar':
        # code...
        break;
    default:
        $operadora->tabla_operadora();
        break;
}