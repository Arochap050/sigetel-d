<?php

/*------------------------------- Registrar operadora --------------------------------------- */


if (!empty($_POST["btnoperadora"])) {
    
    if (isset($_POST["operadora"]) && !empty($_POST["operadora"])) {

        $operadora = $_POST["operadora"];
    
        $consulta = "SELECT * FROM Operadoras where N_Operadora = '$operadora';";
        $resultado = mysqli_query($connect, $consulta);
    
        if ($resultado->num_rows > 0) {?>
    
            <script>
                $(function notificacion(){
                        Swal.fire({
                            title: 'Hubo un error!',
                            text: 'Esta operadora ya se encuentra registrada',
                            icon: 'error',
                            confirmButtonText: 'Aceptar',
                            background: '#191c24',
                    })
                })
            </script>  
    
            <?php } else {
    
            $registro = "INSERT INTO Operadoras (`N_Operadora`) VALUES ('$operadora');";
    
            if ($connect->query($registro) === TRUE) {?>
    
                <script>
                    $(function notificacion(){
                            Swal.fire({
                                title: 'Registrado!',
                                text: 'Operadora registrada',
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
            window.history.replaceState(null,null, window.location.pathname);
        }, 0);
    </script>
    
    <?php } else {
    
        echo "no se ingreso nada";
    }

} 


/*------------------------------- Actualizar operadora --------------------------------------- */

if (!empty($_POST["btnActoperadora"])) {
    
    if (isset($_POST["idoperadora"]) and !empty($_POST["idoperadora"]) &&
    isset($_POST["operadora"]) and !empty($_POST["operadora"]) ) 

{
    
    $id=$_POST["idoperadora"];
    $operadora=$_POST["operadora"];

   // echo $gerencia;

    $sql = $connect->query(" UPDATE Operadoras SET N_Operadora = '$operadora' WHERE ID_Operadora = $id ");

    if ($sql == 1){?>
  
        <script>
            $(function notificacion(){
                    Swal.fire({
                        title: 'Actualizado!',
                        text: 'Registro actualizado',
                        icon: 'success',
                        confirmButtonText: 'Aceptar',
                        background: '#191c24',
                })
            })
        </script>

  <?php  } else {

        echo"error al actualizar";

    }
} else {

        echo "campos vacios";

}?>

<script>
    setTimeout(() => {
        window.history.replaceState(null,null, window.location.pathname);
    }, 0);
</script>

<?php } 


/*------------------------------- Eliminar operadora --------------------------------------- */


if(!empty($_GET["id"])) {

$id=$_GET["id"];

$sql = $connect->query("DELETE FROM Operadoras WHERE ID_Operadora = $id");

if($sql > 0){?>

    <script>
        $(function notificacion(){
            Swal.fire({
                title: 'Eliminado!',
                text: 'Operadora eliminada',
                icon: 'success',
                confirmButtonText: 'Aceptar',
                background: '#191c24',
            })
        })
    </script>

<?php } else {
    
    //echo '<script>alert("no se puede eliminar")
                       // window.location="../../vistas/paginas/operadoras.php"</script>';
}?>

<script>
setTimeout(() => {
    window.history.replaceState(null,null, window.location.pathname);
}, 0);
</script>

<?php } 
