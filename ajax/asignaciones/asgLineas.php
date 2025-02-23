<?php

require_once "../../controladores/Asignaciones/asgLineas.php";
require_once "../../modelos/asignaciones/asgLineas.php";

class lineas_ajax {

    public $linea,$id_linea_asg, $tipo, $empleado, $tecnico, $observacion, $estado;

    public function asignar_prestar(){
        $asignar_prestar = conlineasAsg::con_asg_pres_linea($this->linea, $this->tipo, $this->empleado, $this->tecnico, $this->observacion);
        echo json_encode($asignar_prestar);
    }
    public function regresar(){
        $retorno = conlineasAsg::conretorno($this->linea, $this->id_linea_asg, $this->tecnico, $this->estado, $this->observacion);
        echo json_encode($retorno);
    }
}

$asignar = new lineas_ajax;
$accion = isset($_POST['accion']) ? $_POST['accion'] : "";

switch ($accion){
    case 'asignar-prestar':
        # code...
        $asignar->tecnico = $_POST["tecnico"];
        $asignar->empleado = $_POST["empleado"]; 
        $asignar->linea = $_POST["linea"]; 
        $asignar->observacion = $_POST["observacion"];    
        $asignar->tipo = $_POST["tipo"];
        $asignar->asignar_prestar();
        break;

    case 'retorno':

        $asignar->linea = $_POST["idlinea_inv"];
        $asignar->id_linea_asg = $_POST["idlinea_asg_ret"];
        $asignar->tecnico= $_POST["id_usuario_ret"];
        $asignar->estado= $_POST["estadoinv"];
        $asignar->observacion = $_POST["observacion"];
        $asignar->regresar();
        break;
}