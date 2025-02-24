<?php

require_once "../../BD/bd.php";

class estado_linea extends conexion {

    public static function registrar_estado($estado){
        return "registrado";
    }
    public static function editar_estado($id, $estado){
        return "editado";
    }
    public static function eliminar_estado($id){
        return "eliminado";
    }
}