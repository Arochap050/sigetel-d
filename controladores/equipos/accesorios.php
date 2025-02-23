<?php

class con_accesorios {
    public static function conregistrar_accesorio($accesorio){
        $respuesta = accesorios::registrar_accesorio($accesorio);
        return $respuesta;
    }
    public static function conregistrar_acc_equipo($equio, $accesorio){
        $respuesta = accesorios::registrar_acc_equipo($equio, $accesorio);
        return $respuesta;
    }
    public static function coneditar_accesorio($id, $accesorio){
        $respuesta = accesorios::editar_accesorio($id, $accesorio);
        return $respuesta;
    }
    public static function coneditar_acc_equipo($id, $equipo, $accesorio){
        $respuesta = accesorios::editar_acc_equipo($id, $equipo, $accesorio);
        return $respuesta;
    }
    public static function coneliminar_accesorio($id){
        $respuesta = accesorios::eliminar_accesorio($id);
        return $respuesta;
    }
    public static function coneliminar_acc_equipo($id){
        $respuesta = accesorios::eliminar_acc_equipo($id);
        return $respuesta;
    }
}