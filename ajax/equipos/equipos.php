<?php

require_once "../../modelos/equipos/equipos.php";
require_once "../../controladores/equipos/equipos.php";

class equipo {

    public $id, $equipo_f;
    
    public static function tabla_equipos(){
        $tabla = conequipos::t_equipos();
        echo json_encode($tabla);
    }
    public function registrar(){
        $registrar = conequipos::conregistrarequipos($this->equipo_f);
        echo json_encode($registrar);
    }
    public function editar(){
        $editar = conequipos::coneditarequipos($this->id, $this->equipo_f);
        echo json_encode($editar);
    }
    public function eliminar(){
        $eliminar = conequipos::coneliminarequipos($this->id);
        echo json_encode($eliminar);
    }
}

$equipo = new equipo;

$accion = isset($_POST["accion"]) ? $_POST["accion"] : '';

switch($accion){
    
    case "registrar":
        $equipo->equipo_f = $_POST["equipo"];
        $equipo->registrar();
        break;
    case "editar":
        $equipo->id = $_POST["idequipo"];
        $equipo->equipo_f = $_POST["equipo"];
        $equipo->editar();
        break;
    case "eliminar":
        $equipo->id = $_POST["idequipo"];
        $equipo->eliminar();
        break;
    default:
        $equipo->tabla_equipos();
        break;
}