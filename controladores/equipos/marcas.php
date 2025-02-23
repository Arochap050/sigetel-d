<?php

class conmarcas {
    
    public static function tabla_marca(){
        $respuesta = marcas::tabla_marca();
        return $respuesta;
    }
    public static function conregistrar($marca){
        $respuesta = marcas::registrar($marca);
        return $respuesta;
    }
    public static function coneditar($id, $marca){
        $respuesta = marcas::editar($id, $marca);
        return $respuesta;
    }
    public static function coneliminar($id){
        $respuesta = marcas::eliminar($id);
        return $respuesta;
    }
}