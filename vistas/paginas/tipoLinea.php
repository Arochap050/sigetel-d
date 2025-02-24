<?php include "../../controladores/acceso/session_AC.php"; ?>

<!DOCTYPE html>
<html lang="es">

<head>
    
    <meta charset="utf-8">
    <title>SIGETEL - Tipo de linea</title>
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

<div class="container-fluid pt-4 pb-4 px-4">


<div class="col-12 d-flex justify-content-center mb-3">
    
    <div class="bg-dark rounded h-100" style="width:60%;">

        <div class="col-12 d-flex justify-content-start">

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registrotipolinea"><i class="fa-regular fa-square-plus"></i></button>

        </div>
    
    </div>

</div>

    <div class="row g-4">

        <div class="col-12 d-flex justify-content-center">

            <?php
                include "../modal/lineas/tiposlineas.php";
            ?>
            
            <div class="bg-secondary rounded h-100 p-4" style="width: 60%;">

                <h5 class="mb-4 text-center">Tipos de lineas</h5>

                <div class="table-responsive">

                    <table class="table text-center table-striped table-hover" id="tabla_general" width="100%" >

                        <thead class="bg-bl">
                            <tr>
                                <th class="text text-center">Tipo</th>
                                <th class="text text-center">Operadora</th>
                                <th class="text text-center">CONFIG</th>
                            </tr>
                        </thead>

                        <tbody>


                        </tbody>

                        <tfoot class="bg-bl">

                            <tr>
                                <th class="text text-center" scope="col">Tipo</th>
                                <th class="text text-center" scope="col">Operadora</th>
                                <th class="text text-center">CONFIG</th>
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