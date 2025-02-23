<?php

require_once "../../BD/bd.php";

class lineasAsg extends conexion {

    public static function asignar_prestar_linea($linea, $accion, $empleado, $tecnico, $observacion){
        $fechaEntrega = date("Y-m-d");

        if ($accion == "asignar") {
            $estado = 1;
            $estado_inv = 6;
            $tipoasg = 1; 
            $asignacion_n = '0123456789';
            $control_a = substr(str_shuffle($asignacion_n), 0, 4);
            $control_as = substr(str_shuffle($asignacion_n), 0, 6);
            $control_asig = "A-".$control_a."-".$control_as;
            $acc = "asignado";
        }
        if ($accion == "prestar") {
            $estado = 1;
            $tipoasg = 2;
            $estado_inv = 4;
            $acc = "prestado";
        }
        try {
            //code...

        $sqlUbicacion = conexion::consultar()->prepare("SELECT ID_division FROM Divisiones 
        JOIN Empleados ON Empleados.FKEY_division = Divisiones.ID_division
        where ID_empleado = :empleado");
        $sqlUbicacion->bindParam(":empleado", $empleado);
        $sqlUbicacion->execute();
        $ubicacion_fetch = $sqlUbicacion->fetch();
        $ubicacion = $ubicacion_fetch["ID_division"];

        $verificar_as = conexion::consultar()->prepare("SELECT FKEY_Estado FROM Lineas WHERE ID_Linea = :linea and FKEY_Estado = :estado");
        $verificar_as->bindParam(":linea", $linea);
        $verificar_as->bindParam(":estado", $estado_inv);
        $verificar_as->execute();
        if($verificar_as->fetch()) return "accion no permitida"."-".$acc;

        $operacion = conexion::consultar()->prepare("INSERT INTO `asig_lineas`(`responsable`, `solicitante`, `ubicacion`, `status`, `tipo_asg`, `observacion`, `fecha_entrega`, `n_control_a`) VALUES (:tecnico,:empleado,:ubicacion,:estado,:tipoasg,:observacion,:fecha, :control_asig);");
        $operacion->bindParam(":tecnico", $tecnico);
        $operacion->bindParam(":empleado", $empleado);
        $operacion->bindParam(":ubicacion", $ubicacion);
        $operacion->bindParam(":estado", $estado);
        $operacion->bindParam(":tipoasg", $tipoasg);
        $operacion->bindParam(":observacion", $observacion);
        $operacion->bindParam(":fecha", $fechaEntrega);
        $operacion->bindParam(":control_asig", $control_asig);
        $operacion->execute();
        
        $idRegistroconsulta = conexion::consultar()->prepare("SELECT ID_Linea_asig FROM asig_lineas ORDER BY ID_Linea_asig DESC LIMIT 1;");
        $idRegistroconsulta->execute();
        $id_asig = $idRegistroconsulta->fetch();
        $id_registro = $id_asig["ID_Linea_asig"];
        // $idRegistroasg = $connect->insert_id;
    
        $lineaAsg = conexion::consultar()->prepare("INSERT INTO `Lineas_asignadas`(`fkey_linea`, `fkey_asig_lineas`) VALUES (:linea, :idRegistroasg);");
        $lineaAsg->bindParam(":linea",$linea);
        $lineaAsg->bindParam(":idRegistroasg",$id_registro);
        $lineaAsg->execute();

        $statusInv = conexion::consultar()->prepare("UPDATE Lineas SET FKEY_Estado = :estadolinea, FK_Ubicacion = :ubicacion WHERE ID_Linea = :linea;");
        $statusInv->bindParam(":estadolinea", $estado_inv);
        $statusInv->bindParam(":linea", $linea);
        $statusInv->bindParam(":ubicacion", $ubicacion);
        $statusInv->execute();

        return $acc;//." linea:".$linea." accion:".$accion." empleado:".$empleado." tecnico:".$tecnico." observacion:".$observacion;
    } catch (Exception $th) {
        return $th;
    }
    }
    
    public static function retorno($linea, $id_linea_asg, $tecnico, $estado, $observacion){

        if (!$estado) return "vacio";

        $fecha = date("y-m-d");
        $estadoAsg = 2;
        $ubicacionInv = 24;
        $devolucion_n = '0123456789';
        $control_d = substr(str_shuffle($devolucion_n), 0, 4);
        $control_ds = substr(str_shuffle($devolucion_n), 0, 6);
        $control_dev = "D-".$control_d."-".$control_ds;

        try {
            $tabla_linea_asg = conexion::consultar()->prepare("UPDATE `asig_lineas` SET `status`= :estadoAsg, `estado_linea_asg` = :estado_Inv_asg,`fecha_devolucion` = :fecha, `observacion_rec` = :observacion, `n_control_d` = :control_dev, `responsable_ret` = :tecnico WHERE ID_Linea_asig = :lineaReincorporar");
            $tabla_linea_asg->bindParam("lineaReincorporar",$id_linea_asg);
            $tabla_linea_asg->bindParam(":estadoAsg",$estadoAsg);
            $tabla_linea_asg->bindParam(":estado_Inv_asg",$estado);
            $tabla_linea_asg->bindParam(":fecha",$fecha);
            $tabla_linea_asg->bindParam(":observacion",$observacion);
            $tabla_linea_asg->bindParam(":control_dev",$control_dev);
            $tabla_linea_asg->bindParam(":tecnico",$tecnico);
            $tabla_linea_asg->execute();
            
            $tabla_linea_inv = conexion::consultar()->prepare("UPDATE `Lineas` SET `FKEY_Estado`= :estadoInv,`FK_Ubicacion` = :ubicacionInv WHERE ID_Linea = :linea");
            $tabla_linea_inv->bindParam(":linea",$linea);
            $tabla_linea_inv->bindParam(":estadoInv",$estado);
            $tabla_linea_inv->bindParam(":ubicacionInv",$ubicacionInv);
            $tabla_linea_inv->execute();

             return "regresado";//." linea inv:".$linea." linea_asg:".$id_linea_asg." tecnico:".$tecnico." estado:".$estado." observacion:".$observacion;

        } catch (Exception $th) {
            return $th;
        }
    }
}