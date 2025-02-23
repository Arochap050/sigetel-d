<?php 

require_once "../../BD/bd.php";

if (isset($_SESSION)) {

$empleado = $_SESSION['idempleado'];
$user = $_SESSION['usuario'];
} else { 

    echo '<script>"window.location=" ../index.php"</script>'; 
}

$sqlTecnico = conexion::consultar()->prepare("SELECT p_Nombre_empleado, p_Apellido_empleado, foto, FKEY_cargo, N_cargo, N_division, N_gerencia, correo, ID_usuario FROM Empleados AS E JOIN Cargos AS C ON C.ID_cargo = E.FKEY_cargo JOIN Gerencia AS G ON G.ID_gerencia = E.FKEY_gerencia JOIN Divisiones AS D ON D.ID_division = E.FKEY_division JOIN Usuarios AS U ON U.FKEY_empleado = E.ID_empleado where ID_empleado = :empleado");
$sqlTecnico->bindParam(":empleado", $empleado);
$sqlTecnico->execute();

$resultadoE = $sqlTecnico->fetch();
$nombre = $resultadoE["p_Nombre_empleado"]." ".$resultadoE["p_Apellido_empleado"];
$foto = $resultadoE["foto"];
$cargo = $resultadoE["N_cargo"];
$division = $resultadoE["N_division"];
$gerencia = $resultadoE["N_gerencia"];
$correo = $resultadoE["correo"];
$usuarioA = $resultadoE["ID_usuario"]; 

?>


<link rel="stylesheet" href="../../assets/lib/owlcarousel/assets/owl.carousel.min.css">
<link rel="stylesheet" href="../../assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css">
<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
<link rel="stylesheet" href="../../assets/css/style.css">
<link rel="stylesheet" href="../../assets/DataTables/datatables.css">
<link rel="stylesheet" href="../../assets/fontawesome/css/fontawesome.css">
<link rel="stylesheet" href="../../assets/fontawesome/css/brands.css">
<link rel="stylesheet" href="../../assets/fontawesome/css/solid.css">

<script src="https://kit.fontawesome.com/e540a1e474.js" crossorigin="anonymous"></script>

<script src="../../assets/pnotify/js/jquery.min.js"></script>


<?php if ($rol == 'Administrador'):?>

<div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>

<div class="sidebar bg-transparent pb-3">
    <nav class="navbar bg-transparent navbar-dark">
        <a href="home.php" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class=""><img class="fa me-2" src="../../assets/img/Daco_4636508.png" style="width: 52px; height: 40px;"></i></i>SIGETEL</h3>
        </a>

        <div class="d-flex align-items-center brl-user ms-0 mb-1">
            <div class="position-relative">
                <img class="rounded-circle" src="<?php echo $foto ?>" alt="" style="width: 40px; height: 40px;">
            </div>

            <div class="ms-3">
                <h6 class="mb-0 pd"><?php echo $nombre ?></h6>
                <span><?php echo $rol ?></span>
            </div>

        </div>

        <div class="navbar-nav w-100">
            <a href="home.php" class="nav-item nav-link "><i class="fa-solid fa-house me-2"></i>Inicio</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Equipos</a>
                <div class="dropdown-menu bg-blt border-0">
                    <a href="inventario.php" class="dropdown-item"><i class="fa-solid fa-list me-2"></i>Inventario</a>
                    <a href="marcas.php" class="dropdown-item"><i class="fa-brands fa-creative-commons-sa me-2"></i>Marcas</a>
                    <a href="equipos.php" class="dropdown-item"><i class="fa-solid fa-desktop me-2"></i>Equipos</a>
                    <a href="modelos.php" class="dropdown-item"><i class="fa-solid fa-layer-group me-2"></i>Modelos</a>
                    <a href="accesorios.php" class="dropdown-item"><i class="fa-regular fa-keyboard me-2"></i>Accesorios</a>
                </div>
            </div>
            
            <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa-solid fa-phone me-2"></i>Lineas</a>
                <div class="dropdown-menu bg-blt border-0">
                    <a href="lineas.php" class="dropdown-item"><i class="fa-solid fa-phone me-2"></i>Lineas</a>
                    <a href="operadoras.php" class="dropdown-item"><i class="fa-solid fa-phone-volume me-2"></i>Operadoras</a>
                    <a href="tipoLinea.php" class="dropdown-item"><i class="fa-solid fa-mobile-retro me-2"></i>Tipo</a>
                    <a href="estadoLinea.php" class="dropdown-item"><i class="fa-solid fa-chart-column me-2"></i>Estado</a>
                </div>
            </div>

            <div class="nav-item dropdown">
            <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa-solid fa-folder-open me-2"></i>Administracion</a>
                <div class="dropdown-menu bg-blt border-0">
                    <a href="usuarios.php" class="dropdown-item"><i class="fa-solid fa-user me-3"></i>Usuarios</a>
                    <a href="empleados.php" class="dropdown-item"><i class="fa-solid fa-users me-2"></i>Empleados</a>
                    <a href="gerencias.php" class="dropdown-item"><i class="fa-solid fa-house-user me-2"></i>Gerencias</a>
                    <a href="divisiones.php" class="dropdown-item"><i class="fa-solid fa-house-flag me-2"></i>Divisiones</a>
                    <a href="cargos.php" class="dropdown-item"><i class="fa-solid fa-address-card me-2"></i>Cargos</a>
                </div>
            </div>

            <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa-solid fa-file-import me-2"></i>Asignaciones</a>
                <div class="dropdown-menu bg-blt border-0">
                    <a href="asigEquipos.php" class="dropdown-item"><i class="fa-solid fa-user-tag me-2"></i>Asignar Equipos</a>
                    <a href="asigLineas.php" class="dropdown-item"><i class="fa-solid fa-user-tag me-1"></i> Asignar Lineas</a>
                </div>
            </div>

            
            <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa-solid fa-book me-2"></i>Auditoria</a>
                <div class="dropdown-menu bg-blt border-0">
                    <a href="#" class="dropdown-item"><i class="fa fa-laptop me-2"></i>Equipos</a>
                    <a href="#" class="dropdown-item"><i class="fa-solid fa-phone me-2"></i>Lineas</a>
                    <a href="#" class="dropdown-item"><i class="fa-solid fa-folder-open me-2"></i>Administracion</a>
                    <a href="#" class="dropdown-item"><i class="fa-solid fa-file-import me-2"></i>Asignaciones</a>
                    <!-- <a href="#" class="dropdown-item"><i class="fa-solid fa-user-tag me-1"></i> Asignar Lineas</a>
                    <a href="#" class="dropdown-item"><i class="fa-solid fa-user-tag me-1"></i> Asignar Lineas</a> -->
                </div>
            </div>

            <a href="reportes.php" class="nav-item nav-link"><i class="far fa-file-alt me-2"></i>Reportes</a>

            </div>
        </div>
    </nav>
</div>

<?php elseif ($rol == 'Coordinador'): ?>

<div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>

<div class="sidebar bg-transparent pb-3">
    <nav class="navbar bg-transparent navbar-dark">
        <a href="home.php" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class=""><img class="fa me-2" src="../../assets/img/Daco_4636508.png" style="width: 52px; height: 40px;"></i></i>SIGETEL</h3>
        </a>

        <div class="d-flex align-items-center brl-user ms-1 mb-1">
            <div class="position-relative">
                <img class="rounded-circle" src="<?php echo $foto ?>" alt="" style="width: 40px; height: 40px;">
            </div>

            <div class="ms-3">
                <h6 class="mb-0 pd"><?php echo $nombre ?></h6>
                <span><?php echo $rol ?></span>
            </div>
        </div>

        <div class="navbar-nav w-100">
            <a href="home.php" class="nav-item nav-link"><i class="fa-solid fa-house me-2"></i>Inicio</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Equipos</a>
                <div class="dropdown-menu bg-blt border-0">
                    <a href="inventario.php" class="dropdown-item"><i class="fa-solid fa-list me-2"></i>Inventario</a>
                    <a href="marcas.php" class="dropdown-item"><i class="fa-brands fa-creative-commons-sa me-2"></i>Marcas</a>
                    <a href="equipos.php" class="dropdown-item"><i class="fa-solid fa-desktop me-2"></i>Equipos</a>
                    <a href="modelos.php" class="dropdown-item"><i class="fa-solid fa-layer-group me-2"></i>Modelos</a>
                </div>
            </div>

            <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa-solid fa-phone me-2"></i>Lineas</a>
                <div class="dropdown-menu bg-blt border-0">
                    <a href="lineas.php" class="dropdown-item"><i class="fa-solid fa-phone me-2"></i>Lineas</a>
                    <a href="operadoras.php" class="dropdown-item"><i class="fa-solid fa-phone-volume me-2"></i>Operadoras</a>
                    <a href="tipoLinea.php" class="dropdown-item"><i class="fa-solid fa-mobile-retro me-2"></i>Tipo</a>
                    <a href="estadoLinea.php" class="dropdown-item"><i class="fa-solid fa-chart-column me-2"></i>Estado</a>
                </div>
            </div>

            <div class="nav-item dropdown">
            <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa-solid fa-folder-open me-2"></i>Administracion</a>
                <div class="dropdown-menu bg-blt border-0">
                    <!-- <a href="usuarios.php" class="dropdown-item"><i class="fa-solid fa-user me-3"></i>Usuarios</a> -->
                    <a href="empleados.php" class="dropdown-item"><i class="fa-solid fa-users me-2"></i>Empleados</a>
                    <a href="gerencias.php" class="dropdown-item"><i class="fa-solid fa-house-user me-2"></i>Gerencias</a>
                    <a href="divisiones.php" class="dropdown-item"><i class="fa-solid fa-house-flag me-2"></i>Divisiones</a>
                    <a href="cargos.php" class="dropdown-item"><i class="fa-solid fa-address-card me-2"></i>Cargos</a>
                </div>
            </div>

            <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa-solid fa-file-import me-2"></i>Asignaciones</a>
                <div class="dropdown-menu bg-blt border-0">
                    <a href="asigEquipos.php" class="dropdown-item"><i class="fa-solid fa-user-tag me-2"></i>Asignar Equipos</a>
                    <a href="asigLineas.php" class="dropdown-item"><i class="fa-solid fa-user-tag me-1"></i> Asignar Lineas</a>
                </div>
            </div>
            <a href="reportes.php" class="nav-item nav-link"><i class="far fa-file-alt me-2"></i>Reportes</a>
            </div>
        </div>
    </nav>
</div>

<?php elseif ($rol == 'Tecnico'): ?>

<div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>

<div class="sidebar bg-transparent pb-3">
    <nav class="navbar bg-transparent navbar-dark">
        <a href="home.php" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class=""><img class="fa me-2" src="../../assets/img/Daco_4636508.png" style="width: 52px; height: 40px;"></i></i>SIGETEL</h3>
        </a>

        <div class="d-flex align-items-center brl-user ms-1 mb-1">
            <div class="position-relative">
                <img class="rounded-circle" src="<?php echo $foto ?>" alt="" style="width: 40px; height: 40px;">
            </div>

            <div class="ms-3">
                <h6 class="mb-0 pd"><?php echo $nombre ?></h6>
                <span><?php echo $rol ?></span>
            </div>
        </div>

        <div class="navbar-nav w-100">
            <a href="home.php" class="nav-item nav-link"><i class="fa-solid fa-house me-2"></i>Inicio</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Equipos</a>
                <div class="dropdown-menu bg-blt border-0">
                    <a href="inventario.php" class="dropdown-item"><i class="fa-solid fa-list me-2"></i>Inventario</a>
                </div>
            </div>

            <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa-solid fa-phone me-2"></i>Lineas</a>
                <div class="dropdown-menu bg-blt border-0">
                    <a href="lineas.php" class="dropdown-item"><i class="fa-solid fa-phone me-2"></i>Lineas</a>
                </div>
            </div>

            <div class="nav-item dropdown">
            <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa-solid fa-folder-open me-2"></i>Administracion</a>
                <div class="dropdown-menu bg-blt border-0">
                    <a href="empleados.php" class="dropdown-item"><i class="fa-solid fa-users me-2"></i>Empleados</a>
                </div>
            </div>
                <a href="reportes.php" class="nav-item nav-link"><i class="far fa-file-alt me-2"></i>Reportes</a>
            </div>

        </div>
    </nav>
</div>

<?php endif; ?>