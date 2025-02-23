<?php include "../../controladores/acceso/session_AC.php"; ?>
<!DOCTYPE html>
<html lang="es">

<head>
<meta charset="utf-8">
<title>SIGETEL - Modelos</title>
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

<div class="container-fluid pt-3 px-4">

<button type="button" id="registrar_modelo" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#modelo_modal"><i class="fa-regular fa-square-plus"></i></button>

    <div class="row g-4">
        
        <div class="col-12 ">

        <?php include "../modal/equipos/modelo.php"; ?>

            <div class="bg-secondary rounded h-100 p-4"  style="width:100%;" >

            <h5 class="mb-3 text-center">Modelos</h5>

                <div class="table-responsive">

                <table class="table table-striped table-hover text-center w-100" id="tabla_modelo">
                        
                    <thead class="bg-bl" >

                        <tr>
                            <th class="text-center">Marca</th>
                            <th class="text-center">Equipo</th>
                            <th class="text-center">Modelo</th>
                            <th class="text-center">CONFIG</th>
                        </tr>

                    </thead>
                        
                    <tbody>

                    </tbody>

                    <tfoot class="bg-bl" >

                        <tr>
                            <th class="text-center">Marca</th>
                            <th class="text-center">Equipo</th>
                            <th class="text-center">Modelo</th>
                            <th class="text-center">CONFIG</th>
                        </tr>

                    </tfoot>    
                        
                </table>

                </div>

            </div>

        </div>

        <div class="col-12">
        
    </div>
    
</div>

</div>

<?php include "../estructura/footer.php" ?>

</div>

<script src="../../assets/js/modulos/equipos/modelos.js"></script>

</body>

</html>