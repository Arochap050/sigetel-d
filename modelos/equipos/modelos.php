<?php

require_once "../../BD/bd.php";

class modelos extends conexion {

    public static function tabla_modelos(){
        //$sql = "SELECT * FROM modelos";
        $query = conexion::consultar()->prepare("SELECT M.ID_Modelo, FK_Marca_equipo, M.N_Modelo, ME.FKEY_Marca, ME.FKEY_Equipo, Ma.N_Marca, E.N_Equipo, E.ID_Equipo, id_Marca
            FROM Modelo AS M
            JOIN marcas_equipos AS ME ON ME.ID_marca_equipo = FK_Marca_equipo
            JOIN Marcas AS Ma ON Ma.id_Marca = FKEY_Marca 
            JOIN Equipos AS E ON E.ID_Equipo = FKEY_Equipo;");
        $query->execute();
        
        $datos = [];
        while ($filas = $query->fetch()){
            $datos[] = $filas;
        }
        return $datos;
    }

    public static function registrar_modelo($marca, $equipo, $modelo){
        try {
            $v_modelo = conexion::consultar()->prepare("SELECT N_Modelo FROM Modelo WHERE N_Modelo = :modelo"); 
            $v_modelo->bindParam(':modelo', $modelo);
            $v_modelo->execute();

            if ($v_modelo->rowCount() > 0) {
                return "existe";
            }

            $marca_equipo = conexion::consultar()->prepare("INSERT INTO marcas_equipos (FKEY_Marca, FKEY_Equipo) VALUES (:marca, :equipo)");
            $marca_equipo->bindParam(':marca', $marca);
            $marca_equipo->bindParam(':equipo', $equipo);
            $marca_equipo->execute();

            $ultimo_id = conexion::consultar()->prepare("SELECT ID_marca_equipo FROM marcas_equipos ORDER BY ID_marca_equipo DESC LIMIT 1");
            $ultimo_id->execute();
            $id = $ultimo_id->fetch();
            $id_marca_equipo = $id['ID_marca_equipo'];

            $registrar = conexion::consultar()->prepare("INSERT INTO Modelo (FK_Marca_equipo, N_Modelo) VALUES (:marca_equipo, :modelo)");
            $registrar->bindParam(':marca_equipo', $id_marca_equipo);
            $registrar->bindParam(':modelo', $modelo);
            $registrar->execute();
            return "registrado";
            
        } catch (Exception $th) {
            return $th;
        }
    }

    public static function editar_modelo($id, $marca, $equipo, $modelo){
        try {

            $v_modelo = conexion::consultar()->prepare("SELECT FK_Marca_equipo, N_Modelo FROM Modelo WHERE ID_Modelo = :id");
            $v_modelo->bindParam(':id', $id);
            $v_modelo->execute();
            $datos = $v_modelo->fetch();

            if ($datos['N_Modelo'] == $modelo) {
                //return "existe";
            } else {
                $v_modelo = conexion::consultar()->prepare("SELECT N_Modelo FROM Modelo WHERE N_Modelo = :modelo"); 
                $v_modelo->bindParam(':modelo', $modelo);
                $v_modelo->execute();

                if ($v_modelo->rowCount() > 0) { return "existe"; }
            }

            $id_marca_equipo = $datos["FK_Marca_equipo"];

            $marca_equipo = conexion::consultar()->prepare("UPDATE marcas_equipos SET FKEY_Marca = :marca, FKEY_Equipo = :equipo WHERE ID_marca_equipo = :id");
            $marca_equipo->bindParam(':marca', $marca);
            $marca_equipo->bindParam(':equipo', $equipo);
            $marca_equipo->bindParam(':id', $id_marca_equipo);
            $marca_equipo->execute();

            $editar = conexion::consultar()->prepare("UPDATE Modelo SET N_Modelo = :modelo WHERE ID_Modelo = :id");
            $editar->bindParam(':modelo', $modelo);
            $editar->bindParam(':id', $id);
            $editar->execute();

        } catch (PDOException $th) {
            return $th;
        }
        return "editado";//.$id." ".$marca." ".$equipo." ".$modelo;
    }
    
    public static function eliminar_modelo($id){
        try {

            $eliminar = conexion::consultar()->prepare("DELETE FROM Modelo WHERE ID_Modelo = :id");
            $eliminar->bindParam(':id', $id);
            $eliminar->execute();
        } catch (PDOException $th) {
            return $th;
        }
        return "eliminado";
    }
}