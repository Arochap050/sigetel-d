<?php

require_once "../../modelos/equipos/marcas.php";
require_once "../../controladores/equipos/marcas.php";

class marcas_ajax {

    public $id, $marca;

    public function tabla_marca(){
        $tabla = conmarcas::tabla_marca();
        echo json_encode($tabla);
    }
    public function registrar(){
        $respuesta = conmarcas::conregistrar($this->marca);
        echo json_encode($respuesta);
    }
    public function editar(){
        $respuesta = conmarcas::coneditar($this->id, $this->marca);
        echo json_encode($respuesta);
    }
    public function eliminar(){
        $respuesta = conmarcas::coneliminar($this->id);
        echo json_encode($respuesta);
    }
}

$marcas = new marcas_ajax;

$accion = isset($_POST["accion"]) ? $_POST["accion"] : '';

switch ($accion) {

    case 'registrar':
        $marcas->marca = $_POST["marca"];
        $marcas->registrar();
        break;
    case 'editar':
        $marcas->id = $_POST["idmarca"];
        $marcas->marca = $_POST["marca"];
        $marcas->editar();
        break;
    case 'eliminar':
        $marcas->id = $_POST["idmarca"];
        $marcas->eliminar();
        break;
    default:
        $marcas->tabla_marca();
        break;
}