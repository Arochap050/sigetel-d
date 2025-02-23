<?php include "../../controladores/acceso/session_AC.php"; ?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="utf-8">
<title>SIGETEL - Gerencias</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta content="" name="keywords">
<meta content="" name="description">
<!-- Favicon -->
<link href="../../assets/img/FAVicon.ico" rel="icon">

</head>

<body>

<?php include "../estructura/barra_lat.php" ?>

<div class="content">

<?php include "../estructura/header.php" ?>

<div class="container-fluid pt-3 pb-3 px-4">

    <div class="col-12 d-flex justify-content-center mb-3">
        
        <div class="bg-dark rounded h-100" style="width:60%;">

            <div class="col-12 d-flex justify-content-start">

                <button type="button" class="btn btn-primary me-1" data-bs-toggle="modal" data-bs-target="#registrogerencia"><i class="fa-regular fa-square-plus"></i></button>

            </div>
        
        </div>

    </div>

    <div class="row g-4">

        <div class="col-12 d-flex justify-content-center">

            <?php
                include "../../controladores/administracion/gerencias.php";
                include "../modal/registrar/administracion/gerencia.php";
            ?>

            <div class="bg-secondary rounded h-100 p-4" style="width: 60%;" >
                <h5 class="mb-4 text-center">Gerencias</h5>
                <div class="table-responsive">
                    <table class="table" id="tabla_general" width="100%" >
                        
                        <thead class="bg-bl">
                            <tr>
                                <th scope="col">Gerencia</th>
                                <th class="text-center">CONFIG</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php

                            include "../../BD/consultas/administracion.php";

                            while($gerencia = $tabla_gerencias->fetch_assoc()): ?>
                            <tr>
                                <td class="pt-4"><?php echo $gerencia["N_gerencia"] ?></td>

                                <td class="text-center p-3">

                                    <button type="button" class="btn btn-small btn-primary mt-1 mb-1" data-bs-toggle="modal" data-bs-target="#actualizargerencia<?php echo $gerencia["ID_gerencia"] ?>" ><i class="fa-regular fa-pen-to-square"></i></button>

                                    <?php include "../modal/actualizar/administracion/gerencia.php" ?>

                                    <a class="btn btn-small btn-warning" onclick="eliminar_registro(event)" href="gerencias.php?id=<?php echo $gerencia["ID_gerencia"] ?>"><i class="fa-solid fa-trash"></i></a>

                                </td>

                            </tr>

                            <?php endwhile ?>

                        </tbody>

                        <tfoot class="bg-bl">
                            
                            <tr>
                                <th scope="col">Gerencia</th>
                                <th class="text-center">CONFIG</th>
                            </tr>

                        </tfoot>

                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include "../estructura/footer.php" ?>

</div>

</div>

</body>

</html>