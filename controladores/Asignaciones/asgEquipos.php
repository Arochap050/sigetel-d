<?php

class conasignacion {

    public static function con_asignar_prestar($tecnico, $empleado, $equipo, $observacion, $accesorios, $tipo){
        $respuesta = asg_pres_equipos::asignacion_prestamo($tecnico, $empleado, $equipo, $observacion, $accesorios, $tipo);
        return $respuesta;
    }
    public static function con_retorno($id_equipo,$id_equipo_inv,$tecnico,$estado,$observacion){
        $respuesta = asg_pres_equipos::retorno_equipo($id_equipo,$id_equipo_inv,$tecnico,$estado,$observacion);
        return $respuesta;
    }
}