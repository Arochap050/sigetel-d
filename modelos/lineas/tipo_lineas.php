<?php

require_once "../../BD/bd.php";

class tipo_linea extends conexion {

    public static function registrar_tipolinea($operadora, $tipo){
        return "registrado";
    }
    public static function editar_tipolinea($id, $operadora, $tipo){

        $prueba = $id;
        return "editado";
    }
    public static function eliminar_tipolinea($id){
        return "eliminado";
    }
}