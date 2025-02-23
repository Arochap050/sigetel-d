<?php
/* -------------- BD -------------- */
require_once "../../BD/bd.php";
/* -------------------------------- */

/* -------------- información de la tabla de inventario equipos -------------- */
class inventario extends conexion {

    public static function consultarinventario(){
        $conexion = conexion::consultar();
        try {
            $sql_inventario = "SELECT ID_Detalle_Equipo,Bien_nacional,serial,N_Equipo,N_Marca,N_Modelo,Estado,N_division,img_equipo,'x' as acciones, id_Marca, ID_Equipo, ID_Modelo
                FROM detalle_equipo
                JOIN Equipos ON Equipos.ID_Equipo = detalle_equipo.FK_Equipo
                JOIN Marcas  ON Marcas.id_Marca = detalle_equipo.FK_Marca
                JOIN Modelo ON Modelo.ID_Modelo = detalle_equipo.FK_Modelo
                JOIN Divisiones ON Divisiones.ID_division = detalle_equipo.FK_Ubicacion
                JOIN Estado_equipo ON Estado_equipo.ID_Estado = detalle_equipo.FK_ESTADO
                ORDER BY ID_Detalle_Equipo DESC";
            $ejecutar = $conexion->prepare($sql_inventario);
            $ejecutar->execute();

            $resultado = [];

            while ($filas = $ejecutar->fetch()) {
                $resultado[] = $filas;
            }
            return $resultado;

        } catch (Exception $th) {
            echo "error: " . $th->getMessage();
        }
    }

/* -------------- registro de nuevos equipos al inventario -------------- */
public static function registrarEqInventario($equipo, $marca, $modelo, $b_nacional, $serial, $imagen){
/*-------------------------------------------------------------------------*/
    if (!empty($equipo) and !empty($marca) and !empty($modelo) and !empty($b_nacional) and !empty($serial) and !empty($imagen)) {
        $prueba = "";
        $estado = 2;
        $ubicacion = 24;
        //se captura la imagen para tomar el formato, el nombre y el archivo...
        $imagen_n = $imagen["tmp_name"];
        $nombreImagen = $imagen["name"];
        $tipoImagen = strtolower(pathinfo($nombreImagen,PATHINFO_EXTENSION));
        $directorio = "../../assets/img/img_equipos/";
        //se inicia una condicional para validar el formato de imagen...
        if ($tipoImagen=="jpg" or $tipoImagen=="jpeg" or $tipoImagen=="png" or $tipoImagen=="webp") {
            
            try {
                
                $sql = "SELECT `serial` FROM detalle_equipo WHERE `serial` = :seriall";
                $c_serial = conexion::consultar()->prepare($sql);
                $c_serial->bindParam(':seriall', $serial);
                $c_serial->execute();
                $resultado = $c_serial->fetch();
                
                if (!$resultado) {
                    
                    $c_bnacional = conexion::consultar()->prepare("SELECT Bien_nacional FROM detalle_equipo WHERE Bien_nacional = :biennacional;");
                    $c_bnacional->bindParam(":biennacional", $b_nacional);
                        $c_bnacional->execute();
                        $b_resultado = $c_bnacional->fetch();
                        
                        if (!$b_resultado) {
                            
                            $sql = "INSERT INTO detalle_equipo (`FK_Equipo`, `FK_Marca`, `FK_Modelo`, `FK_Estado`, `Bien_nacional`, `serial`, `FK_Ubicacion`, `img_equipo`) VALUES (:equipo, :marca, :modelo, :estado, :b_nacional, :seriall, :ubicacion, :foto)";
                            
                            $registrar = conexion::consultar()->prepare($sql);
                            $registrar->bindParam(":equipo", $equipo);
                            $registrar->bindParam(":marca", $marca);
                            $registrar->bindParam(":modelo", $modelo);
                            $registrar->bindParam(":estado", $estado);
                            $registrar->bindParam(":b_nacional", $b_nacional);
                            $registrar->bindParam(":seriall", $serial);
                            $registrar->bindParam(":ubicacion", $ubicacion);
                            $registrar->bindParam(":foto", $prueba);
                            $registrar->execute();
                            
                            $sql_id = "SELECT ID_Detalle_Equipo FROM detalle_equipo ORDER BY ID_Detalle_Equipo DESC LIMIT 1";
                            $idRegistroC = conexion::consultar()->prepare($sql_id);
                            $idRegistroC->execute();
                            $idRegistro = $idRegistroC->fetch();

                            $id = $idRegistro["ID_Detalle_Equipo"];
                            $ruta = $directorio.$id.".".$tipoImagen ;
                            
                            $sql_img_act = "UPDATE detalle_equipo SET img_equipo = :ruta WHERE ID_Detalle_Equipo = :id";
                            $actualizar = conexion::consultar()->prepare($sql_img_act);
                            $actualizar->bindParam(":ruta", $ruta);
                            $actualizar->bindParam(":id", $id);
                            $actualizar->execute();
                            //$actualizar = null;
                            move_uploaded_file($imagen_n,$ruta); 
                            return "registrado";
                            
                        } else {
                            // equipo ya registrado anteriormente
                            return "bien_n_error";
                        }
                    } else {
                        // validar serial: equipo ya esta regsitrado con el serial
                        return "serial_error";
                    }
                } catch (PDOException $th) {
                    echo $th->getMessage();
                }
            } else {
                // formato de imagen no valido
                return "imagen_error";
            }
        } else {
            return "vacio";
        }
    }
/* -------------- registro de nuevos equipos al inventario: FIN -------------- */


/* -------------- Editar registros de equipos del inventario -------------- */
public static function editarEqInventario($id, $equipo, $marca, $modelo, $b_nacional, $serial, $imagen, $ruta){
/*-------------------------------------------------------------------------*/
    if (!empty($id) and !empty($equipo) and !empty($marca) and !empty($modelo) and !empty($b_nacional) and !empty($serial)) {

        $imagen_n = $imagen["tmp_name"];
        $nombreImagen = $imagen["name"];
        $tipoImagen = strtolower(pathinfo($nombreImagen,PATHINFO_EXTENSION));
        $directorio = "../../assets/img/img_equipos/";

        $c_serial_bnacional = conexion::consultar()->prepare("SELECT Bien_nacional, serial FROM detalle_equipo WHERE ID_Detalle_Equipo = :id");
        $c_serial_bnacional->bindParam(":id", $id);
        $c_serial_bnacional->execute();
        $datos_v = $c_serial_bnacional->fetch();

        if ($datos_v["serial"] == $serial){
            //verificacion de serial
            } else {
            $serial_v = conexion::consultar()->prepare("SELECT serial FROM detalle_equipo WHERE serial = :seriall");
            $serial_v->bindParam(":seriall", $serial);
            $serial_v->execute();
            $dato = $serial_v->fetch();
            if ($dato){ return "serial_error"; }
        }
        if ($datos_v["Bien_nacional"] == $b_nacional){
            //verificacion de bien nacional
            } else {
            $bnacional_v = conexion::consultar()->prepare("SELECT Bien_nacional FROM detalle_equipo WHERE Bien_nacional = :bnacional");
            $bnacional_v->bindParam(":bnacional", $b_nacional);
            $bnacional_v->execute();
            $dato = $bnacional_v->fetch();
            if ($dato){ return "bien_n_error"; }
        }

        $sql = "UPDATE detalle_equipo SET FK_Equipo = :equipo, FK_Marca = :marca, FK_Modelo = :modelo, serial = :seriall, Bien_nacional = :bnacional WHERE ID_Detalle_Equipo = :id ;";
        $edit_eq = conexion::consultar()->prepare($sql);
        $edit_eq->bindParam(":equipo", $equipo);
        $edit_eq->bindParam(":marca", $marca);
        $edit_eq->bindParam(":modelo", $modelo);
        $edit_eq->bindParam(":seriall", $serial);
        $edit_eq->bindParam(":bnacional", $b_nacional);
        $edit_eq->bindParam(":id", $id);
        $edit_eq->execute();

        if(is_file($imagen_n)){
            if ($tipoImagen=="jpg" or $tipoImagen=="jpeg" or $tipoImagen=="png" or $tipoImagen=="webp") {
                try {
                    unlink($ruta);
                } catch (\Throwable $th) {
                    //throw $th;
                }
                $ruta = $directorio.$id.".".$tipoImagen;
                if (move_uploaded_file($imagen_n,$ruta)) {
                    $udt_n_imagen = conexion::consultar()->prepare("UPDATE detalle_equipo SET img_equipo = :ruta WHERE ID_Detalle_Equipo = :id");
                    $udt_n_imagen->bindParam(":ruta", $ruta);
                    $udt_n_imagen->bindParam(":id", $id);
                    $udt_n_imagen->execute();
                }
            } else {
                return "imagen_error";
            }
        }
        return "editado";
    } else {
        return "vacio";
    }
}
/* -------------- Editar registros de equipos del inventario: FIN -------------- */


/* -------------- Eliminar equipos del inventario -------------- */
public static function eliminarEquipo($id_equipo){
/*-------------------------------------------------------------------------*/
        $exist = "SELECT ID_Detalle_Equipo FROM detalle_equipo WHERE ID_Detalle_Equipo = :id;";
        $c_exist = conexion::consultar()->prepare($exist);
        $c_exist->bindParam(':id', $id_equipo);
        $c_exist->execute();
        $resultado_v = $c_exist->fetch();

        if ($resultado_v) {
            // return "si existe este equipo ".$id_equipo;
            try {
                $query = "DELETE FROM detalle_equipo WHERE ID_Detalle_Equipo = :id";
                $query_c = conexion::consultar()->prepare($query);
                $query_c->bindParam(":id", $id_equipo);
                $query_c->execute();
                return "eliminado";

            } catch(PDOException $error) {
                return "error_eliminar";
            }
        } else {
            return "no existe ";
        }
    }
}
/* -------------- Eliminar equipos del inventario: FIN -------------- */