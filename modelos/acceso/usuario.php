<?php

require_once "../../BD/bd.php";

class usuarioLogin extends conexion {
    public static function consultar_usuario($usuario, $password){

        if (!empty($usuario) and !empty($password)) {
            # verificacion de campos vacios.....
            ini_set('session.gc_maxlifetime', 600);
            session_start();

        } else {
            return "vacio";
        }

        $c_datos_usuario = conexion::consultar()->prepare("SELECT u.usuario, u.contraseña, e.ID_empleado, r.Rol_user AS rol, EU.estado_usuario
                            FROM Usuarios AS u
                            JOIN Roles AS r ON u.FKEY_ROL = r.ID_rol
                            JOIN Empleados AS e on u.FKEY_empleado = e.ID_empleado
                            JOIN estado_usuarios AS EU ON EU.id_status_user = u.FK_estado_u
                            WHERE u.usuario =:usuario;");
        $c_datos_usuario->bindParam(":usuario", $usuario);
        $c_datos_usuario->execute();
        //$c_datos_usuario->fetch();
        $usuario = $c_datos_usuario->fetch();

        if ($usuario) {

            $estado_user = $usuario["estado_usuario"];

            switch ($estado_user) {

                case 'Activo':
        
                    switch ($password) {
        
                    case $usuario['contraseña']:
        
                        $_SESSION['usuario'] = $usuario['usuario'];
                        $_SESSION['rol'] = $usuario['rol'];
                        $_SESSION['idempleado'] = $usuario['ID_empleado'];
                        $_SESSION['status'] = $usuario['estado_usuario'];
        
                        unset($_SESSION['intentosF']);

                        return "logueado";
                        break;
        
                    default:
                    
                        if (!isset($_SESSION['intentosF'])) {
        
                            $_SESSION['intentosF'] = 0;
                        }
        
                        $_SESSION['intentosF']++;
        
                        if ($_SESSION['intentosF'] >= 3) {
                            $usuariov = $usuario["usuario"];
                            $estadouser = 3;
                            $stmt = conexion::consultar()->prepare("UPDATE Usuarios SET FK_estado_u = :estado WHERE usuario = :usuario;");
                            $stmt->bindParam(":estado", $estadouser);
                            $stmt->bindParam(":usuario", $usuariov);
                            $stmt->execute();
        
                            unset($_SESSION['intentosF']);
                            return "usuario_block_int";
                            //header("location: ../../index.php?msg=5");
                        } else {
                            return "contra_incorrecta";
                            //header("location: ../../index.php?msg=2");
                        }
                        break;
                    }
        
                break;
        
                case 'Inactivo':  
                    return "inactivo";
                break; 
        
                case 'Bloqueado':
                    return "bloqueado";
                break;
            }
        } else {
            return "userNoen";
        }
//return "llega";
    }
}