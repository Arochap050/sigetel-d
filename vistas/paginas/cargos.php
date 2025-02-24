<?php include "../../controladores/acceso/session_AC.php"; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    
<meta charset="utf-8">
<title>SIGETEL - Cargos</title>
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

            <div class="bg-dark rounded h-100" style="width:90%;">

                <div class="col-12 d-flex justify-content-start">

                <button type="button" class="btn btn-primary me-1" data-bs-toggle="modal" data-bs-target="#modal_cargo"><i class="fa-regular fa-square-plus"></i></button>

                </div>
            
            </div>

        </div>

         <div class="row g-4">
     
            <div class="col-12 d-flex justify-content-center">

            <?php
                //clude "../../controladores/administracion/cargos.php";
                include "../modal/administracion/cargo.php";
            ?>

                 <div class="bg-secondary rounded h-100 p-4" style="width:90%;">

                     <h5 class="mb-4 text-center">Cargos</h5>

                     <div class="table-responsive">

                         <table class="table table-striped table-hover" id="tabla_cargos" width="100%">
                             
                             <thead class="bg-bl">
                                 <tr>
                                    <th>Gerencia</th>
                                    <th>Division</th>
                                    <th>Cargo</th>
                                    <th>CONFIG</th>
                                 </tr>
                             </thead>
     
                             <tbody>
                             </tbody>

                             <tfoot class="bg-bl">
                                <tr>
                                    <th>Gerencia</th>
                                    <th>Division</th>
                                    <th>Cargo</th>
                                    <th>CONFIG</th>
                                </tr>
                             </tfoot>

                         </table>
     
                     </div>

                 </div>

             </div>

         </div>

     </div>

<?php include "../estructura/footer.php" ?>
<script src="../../assets/js/modulos/administracion/cargos.js"></script>

</div>


</div>

</body>

</html>