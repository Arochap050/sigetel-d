<?php

class conoperadora {

    public static function conmostrar_operadora(){
        $respuesta = operadora::mostrar_operadora();
        return $respuesta;
    }
    public static function conregistrar_operadora($operadora){
        $respuesta = operadora::registrar_operadora($operadora);
        return $respuesta;
    }
    public static function coneditar_operadora($id, $operadora){
        $respuesta = operadora::editar_operadora($id, $operadora);
        return $respuesta;    
    }
    public static function coneliminar_operadora($id){
        $respuesta = operadora::eliminar_operadora($id);
        return $respuesta;
    }
}