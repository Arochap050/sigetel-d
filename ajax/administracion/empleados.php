<?php

require_once "../../controladores/administracion/empleados.php";
require_once "../../modelos/administracion/empleados.php";

class empleado {

    public $id, $p_nombre, $s_nombre, $p_apellido, $s_apellido, $cedula, $gerencia, $division, $cargo, $telefono, $extension, $correo, $foto, $rutaimgactual;

    public function tabla(){
        $empleadoTabla = conEmpleados::contablaEmpleado();
        echo json_encode($empleadoTabla);
    }
    public function registrar(){
        $registrarEmpleado = conEmpleados::conregistroEmpleado($this->p_nombre, $this->s_nombre, $this->p_apellido, $this->s_apellido, $this->cedula, $this->gerencia, $this->division, $this->cargo, $this->telefono, $this->extension, $this->correo, $this->foto);
        echo json_encode($registrarEmpleado);
    }
    public function editar(){
        $editarEmpleado = conEmpleados::coneditarEmpleado($this->id, $this->p_nombre, $this->s_nombre, $this->p_apellido, $this->s_apellido, $this->cedula, $this->gerencia, $this->division, $this->cargo, $this->telefono, $this->extension, $this->correo, $this->foto, $this->rutaimgactual);
        echo json_encode($editarEmpleado);
    }
    public function eliminar(){
        $eliminarEmpleado = conEmpleados::coneliminarEmpleado($this->id);
        echo json_encode($eliminarEmpleado);
    }
}

$empleado = new empleado;

if (!isset($_POST["accion"])) {

    $empleado->tabla();
} else {

if ($_POST["accion"] == 'registrar' or $_POST["accion"] == 'editar') {

    $empleado->p_nombre = $_POST["pnombre"];
    $empleado->s_nombre = $_POST["snombre"];
    $empleado->p_apellido = $_POST["papellido"];
    $empleado->s_apellido = $_POST["sapellido"];
    $empleado->cedula = $_POST["cedula"];
    $empleado->telefono = $_POST["telefono"];
    $empleado->extension = $_POST["extension"];
    $empleado->gerencia = $_POST["gerencia"];
    $empleado->division = $_POST["division"];
    $empleado->cargo = $_POST["cargo"];
    $empleado->correo = $_POST["correo"];
    $empleado->foto = $_FILES["foto"];
}

switch ($_POST["accion"]) {

    case 'registrar':
        $empleado->registrar();
        break;
    case 'editar':
        $empleado->id = $_POST["id_empleado"];
        $empleado->rutaimgactual = $_POST["ruta_img_actual"];
        $empleado->editar();
        break;
    case 'eliminar':
        $empleado->id = $_POST["id_empleado"];
        $empleado->eliminar();
        break;
    default:
        # code...Colocar la verificacion de una accion inapropiada.....
        break;
    }
}
