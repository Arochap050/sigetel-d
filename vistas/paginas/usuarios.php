<?php include "../../controladores/acceso/session_AC.php"; ?>
<?php if ($rol == 'Coordinador') {
    header("location: home.php");
} ?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <title>SIGETEL - Usuarios</title>
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

<button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#registroUsuariosmodal"><i class="fa-solid fa-user-plus"></i></button>

<div class="row g-4">

    <div class="col-12">

        <?php 
            include "../modal/administracion/usuario.php";
            include "../modal/administracion/actestado.php";
            include "../modal/administracion/usuarioact.php";
        ?>

        <div class="bg-secondary rounded h-100 p-4">

            <h5 class="mb-4 text-center">Usuarios</h5>

            <div class="table-responsive">

                <table class="table table-striped table-hover" id="tabla_usuario" >

                    <thead class="bg-bl">
                        <tr>
                            <th>Empleado</th>
                            <th class="text text-center">Usuario</th>
                            <th class="text text-center">Tipo de usuario</th>
                            <th class="text text-center">Estado</th>
                            <th class="text text-center">Foto</th>
                            <th class="text text-center">CONFIG</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    </tbody>

                    <tfoot class="bg-bl">
                        <tr>
                            <th>Empleado</th>
                            <th class="text text-center">Usuario</th>
                            <th class="text text-center">Tipo de usuario</th>
                            <th class="text text-center">Estado</th>
                            <th class="text text-center">Foto</th>
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

<script src="../../assets/js/modulos/administracion/usuarios.js"></script>

<script>
$(document).ready(function(){
    $("#gerencia").on('change', function () {
        $("#gerencia option:selected").each(function () {
            var id = $(this).val();
            $.post("../../BD/peticiones/getDivisiones.php", { id: id }, function(data) {

                $("#Division").html(data);
                $("#Empleadoo").html('<option>Seleccione un empleado</option>')

            });			
        });
    });
});

$(document).ready(function(){
    $("#Division").on('change', function () {
        $("#Division option:selected").each(function () {
            var id = $(this).val();
            $.post("../../BD/peticiones/getEmpleados.php", { id: id }, function(data) {

                $("#Empleadoo").html(data);

            });			
        });
    });
});
</script>

</div>

</body>

</html>

