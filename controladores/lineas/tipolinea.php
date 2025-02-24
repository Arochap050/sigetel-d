<?php

class con_tipo_linea {
    public static function conRegistrartipo($operadora, $tipo){
        $respuesta = tipo_linea::registrar_tipolinea($operadora, $tipo);
        return $respuesta;
    }
    public static function conEditartipo($id, $operadora, $tipo){
        $respuesta = tipo_linea::editar_tipolinea($id, $operadora, $tipo);
        return $respuesta;
    }
    public static function conEliminartipo($id){
        $respuesta = tipo_linea::eliminar_tipolinea($id);
        return $respuesta;
    }
}