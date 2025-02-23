<?php

require_once "../../BD/bd.php";

class usuarios extends conexion {
/*---------------------- Tabla usuarios ---------------------- */
    public static function mostrarUsuarios(){

        $query ="SELECT * FROM Usuarios 
                    JOIN Empleados AS E ON E.ID_empleado = FKEY_Empleado 
                    JOIN Roles AS R ON R.ID_rol = FKEY_ROL 
                    JOIN estado_usuarios AS EU ON EU.id_status_user = FK_estado_u ;";
        $tablausuarios = conexion::consultar()->prepare($query);
        $tablausuarios->execute();

        $respuesta = array();

        while($filas = $tablausuarios->fetch()){
            $respuesta[] = array(
                'id_usuario' => $filas['ID_usuario'],
                'status' => $filas['FK_estado_u'],
                'id_tipo_user' => $filas['ID_rol'],
                'nombres' => $filas['p_Nombre_empleado']." ".$filas['p_Apellido_empleado'],
                'usuario' => $filas['usuario'],
                'rol' => $filas['Rol_user'],
                'foto' => $filas['foto'],
                'boton' => '<button type="button" id="act_status" value="'.$filas['ID_usuario'].'" class="btn btn-small btn-'.$filas["FK_estado_u"].' mt-1 mb-1" data-bs-toggle="modal" data-bs-target="#ActUsuaria">'.$filas["estado_usuario"].'</button>',
            );
        }
        return $respuesta; 
    }
/*-------------------- Tabla usuarios: FIN ------------------- */

/*---------------------------- registrar usuarios -------------------------- */
    public static function registrarUsuarios($usuario, $empleado, $tipo_user){

        if(!empty($usuario) and !empty($empleado) and !empty($tipo_user)){
            
        } else { return "campos_vacios"; }
        
        $v_user = conexion::consultar()->prepare("SELECT usuario FROM Usuarios WHERE usuario = :usuario; ");
        $v_user->bindParam(":usuario", $usuario);
        $v_user->execute();
        if($user = $v_user->fetch()){ return "error_usuario_r";}

        $v_empleado = conexion::consultar()->prepare("SELECT ID_empleado FROM Empleados AS E JOIN Usuarios AS U ON E.ID_empleado = U.FKEY_empleado WHERE ID_empleado = :empleado;");
        $v_empleado->bindParam(":empleado", $empleado);
        $v_empleado->execute();
        if($empleado_v = $v_empleado->fetch()){ return "error_empleado_r";}

        $clave = "Vtv123456*";
        $estado_user = "1";
        
        $registrar = conexion::consultar()->prepare("INSERT INTO Usuarios (`usuario`, `contraseña`, `FKEY_empleado`, `FKEY_ROL`, `FK_estado_u`) values (:usuario, :clave, :empleado, :tusuario, :estadouser);");
        $registrar->bindParam(":usuario", $usuario);
        $registrar->bindParam(":clave", $clave);
        $registrar->bindParam(":empleado", $empleado);
        $registrar->bindParam(":tusuario", $tipo_user);
        $registrar->bindParam(":estadouser", $estado_user);
        $registrar->execute();

        return "registrado";
    }
/*------------------------- registrar usuarios: FIN ------------------------ */

/*---------------------- editar registro usuarios ---------------------- */
    public static function editarUsuarios($id, $usuario, $tipo_user, $accion){

        if ($accion == "editar_r") {

            if (!empty($usuario) and !empty($tipo_user)) {
                # code...
            } else { return "campos_vacios"; }

            $datos_user = conexion::consultar()->prepare("SELECT usuario FROM Usuarios WHERE ID_usuario = :id");
            $datos_user->bindParam(":id", $id);
            $datos_user->execute();

            $dato = $datos_user->fetch();

            if ($dato["usuario"] == $usuario) {
                # code...
            } else {
                $v_user = conexion::consultar()->prepare("SELECT usuario FROM Usuarios WHERE usuario = :usuario; ");
                $v_user->bindParam(":usuario", $usuario);
                $v_user->execute();
                if($user = $v_user->fetch()){ return "error_usuario_r";}
            }

            $editar = conexion::consultar()->prepare("UPDATE Usuarios SET usuario = :usuario, FKEY_ROL = :tipo_user WHERE ID_usuario = :id;");
            $editar->bindParam(":usuario", $usuario);
            $editar->bindParam(":tipo_user", $tipo_user);
            $editar->bindParam(":id", $id);
            $editar->execute();
            
            return "editado";
        }
        if ($accion == "clave") {

            $clave = "Vtv123456*";
            $editar = conexion::consultar()->prepare("UPDATE Usuarios SET contraseña = :clave WHERE ID_usuario = :id;");
            $editar->bindParam(":clave", $clave);
            $editar->bindParam(":id", $id);
            $editar->execute();
            return "editado_clave";
        }
    }
/*-------------------- editar registro usuarios: FIN ------------------- */

/*-------------------- editar status usuarios ------------------- */
public static function editarstatusUsuarios($id, $estado_user){
    
    $editar = conexion::consultar()->prepare("UPDATE Usuarios SET FK_estado_u = :estado_user WHERE ID_usuario = :id;");
    $editar->bindParam(":estado_user", $estado_user);
    $editar->bindParam(":id", $id);
    $editar->execute();
    return "editado";
}
/*-------------------- editar status usuarios: FIN ------------------- */

/*---------------------- eliminar registro de usuarios ---------------------- */
    public static function eliminarUsuarios($id){

        $exist = "SELECT ID_usuario FROM Usuarios WHERE ID_usuario = :id;";
        $c_exist = conexion::consultar()->prepare($exist);
        $c_exist->bindParam(':id', $id);
        $c_exist->execute();
        $resultado_v = $c_exist->fetch();

        if ($resultado_v) {

            try {

                $query = "DELETE FROM Usuarios WHERE ID_usuario = :id";
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
/*------------------- eliminar registro de usuarios: FIN -------------------- */
}