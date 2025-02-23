<?php

class conlineasAsg {
    public static function con_asg_pres_linea($linea, $accion, $empleado, $tecnico, $observacion){
        $respuesta = lineasAsg::asignar_prestar_linea($linea, $accion, $empleado, $tecnico, $observacion);
        return $respuesta;
    }
    public static function conretorno($linea, $id_linea_asg, $tecnico, $estado, $observacion){
        $respuesta = lineasAsg::retorno($linea, $id_linea_asg, $tecnico, $estado, $observacion);
        return $respuesta;
    }
}