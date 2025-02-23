<?php

require_once "../../controladores/Asignaciones/asgEquipos.php";
require_once "../../modelos/asignaciones/asgEquipos.php";

class asignar_prestar {

    public $id_equipo, $id_equipo_inv, $tecnico, $empleado, $equipo, $observacion, $accesorios, $tipo, $estado;

    public function asignar_prestar(){
        $asg_pres_equipo = conasignacion::con_asignar_prestar($this->tecnico, $this->empleado, $this->equipo, $this->observacion, $this->accesorios, $this->tipo);
        echo json_encode($asg_pres_equipo);
    }
    public function regresar(){
        $regresar_eq = conasignacion::con_retorno($this->id_equipo,$this->id_equipo_inv,$this->tecnico,$this->estado,$this->observacion);
        echo json_encode($regresar_eq);
    }
}

$asignar = new asignar_prestar;
$accion = isset($_POST['accion']) ? $_POST['accion'] : "";

switch ($accion){
    case 'asignar-prestar':
        # code...
        $asignar->tecnico = $_POST["tecnico"];
        $asignar->empleado = $_POST["empleado"]; 
        $asignar->equipo = $_POST["equipo"]; 
        $asignar->observacion = $_POST["observacion"];    
        $asignar->tipo = $_POST["tipo"];
        if (!empty($_POST["accesorios"])) {
            $asignar->accesorios = $_POST["accesorios"];
        }
        $asignar->asignar_prestar();
        break;
    // case 'prestar':
    //     # code...
    //     break;
    case 'retorno':

        $asignar->id_equipo = $_POST["id_equipo"];
        $asignar->id_equipo_inv = $_POST["id_equipo_inv"];
        $asignar->tecnico= $_POST["id_tecnico_ret"];
        $asignar->estado= $_POST["estado_equipo"];
        $asignar->observacion = $_POST["observacion"];
        $asignar->regresar();
        break;
}