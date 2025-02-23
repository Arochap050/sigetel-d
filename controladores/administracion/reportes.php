<?php

include "../../BD/bdd.php";

if (!empty($_POST["btn_consultar_reporte"])) {
    
    $reporte = $_POST["reporte"];
    $tipo = $_POST["tipo"];
    $empleado = $_POST["empleado"];
    $fecha_p = $_POST["fecha1"];
    $fecha_s = $_POST["fecha2"];

    if ($empleado) {

        $b_empleado = $connect->query("SELECT * FROM Empleados WHERE ID_empleado = $empleado");
        $resul = $b_empleado->fetch_assoc();
        $nombreEm = $resul["p_Nombre_empleado"]." ".$resul["p_Apellido_empleado"];
    }

    switch ($reporte) {

        case 'asignacion':

            switch ($tipo) {

                case 'equipo':

                    if ($empleado) {
 
                        echo "<h6 class='mb-4 text text-center'>Equipos asignados a <strong>$nombreEm</strong></h6>";
                        $equipo_asg = $connect->query("SELECT * FROM equipo_asig AS EA 
                        JOIN Asignaciones AS A ON A.ID_Asignado = EA.fkey_asig
                        JOIN detalle_equipo AS DE ON DE.ID_Detalle_Equipo = EA.fkey_equipo
                        JOIN Empleados AS EM ON EM.ID_empleado = Solicitante
                        JOIN Equipos AS EQ ON EQ.ID_Equipo = DE.FK_Equipo
                        JOIN Marcas AS M ON M.id_Marca = DE.FK_Marca
                        JOIN Modelo AS MD ON MD.ID_Modelo = DE.FK_Modelo
                        JOIN Usuarios AS U ON U.ID_usuario = A.Responsable
                        JOIN Estado_equipo AS ESS ON ESS.ID_Estado = DE.FK_Estado 
                        JOIN tipo_asignacion AS TP ON TP.ID_tipo_asig = A.tipo_asg
                        WHERE solicitante = $empleado AND N_tipo_asig = 'Asignacion';");

                    } else if ($fecha_p) {

                        echo "<h6 class='mb-4 text text-center'>Equipos asignados del <strong>$fecha_p al $fecha_s</strong></h6>";
                        $equipo_asg = $connect->query("SELECT * FROM equipo_asig AS EA 
                        JOIN Asignaciones AS A ON A.ID_Asignado = EA.fkey_asig
                        JOIN detalle_equipo AS DE ON DE.ID_Detalle_Equipo = EA.fkey_equipo
                        JOIN Empleados AS EM ON EM.ID_empleado = Solicitante
                        JOIN Equipos AS EQ ON EQ.ID_Equipo = DE.FK_Equipo
                        JOIN Marcas AS M ON M.id_Marca = DE.FK_Marca
                        JOIN Modelo AS MD ON MD.ID_Modelo = DE.FK_Modelo
                        JOIN Usuarios AS U ON U.ID_usuario = A.Responsable
                        JOIN Estado_equipo AS ESS ON ESS.ID_Estado = DE.FK_Estado 
                        JOIN tipo_asignacion AS TP ON TP.ID_tipo_asig = A.tipo_asg
                        WHERE fecha_entrega BETWEEN '$fecha_p' and '$fecha_s' AND N_tipo_asig = 'Asignacion';");

                    } ?>

                    <form action="../rep/reportes.php" target="_blank" method="post">
                        <?php if ($empleado) {?>
                        <input type="hidden" value="equipo" name="tipo">   
                        <input type="hidden" value="Asignacion" name="PA">
                        <input type="hidden" value="<?php echo $empleado; ?>" name="empleado">
                        <?php } else if ($fecha_p) { ?>
                        <input type="hidden" value="equipo" name="tipo">   
                        <input type="hidden" value="Asignacion" name="PA">
                        <input type="hidden" value="<?php echo $fecha_p; ?>" name="fecha1">
                        <input type="hidden" value="<?php echo $fecha_s; ?>" name="fecha2">
                        <?php } ?>  
                        <div class="modal-footer" style="justify-content: left;">
                            <button type="submit" class="btn btn-success">Imprimir</button>
                        </div>
                    </form>

                    <?php while ($dato = $equipo_asg->fetch_assoc()): ?>

                    <div class="alert bg-transparent" role="alert">
                        <div class="alert-content">
                            <p><?php echo $dato["N_Equipo"]." ".$dato["N_Marca"]." ".$dato["N_Modelo"]?></p>
                            <p><?php echo $dato["p_Nombre_empleado"]." ".$dato["p_Apellido_empleado"]?></p>
                            <p><?php echo $dato["n_control_a"]?></p>
                        <a href="../rep/acta_asignacion.php?rep=<?php echo $dato["ID_Equipo_asig"]?>" target="_blank" type="submit" class="btn btn-info" name="btn_asignar_equipo"><i class="fa-solid fa-print"></i></a>
                        </div>
                    </div>

                    <?php endwhile;
                    
                    break;
                
                case 'linea':

                    if ($empleado) {

                        echo "<h6 class='mb-4 text text-center'>Lineas asignadas a <strong>$nombreEm</strong></h6>";
                        $lineas_asg = $connect->query("SELECT * FROM Lineas_asignadas AS LA
                        JOIN asig_lineas AS AL ON AL.ID_Linea_asig = LA.fkey_asig_lineas
                        JOIN Lineas AS L ON L.ID_Linea = LA.fkey_linea
                        JOIN tipo_linea AS tl ON tl.ID_tipolinea = L.FKEY_Linea
                        JOIN Operadoras AS o ON o.ID_Operadora = L.FKEY_Operadora
                        JOIN estado_linea AS e ON e.ID_Estado_linea = L.FKEY_Estado
                        JOIN Empleados AS EM ON EM.ID_empleado = AL.solicitante
                        JOIN Usuarios AS U ON U.ID_usuario = AL.responsable
                        JOIN estado_asignaciones AS EA ON EA.id_estado_asig = AL.status
                        JOIN tipo_asignacion AS TP ON TP.ID_tipo_asig = AL.tipo_asg
                        WHERE ID_empleado = $empleado AND N_tipo_asig = 'Asignacion';");

                    } else if ($fecha_p) {

                        echo "<h6 class='mb-4 text text-center'>Lineas asignadas del <strong>$fecha_p al $fecha_s</strong></h6>";
                        $lineas_asg = $connect->query("SELECT * FROM Lineas_asignadas AS LA
                        JOIN asig_lineas AS AL ON AL.ID_Linea_asig = LA.fkey_asig_lineas
                        JOIN Lineas AS L ON L.ID_Linea = LA.fkey_linea
                        JOIN tipo_linea AS tl ON tl.ID_tipolinea = L.FKEY_Linea
                        JOIN Operadoras AS o ON o.ID_Operadora = L.FKEY_Operadora
                        JOIN estado_linea AS e ON e.ID_Estado_linea = L.FKEY_Estado
                        JOIN Empleados AS EM ON EM.ID_empleado = AL.solicitante
                        JOIN Usuarios AS U ON U.ID_usuario = AL.responsable
                        JOIN estado_asignaciones AS EA ON EA.id_estado_asig = AL.status
                        JOIN tipo_asignacion AS TP ON TP.ID_tipo_asig = AL.tipo_asg
                        WHERE fecha_entrega BETWEEN '$fecha_p' and '$fecha_s' AND N_tipo_asig = 'Asignacion';");
                    } ?>

                    <form action="../rep/reportes.php" target="_blank" method="post">
                        <?php if ($empleado):?>
                        <input type="hidden" value="linea" name="tipo">   
                        <input type="hidden" value="Asignacion" name="PA">
                        <input type="hidden" value="<?php echo $empleado; ?>" name="empleado">
                        <?php  elseif ($fecha_p): ?>
                        <input type="hidden" value="linea" name="tipo">   
                        <input type="hidden" value="Asignacion" name="PA">
                        <input type="hidden" value="<?php echo $fecha_p; ?>" name="fecha1">
                        <input type="hidden" value="<?php echo $fecha_s; ?>" name="fecha2">
                        <?php endif ?>
                        <div class="modal-footer" style="justify-content: left;">
                            <button type="submit" class="btn btn-success">Imprimir</button>
                        </div>
                    </form>

                    <?php while ($dato = $lineas_asg->fetch_assoc()): ?>

                    <div class="alert bg-transparent" role="alert">
                        <div class="alert-content">
                            <p><?php echo $dato["N_tipolinea"]." ".$dato["N_Operadora"]?></p>
                            <p><?php echo $dato["p_Nombre_empleado"]." ".$dato["p_Apellido_empleado"]?> </p>
                            <p><?php echo $dato["Numero"]?></p>
                            <a href="../rep/acta_asignacion.php?sim=<?php echo $dato["ID_Linea_asig"]?>" target="_blank" type="submit" class="btn btn-info" name="btn_asignar_equipo"><i class="fa-solid fa-print"></i></a>
                        </div>
                    </div>
    
                    <?php endwhile;
                    
                break;
            }

            break;

        //--------------------------------------------------------------------------------------------

        case 'prestamo':

            switch ($tipo) {

                case 'equipo':

                    if ($empleado) {

                        echo "<h6 class='mb-4 text text-center'>Equipos prestados a <strong>$nombreEm</strong></h6>";
                        $equipo_asg = $connect->query("SELECT * FROM equipo_asig AS EA 
                        JOIN Asignaciones AS A ON A.ID_Asignado = EA.fkey_asig
                        JOIN detalle_equipo AS DE ON DE.ID_Detalle_Equipo = EA.fkey_equipo
                        JOIN Empleados AS EM ON EM.ID_empleado = Solicitante
                        JOIN Equipos AS EQ ON EQ.ID_Equipo = DE.FK_Equipo
                        JOIN Marcas AS M ON M.id_Marca = DE.FK_Marca
                        JOIN Modelo AS MD ON MD.ID_Modelo = DE.FK_Modelo
                        JOIN Usuarios AS U ON U.ID_usuario = A.Responsable
                        JOIN Estado_equipo AS ESS ON ESS.ID_Estado = DE.FK_Estado 
                        JOIN tipo_asignacion AS TP ON TP.ID_tipo_asig = A.tipo_asg
                        WHERE ID_empleado = $empleado AND N_tipo_asig = 'Prestamo';");

                    } else if ($fecha_p) {

                        echo "<h6 class='mb-4 text text-center'>Equipos prestados del <strong>$fecha_p al $fecha_s</strong></h6>";
                        $equipo_asg = $connect->query("SELECT * FROM equipo_asig AS EA 
                        JOIN Asignaciones AS A ON A.ID_Asignado = EA.fkey_asig
                        JOIN detalle_equipo AS DE ON DE.ID_Detalle_Equipo = EA.fkey_equipo
                        JOIN Empleados AS EM ON EM.ID_empleado = Solicitante
                        JOIN Equipos AS EQ ON EQ.ID_Equipo = DE.FK_Equipo
                        JOIN Marcas AS M ON M.id_Marca = DE.FK_Marca
                        JOIN Modelo AS MD ON MD.ID_Modelo = DE.FK_Modelo
                        JOIN Usuarios AS U ON U.ID_usuario = A.Responsable
                        JOIN Estado_equipo AS ESS ON ESS.ID_Estado = DE.FK_Estado 
                        JOIN tipo_asignacion AS TP ON TP.ID_tipo_asig = A.tipo_asg
                        WHERE fecha_entrega BETWEEN '$fecha_p' and '$fecha_s' AND N_tipo_asig = 'Prestamo';");
                    } ?>

                    <form action="../rep/reportes.php" target="_blank" method="post">
                        <?php if ($empleado) {?>
                        <input type="hidden" value="equipo" name="tipo">   
                        <input type="hidden" value="Prestamo" name="PA">
                        <input type="hidden" value="<?php echo $empleado; ?>" name="empleado">
                        <?php } else if ($fecha_p) { ?>
                        <input type="hidden" value="equipo" name="tipo">   
                        <input type="hidden" value="Prestamo" name="PA">
                        <input type="hidden" value="<?php echo $fecha_p; ?>" name="fecha1">
                        <input type="hidden" value="<?php echo $fecha_s; ?>" name="fecha2">
                        <?php } ?>  
                        <div class="modal-footer" style="justify-content: left;">
                            <button type="submit" class="btn btn-success">Imprimir</button>
                        </div>
                    </form>

                    <?php while ($dato = $equipo_asg->fetch_assoc()): ?>

                    <div class="alert bg-transparent" role="alert">
                        <div class="alert-content">
                            <p><?php echo $dato["N_Equipo"]." ".$dato["N_Marca"]." ".$dato["N_Modelo"]?></p>
                            <p><?php echo $dato["p_Nombre_empleado"]." ".$dato["p_Apellido_empleado"]?> </p>

                            <a href="../rep/acta_prestamo.php?rep=<?php echo $dato["ID_Equipo_asig"]?>" target="_blank" type="submit" class="btn btn-info" name="btn_reporte_equipo_pres"><i class="fa-solid fa-print"></i></a>

                        </div>
                    </div>

                    <?php endwhile;
                    
                    break;
                
                case 'linea':

                    if ($empleado) {
                        
                        echo "<h6 class='mb-4 text text-center'>Lineas prestadas a <strong>$nombreEm</strong></h6>";
                        $lineas_asg = $connect->query("SELECT * FROM Lineas_asignadas AS LA
                        JOIN asig_lineas AS AL ON AL.ID_Linea_asig = LA.fkey_asig_lineas
                        JOIN Lineas AS L ON L.ID_Linea = LA.fkey_linea
                        JOIN tipo_linea AS tl ON tl.ID_tipolinea = L.FKEY_Linea
                        JOIN Operadoras AS o ON o.ID_Operadora = L.FKEY_Operadora
                        JOIN estado_linea AS e ON e.ID_Estado_linea = L.FKEY_Estado
                        JOIN Empleados AS EM ON EM.ID_empleado = AL.solicitante
                        JOIN Usuarios AS U ON U.ID_usuario = AL.responsable
                        JOIN estado_asignaciones AS EA ON EA.id_estado_asig = AL.status
                        JOIN tipo_asignacion AS TP ON TP.ID_tipo_asig = AL.tipo_asg
                        WHERE ID_empleado = $empleado AND N_tipo_asig = 'Prestamo';");

                    } else if ($fecha_p) {

                        echo "<h6 class='mb-4 text text-center'>Lineas prestadas del <strong>$fecha_p al $fecha_s</strong></h6>";
                        $lineas_asg = $connect->query("SELECT * FROM Lineas_asignadas AS LA
                        JOIN asig_lineas AS AL ON AL.ID_Linea_asig = LA.fkey_asig_lineas
                        JOIN Lineas AS L ON L.ID_Linea = LA.fkey_linea
                        JOIN tipo_linea AS tl ON tl.ID_tipolinea = L.FKEY_Linea
                        JOIN Operadoras AS o ON o.ID_Operadora = L.FKEY_Operadora
                        JOIN estado_linea AS e ON e.ID_Estado_linea = L.FKEY_Estado
                        JOIN Empleados AS EM ON EM.ID_empleado = AL.solicitante
                        JOIN Usuarios AS U ON U.ID_usuario = AL.responsable
                        JOIN estado_asignaciones AS EA ON EA.id_estado_asig = AL.status
                        JOIN tipo_asignacion AS TP ON TP.ID_tipo_asig = AL.tipo_asg
                        WHERE fecha_entrega BETWEEN '$fecha_p' and '$fecha_s' AND N_tipo_asig = 'Prestamo';");
                    } ?>

                    <form action="../rep/reportes.php" target="_blank" method="post">
                    <?php if ($empleado) {?>
                        <input type="hidden" value="linea" name="tipo">   
                        <input type="hidden" value="Prestamo" name="PA">
                        <input type="hidden" value="<?php echo $empleado; ?>" name="empleado">
                        <?php } else if ($fecha_p) { ?>
                        <input type="hidden" value="linea" name="tipo">   
                        <input type="hidden" value="Prestamo" name="PA">
                        <input type="hidden" value="<?php echo $fecha_p; ?>" name="fecha1">
                        <input type="hidden" value="<?php echo $fecha_s; ?>" name="fecha2">
                        <?php } ?>  
                        <div class="modal-footer" style="justify-content: left;">
                            <button type="submit" class="btn btn-success">Imprimir</button>
                        </div>
                    </form>

                    <?php while ($dato = $lineas_asg->fetch_assoc()): ?>

                    <div class="alert bg-transparent" role="alert">
                        <div class="alert-content">
                            <p><?php echo $dato["N_tipolinea"]." ".$dato["N_Operadora"]?></p>
                            <p><?php echo $dato["p_Nombre_empleado"]." ".$dato["p_Apellido_empleado"]?> </p>
                            <p><?php echo $dato["Numero"]?></p>

                            <a href="../rep/acta_prestamo.php?sim=<?php echo $dato["ID_Linea_asig"]?>" target="_blank" type="submit" class="btn btn-info" name="btn_reporte_linea_asg" value="asig" ><i class="fa-solid fa-print"></i></a>

                        </div>
                    </div>
    
                    <?php endwhile;
                    
                break;
            }
            break;

        //--------------------------------------------------------------------------------------------
        case 'devolucion':

            switch ($tipo) {

                case 'equipo':

                    if ($empleado) {

                        echo "<h6 class='mb-4 text text-center'>Equipos devueltos por <strong>$nombreEm</strong></h6>";
                        $equipo_asg = $connect->query("SELECT * FROM equipo_asig AS EA 
                        JOIN Asignaciones AS A ON A.ID_Asignado = EA.fkey_asig
                        JOIN detalle_equipo AS DE ON DE.ID_Detalle_Equipo = EA.fkey_equipo
                        JOIN Empleados AS EM ON EM.ID_empleado = Solicitante
                        JOIN Equipos AS EQ ON EQ.ID_Equipo = DE.FK_Equipo
                        JOIN Marcas AS M ON M.id_Marca = DE.FK_Marca
                        JOIN Modelo AS MD ON MD.ID_Modelo = DE.FK_Modelo
                        JOIN Usuarios AS U ON U.ID_usuario = A.Responsable
                        JOIN Estado_equipo AS ESS ON ESS.ID_Estado = DE.FK_Estado 
                        JOIN tipo_asignacion AS TP ON TP.ID_tipo_asig = A.tipo_asg
                        WHERE status = 2 AND ID_empleado = $empleado ;");

                    } else if ($fecha_p) {

                        echo "<h6 class='mb-4 text text-center'>Equipos devueltos del <strong>$fecha_p al $fecha_s</strong></h6>";
                        $equipo_asg = $connect->query("SELECT * FROM equipo_asig AS EA 
                        JOIN Asignaciones AS A ON A.ID_Asignado = EA.fkey_asig
                        JOIN detalle_equipo AS DE ON DE.ID_Detalle_Equipo = EA.fkey_equipo
                        JOIN Empleados AS EM ON EM.ID_empleado = Solicitante
                        JOIN Equipos AS EQ ON EQ.ID_Equipo = DE.FK_Equipo
                        JOIN Marcas AS M ON M.id_Marca = DE.FK_Marca
                        JOIN Modelo AS MD ON MD.ID_Modelo = DE.FK_Modelo
                        JOIN Usuarios AS U ON U.ID_usuario = A.Responsable
                        JOIN Estado_equipo AS ESS ON ESS.ID_Estado = DE.FK_Estado 
                        JOIN tipo_asignacion AS TP ON TP.ID_tipo_asig = A.tipo_asg
                        WHERE status = 2 AND fecha_devolucion BETWEEN '$fecha_p' AND '$fecha_s'");
                    } ?>

                    <form action="../rep/reportes.php" target="_blank" method="post">
                    <?php if ($empleado) {?>
                        <input type="hidden" value="equipo" name="tipo">   
                        <input type="hidden" value="Devolucion" name="PA">
                        <input type="hidden" value="Devolucion" name="reportee">
                        <input type="hidden" value="<?php echo $empleado; ?>" name="empleado">
                        <?php } else if ($fecha_p) { ?>
                        <input type="hidden" value="equipo" name="tipo">   
                        <input type="hidden" value="Devolucion" name="PA">
                        <input type="hidden" value="Devolucion" name="reportee">
                        <input type="hidden" value="<?php echo $fecha_p; ?>" name="fecha1">
                        <input type="hidden" value="<?php echo $fecha_s; ?>" name="fecha2">
                        <?php } ?>  
                        <div class="modal-footer" style="justify-content: left;">
                            <button type="submit" class="btn btn-success">Imprimir</button>
                        </div>
                    </form>

            <?php while ($dato = $equipo_asg->fetch_assoc()): ?>

                    <div class="alert bg-transparent" role="alert">
                        <div class="alert-content">
                            <p><?php echo $dato["N_Equipo"]." ".$dato["N_Marca"]." ".$dato["N_Modelo"]?></p>
                            <p><?php echo $dato["p_Nombre_empleado"]." ".$dato["p_Apellido_empleado"]?> </p>
                            <p><?php echo $dato["n_control_d"]?></p>

                            <?php 
                            $status = $dato["N_tipo_asig"];

                            if ($status == 'Asignacion'): ?>

                            <a href="../rep/acta_devolucion.php?rep=<?php echo $dato["ID_Equipo_asig"]?>" target="_blank" type="submit" class="btn btn-info" name="btn_reporte_equipo_pres"><i class="fa-solid fa-print"></i></a>

                            <?php elseif ($status == 'Prestamo'): ?>

                            <a href="../rep/acta_prestamo.php?rep=<?php echo $dato["ID_Equipo_asig"]?>" target="_blank" type="submit" class="btn btn-info" name="btn_reporte_equipo_pres"><i class="fa-solid fa-print"></i></a>

                            <?php endif ?>

                        </div>
                    </div>

                    <?php endwhile;
                    
                    break;
                
                case 'linea':

                    if ($empleado) {
                        
                        echo "<h6 class='mb-4 text text-center'>Lineas devueltas por <strong>$nombreEm</strong></h6>";
                        $lineas_asg = $connect->query("SELECT * FROM Lineas_asignadas AS LA
                        JOIN asig_lineas AS AL ON AL.ID_Linea_asig = LA.fkey_asig_lineas
                        JOIN Lineas AS L ON L.ID_Linea = LA.fkey_linea
                        JOIN tipo_linea AS tl ON tl.ID_tipolinea = L.FKEY_Linea
                        JOIN Operadoras AS o ON o.ID_Operadora = L.FKEY_Operadora
                        JOIN estado_linea AS e ON e.ID_Estado_linea = L.FKEY_Estado
                        JOIN Empleados AS EM ON EM.ID_empleado = AL.solicitante
                        JOIN Usuarios AS U ON U.ID_usuario = AL.responsable
                        JOIN estado_asignaciones AS EA ON EA.id_estado_asig = AL.status
                        JOIN tipo_asignacion AS TP ON TP.ID_tipo_asig = AL.tipo_asg
                        WHERE status = 2 AND ID_empleado = $empleado");

                    } else if ($fecha_p) {

                        echo "<h6 class='mb-4 text text-center'>Lineas devueltas del <strong>$fecha_p al $fecha_s</strong></h6>";
                        $lineas_asg = $connect->query("SELECT * FROM Lineas_asignadas AS LA
                        JOIN asig_lineas AS AL ON AL.ID_Linea_asig = LA.fkey_asig_lineas
                        JOIN Lineas AS L ON L.ID_Linea = LA.fkey_linea
                        JOIN tipo_linea AS tl ON tl.ID_tipolinea = L.FKEY_Linea
                        JOIN Operadoras AS o ON o.ID_Operadora = L.FKEY_Operadora
                        JOIN estado_linea AS e ON e.ID_Estado_linea = L.FKEY_Estado
                        JOIN Empleados AS EM ON EM.ID_empleado = AL.solicitante
                        JOIN Usuarios AS U ON U.ID_usuario = AL.responsable
                        JOIN estado_asignaciones AS EA ON EA.id_estado_asig = AL.status
                        JOIN tipo_asignacion AS TP ON TP.ID_tipo_asig = AL.tipo_asg
                        WHERE status = 2 AND fecha_devolucion BETWEEN '$fecha_p' and '$fecha_s'");
                    } ?>

                    <form action="../rep/reportes.php" target="_blank" method="post">
                    <?php if ($empleado) {?>
                        <input type="hidden" value="linea" name="tipo">   
                        <input type="hidden" value="Devolucion" name="PA">
                        <input type="hidden" value="Devolucion" name="reportee">
                        <input type="hidden" value="<?php echo $empleado; ?>" name="empleado">
                        <?php } else if ($fecha_p) { ?>
                        <input type="hidden" value="linea" name="tipo">   
                        <input type="hidden" value="Devolucion" name="PA">
                        <input type="hidden" value="Devolucion" name="reportee">
                        <input type="hidden" value="<?php echo $fecha_p; ?>" name="fecha1">
                        <input type="hidden" value="<?php echo $fecha_s; ?>" name="fecha2">
                        <?php } ?>  
                        <div class="modal-footer" style="justify-content: center;">
                            <button type="submit" class="btn btn-success">Imprimir</button>
                        </div>
                    </form>

                    <?php while ($dato = $lineas_asg->fetch_assoc()): ?>

                    <div class="alert bg-transparent" role="alert">
                        <div class="alert-content">
                            <p><?php echo $dato["N_tipolinea"]." ".$dato["N_Operadora"]?></p>
                            <p><?php echo $dato["p_Nombre_empleado"]." ".$dato["p_Apellido_empleado"]?> </p>
                            <p><?php echo $dato["Numero"]?></p>
                            <p><?php echo $dato["n_control_d"]?></p>

                            <?php 
                            $status = $dato["N_tipo_asig"];

                            if ($status == 'Asignacion'): ?>

                            <a href="../rep/acta_devolucion.php?sim=<?php echo $dato["ID_Linea_asig"]?>" target="_blank" type="submit" class="btn btn-info" name="btn_reporte_linea_asg" value="asig" ><i class="fa-solid fa-print"></i></a>

                            <?php elseif ($status == 'Prestamo'): ?>

                            <a href="../rep/acta_prestamo.php?sim=<?php echo $dato["ID_Linea_asig"]?>" target="_blank" type="submit" class="btn btn-info" name="btn_reporte_equipo_pres"><i class="fa-solid fa-print"></i></a>

                            <?php endif ?>

                        </div>
                    </div>
    
                    <?php endwhile;
                    
                break;
            }

            break;
    } ?>

    <script>
        setTimeout(() => {
            window.history.replaceState(null,null, window.location.pathname);
        }, 0);
    </script>
    
    <?php } ?>