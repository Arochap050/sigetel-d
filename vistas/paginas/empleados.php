<?php include "../../controladores/acceso/session_T.php"; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    
<meta charset="utf-8">
<title>SIGETEL - Empleados</title>
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

<?php if ($rol == 'Administrador'): ?>

<button type="button" id="registroempleado" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#modalEmpleado"><i class="fa-solid fa-user-plus"></i></button>

<?php elseif ($rol == 'Coordinador'): ?>

<button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#registroEmpleado"><i class="fa-solid fa-user-plus"></i></button>

<?php endif ?>

    <div class="row g-4">

        <div class="col-12">

        <?php include "../modal/administracion/empleados.php"; ?>

            <div class="bg-secondary rounded h-100 p-4">

                <h5 class="mb-4 text-center">Empleados</h5>

                <div class="table-responsive">

                <?php if ($rol == 'Tecnico'): ?>
                    <table class="table table-striped table-hover" id="tabla_empleados_t" >
                        <thead class="bg-bl" >
                            <tr>
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellidos</th>
                                <th style="text-align: left;" scope="col">Cedula</th>
                                <th scope="col">Gerencia</th>
                                <th scope="col">Divisiòn</th>
                                <th scope="col">Cargo</th>
                                <th scope="col">Correo</th>
                                <th>Foto</th>
                            </tr>
                        </thead>

                        <tbody>
                        </tbody>
                            
                        <tfoot class="bg-bl" >
                            <tr>
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellidos</th>
                                <th style="text-align: left;" scope="col">Cedula</th>
                                <th scope="col">Gerencia</th>
                                <th scope="col">Divisiòn</th>
                                <th scope="col">Cargo</th>
                                <th scope="col">Correo</th>
                                <th>Foto</th>
                            </tr>
                        </tfoot>
                    </table>
                <?php else: ?>
                    <table class="table table-striped table-hover" id="tabla_empleados" >
                        <thead class="bg-bl" >
                            <tr>
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellidos</th>
                                <th style="text-align: left;" scope="col">Cedula</th>
                                <th scope="col">Gerencia</th>
                                <th scope="col">Divisiòn</th>
                                <th scope="col">Cargo</th>
                                <th scope="col">Correo</th>
                                <th>Foto</th>
                                <th>CONFIG</th>
                            </tr>
                        </thead>

                        <tbody>
                        </tbody>

                        <tfoot class="bg-bl" >
                            <tr>
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellidos</th>
                                <th style="text-align: left;" scope="col">Cedula</th>
                                <th scope="col">Gerencia</th>
                                <th scope="col">Divisiòn</th>
                                <th scope="col">Cargo</th>
                                <th scope="col">Correo</th>
                                <th>Foto</th>
                                <th>CONFIG</th>
                            </tr>
                        </tfoot>
                    </table>
                <?php endif ?>

                </div>

            </div>

        </div>

    </div>

</div>

<?php include "../estructura/footer.php" ?>
<script src="../../assets/js/modulos/administracion/empleados.js"></script>

<script>

</script>

</div>

</div>

</body>

</html>