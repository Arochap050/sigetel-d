<?php

if (!empty($_POST["btn_recep_equipo"])) {

    if (isset($_POST["idlinea"]) && !empty($_POST["idlinea"])&&
        isset($_POST["idlineainv"]) && !empty($_POST["idlineainv"])&&
        isset($_POST["observacion"]) && !empty($_POST["observacion"])) {
    
        if (isset($_POST["estadoinv"]) && !empty($_POST["estadoinv"])) {
    
            $lineaReincorporar = $_POST["idlinea"]; //tabla asignaciones........
            $lineadeReincorporar = $_POST["idlineainv"]; //tablainventario........
        
            //los datos que se van a actualizar de:
        
            //tabla asignaciones
            $fechaReincorporar = date("y-m-d");
            $estadoAsg = 2;
            $observacion = $_POST["observacion"];
            //tabla inventario
            $estadoInv = $_POST["estadoinv"];
            $ubicacionInv = 24;

            $devolucion_n = '0123456789';
            $control_d = substr(str_shuffle($devolucion_n), 0, 2);
            $control_ds = substr(str_shuffle($devolucion_n), 0, 6);
            $control_dev = "D-10".$control_d."-".$control_ds;
        
            $tabla_linea_asg = $connect->query("UPDATE `asig_lineas` SET `status`= $estadoAsg, estado_linea_asg = $estadoInv,`fecha_devolucion`='$fechaReincorporar', `observacion_rec` = '$observacion', `n_control_d`= '$control_dev' WHERE ID_Linea_asig = $lineaReincorporar");
        
            $tabla_linea_inv = $connect->query("UPDATE `Lineas` SET `FKEY_Estado`= $estadoInv,`FK_Ubicacion`= $ubicacionInv WHERE ID_Linea = $lineadeReincorporar");

            if ($tabla_linea_inv == 1){ ?>
    
                <script>
                    $(function notificacion(){
                        Swal.fire({
                            title: 'Linea reincorporada!',
                            //text: '',
                            icon: 'success',
                            confirmButtonText: 'Aceptar',
                            background: '#191c24',
                        })
                    })
                </script>
        
            <?php } else {
        
                echo"error al actualizar";
            }
        
        } else { ?>

        <script>
            $(function notificacion(){
                Swal.fire({
                    title: 'Campos vacios!',
                    text: 'Debe de seleccionar un estado para la linea',
                    icon: 'warning',
                    confirmButtonText: 'Aceptar',
                    background: '#191c24',
                })
            })
        </script>
    
    <?php }

} else { ?>

    <script>
        $(function notificacion(){
            Swal.fire({
                title: 'Campos vacios!',
                text: 'Por alguna razon no llego la information asegurese de completar el formulario',
                icon: 'warning',
                confirmButtonText: 'Aceptar',
                background: '#191c24',
            })
        })
    </script>

<?php } ?>

<script>

setTimeout(() => {
    window.history.replaceState(null, null, window.location.pathname);
}, 0);

</script>

<?php }