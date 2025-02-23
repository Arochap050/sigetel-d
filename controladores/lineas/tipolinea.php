<?php 

if (!empty($_POST["btntipolinea"])) {
    
    if (isset($_POST["Operadora"]) && !empty($_POST["Operadora"]) &&
        isset($_POST["tipolinea"]) && !empty($_POST["tipolinea"])) {
    
    $operadora = $_POST["Operadora"];
    $tipoLinea = $_POST["tipolinea"];

    $sql ="SELECT * FROM tipo_linea WHERE N_tipolinea = '$tipoLinea'";

    $resultado = $connect->query($sql);

    if ($resultado ->num_rows > 0) {?>

        <script>
            $(function notificacion(){
                swal.fire({
                    title: "Tipo de línea ya regsitrado",
                    text: "Este tipo de línea ya se encuentra registrado",
                    icon: "warning",
                    button: "Aceptar",
                    background:"#191c24"
                })
            })
        </script>

    <?php } else {
        //
        $sql = "INSERT INTO tipo_linea (`N_tipolinea`,`FK_operadora`) VALUES ('$tipoLinea', $operadora);";
        
        if ($connect->query($sql) === TRUE) {?>

        <script>
            $(function notificacion(){
                swal.fire({
                    title: "Tipo de Línea",
                    text: "Tipo de Línea agregado con éxito",
                    icon: "success",
                    button: "Aceptar",
                    background:"#191c24"
                })
            })
        </script>   
             
        <?php }
    }
}?>

<script>
        
        setTimeout(() => {
            window.history.replaceState(null,null, window.location.pathname);
        }, 0);

</script>

<?php }



if (!empty($_POST["btn_act_tipo_linea"])) {

    if (isset($_POST["idtipolinea"]) and !empty($_POST["idtipolinea"]) && 
        isset($_POST["Operadora"]) and !empty($_POST["Operadora"]) &&   
        isset($_POST["tipolinea"]) and !empty($_POST["tipolinea"]) ) 

{

    $id=$_POST["idtipolinea"];
    $operadora=$_POST["Operadora"];
    $tipolinea=$_POST["tipolinea"];

    $sql = $connect->query(" UPDATE tipo_linea SET N_tipolinea = '$tipolinea', FK_operadora = $operadora WHERE ID_tipolinea = $id ");

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

    <?php } else {?> 

    <script>
        $(function notificacion(){
            Swal.fire({
                title: "Tipo de linea",
                text: "Error al actualizar tipo de linea",
                icon: "error",
                confirmButtonText: "Aceptar",
                background:"#191c24"
            })
        })
    </script>

    <?php } ?>

        <script>
            setTimeout(() => {
                window.history.replaceState(null,null, window.location.href)
            }, 0);
        </script>

<?php }

}


if(!empty($_GET["id"])) {

$id = $_GET["id"];
    
try {
       
    $sql = $connect->query("DELETE FROM tipo_linea WHERE ID_tipolinea = $id");

    if($sql > 0){?>
        
        <script>
            $(function notificacion(){
                Swal.fire({
                    title: "Tipo de linea eliminado",
                    text: "Se ha eliminado el tipo de linea correctamente",
                    icon: "success",
                    confirmButtonText: "Aceptar",
                    background: '#191c24'
                })
            })
        </script>
        
        <?php } else {?> 
            <script>
                $(function notificacion(){
                    Swal.fire({
                        title: "Error al eliminar tipo de linea",
                        text: "No se pudo eliminar el tipo de linea",
                        icon: "error",
                        confirmButtonText: "Aceptar",
                        background: '#191c24'
                    })
                })
            </script>

            <?php }
        
} catch (Exception $e) {?> 

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

<?php } ?>