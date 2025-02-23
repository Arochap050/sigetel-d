<?php

require_once "../../BD/bd.php";

class asg_pres_equipos extends conexion {
    public static function asignacion_prestamo($tecnico, $empleado, $equipo, $observacion, $accesorios, $tipo){

        try {

            $fechaEntrega = date("Y-m-d");

            if ($tipo == "asignar") {
                $estado = 1;
                $estado_inv = 1;
                $tipoasg = 1; 
                $asignacion_n = '0123456789';
                $control_a = substr(str_shuffle($asignacion_n), 0, 4);
                $control_as = substr(str_shuffle($asignacion_n), 0, 6);
                $control_asig = "A-".$control_a."-".$control_as;
                $acc = "asignado";
            }
            if ($tipo == "prestar") {
                $estado = 1;
                $tipoasg = 2;
                $estado_inv = 4;
                $acc = "prestado";
            }
    
            $sqlUbicacion = conexion::consultar()->prepare("SELECT ID_division FROM Divisiones 
            JOIN Empleados ON Empleados.FKEY_division = Divisiones.ID_division
            where ID_empleado = :empleado");
            $sqlUbicacion->bindParam(":empleado", $empleado);
            $sqlUbicacion->execute();
            $ubicacion_fetch = $sqlUbicacion->fetch();
            // $resultUbicacion = mysqli_query($connect, $sqlUbicacion);
            // $ubicacionn = mysqli_fetch_assoc($resultUbicacion);
            $ubicacion = $ubicacion_fetch["ID_division"];
    
            $verificar_as = conexion::consultar()->prepare("SELECT FK_Estado FROM detalle_equipo WHERE ID_Detalle_Equipo = :equipo AND FK_Estado = :estado");
            $verificar_as->bindParam(":equipo", $equipo);
            $verificar_as->bindParam(":estado", $estado_inv);
            $verificar_as->execute();
            if($verificar_as->fetch()) return "accion no permitida"."-".$acc;

            $operacion = conexion::consultar()->prepare("INSERT INTO `Asignaciones`(`Responsable`, `Solicitante`, `Ubicacion`, `status`, `tipo_asg`, `fecha_entrega`,`observacion`,`n_control_a`) VALUES (:tecnico,:empleado,:ubicacion,:estado,:tipoasg,:fechaEntrega,:observacion,:n_control);");
            $operacion->bindParam(":tecnico", $tecnico);
            $operacion->bindParam(":empleado", $empleado);
            $operacion->bindParam(":ubicacion", $ubicacion);
            $operacion->bindParam(":estado", $estado);
            $operacion->bindParam(":tipoasg", $tipoasg);
            $operacion->bindParam(":fechaEntrega", $fechaEntrega);
            $operacion->bindParam(":observacion", $observacion);
            $operacion->bindParam(":n_control", $control_asig);
            $operacion->execute();

            $idRegistroconsulta = conexion::consultar()->prepare("SELECT ID_Asignado FROM Asignaciones ORDER BY ID_Asignado DESC LIMIT 1;");
            $idRegistroconsulta->execute();
            $id_asig = $idRegistroconsulta->fetch();
            $id_registro = $id_asig["ID_Asignado"];
            
            $equipoAsg = conexion::consultar()->prepare("INSERT INTO `equipo_asig`(`fkey_equipo`, `fkey_asig`) VALUES (:equipo, :id_registro);");
            $equipoAsg->bindParam(":equipo",$equipo);
            $equipoAsg->bindParam(":id_registro",$id_registro);
            $equipoAsg->execute();

            $statusInv = conexion::consultar()->prepare("UPDATE detalle_equipo SET FK_Estado = :estado_inv, FK_Ubicacion = :ubicacion WHERE ID_Detalle_Equipo = :equipo;");
            $statusInv->bindParam(":equipo", $equipo);
            $statusInv->bindParam(":estado_inv", $estado_inv);
            $statusInv->bindParam(":ubicacion", $ubicacion);
            $statusInv->execute();

            if ($accesorios) {
                foreach ($accesorios as $acces) {
                    $accesorio_reg = conexion::consultar()->prepare("INSERT INTO equipo_accesorio_asig (`FK_accesorio_asg`,`FK_equipo_asg`) VALUES (:acces, :id_registro);");
                    $accesorio_reg->bindParam(":acces", $acces);
                    $accesorio_reg->bindParam(":id_registro", $id_registro);
                    $accesorio_reg->execute();
                }
            }

            return $acc;//.$tecnico." empleado:".$empleado." equipo:".$equipo." observacion:".$observacion." accesorio:".$accesorios." tipo:".$tipo;
        } catch (Exception $th) {
            return $th;
        }
    }
    public static function retorno_equipo($id_equipo,$id_equipo_inv,$tecnico,$estado,$observacion){

        if (!$estado) return "estado_v";
        
        if (!isset($id_equipo) and !isset($id_equipo_inv)) return "vacio";

        $fechaReincorporar = date("y-m-d");
        $estadoAsg = 2;
        $ubicacionInv = 24;
        $devolucion_n = '0123456789';
        $control_d = substr(str_shuffle($devolucion_n), 0, 2);
        $control_ds = substr(str_shuffle($devolucion_n), 0, 6);
        $control_dev = "D-10".$control_d."-".$control_ds;

        try {
            //code...
            $tabla_equipo_asg = conexion::consultar()->prepare("UPDATE Asignaciones SET status = :estadoAsg, status_eq_asg = :estado, fecha_devolucion = :fecha, observacion_rec = :observacion, n_control_d = :control_dev, Responsable_ret = :tecnico WHERE ID_Asignado = :equipo");
            $tabla_equipo_asg->bindParam(":equipo", $id_equipo);
            $tabla_equipo_asg->bindParam(":estadoAsg", $estadoAsg);
            $tabla_equipo_asg->bindParam(":estado", $estado);
            $tabla_equipo_asg->bindParam(":fecha", $fechaReincorporar);
            $tabla_equipo_asg->bindParam(":observacion", $observacion);
            $tabla_equipo_asg->bindParam(":control_dev", $control_dev);
            $tabla_equipo_asg->bindParam(":tecnico", $tecnico);
            $tabla_equipo_asg->execute();

            $tabla_equipo_inv = conexion::consultar()->prepare("UPDATE `detalle_equipo` SET `FK_Estado`= :estadoInv,`FK_Ubicacion`= :ubicacionInv WHERE id_detalle_equipo = :equipo_inv");
            $tabla_equipo_inv->bindParam(":equipo_inv", $id_equipo_inv);
            $tabla_equipo_inv->bindParam(":estadoInv", $estado);
            $tabla_equipo_inv->bindParam(":ubicacionInv", $ubicacionInv);
            $tabla_equipo_inv->execute();

            return "regresado";//.$id_equipo." inv:".$id_equipo_inv." tec".$tecnico." estado:".$estado." obs:".$observacion;

        } catch (Exception $th) {
           return $th;
       }
    }
}