<?php

require_once "../../controladores/administracion/usuarios.php";
require_once "../../modelos/administracion/usuarios.php";

class usuario {

    public $id, $usuario, $empleado, $tipo_user, $clave, $accion, $estado_user;

    public function tablaUsuarios(){
        $tabla = conUsuarios::conmostrarUsuarios();
        echo json_encode($tabla);
    }
    public function registrar(){
        $registrar = conUsuarios::conregistrarUsuarios($this->usuario, $this->empleado, $this->tipo_user);
        echo json_encode($registrar);
    }
    public function editar(){
        $editar = conUsuarios::coneditarUsuarios($this->id, $this->usuario, $this->tipo_user, $this->accion);
        echo json_encode($editar);
    }
    public function editar_status(){
        $editar_status = conUsuarios::coneditarstatusUsuarios($this->id, $this->estado_user);
        echo json_encode($editar_status);
    }
    public function eliminar(){
        $eliminar = conUsuarios::coneliminarUsuarios($this->id);
        echo json_encode($eliminar);
    }
}

$usuarios = new usuario;

if (!isset($_POST["accion"])) {

    $usuarios->tablaUsuarios();
}

if (!empty($_POST["accion"])) {

switch ($_POST["accion"]) {

    case 'registrar':

        $usuarios->usuario = $_POST["usuario"];
        $usuarios->empleado = $_POST["empleado"];
        $usuarios->tipo_user = $_POST["t_usuario"];
        $usuarios->registrar();
        break;
    case 'editar':

        if ($_POST["tipo_udt"] == "editar_r") {
            $usuarios->accion = "editar_r";
            $usuarios->id = $_POST["id_usuario"];
            $usuarios->usuario = $_POST["usuario"];
            $usuarios->tipo_user = $_POST["t_usuario"];
        }
        if ($_POST["tipo_udt"] == "clave") {
            $usuarios->accion = "clave";
            $usuarios->id = $_POST["id_usuario"];
        }

        $usuarios->editar();
        break;
    case 'editar_estado':

        $usuarios->id = $_POST["id_usuario"];
        $usuarios->estado_user = $_POST["newestado"];
        $usuarios->editar_status();
        break;
    case 'eliminar':
        
        $usuarios->id = $_POST["id_usuario"];
        $usuarios->eliminar();
        break;
    default:
        # code...Colocar la verificacion de una accion inapropiada.....
        break;
    }
}


