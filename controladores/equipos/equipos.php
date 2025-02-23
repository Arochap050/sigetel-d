<?php

class conequipos {
    
    public static function t_equipos(){
        $respuesta = equipos::tabla_equipos();
        return $respuesta;
    }
    public static function conregistrarequipos($equipo){
        $respuesta = equipos::registrar($equipo);
        return $respuesta;
    }
    public static function coneditarequipos($id, $equipo){
        $respuesta = equipos::editar($id, $equipo);
        return $respuesta;
    }
    public static function coneliminarequipos($id){
        $respuesta = equipos::eliminar($id);
        return $respuesta;
    }
}