<?php

require_once "../../BD/bd.php";

class accesorios extends conexion {

    /* ---------------- Registro los registros ---------------- */
    public static function registrar_accesorio($accesorio){
        if(empty($accesorio)) return "vacio"; 

        try {
        
        $v_exist = conexion::consultar()->prepare("SELECT N_Accesorio FROM Accesorios WHERE N_Accesorio = :accesorio");
        $v_exist->bindParam(":accesorio", $accesorio);
        $v_exist->execute();

        if($v_exist->fetch()) return "existe";

        $registro_acc = conexion::consultar()->prepare("INSERT INTO Accesorios (N_accesorio) VALUES (:accesorio)");
        $registro_acc->bindParam(":accesorio", $accesorio);
        $registro_acc->execute();

        return "registrado";

        } catch (Exception $th) {
            return $th;
        }
    }

    public static function registrar_acc_equipo($equipo, $accesorio){
        if(empty($equipo) and empty($accesorio)) return "vacio";
        try {
            
            $v_exist = conexion::consultar()->prepare("SELECT FK_accesorio, FK_equipo FROM equipo_accesorio WHERE FK_accesorio = :accesorio AND FK_equipo = :equipo");
            $v_exist->bindParam(":accesorio", $accesorio);
            $v_exist->bindParam(":equipo", $equipo);
            $v_exist->execute();
            if ($v_exist->fetch()) return "existe";

            $registrar = conexion::consultar()->prepare("INSERT INTO equipo_accesorio (FK_accesorio, FK_equipo) VALUES (:accesorio, :equipo)");
            $registrar->bindParam(":accesorio", $accesorio);
            $registrar->bindParam(":equipo", $equipo);
            $registrar->execute();

            return "registrado";

        } catch (Exception $th) {
            return $th;
        }
    }

    /* ---------------- Editar los registros ---------------- */
    public static function editar_accesorio($id, $accesorio){
        try {
            if(empty($id) and empty($accesorio)) return "vacio";
            $datos = conexion::consultar()->prepare("SELECT N_Accesorio FROM Accesorios WHERE ID_Accesorio = :id");
            $datos->bindParam(":id", $id);
            $datos->execute();
            $nombre = $datos->fetch();

            if ($nombre["N_Accesorio"] != $accesorio){
                $v_exist = conexion::consultar()->prepare("SELECT N_Accesorio FROM Accesorios WHERE N_Accesorio = :accesorio");
                $v_exist->bindparam(":accesorio", $accesorio);
                $v_exist->execute();

                if ($v_exist->fetch()) return "existe"; 
            }

            $editar = conexion::consultar()->prepare("UPDATE Accesorios SET N_Accesorio = :accesorio WHERE ID_Accesorio = :id");
            $editar->bindParam(":id", $id);
            $editar->bindParam(":accesorio", $accesorio);
            $editar->execute();
            return "editado";

        } catch (Exception $th) { return $th; }
    }

    public static function editar_acc_equipo($id, $equipo, $accesorio){
        try {
            if(empty($id) and empty($accesorio) and empty($equipo)) return "vacio";

            $datos = conexion::consultar()->prepare("SELECT * FROM equipo_accesorio WHERE ID_Equipo_accesorio = :id");
            $datos->bindParam(":id", $id);
            $datos->execute();
            $eq_acc = $datos->fetch();

           if($eq_acc["FK_equipo"] == $equipo and $eq_acc["FK_accesorio"] == $accesorio){

           } else {

            $v_exist = conexion::consultar()->prepare("SELECT FK_equipo, FK_accesorio FROM equipo_accesorio WHERE FK_accesorio = :accesorio AND FK_equipo = :equipo");
            $v_exist->bindParam(":equipo", $equipo);
            $v_exist->bindParam(":accesorio", $accesorio);
            $v_exist->execute();

            if ($v_exist->fetch()) return "existe";
           }

           $editar = conexion::consultar()->prepare("UPDATE equipo_accesorio SET FK_equipo = :equipo, FK_accesorio = :accesorio WHERE ID_Equipo_accesorio = :id;");
           $editar->bindParam(":id", $id);
           $editar->bindParam(":accesorio", $accesorio);
           $editar->bindParam(":equipo", $equipo);
           $editar->execute();

            return "editado";//." ".$eq_acc["FK_equipo"]." ".$eq_acc["FK_accesorio"];

        } catch (Exception $th) { return $th; }
    }
    /* ---------------- Apartado para eliminar los registros ---------------- */
    public static function eliminar_accesorio($id){
        try {
            $v_exist = conexion::consultar()->prepare("SELECT ID_Accesorio FROM Accesorios WHERE ID_Accesorio = :id;");
            $v_exist->bindParam(":id", $id);
            $v_exist->execute();

            if(!$v_exist->fetch()) return "no existe";

            $eliminar = conexion::consultar()->prepare("DELETE FROM Accesorios WHERE ID_Accesorio = :id");
            $eliminar->bindParam(":id", $id);
            $eliminar->execute();

            return "eliminado";
            
        } catch (Exception $th) {
            return $th;
        }
    }

    public static function eliminar_acc_equipo($id){
        try {
            $v_exist = conexion::consultar()->prepare("SELECT ID_Equipo_accesorio FROM equipo_accesorio WHERE ID_Equipo_accesorio = :id");
            $v_exist->bindParam(":id",$id);
            $v_exist->execute();
            
            if(!$v_exist->fetch()) return "no existe";

            $eliminar = conexion::consultar()->prepare("DELETE FROM equipo_accesorio WHERE ID_Equipo_accesorio = :id");
            $eliminar->bindParam(":id", $id);
            $eliminar->execute();
            return "eliminado";

        } catch (Exception $th) {
            return $th;
        }
    }
}