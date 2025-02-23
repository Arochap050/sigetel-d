<?php

/*---------------------------- registro --------------------------*/

if (!empty($_POST["btn_cargo_r"])) {
    
    if (isset($_POST["cargo"]) && !empty($_POST["cargo"])) {
            
        $cargo = $_POST["cargo"];
        $division = $_POST["division_r"];

        $sql ="SELECT * FROM Cargos WHERE N_cargo = '$cargo'";

        $resultado = $connect->query($sql);
        if ($resultado ->num_rows > 0) {?>
    
            <script>
                $(function notificacion(){
                        Swal.fire({
                            title: 'Hubo un error!',
                            text: 'Este cargo ya se encuentra registrado',
                            icon: 'warning',
                            confirmButtonText: 'Aceptar',
                            background: '#191c24',
                    })
                })
            </script>  
    
            <?php } else {
            
            $sql = "INSERT INTO Cargos (`N_cargo`,`FKEY_division`) VALUES ('$cargo', '$division');";
            
            if ($connect->query($sql) === TRUE) {?>
    
                <script>
                    $(function notificacion(){
                            Swal.fire({
                                title: 'Registrado!',
                                text: 'Cargo registrado',
                                icon: 'success',
                                confirmButtonText: 'Aceptar',
                                background: '#191c24',
                        })
                    })
                </script>  
        
                <?php }
        }

    } else {?>

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


/* ------------------------------  actualizar ----------------------------- */


if (!empty($_POST["btn_cargo_a"])) {
    
    if (isset($_POST["idcargoact"]) && !empty($_POST["idcargoact"]) &&
        isset($_POST["cargoact"]) && !empty($_POST["cargoact"])) {

        $idcargo = $_POST["idcargoact"];
        $cargoact = $_POST["cargoact"];
        $division = $_POST["division_act"];

        $sql = $connect->query("UPDATE Cargos SET N_cargo = '$cargoact', FKEY_division = '$division' WHERE ID_cargo = $idcargo");
    
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

    } else {?>

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

<?php }?>

<script>

    setTimeout(() => {
        window.history.replaceState(null, null, window.location.pathname);
    }, 0);

</script>

<?php }


/* ------------------------------  eliminarr ----------------------------- */


if(!empty($_GET["id"])) {

$idd = $_GET["id"];

try {

    $sql = $connect->query("DELETE FROM Cargos WHERE ID_cargo = $idd");

    if($sql > 0) { ?>

        <script>
            $(function notificacion(){
                Swal.fire({
                    title: 'Eliminado!',
                    text: 'Cargo eliminado',
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