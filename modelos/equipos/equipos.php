<?php

require_once "../../BD/bd.php";

class equipos extends conexion{
    
    public static function tabla_equipos(){
        $tabla = conexion::consultar()->prepare("SELECT * FROM equipos");
        $tabla->execute();
        $datos = [];

        while($filas = $tabla->fetch()){
            $datos[] = $filas;
        }

        return $datos;
    }

    public static function registrar($equipo){
        try {
            $v_equipo = conexion::consultar()->prepare("SELECT ID_Equipo FROM Equipos WHERE N_Equipo = :equipo");
            $v_equipo->bindParam(":equipo", $equipo, PDO::PARAM_STR);
            $v_equipo->execute();
            if ($v_equipo->fetch()){ return "existe"; }

            $registro = conexion::consultar()->prepare("INSERT INTO Equipos (N_Equipo) VALUES (:equipo)");
            $registro->bindParam(":equipo", $equipo, PDO::PARAM_STR);
            $registro->execute();

            return "registrado";
            
        } catch (Exception $th) { return $th; }
    }
    
    public static function editar($id, $equipo){
        try {
            
            $v_equipo = conexion::consultar()->prepare("SELECT ID_Equipo, N_Equipo FROM Equipos WHERE ID_Equipo = :id");
            $v_equipo->bindParam(":id", $id, PDO::PARAM_INT);
            $v_equipo->execute();
            $datos = $v_equipo->fetch();
            if (!$datos){ return "noexiste"; }

            if ($datos["N_Equipo"] == $equipo){ } else {
                $v_equipo = conexion::consultar()->prepare("SELECT ID_Equipo FROM Equipos WHERE N_Equipo = :equipo");
                $v_equipo->bindParam(":equipo", $equipo, PDO::PARAM_STR);
                $v_equipo->execute();
                if ($v_equipo->fetch()){ return "existe"; }
            }
            
            $editar = conexion::consultar()->prepare("UPDATE Equipos SET N_Equipo = :equipo WHERE ID_Equipo = :id");
            $editar->bindParam(":equipo", $equipo, PDO::PARAM_STR);
            $editar->bindParam(":id", $id, PDO::PARAM_INT);
            $editar->execute();
            
            return "editado";

        } catch (Exception $th) { return $th; }
    }

    public static function eliminar($id){
        try {

            $v_equipo = conexion::consultar()->prepare("SELECT ID_Equipo FROM Equipos WHERE ID_Equipo = :id");
            $v_equipo->bindParam(":id", $id, PDO::PARAM_INT);
            $v_equipo->execute();
            if (!$v_equipo->fetch()){ return "noexiste"; }

            $eliminar = conexion::consultar()->prepare("DELETE FROM Equipos WHERE ID_Equipo = :id");
            $eliminar->bindParam(":id", $id, PDO::PARAM_INT);
            $eliminar->execute();
            return "eliminado";
        } catch (Exception $th) {
            return 'error_eliminar';
        }
    }
}