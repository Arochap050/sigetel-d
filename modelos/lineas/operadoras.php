<?php

require_once "../../BD/bd.php";

class operadora extends conexion {

    public static function mostrar_operadora(){

        $consulta = conexion::consultar()->prepare("SELECT ID_Operadora, N_Operadora FROM Operadoras");
        $consulta->execute();

        $respuesta = [];

        while ($fila = $consulta->fetch()){
            $respuesta[] = array(
                'id_operadora' => $fila["ID_Operadora"],
                'operadora' => $fila["N_Operadora"],
                'botones' => '<button id="editar" title="Editar" class="btn btn-primary me-1" data-bs-toggle="modal" data-bs-target="#modal-peradora"><i class="fa-regular fa-pen-to-square"></i></button><button id="eliminar" title="Editar" class="btn btn-warning"><i class="fa-solid fa-trash"></i></button>',
            );
        }
        return $respuesta;
    }
    public static function registrar_operadora($operadora){

        return "eliminado";
    }
    public static function editar_operadora($id, $operadora){
        return "editado";
    }
    public static function eliminar_operadora($id){
        return "eliminado";
    }
}