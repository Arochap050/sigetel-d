<?php 

/* ------------------------- Registrar gerencia ---------------------------------- */

if (!empty($_POST["btn_registrar_gerencia"])) {

    if (isset($_POST["gerencia"])) {
    
        $gerencia = $_POST["gerencia"];
    
        $sql ="SELECT * FROM Gerencia WHERE N_gerencia = '$gerencia'";
        $resultado = $connect->query($sql);
        // Se verifica que la marca que se esta ingreasando no se encuentre registrada
        if ($resultado ->num_rows > 0) {?>
    
            <script>
                $(function notificacion(){
                        Swal.fire({
                            title: 'Hubo un error!',
                            text: 'Esta gerencia ya se encuentra registrada',
                            icon: 'warning',
                            confirmButtonText: 'Aceptar',
                            background: '#191c24',
                    })
                })
            </script>  
    
            <?php } else {

            $sql = "INSERT INTO Gerencia (`N_gerencia`) VALUES ('$gerencia');";
            
            if ($connect->query($sql) === TRUE) {?>
    
                <script>
                    $(function notificacion(){
                            Swal.fire({
                                title: 'Registrado!',
                                text: 'Gerencia registrada',
                                icon: 'success',
                                confirmButtonText: 'Aceptar',
                                background: '#191c24',
                        })
                    })
                </script>  
        
                <?php }
        } ?>
    
        <script>
            setTimeout(() => {
                window.history.replaceState(null, null, window.location.pathname);
            }, 0);
        </script>
    
<?php }
    
}


/* ------------------------- Actualizar gerencia ---------------------------------- */

if (!empty($_POST["btn_actualizar_gerencia"])) {
 
    if(isset($_POST["gerenciaid"]) and !empty($_POST["gerenciaid"]) && 
    isset($_POST["Actgerencia"]) and !empty($_POST["Actgerencia"]) ) 
    
    {
        
        $idact=$_POST["gerenciaid"];
        $gerencia=$_POST["Actgerencia"];
    
        $sql=$connect->query(" UPDATE Gerencia SET N_gerencia='$gerencia' WHERE ID_gerencia = $idact ");
    
        if ($sql == 1){ ?>
    
            <script>
                $(function notificacion(){
                    Swal.fire({
                        title: 'Actualizado!',
                        text: 'Registro actualizado de forma correcta',
                        icon: 'success',
                        confirmButtonText: 'Aceptar',
                        background: '#191c24',
                    })
                })
            </script>
    
        <?php } else { ?>
    
    <script>
        $(function notificacion(){
            Swal.fire({
                title: 'Hubo un error!',
                text: 'No se pudo eliminar',
                icon: 'error',
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
    
    <?php } else {
    
            //echo "campos vacios";
    
    }
}

/* ------------------------- Eliminar gerencia ---------------------------------- */


if(!empty($_GET["id"])) {

    $idd = $_GET["id"];
    
    try {

        $sql = $connect->query("DELETE FROM Gerencia WHERE ID_gerencia = $idd");

        if($sql > 0) { ?>

            <script>
                $(function notificacion(){
                    Swal.fire({
                        title: 'Eliminado!',
                        text: 'Gerencia eliminado',
                        icon: 'success',
                        confirmButtonText: 'Aceptar',
                        background: '#191c24',
                    })
                })
            </script>

        <?php } else { ?>

            <script>
                $(function notificacion(){
                    Swal.fire({
                        title: 'Hubo un error!',
                        text: 'No se pudo eliminar',
                        icon: 'error',
                        confirmButtonText: 'Aceptar',
                        background: '#191c24',
                    })
                })
            </script>

        <?php }

    } catch (Exception $e) { ?>

        <script>
            $(function notificacion(){
                Swal.fire({
                    title: 'Error del servidor!',
                    text: 'No se pudo eliminar debido a una restricción de clave foránea.',
                    icon: 'error',
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

<?php } ?>