<?php

// include "../../BD/bd.php";

if (isset($_SESSION)) {
$user = $_SESSION['usuario'];
$rol =  $_SESSION['rol'];
} else {
    echo '<script> window.location=" ../index.php"</script>';

}

?>
<!-- Navbar Start -->
<nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-2 py-0">
    <a href="index.html" class="navbar-brand d-flex d-lg-none">
        <h2 class="text-primary mb-0"></h2>
    </a>
    <a href="#" class="sidebar-toggler flex-shrink-0">
        <i class="text-light fa fa-bars"></i>
    </a>
    <div class="navbar-nav align-items-center ms-auto">
        <div class="nav-item dropdown brh-user">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <img class="rounded-circle me-lg-2" src="<?php echo $foto ?>" alt="" style="width: 40px; height: 40px;">
                <span class="d-none d-lg-inline-flex"><?php echo $user ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-transparent border-0 rounded-0 rounded-bottom m-0">
                <a href="perfil.php" class="dropdown-item pi"><i class="fa-solid fa-user-tie me-2"></i>Perfil</a>
                <a onclick="cerrarSession(event)" href="../../controladores/acceso/cerrar_sesion.php" class="dropdown-item pi"><i class="fa-solid fa-right-to-bracket me-2"></i>Cerrar Sesion</a>
            </div>
        </div>
    </div>
</nav>
<!-- Navbar End -->