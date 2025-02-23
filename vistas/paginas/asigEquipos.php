<?php include "../../controladores/acceso/session_AC.php"; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    
    <meta charset="utf-8">
    <title>SIGETEL - Asignaciones Equipos</title>
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

            <h5 class="mb-4 text-center">Asignar Equipos</h5>

            <nav>

            <div class="nav nav-tabs mb-4" id="nav-tab" role="tablist">

                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Asignados</button>

                <button class="nav-link" id="equipo-disponible" data-bs-toggle="tab" data-bs-target="#nav-equipos-dis" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Disponibles</button>

                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Devueltos</button>

            </div>

            </nav>

<div class="tab-content" id="nav-tabContent">

<!---------------------------------tablas de equipos asignados----------------------------->

<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

    <table class="table text-left table-striped table-hover" id="tabla_equipo_asg_pres" width = "100%">
            
        <thead class="bg-bl">

            <tr>

                <th>Marca</th>
                <th>Equipo</th>
                <th>Modelo</th>
                <th>Usuario</th>
                <th>Status</th>
                <th style="text-align: center;">Fecha de entrega</th>
                <th class="text text-center">Foto</th>
                <th class="text-center">CONFIG</th>

            </tr>

        </thead>
            
        <tbody>
        </tbody>
        
        <tfoot class="bg-bl">

            <tr>

                <th>Marca</th>
                <th>Equipo</th>
                <th>Modelo</th>
                <th>Usuario</th>
                <th>Status</th>
                <th style="text-align: center;">Fecha de entrega</th>
                <th class="text text-center">Foto</th>
                <th class="text-center">CONFIG</th>

            </tr>

        </tfoot>

    </table>

</div>

<!-- -------------------------------Equipos disponibles ------------------------------------------------------>

<div class="tab-pane fade" id="nav-equipos-dis" role="tabpanel" aria-labelledby="equipo-disponible">

    <table class="table text-left table-striped table-hover" id="tabla_asignaciones_eq" width = "100%">
            
        <thead class="bg-bl" >
            <tr>

                <th>Marca</th>
                <th>Equipo</th>
                <th>Modelo</th>
                <th class="text text-center">Bien Nacional</th>
                <th class="text text-center">Foto</th>
                <th class="text-center">CONFIG</th>

            </tr>

        </thead>
            
        <tbody> 
        </tbody>

        <tfoot class="bg-bl" >

            <tr>

                <th>Marca</th>
                <th>Equipo</th>
                <th>Modelo</th>
                <th class="text text-center">Bien Nacional</th>
                <th class="text text-center">Foto</th>
                <th class="text-center">CONFIG</th>

            </tr>

        </tfoot>

    </table>

</div>

<!--------------------------tablas de equipos reincorporados----------------------->

<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
    
    <table class="table text-left table-striped table-hover" id="tabla_equipo_dev" width = "100%">
        
        <thead class="bg-bl">

            <tr>
                <th>Marca</th>
                <th>Equipo</th>
                <th>Modelo</th>
                <th>Usuario</th>
                <th style="text-align: center;">Fecha de entrega</th>
                <th style="text-align: center;">Fecha de recepcion</th>
                <th style="text-align: center;">Tipo</th>
                <th class="text text-center">Foto</th>
                <th class="text-center">INFO</th>
            </tr>

        </thead>
            
        <tbody>
        </tbody>
        
        <tfoot class="bg-bl">

            <tr>
                <th>Marca</th>
                <th>Equipo</th>
                <th>Modelo</th>
                <th>Usuario</th>
                <th style="text-align: center;">Fecha de entrega</th>
                <th style="text-align: center;">Fecha de recepcion</th>
                <th style="text-align: center;">Tipo</th>
                <th class="text text-center">Foto</th>
                <th class="text-center">INFO</th>
            </tr>

        </tfoot>

    </table>

</div>

</div>

</div>

</div>

<?php
include "../modal/asignaciones/equipos/asignar.php"; 
include "../modal/asignaciones/equipos/info.php";
include "../modal/asignaciones/equipos/recepcion.php";
?>

</div>

<?php include "../estructura/footer.php" ?>

<script src="../../assets/js/modulos/asignaciones/asignaciones-equipos.js"></script>

</div>

</div>

</body>

</html>