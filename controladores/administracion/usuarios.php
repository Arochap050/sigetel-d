<?php

class conUsuarios {
/*---------------------- Tabla usuarios ---------------------- */
    public static function conmostrarUsuarios(){
        $respuesta = usuarios::mostrarUsuarios();
        return $respuesta;
    }
/*-------------------- Tabla usuarios: FIN ------------------- */

/*---------------------- registrar usuarios ---------------------- */
    public static function conregistrarUsuarios($usuario, $empleado, $tipo_user){
        $respuesta = usuarios::registrarUsuarios($usuario, $empleado, $tipo_user);
        return $respuesta;
    }
/*-------------------- registrar usuarios: FIN ------------------- */

/*---------------------- editar registro usuarios ---------------------- */
    public static function coneditarUsuarios($id, $usuario, $tipo_user, $accion){
        $respuesta = usuarios::editarUsuarios($id, $usuario, $tipo_user, $accion);
        return $respuesta;
    }
/*-------------------- editar registro usuarios: FIN ------------------- */

/*---------------------- editar registro usuarios ---------------------- */
public static function coneditarstatusUsuarios($id, $estado_user){
    $respuesta = usuarios::editarstatusUsuarios($id, $estado_user);
    return $respuesta;
}
/*-------------------- editar registro usuarios: FIN ------------------- */

/*---------------------- eliminar registro de usuarios ---------------------- */
    public static function coneliminarUsuarios($id){
        $respuesta = usuarios::eliminarUsuarios($id);
        return $respuesta;
    }
/*------------------- eliminar registro de usuarios: FIN -------------------- */
}