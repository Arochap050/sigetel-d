<?php

class conInventario {
    /* ------------------------------------- Mostrar equipos: inventario ---------------------------------------*/
    public static function conMostrarinventario(){
        $respuesta = inventario::consultarinventario();
        return $respuesta;
    }
    /* ------------------------------------- Registro de equipo: inventario ---------------------------------------*/
    public static function conRegistrarEqInventario($equipo, $marca, $modelo, $b_nacional, $serial,$imagen){
        $respuesta = inventario::registrarEqInventario($equipo, $marca, $modelo, $b_nacional, $serial, $imagen);
        return $respuesta;
    }
    /* ------------------------------------- Editar de equipo: inventario ---------------------------------------*/
    public static function conEditarEqInventario($id, $equipo, $marca, $modelo, $b_nacional, $serial,$imagen, $ruta){
        $respuesta = inventario::editarEqInventario($id, $equipo, $marca, $modelo, $b_nacional, $serial, $imagen, $ruta);
        return $respuesta;
    }
    /* ------------------------------------- Eliminar de equipo: inventario ---------------------------------------*/
    public static function conEliminar($id_equipo){
        $respuesta = inventario::eliminarEquipo($id_equipo);
        return $respuesta;
    }
}

