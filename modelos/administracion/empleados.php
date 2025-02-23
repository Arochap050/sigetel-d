<?php
/* -------------- BD -------------- */
require_once "../../BD/bd.php";
/* -------------------------------- */

class empleados extends conexion {
/* -------------- mostrar registros de empleados -------------- */
    public static function tablaempleados(){
/* ------------------------------------------------------------ */
        $tabla_c = conexion::consultar()->prepare("SELECT ID_empleado, ID_gerencia, ID_division, ID_cargo, concat_ws(' ',p_Nombre_empleado, s_Nombre_empleado) as nombres , concat_ws(' ', p_Apellido_empleado, s_Apellido_empleado) as apellidos,p_Nombre_empleado, s_Nombre_empleado, p_Apellido_empleado, s_Apellido_empleado, cedula, N_gerencia, N_division, N_cargo, correo, foto, telefono, extension
            FROM Empleados AS E 
            JOIN Gerencia AS G ON G.ID_gerencia = E.FKEY_gerencia 
            JOIN Divisiones AS D ON D.ID_division = E.FKEY_division 
            JOIN Cargos AS C ON C.ID_cargo = E.FKEY_cargo;");
        $tabla_c->execute();
        $respuesta = [];
        while($fila = $tabla_c->fetch()){
            $respuesta[] = $fila;
        }
        return $respuesta;
    }
/* ------------------------------------------------------------ */


/* ------------------- registro de empleados ------------------ */
    public static function registrarEmpleado($p_nombre, $s_nombre, $p_apellido, $s_apellido, $cedula, $gerencia, $division, $cargo, $telefono, $extension, $correo, $foto){
/* ------------------------------------------------------------ */
        if (!empty($p_nombre) and !empty($s_nombre) and !empty($p_apellido) and !empty($s_apellido) and !empty($cedula) and !empty($gerencia) and !empty($division) and !empty($cargo) and !empty($telefono) and !empty($extension) and !empty($correo)) {

            $vcedula = conexion::consultar()->prepare("SELECT cedula FROM Empleados WHERE cedula = :cedula");
            $vcedula->bindParam(":cedula", $cedula);
            $vcedula->execute();
            if ($vcedula->fetch()) { return "cedula"; }

            $vjefe_div = conexion::consultar()->prepare("SELECT * FROM Empleados AS E 
                                    JOIN Cargos AS C ON C.ID_cargo = E.FKEY_cargo 
                                    JOIN Gerencia AS G ON G.ID_gerencia = E.FKEY_gerencia 
                                    JOIN Divisiones AS D ON D.ID_division = E.FKEY_division
                                    WHERE ID_gerencia = :gerencia AND ID_division = :division AND N_cargo = 'jefe de division (e)'");
            $vjefe_div->bindParam(":gerencia", $gerencia);
            $vjefe_div->bindParam(":division", $division);
            $vjefe_div->execute();
            if ($vjefe_div->fetch()){ return "error_jefe_div"; }

            // return "primer_n: ".$p_nombre." segundo_n: ".$s_nombre." primer_a: ".$p_apellido." segundo_a: ".$s_apellido." cedula: ".$cedula." gerencia: ".$gerencia." division: ".$division." cargo: ".$cargo." telefono: ".$telefono." ext: ".$extension." correo: ".$correo;

            $foto_p = "";
            $sql = "INSERT INTO Empleados 
            (`p_Nombre_empleado`,`s_Nombre_empleado`, `p_Apellido_empleado`, `s_Apellido_empleado`, `cedula`, `telefono`, `extension`,`FKEY_gerencia`, `FKEY_division`, `FKEY_cargo`, `correo`, `foto`) VALUES 
            (:p_nombre, :s_nombre, :p_apellido, :s_apellido, :cedula, :telefono, :extension, :gerencia, :division, :cargo,  :correo, :foto);";

            $registrar_emp = conexion::consultar()->prepare($sql);
            $registrar_emp->bindParam(":p_nombre", $p_nombre);
            $registrar_emp->bindParam(":s_nombre", $s_nombre);
            $registrar_emp->bindParam(":p_apellido", $p_apellido);
            $registrar_emp->bindParam(":s_apellido", $s_apellido);
            $registrar_emp->bindParam(":cedula", $cedula);
            $registrar_emp->bindParam(":gerencia", $gerencia);
            $registrar_emp->bindParam(":division", $division);
            $registrar_emp->bindParam(":cargo", $cargo);
            $registrar_emp->bindParam(":telefono", $telefono);
            $registrar_emp->bindParam(":extension", $extension);
            $registrar_emp->bindParam(":correo", $correo);
            $registrar_emp->bindParam(":foto", $foto_p);
            $registrar_emp->execute();

            $sql_id = conexion::consultar()->prepare("SELECT ID_empleado FROM Empleados ORDER BY ID_empleado DESC LIMIT 1;");
            $sql_id->execute();
            $id_c = $sql_id->fetch(); 
            $id = $id_c["ID_empleado"];

            $imagen = $foto["tmp_name"];
            $nombreFoto = $foto["name"];
            $tipoImagen = strtolower(pathinfo($nombreFoto,PATHINFO_EXTENSION));
            $directorio = "../../assets/img/img_user/";
            
            $ruta = $directorio.$id.".".$tipoImagen;
            
            if (is_file($imagen)){

                if ($tipoImagen=="jpg" or $tipoImagen=="jpeg" or $tipoImagen=="png" or $tipoImagen=="webp") {

                    if (move_uploaded_file($imagen,$ruta)) {
                        $udt_n_imagen = conexion::consultar()->prepare("UPDATE Empleados SET foto = :ruta WHERE ID_empleado = :id");
                        $udt_n_imagen->bindParam(":ruta", $ruta);
                        $udt_n_imagen->bindParam(":id", $id);
                        $udt_n_imagen->execute();
                    }

                } else {
                    return "imagen_error";
                }
            } else {
                # configurar foto por defecto si no se ingresa una foto...
                $ruta_alterna = "../../assets/img/img_user/user-defecto.png";
                $udt_n_imagen = conexion::consultar()->prepare("UPDATE Empleados SET foto = :ruta WHERE ID_empleado = :id");
                $udt_n_imagen->bindParam(":ruta", $ruta_alterna);
                $udt_n_imagen->bindParam(":id", $id);
                $udt_n_imagen->execute();
            }

            return "registrado";
        }
        return 'vacio';
    }
/* ------------------------------------------------------------ */

/* -------------- editar registros de empleados -------------- */
    public static function editarEmpleado($id, $p_nombre, $s_nombre, $p_apellido, $s_apellido, $cedula, $gerencia, $division, $cargo, $telefono, $extension, $correo, $fotoNueva, $rutaimgactual){
/* ------------------------------------------------------------ */

        if (!empty($id) and !empty($p_nombre) and !empty($s_nombre) and !empty($p_apellido) and !empty($s_apellido) and !empty($cedula) and !empty($gerencia) and !empty($division) and !empty($cargo) and !empty($telefono) and !empty($extension) and !empty($correo) and !empty($rutaimgactual)) {

            $v_cedula = conexion::consultar()->prepare("SELECT cedula, N_cargo FROM Empleados AS E JOIN Cargos AS C ON C.ID_cargo = E.FKEY_cargo WHERE ID_empleado = :id");
            $v_cedula->bindParam(":id", $id);
            $v_cedula->execute();
            $cedula_result = $v_cedula->fetch();

            if ($cedula_result["cedula"] == $cedula){
            // se verifica la existencia de la cedula y si sde debe editar o no
            } else {
                $vcedula = conexion::consultar()->prepare("SELECT cedula FROM Empleados WHERE cedula = :cedula");
                $vcedula->bindParam(":cedula", $cedula);
                $vcedula->execute();
                if ($vcedula->fetch()) { return "cedula"; }
            }

            if ($cedula_result["N_cargo"] == "Jefe De Division (E)") {

            } else {

                $vjefe_div = conexion::consultar()->prepare("SELECT * FROM Empleados AS E 
                JOIN Cargos AS C ON C.ID_cargo = E.FKEY_cargo 
                JOIN Gerencia AS G ON G.ID_gerencia = E.FKEY_gerencia 
                JOIN Divisiones AS D ON D.ID_division = E.FKEY_division
                WHERE ID_gerencia = :gerencia AND ID_division = :division AND N_cargo = 'jefe de division (e)'");
                $vjefe_div->bindParam(":gerencia", $gerencia);
                $vjefe_div->bindParam(":division", $division);
                $vjefe_div->execute();
                if ($vjefe_div->fetch()){ return "error_jefe_div"; }
            }

            $sql_udt = "UPDATE `Empleados` SET `p_Nombre_empleado`=:p_nombre,`s_Nombre_empleado`=:s_nombre,`p_Apellido_empleado`=:p_apellido,`s_Apellido_empleado`=:s_apellido,`cedula`=:cedula, `telefono`=:telefono,`extension`=:extension,`FKEY_gerencia`=:gerencia,`FKEY_division`=:division,`FKEY_cargo`=:cargo,`correo`=:correo WHERE ID_empleado = :id";

            $editar_emp = conexion::consultar()->prepare($sql_udt);
            $editar_emp->bindParam(":p_nombre", $p_nombre);
            $editar_emp->bindParam(":s_nombre", $s_nombre);
            $editar_emp->bindParam(":p_apellido", $p_apellido);
            $editar_emp->bindParam(":s_apellido", $s_apellido);
            $editar_emp->bindParam(":cedula", $cedula);
            $editar_emp->bindParam(":gerencia", $gerencia);
            $editar_emp->bindParam(":division", $division);
            $editar_emp->bindParam(":cargo", $cargo);
            $editar_emp->bindParam(":telefono", $telefono);
            $editar_emp->bindParam(":extension", $extension);
            $editar_emp->bindParam(":correo", $correo);
            $editar_emp->bindParam(":id", $id);
            $editar_emp->execute();

            $imagen_n = $fotoNueva["tmp_name"];
            $nombreImagen = $fotoNueva["name"];
            $tipoImagen = strtolower(pathinfo($nombreImagen,PATHINFO_EXTENSION));
            $directorio = "../../assets/img/img_user/";

            if(is_file($imagen_n)){

                if ($tipoImagen=="jpg" or $tipoImagen=="jpeg" or $tipoImagen=="png" or $tipoImagen=="webp") {

                    if ($rutaimgactual == "../../assets/img/img_user/user-defecto.png"){

                    } else {
                        try {
                            unlink($rutaimgactual);
                        } catch (\Throwable $th) {
                            //throw $th;
                        }
                    }

                    $ruta = $directorio.$id.".".$tipoImagen;
                    if (move_uploaded_file($imagen_n,$ruta)) {
                        $udt_n_imagen = conexion::consultar()->prepare("UPDATE Empleados SET foto = :ruta WHERE ID_empleado = :id");
                        $udt_n_imagen->bindParam(":ruta", $ruta);
                        $udt_n_imagen->bindParam(":id", $id);
                        $udt_n_imagen->execute();
                    }
                } else {
                    return "imagen_error";
                }
            }

            return 'editado';

        } else {
            return "vacio";
        }
    }
/* ------------------------------------------------------------ */

/* -------------- Eliminar registro de empleados -------------- */
    public static function eliminarEmpleado($id){
/* ------------------------------------------------------------ */
        $exist = "SELECT ID_empleado, foto FROM Empleados WHERE ID_empleado = :id;";
        $c_exist = conexion::consultar()->prepare($exist);
        $c_exist->bindParam(':id', $id);
        $c_exist->execute();
        $resultado_v = $c_exist->fetch();

        if ($resultado_v) {

            try {

                try {
                    unlink($resultado_v["foto"]);
                } catch (\Throwable $th) {
                    //throw $th;
                }

                $query = "DELETE FROM Empleados WHERE ID_empleado = :id";
                $query_c = conexion::consultar()->prepare($query);
                $query_c->bindParam(":id", $id);
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
/* ------------------------------------------------------------ */