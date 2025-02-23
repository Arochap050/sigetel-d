<?php

/* ------------------------- Registrar division ---------------------------------- */

if (!empty($_POST["btn_divisiones"])) {

    if (isset($_POST["gerencia"]) && !empty($_POST["gerencia"]) &&
        isset($_POST["division"]) && !empty($_POST["division"])) {
    
    $gerencia = $_POST["gerencia"];
    $division = $_POST["division"];

    $sql ="SELECT * FROM Divisiones WHERE N_division = '$division'";

    $resultado = $connect->query($sql);
    // Se verifica que la marca que se esta ingreasando no se encuentre registrada
    if ($resultado ->num_rows > 0) {?>

        <script>
            $(function notificacion(){
                    Swal.fire({
                        title: 'Hubo un error!',
                        text: 'Esta division ya se encuentra registrada',
                        icon: 'warning',
                        confirmButtonText: 'Aceptar',
                        background: '#191c24',
                })
            })
        </script>  

        <?php } else {
        
        $sql = "INSERT INTO Divisiones (`N_division`,`FKEY_gerencia`) VALUES ('$division', $gerencia);";
        
        if ($connect->query($sql) === TRUE) {?>

            <script>
                $(function notificacion(){
                        Swal.fire({
                            title: 'Registrado!',
                            text: 'Divisiòn registrada',
                            icon: 'success',
                            confirmButtonText: 'Aceptar',
                            background: '#191c24',
                    })
                })
            </script>  
    
            <?php }
    }

} else { ?>

    <script>
        $(function notificacion(){
            Swal.fire({
                title: 'Campos vacios!',
                text: 'Debe de completar el formulario',
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


/* ------------------------- Actualizar division ---------------------------------- */

    
if (!empty($_POST["btn_actualizar"])){

    if (isset($_POST["idDivision"]) and !empty($_POST["idDivision"]) && 
    isset($_POST["divisionact"]) and !empty($_POST["divisionact"]) && 
    isset($_POST["gerenciaact"]) and !empty($_POST["gerenciaact"]) ) 
    
    {
    
        $id=$_POST["idDivision"];
        $gerencia=$_POST["gerenciaact"];
        $division=$_POST["divisionact"];
    
       // echo $gerencia;
    
        $sql = $connect->query(" UPDATE Divisiones SET N_division = '$division', FKEY_gerencia = $gerencia WHERE ID_division = $id ");
    
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
    
        <?php } else {
    
            echo"error al actualizar";
    
        }

    } else { ?>

        <script>
            $(function notificacion(){
                Swal.fire({
                    title: 'Campos vacios!',
                    text: 'Debe de completar el formulario',
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


/* ------------------------- Eliminar division ---------------------------------- */


if(!empty($_GET["id"])) {

    $idd = $_GET["id"];
    
    try {
    
        $sql = $connect->query("DELETE FROM Divisiones WHERE ID_division = $idd");
    
        if($sql > 0) { ?>
    
            <script>
                $(function notificacion(){
                    Swal.fire({
                        title: 'Eliminado!',
                        text: 'Division eliminada',
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