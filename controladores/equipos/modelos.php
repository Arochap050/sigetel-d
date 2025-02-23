<?php

class conmodelos {
    public static function contabla(){
        $respuesta = modelos::tabla_modelos();
        return $respuesta;
    }
    public static function conregistrar($marca, $equipo, $modelo){
        $respuesta = modelos::registrar_modelo($marca, $equipo, $modelo);
        return $respuesta;
    }
    public static function coneditar($id, $marca, $equipo, $modelo){
        $respuesta = modelos::editar_modelo($id, $marca, $equipo, $modelo);
        return $respuesta;
    }
    public static function coneliminar($id){
        $respuesta = modelos::eliminar_modelo($id);
        return $respuesta;
    }
}