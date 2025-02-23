<?php

/* ------------------------------- Registrar estatus de linea --------------------------------- */

if (!empty($_POST["btn_registrar_estado_l"])) {

    if (isset($_POST["statusR"]) && !empty($_POST["statusR"])) {

        $estadoLinea = $_POST["statusR"];
   
        $consulta = "SELECT * FROM estado_linea where N_estado_linea = '$estadoLinea';";

        $resultado = mysqli_query($connect, $consulta);
   
        if ($resultado->num_rows > 0) { ?>

           <script>
               $(function notificacion(){
                   swal.fire({
                       title: "Estado de línea ya regsitrado",
                       text: "Este esatdo de linea ya esta registrado registrado",
                       icon: "warning",
                       button: "Aceptar",
                       background:"#191c24"
                   })
               })
           </script>
   
       <?php } else {
   
           $registro = "INSERT INTO estado_linea (`N_estado_linea`) VALUES ('$estadoLinea');";
   
            if ($connect->query($registro) === TRUE) {?>

               <script>
                   $(function notificacion(){
                       swal.fire({
                           title: "Registrado",
                           text: "Estado de Línea agregado con éxito",
                           icon: "success",
                           button: "Aceptar",
                           background:"#191c24"
                       })
                   })
               </script>   
                    
               <?php        
            }
       }
   
   } else { ?>

    <script>
        $(function notificacion(){
            swal.fire({
                title: "Campos vacios",
                text: "Debe completar todos los campos del formulario",
                icon: "warning",
                button: "Aceptar",
                background:"#191c24"
            })
        })
    </script>

<?php } ?>

   <script>
           
           setTimeout(() => {
               window.history.replaceState(null,null, window.location.pathname);
           }, 0);
   
   </script>
   
   <?php }


/* ------------------------------- Actualizar estatus de linea --------------------------------- */


if (!empty($_POST["btn_act_estado_l"])) {

    if (isset($_POST["idestado"]) and !empty($_POST["idestado"]) &&
        isset($_POST["status"]) and !empty($_POST["status"])) {

        $id=$_POST["idestado"];
        $newStatus=$_POST["status"];

        $sql = $connect->query(" UPDATE estado_linea SET N_estado_linea = '$newStatus' WHERE ID_Estado_linea = $id ");

        if ($sql == 1){?>

            <script>
                $(function notificacion(){
                    Swal.fire({
                        title: "Actualizado",
                        text: "Registro actualizado con exito",
                        icon: "success",
                        confirmButtonText: "Aceptar",
                        background:"#191c24"
                    })
                })
            </script>
        
    <?php } else {

            echo"error al actualizar";

        }

    } else { ?>

        <script>
            $(function notificacion(){
                swal.fire({
                    title: "Campos vacios",
                    text: "Debe completar todos los campos del formulario",
                    icon: "warning",
                    button: "Aceptar",
                    background:"#191c24"
                })
            })
        </script>
    
    <?php } ?>

<script>
        
        setTimeout(() => {
            window.history.replaceState(null,null, window.location.pathname);
        }, 0);

</script>

<?php }


/* ------------------------------- Eliminar estatus de linea --------------------------------- */


if(!empty($_GET["id"])) {

    $id=$_GET["id"];

    try {
        
        $sql = $connect->query("DELETE FROM estado_linea WHERE ID_Estado_linea = $id");

        if($sql > 0){?>
            
            <script>
                $(function notificacion(){
                    Swal.fire({
                        title: "Eliminado",
                        text: "Registro eliminado correctamente",
                        icon: "success",
                        confirmButtonText: "Aceptar",
                        background: '#191c24'
                    })
                })
            </script>
            
            <?php } else {
            
            echo '<script>alert("no se puede eliminar")
                                window.location="../../vistas/paginas/estadoLinea.php"</script>';
        }

    } catch (Exception $th) {?> 

        <script>
            $(function notificacion(){
                Swal.fire({
                    title: "Error del servidort",
                    text: "No se pudo eliminar debido a una restriccion de llave foranea",
                    icon: "error",
                    confirmButtonText: "Aceptar",
                    background: '#191c24'
                })
            })
        </script>
        
        <?php } ?>

<script>

setTimeout(() => {
    window.history.replaceState(null,null, window.location.pathname);
}, 0);

</script>

<?php
}