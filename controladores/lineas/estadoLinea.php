<?php

class conestado_linea {

    public static function conregistrar_estado($estado){
        $respuesta = estado_linea::registrar_estado($estado);
        return $respuesta;
    }
    public static function coneditar_estado($id, $estado){
        $respuesta = estado_linea::editar_estado($id, $estado);
        return $respuesta;
    }
    public static function coneliminar_estado($id){
        $respuesta = estado_linea::eliminar_estado($id);
        return $respuesta;
    }
}