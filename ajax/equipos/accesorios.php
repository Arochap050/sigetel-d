<?php

require_once "../../controladores/equipos/accesorios.php";
require_once "../../modelos/equipos/accesorios.php";

class accesorios_ajax {

    public $id, $accesorio, $equipo;
    /* -------- registrar accesorio --------- */
    public function registrar_accesorio(){
        $registrar_accesorio = con_accesorios::conregistrar_accesorio($this->accesorio);
        echo json_encode($registrar_accesorio);
    }
    /* -------- registrar accesorio_equipo --------- */
    public function registrar_acc_equipo(){
        $registrar_acc_equipo = con_accesorios::conregistrar_acc_equipo($this->equipo, $this->accesorio);
        echo json_encode($registrar_acc_equipo);
    }
    /* -------- editar accesorio --------- */
    public function editar_accesorio(){
        $editar_accesorio = con_accesorios::coneditar_accesorio($this->id, $this->accesorio);
        echo json_encode($editar_accesorio);
    }
    /* -------- editar accesorio_equipo --------- */
    public function editar_acc_equipo(){
        $editar_acc_equipo = con_accesorios::coneditar_acc_equipo($this->id, $this->equipo, $this->accesorio);
        echo json_encode($editar_acc_equipo);
    }
    /* -------- eliminar accesorio --------- */
    public function eliminar_accesorio(){
        $eliminar_accesorio = con_accesorios::coneliminar_accesorio($this->id);
        echo json_encode($eliminar_accesorio);
    }
    /* -------- eliminar accesorio_equipo --------- */
    public function eliminar_acc_equipo(){
        $eliminar_acc_equipo = con_accesorios::coneliminar_acc_equipo($this->id);
        echo json_encode($eliminar_acc_equipo);
    }
}

$accesorios = new accesorios_ajax;
$accion = isset($_POST['accion']) ? $_POST['accion'] : "";

switch ($accion) {

    case 'registrar_accesorio':
        $accesorios->accesorio = $_POST['accesorio'];
        $accesorios->registrar_accesorio();
        break;
    case 'registrar_acc_equipo':
        $accesorios->equipo = $_POST['equipo_m'];
        $accesorios->accesorio = $_POST['accesorio_eq'];
        $accesorios->registrar_acc_equipo();
        break;
    case 'editar_accesorio':
        $accesorios->id = $_POST['id_accesorio'];
        $accesorios->accesorio = $_POST['accesorio'];
        $accesorios->editar_accesorio();
        break;
    case 'editar_acc_equipo':
        $accesorios->id = $_POST['id_acc_equipo'];
        $accesorios->equipo = $_POST['equipo_m'];
        $accesorios->accesorio = $_POST['accesorio_eq'];
        $accesorios->editar_acc_equipo();
        break;
    case 'eliminar_accesorio':
        $accesorios->id = $_POST['id'];
        $accesorios->eliminar_accesorio();
        break;
    case 'eliminar_acc_equipo':
        $accesorios->id = $_POST['id'];
        $accesorios->eliminar_acc_equipo();
        break;
}