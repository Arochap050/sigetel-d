<?php

require_once "../../controladores/equipos/inventario.php";
require_once "../../modelos/equipos/inventario.php";

class equipoInv {

    public $id, $equipo, $marca, $modelo, $b_nacional, $serial,$imagen, $ruta;

    public function mostrarInventario(){
        $inventarioTabla = conInventario::conMostrarinventario();
        echo json_encode($inventarioTabla);
    }
    public function registrar(){
        $registrar = conInventario::conRegistrarEqInventario($this->equipo, $this->marca,$this->modelo, $this->b_nacional, $this->serial,$this->imagen);
        echo json_encode($registrar);
    }
    public function editar(){
        $editar = conInventario::conEditarEqInventario($this->id ,$this->equipo, $this->marca,$this->modelo, $this->b_nacional, $this->serial,$this->imagen, $this->ruta);
        echo json_encode($editar);
    }
    public function eliminar(){
        $eliminar = conInventario::conEliminar($this->id);
        echo json_encode($eliminar);
    }
}

if (!isset($_POST["accion"])){

    $inventarioTabla = new equipoInv;
    $inventarioTabla->mostrarInventario();
    } else {

    if ($_POST["accion"] == 'registrar' or $_POST["accion"] == 'editar') {

        $inventario = new equipoInv;
        $inventario->equipo = $_POST["equipo"];
        $inventario->marca = $_POST["marca"];
        $inventario->modelo = $_POST["modelo"];
        $inventario->b_nacional = $_POST["bien_nacional"];
        $inventario->serial = $_POST["serial"];
        $inventario->imagen = $_FILES["foto"];
        } else {
           $inventario = new equipoInv;
        }

    switch ($_POST["accion"]) {

        case 'registrar':
            $inventario->registrar();
            break;
        case 'editar':
            $inventario->id = $_POST["id_registro"];
            $inventario->ruta = $_POST["ruta_img_actual"];
            $inventario->editar();
            break;
        case 'eliminar':
            $inventario->id = $_POST["id_registro"];
            $inventario->eliminar();
            break;       
        default:
            # code...Colocar la verificacion de una accion inapropiada.....
            break;
    }
}