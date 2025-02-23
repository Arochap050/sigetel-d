<?php

require_once "../../BD/bd.php";

class marcas extends conexion{

    public static function tabla_marca(){

        $tabla = conexion::consultar()->prepare("SELECT * FROM Marcas");
        $tabla->execute();
        
        $datos = [];

        while($filas = $tabla->fetch()){
            $datos[] = $filas;
        }
        return $datos;
    }
    public static function registrar($marca){
        if(!isset($marca)){ return "vacio"; }
        try {

        $v_marca = conexion::consultar()->prepare("SELECT * FROM Marcas WHERE N_Marca = :marca");
        $v_marca->bindParam(":marca", $marca, PDO::PARAM_STR);
        $v_marca->execute();
        $marca_v = $v_marca->fetch();
        if($marca_v){ return "existe"; }

     
            $consulta = conexion::consultar()->prepare("INSERT INTO Marcas (N_Marca) VALUES (:marca)");
            $consulta->bindParam(":marca", $marca, PDO::PARAM_STR);
            $consulta->execute();
    
            } catch (Exception $th) {
            return $th;
        }
        return "registrado";
    }

    public static function editar($id, $marca){

        if(!isset($marca) and !isset($id)){ return "vacio".$id." ".$marca; }
        try {

            $v_marca_existe = conexion::consultar()->prepare("SELECT * FROM Marcas WHERE ID_Marca = :id");
            $v_marca_existe->bindParam(":id", $id, PDO::PARAM_INT);
            $v_marca_existe->execute();
            $datos = $v_marca_existe->fetch();
            if($datos['N_Marca'] == $marca){} else {

                $v_marca = conexion::consultar()->prepare("SELECT * FROM Marcas WHERE N_Marca = :marca");
                $v_marca->bindParam(":marca", $marca, PDO::PARAM_STR);
                $v_marca->execute();
                if($v_marca->fetch()){ return "existe"; }
            }

            $consulta = conexion::consultar()->prepare("UPDATE Marcas SET N_Marca = :marca WHERE ID_Marca = :id");
            $consulta->bindParam(":marca", $marca, PDO::PARAM_STR);
            $consulta->bindParam(":id", $id, PDO::PARAM_INT);
            $consulta->execute();

        } catch (Exception $th) {
            return $th;
        }
        return "editado";
    }

    public static function eliminar($id){

        try {

            if(!isset($id)){ return "vacio"; }

            $v_marca = conexion::consultar()->prepare("SELECT id_Marca FROM Marcas WHERE id_Marca = :id");
            $v_marca->bindParam(":id", $id, PDO::PARAM_INT);
            $v_marca->execute();
            if($v_marca->fetch()){} else { return "validacion de existencia"; }
        
            $consulta = conexion::consultar()->prepare("DELETE FROM Marcas WHERE id_Marca = :id");
            $consulta->bindParam(":id", $id, PDO::PARAM_INT);
            $consulta->execute();

        } catch (Exception $th) {
            return $th;
        }

        return "eliminado";
    }
}