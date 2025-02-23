<?php include "../../controladores/acceso/session_AC.php"; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    
<meta charset="utf-8">
<title>SIGETEL - Estados Lineas</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta content="" name="keywords">
<meta content="" name="description">
<link href="../../assets/img/FAVicon.ico" rel="icon">

</head>

<body>

<?php include "../estructura/barra_lat.php" ?>

<div class="content">

<?php include "../estructura/header.php" ?>

<div class="container-fluid pt-3 pb-4 px-4">

<div class="col-12 d-flex justify-content-center mb-3">
        
    <div class="bg-dark rounded h-100" style="width:60%;">

        <div class="col-12 d-flex justify-content-start">

        <button type="button" class="btn btn-primary me-1" data-bs-toggle="modal" data-bs-target="#estadoLinea"><i class="fa-regular fa-square-plus"></i></button>

        </div>
    
    </div>

</div>

<?php
//include "../../controladores/lineas/estadoLinea.php";
//include "../modal/registrar/lineas/estadoLinea.php";
?>

    <div class="row g-4">

        <div class="col-12 d-flex justify-content-center">
            <div class="bg-secondary rounded h-100 p-4" style="width: 60%;" >
                <h5 class="mb-4 text-center">Estados</h5>
                <div class="table-responsive">
                    <table class="table text-center" id="tabla_general" width="100%" >
                        
                        <thead class="bg-bl">
                            <tr>
                                <th class="text text-center">Estados</th>
                                <th class="text text-center">CONFIG</th>
                            </tr>
                        </thead>

                        <tbody>

                        </tbody>

                        <tfoot class="bg-bl">
                            <tr>
                                <th class="text text-center">Operadora</th>
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