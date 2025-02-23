<?php

class conEmpleados {
    /* ------------------------------------- Mostrar registros empleados  ---------------------------------------*/
    public static function contablaEmpleado(){
        $respuesta = empleados::tablaempleados();
        return $respuesta;
    }
    /* ------------------------------------- Registrar empleado  ---------------------------------------*/
    public static function conregistroEmpleado($p_nombre, $s_nombre, $p_apellido, $s_apellido, $cedula, $gerencia, $division, $cargo, $telefono, $extension, $correo, $foto){
        $respuesta = empleados::registrarEmpleado($p_nombre, $s_nombre, $p_apellido, $s_apellido, $cedula, $gerencia, $division, $cargo, $telefono, $extension, $correo, $foto);
        return $respuesta;
    }
    /* ------------------------------------- Editar registros empleados  ---------------------------------------*/
    public static function coneditarEmpleado($id, $p_nombre, $s_nombre, $p_apellido, $s_apellido, $cedula, $gerencia, $division, $cargo, $telefono, $extension, $correo, $foto, $rutaimgactual){
        $respuesta = empleados::editarEmpleado($id, $p_nombre, $s_nombre, $p_apellido, $s_apellido, $cedula, $gerencia, $division, $cargo, $telefono, $extension, $correo, $foto, $rutaimgactual);
        return $respuesta;
    }
    /* ------------------------------------- Eliminar registro empleados  ---------------------------------------*/
    public static function coneliminarEmpleado($id){
        $respuesta = empleados::eliminarEmpleado($id);
        return $respuesta;
    }
}

