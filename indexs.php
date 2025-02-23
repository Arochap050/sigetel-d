<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="utf-8">
<title>SIGETEL - Sistema de Gestion Telefonico</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta content="" name="keywords">
<meta content="" name="description">
<link href="assets/img/FAVicon.ico" rel="icon">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css">
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<script src="assets/pnotify/js/jquery.min.js"></script>

</head>

<body>
<div class="container-fluid position-relative d-flex p-0">
<div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Cargando...</span>
    </div>
</div>
    <div class="container">
        <div class="row align-items-center justify-content-center"  style="min-height: 100vh; width: 100%;">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                <div class="bg-transparent rounded p-4 p-sm-5 my-4 mx-3">
                    <form action="controladores/acceso/usuario.php" method="post" >				
                        <div class="d-flex align-items-center justify-content-center mb-3">
                        <h3 class="text-primary"></i>SIGETEL</h3>   
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" required>
                            <label for="usuario">Usuario</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" id="Password" name="contraseña" placeholder="Contraseña" required>
                            <label for="Password">Contraseña</label>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                        </div>
                        <button type="submit" class="btn btn-primary py-3 w-100">Iniciar sesion</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="assets/js/alerta_general.js"></script>
<script src="assets/lib/waypoints/waypoints.min.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/sweet/js/sweetalert2.js"></script>

</body>

</html>