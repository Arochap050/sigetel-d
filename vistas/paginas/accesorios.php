<?php include "../../controladores/acceso/session_AC.php"; ?>
<?php if ($rol == 'Coordinador') {
    header("location: home.php");
} ?>
<!DOCTYPE html>

<html lang="es">

<head>
    
<meta charset="utf-8">
<title>SIGETEL - Accesorios</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta content="" name="keywords">
<meta content="" name="description">
<!-- Favicon -->
<link href="../../assets/img/FAVicon.ico" rel="icon">

<style>

.alert2 {
    position: relative;
    padding: 4px;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 5px;
}
.alert-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.col-xl-reps {
    flex: 0 0 auto;
    width: 66%;
    
}

</style>

</head>

<body>

<?php include "../estructura/barra_lat.php" ?>

<div class="content">

        <?php include "../estructura/header.php" ?>

        <div class="container-fluid pt-4 px-4">

            <div class="row pb-4 g-4">

            <div class="col-6 pt-4">
                <div>

                <?php include "../modal/equipos/accesorios.php"; ?>

                    <div class="bg-secondary rounded h-100 p-4" >

                        <div class="alert2" role="alert">
                            <div class="alert-content">
                                <button type="button" id="registrar-accesorio" class="btn btn-info ms-2" data-bs-toggle="modal" data-bs-target="#accesorio-modal">Registrar</button>
                                <h5 class=" me-4 text-center">Accesorios registrados</h5>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="tabla-accesorios" class="table table-striped table-hover">
                                <thead class="bg-bl">
                                    <tr>
                                        <th scope="col">Nombre accesorio</th>
                                        <th scope="col" class="text-center">CONFIG</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot class="bg-bl">
                                        <th scope="col">Nombre accesorio</th>
                                        <th scope="col" class="text-center">CONFIG</th>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                </div>

                <?php include "../modal/equipos/acce_eq.php"; ?>

                <div class="col-6 pt-4">
                    <div class="bg-secondary rounded p-4" >

                    <div class="alert2" role="alert">
                        <div class="alert-content">
                            <button type="button" id="registrar-acc-equipo" class="btn btn-info ms-2" data-bs-toggle="modal" data-bs-target="#accesorio_eq_modal">Registrar</button>
                        <h5 class="me-4 text-center">Gestion de equipos y accesorios</h5>
                        </div>
                    </div>
                        <div class="table-responsive">
                            <table id="tabla-acc-equipos" class="table table-striped table-hover">
                                <thead class="bg-bl">
                                    <tr>
                                        <th scope="col">Equipo</th>
                                        <th scope="col">Accesorio</th>
                                        <th scope="col" class="text-center">CONFIG</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot class="bg-bl">
                                    <tr>
                                        <th scope="col">Equipo</th>
                                        <th scope="col">Accesorio</th>
                                        <th scope="col" class="text-center">CONFIG</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

        </div>
<!-- Table End -->
        <?php include "../estructura/footer.php" ?>
    </div>

</div>

<script src="../../assets/js/modulos/equipos/accesorios.js"></script>

</body>

</html>