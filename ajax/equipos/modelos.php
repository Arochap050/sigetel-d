w<?php

require_once "../../modelos/equipos/modelos.php";
require_once "../../controladores/equipos/modelos.php";

class modelos_ajax {

    public $id, $marca, $equipo, $modelo;

    public static function tabla(){
        $tabla = conmodelos::contabla();
        echo json_encode($tabla);
    }
    public function registrar(){
        $registrar = conmodelos::conregistrar($this->marca, $this->equipo, $this->modelo);
        echo json_encode($registrar);
    }
    public function editar(){
        $editar = conmodelos::coneditar($this->id, $this->marca, $this->equipo, $this->modelo);
        echo json_encode($editar);
    }
    public function eliminar(){
        $eliminar = conmodelos::coneliminar($this->id);
        echo json_encode($eliminar);
    }
}

$modelos = new modelos_ajax;

$accion = isset($_POST['accion']) ? $_POST['accion'] : "";

switch ($accion) {
    case 'registrar':
        $modelos->marca = $_POST['marca'];
        $modelos->equipo = $_POST['equipo'];
        $modelos->modelo = $_POST['modelo'];
        $modelos->registrar();
        break;
    case 'editar':
        $modelos->id = $_POST['idmodelo'];
        $modelos->marca = $_POST['marca'];
        $modelos->equipo = $_POST['equipo'];
        $modelos->modelo = $_POST['modelo'];
        $modelos->editar();
        break;
    case 'eliminar':
        $modelos->id = $_POST['idmodelo'];
        $modelos->eliminar();
        break;
    default:
    $modelos->tabla();
        break;
}