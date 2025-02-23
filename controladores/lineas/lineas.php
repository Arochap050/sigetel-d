<?php 

if (!empty($_POST["btn-linea"])) {

    if (isset($_POST["operadora"]) and !empty($_POST["operadora"]) and
        isset($_POST["t_tecnologia"]) and !empty($_POST["t_tecnologia"]) and
        isset($_POST["numero"]) and !empty($_POST["numero"]) and
        isset($_POST["codpuk"]) and !empty($_POST["codpuk"]) and
        isset($_POST["pin"]) and !empty($_POST["pin"])) {

        $operadora = $_POST["operadora"];
        $tipo = $_POST["t_tecnologia"];
        $numero = $_POST["numero"];
        $codpuk = $_POST["codpuk"];
        $pin = $_POST["pin"];
        $estado = 1;
        $ubicacion = 1;
    
        $consulta = "SELECT * FROM Lineas where Numero = '$numero';";
        $resultado = mysqli_query($connect, $consulta);
    
        if ($resultado->num_rows > 0) {?>

            <script>

                $(function notificacion(){
                        Swal.fire({
                            title: 'Hubo un error!',
                            text: 'Esta linea ya se encuentra registrada',
                            icon: 'error',
                            confirmButtonText: 'Aceptar',
                            background: '#191c24',
                    })
                })

            </script>  
    
            <?php } else {

            $sql = $connect->query("INSERT INTO `Lineas`(`FKEY_Linea`, `FKEY_Operadora`, `FKEY_Estado`,`FK_Ubicacion`, `Numero`, `Cod_puk`, `Pin`) VALUES ($tipo,$operadora,$estado,$ubicacion,'$numero','$codpuk','$pin');");
    
            if ($sql === TRUE ) { ?>

                <script>

                    $(function notificacion(){
                            Swal.fire({
                                title: 'Registrado!',
                                text: 'Linea registrada',
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
                swal.fire({
                    title: "Campos vacios",
                    text: "Debe completar todos los campos del formulario",
                    icon: "warning",
                    button: "Aceptar",
                    background:"#191c24"
                })
            })
        </script>
    
    <?php }
}

if (!empty($_POST["actualizar_linea"])) {

    if (!empty($_POST["idlinea"]) and isset($_POST["idlinea"]) and
        !empty($_POST["operadoraAct"]) and isset($_POST["operadoraAct"]) and
        !empty($_POST["tipoAct"]) and isset($_POST["tipoAct"]) and
        !empty($_POST["numeroact"]) and isset($_POST["numeroact"]) and
        !empty($_POST["codpukact"]) and isset($_POST["codpukact"]) and
        !empty($_POST["pinact"]) and isset($_POST["pinact"])) {

        $idlinea = $_POST["idlinea"];
        $operadora = $_POST["operadoraAct"];
        $tipo = $_POST["tipoAct"];
        $numero = $_POST["numeroact"];
        $cod_puk = $_POST["codpukact"];
        $pin = $_POST["pinact"];

        $consultav = "SELECT * FROM Lineas where ID_Linea = $idlinea;";
        $resultado = mysqli_query($connect, $consultav);
        $n_obtenido = $resultado->fetch_assoc();

        if ($numero == $n_obtenido["Numero"]) {

            $sql = $connect->query("UPDATE `Lineas` SET `FKEY_Linea` = $tipo, `FKEY_Operadora` = $operadora, `Numero` = '$numero', `Cod_puk` = '$cod_puk', `Pin` = '$pin' WHERE ID_Linea = $idlinea;");

            if ($sql === TRUE ) { ?>
    
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
        
            <?php }

        } else {

            $consulta = "SELECT * FROM Lineas where Numero = '$numero';";
            $resultado = mysqli_query($connect, $consulta);
        
            if ($resultado->num_rows > 0) {?>
    
                <script>
    
                    $(function notificacion(){
                            Swal.fire({
                                title: 'Hubo un error!',
                                text: 'Ya existe una linea con el numero <?php echo $numero ?> registrada, verifique e intente nuevamente.',
                                icon: 'warning',
                                confirmButtonText: 'Aceptar',
                                background: '#191c24',
                        })
                    })
    
                </script>  
        
                <?php } else {
    
                $sql = $connect->query("UPDATE `Lineas` SET `FKEY_Linea` = $tipo, `FKEY_Operadora` = $operadora, `Numero` = '$numero', `Cod_puk` = '$cod_puk', `Pin` = '$pin' WHERE ID_Linea = $idlinea;");
        
                if ($sql === TRUE ) { ?>
    
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
            
            <?php }
            }
        }
    }
}

if(!empty($_GET["id"])) {

    $id = $_GET["id"];

    try {

        $sql = $connect->query("DELETE FROM Lineas WHERE ID_Linea = $id");

        if($sql == true): ?>
    
            <script>
                $(function notificacion(){
                        Swal.fire({
                            title: 'Eliminado!',
                            text: 'Linea eliminada',
                            icon: 'success',
                            confirmButtonText: 'Aceptar',
                            background: '#191c24',
                    })
                })
            </script>
    
        <?php else: ?>
    
        <script>
            $(function notificacion(){
                swal.fire({
                    title: "Ups hubo un error al eliminar",
                    text: "",
                    icon: "warning",
                    button: "Aceptar",
                    background:"#191c24"
                })
            })
        </script>
    
    <?php endif;

        } catch (Exception $th) { ?>
    
        <script>
            $(function notificacion(){
                swal.fire({
                    title: "Error",
                    text: "No se puede eliminar debido a una restriccion de llave foranea",
                    icon: "error",
                    button: "Aceptar",
                    background:"#191c24"
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
