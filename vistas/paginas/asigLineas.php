<?php include "../../controladores/acceso/session_AC.php"; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    
    <meta charset="utf-8">
    <title>SIGETEL - Asignaciones Lineas</title>
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

    <div class="col-sm-12 col-xl-6">

        <div class="bg-secondary rounded h-100 p-4">

            <h5 class="mb-4 text-center">Asignar Lineas</h5>

            <nav>

            <div class="nav nav-tabs" id="nav-tab" role="tablist">

                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Asignados</button>

                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Disponibles</button>

                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Devueltos</button>

            </div>

            </nav>

            <div class="tab-content" id="nav-tabContent">

                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

<!--------------------------- tabla de lineas asignadas ---------------------------------------->

                <table class="table" id="tabla_linas_asg_pres" >

                    <thead class="bg-bl">

                        <tr>

                            <th>Linea</th>
                            <th>Operadora</th>
                            <th style="text-align: left;">Nùmero</th>
                            <th>Usuario</th>
                            <th>Estado</th>
                            <th style="text-align: center;">Fecha de entrega</th>
                            <th style="text-align: center;">CONFIG</th>

                        </tr>

                    </thead>

                    <tbody>

                    </tbody>

                    <tfoot class="bg-bl">
                        <tr>
                            <th>Linea</th>
                            <th>Operadora</th>
                            <th style="text-align: left;">Nùmero</th>
                            <th>Usuario</th>
                            <th>Estado</th>
                            <th style="text-align: center;">Fecha de entrega</th>
                            <th style="text-align: center;">CONFIG</th>
                        </tr>
                    </tfoot>

                 </table>

<!--------------------------- tabla de lineas asignadas fin------------------------------------------->


                </div>

                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

<!------------------------------- tabla de lineas disponibles ------------------------------------------------>
                 <table class="table" id="tabla_asignaciones_li">

                    <thead class="bg-bl">
                        <tr>
                            <th>Linea</th>
                            <th>Operadora</th>
                            <th style="text-align: left;">Nùmero</th>
                            <th>Estado</th>
                            <th class="text-center">CONFIG</th>
                        </tr>
                    </thead>

                    <tbody>        
                    </tbody>

                    <tfoot class="bg-bl">
                        <tr>
                            <th>Linea</th>
                            <th>Operadora</th>
                            <th style="text-align: left;">Nùmero</th>
                            <th>Estado</th>
                            <th class="text-center">CONFIG</th>
                        </tr>
                    </tfoot>

                 </table>

                </div>

                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">

<!------------------------------- tabla de lineas devueltas------------------------------------------->

                <table class="table" id="tabla_lineas_dev">

                    <thead class="bg-bl">

                        <tr>

                            <th>Linea</th>
                            <th>Operadora</th>
                            <th style="text-align: left;">Nùmero</th>
                            <th>Usuario</th>
                            <th style="text-align: center;">Fecha de entrega</th>
                            <th style="text-align: center;">Fecha de recepcion</th>
                            <th style="text-align: center;">CONFIG</th>

                        </tr>

                    </thead>

                    <tbody>

 
                    </tbody>

                    <tfoot class="bg-bl">
                        <tr>
                            <th>Linea</th>
                            <th>Operadora</th>
                            <th style="text-align: left;">Nùmero</th>
                            <th>Usuario</th>
                            <th style="text-align: center;">Fecha de entrega</th>
                            <th style="text-align: center;">Fecha de recepcion</th>
                            <th style="text-align: center;">CONFIG</th>
                        </tr>
                    </tfoot>

                    </table>
<!------------------------------- tabla de lineas devueltas fin------------------------------------------->
                </div>

            </div>

        </div>

    </div>

<?php 
include "../modal/asignaciones/lineas/asignar.php"; 
include "../modal/asignaciones/lineas/info.php";
include "../modal/asignaciones/lineas/recepcion.php";
?>

</div>
<!-- Table End -->
<?php include "../estructura/footer.php" ?>

<script src="../../assets/js/modulos/asignaciones/asignaciones-lineas.js"></script>

</div>

</div>

</body>

</html>