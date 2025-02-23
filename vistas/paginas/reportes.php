<?php include "../../controladores/acceso/session_T.php"; ?>

<!DOCTYPE html>

<html lang="es">

<head>
    
<meta charset="utf-8">
<title>SIGETEL - Reportes</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta content="" name="keywords">
<meta content="" name="description">
<!-- Favicon -->
<link href="../../assets/img/FAVicon.ico" rel="icon">
<link rel="stylesheet" href="../../assets/css/calendario.css">
<style>
.alert-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.col-xl-reps {
    flex: 0 0 auto;
    width: 150%;
    
}

.center-t {
    justify-content: center;
}

.scroll-container {
  display: block;
  margin: 0 auto;
  text-align: center;
}

.scroll-container {
  width: 100%;
  height: auto;
  max-height: 450px;
  overflow-y: scroll;
  scroll-behavior: smooth;
}
</style>
</head>

<body>

<?php include "../estructura/barra_lat.php" ?>

<div class="content">

    <?php include "../estructura/header.php" ?>

    <div class="container-fluid pt-4 pb-4 px-4">

        <div class="row g-4 center-t">

            <div class="col-sm-12 col-md-6 col-xl-5">
                <div class=" bg-secondary rounded h-100 p-2">
                    <h5 class="modal-title text text-center pt-2 pb-2">Generar reporte</h5>
                    <div class="modal-body">
                    <form action="" enctype="multipart/form-data" method="POST">

                        <div class="row mb-2">
                            <label for="marca" class="col-sm-2 col-form-label">Reporte</label>
                            <div class="col-sm-10">
                                <select class="form-select mb-3" aria-label="Default select example" id="marca" name="reporte" required>
                                    <option class="text text-center" value="">Seleccione un acta</option>
                                    <option class="text text-center" value="asignacion">Asignacion</option>
                                    <option class="text text-center" value="prestamo">Prestamo</option>
                                    <option class="text text-center" value="devolucion">Devolucion</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="marca" class="col-sm-2 col-form-label">Tipo</label>
                            <div class="col-sm-10">
                                <select class="form-select mb-3" aria-label="Default select example" id="marca" name="tipo" required>
                                    <option class="text text-center" value="">Seleccione Equipo/Linea</option>
                                    <option class="text text-center" value="equipo">Equipo</option>
                                    <option class="text text-center" value="linea">Linea</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="equipo" class="col-sm-2 col-form-label">Por:</label>
                            <div class="col-sm-10">
                                <select class="form-select mb-3" aria-label="Default select example" id="equipo" name="filtro" required>
                                    <option class="text text-center" value="">Seleccione Empleado/Fecha</option>
                                    <option class="text text-center" value="empleado">Empleado</option>
                                    <option class="text text-center" value="fecha">Fecha</option>
                                </select>
                            </div>
                        </div>

                        <div id="acciones">
                        </div>

                        <div class="modal-footer" style="justify-content: center;">
                            <button type="submit" value="ok" class="btn btn-info" name="btn_consultar_reporte">Buscar</button>
                        </div>

                    </form>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-xl-5">
                <div class="h-100 bg-secondary rounded p-4">
                    <div class="container">
                        <div class="calendar">
                            <div class="header">
                            <div class="month"></div>
                            <div class="btns">
                                <div class="btnss today-btn">
                                <i class="fas fa-calendar-day"></i>
                                </div>
                                <div class="btnss prev-btn">
                                <i class="fas fa-chevron-left"></i>
                                </div>
                                <div class="btnss next-btn">
                                <i class="fas fa-chevron-right"></i>
                                </div>
                            </div>
                            </div>
                            <div class="weekdays">
                            <div class="day">Dom</div>
                            <div class="day">Lun</div>
                            <div class="day">Mar</div>
                            <div class="day">Mie</div>
                            <div class="day">Jue</div>
                            <div class="day">Vie</div>
                            <div class="day">Sab</div>
                            </div>
                            <div class="days">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-xl-10">
                <div class=" bg-secondary rounded p-4">
                <h5 class="mb-4 text text-center">Reportes</h5>

                <div class="scroll-container">

                    <?php include "../../controladores/administracion/reportes.php"; ?>

                </div>
                </div>
            </div>

        </div>

    </div>

<?php include "../estructura/footer.php"; ?>

</div>
<script src="../../assets/js/calendario.js"></script>
<script>    
document.getElementById('equipo').addEventListener('change', function() {
    var accionesDiv = document.getElementById('acciones');
    var selectedValue = this.value;

    accionesDiv.innerHTML = '';

    if (selectedValue === 'empleado') {
        accionesDiv.innerHTML = `    
        
            <div class="row mb-3">
                <label for="empleado" class="col-sm-2 col-form-label">Empleado</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" id="Empleadoo" name="empleado"> 
                        <option class="text text-center" value="">Seleccione un empleado</option>
                        <?php
                        $gerencia = $conectado->prepare("SELECT * FROM Empleados ORDER BY p_Nombre_empleado ASC");
                        $gerencia->execute();
                        while ($gerencias = $gerencia->fetch()):
                        ?>
                        <option class="text text-center" value="<?php echo $gerencias["ID_empleado"]?>"> <?php echo $gerencias["p_Nombre_empleado"]." ".$gerencias["p_Apellido_empleado"]?></option>
                        <?php endwhile ?>
                    </select>
                </div>
            </div>`;
                
    } else if (selectedValue === 'fecha') {
        accionesDiv.innerHTML = `
        <div class="row mb-4">
        <label for="Telefono" class="col-sm-2 col-form-label">Desde</label>

        <input type="date" class="formp form-control" id="Telefono" name="fecha1" required>

        <label for="Extension" class="col-sm-2 col-form-label">Hasta</label>
    
        <input type="date" class="formp form-control" id="Extension" name="fecha2" required>
        </div> `;
    }
});

</script>

</div>

</body>

</html>