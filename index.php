<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/login.css">

  <link href="assets/img/FAVicon.ico" rel="icon">
  <link rel="stylesheet" href="assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <script src="assets/pnotify/js/jquery.min.js"></script> 
  <link rel="stylesheet" href="assets/css/style.css">

  <title>Sistema de Gestión Telefónico - SIGETEL</title>
</head>
<body>
<div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Cargando...</span>
        </div>
    </div>
  <div class="fondo-p">
    
    <div class="form-section">
      <div class="title"><h1 class="text-primary text-center">SIGETEL</h1></div>

      <div class="title p-3"><img src="assets/img/Daco_4636508.png" style="width: 100px;" alt=""></div>
     
      <p class="" style="color: white;">Ingrese sus datos</p>
      <form id="sesion-usuario" enctype="multipart/form-data">

        <div class="form-floating">
            <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" required>
            <label for="usuario">Usuario</label>
        </div>
        <div class="form-floating mb-4">
            <input type="password" class="form-control" id="password" name="contraseña" placeholder="Contraseña" required>
            <label for="Password">Contraseña</label>
        </div>

        <button type="submit">Ingresar</button>

      </form>
      <!-- <p style="margin-top: 20px;">Crear usuario? <a href="#">Registrar</a></p> -->
    </div>

    <div class="image-section">
      <!-- colocar imagenes a utilizar -->
       <img id="imagen-cambio" style="height: 650px; width:490px; border-radius: 20px;" src="assets/img/img_login/Vtv.jpg" alt="img">
    </div>

  </div>
  
<script src="assets/js/jquery-3.7.1.min.js"></script>
<script src="assets/js/alerta_general.js"></script>
<script src="assets/lib/waypoints/waypoints.min.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/sweet/js/sweetalert2.js"></script>
<script src="assets/js/modulos/acceso/usuarios.js"></script>

<script>

const images = [ 
    'assets/img/img_login/Vtv.jpg', 
    'assets/img/img_login/prueba2.jpg', 
    'assets/img/img_login/prueba3.jpg' 
]; 
 
let currentIndex = 0; 
 
function changeImage() { 
    const slideshow = document.getElementById('imagen-cambio'); 
    currentIndex = (currentIndex + 1) % images.length; 
    slideshow.style.opacity = 0;
    setTimeout(() => { 
        slideshow.src = images[currentIndex]; 
        slideshow.style.opacity = 2;
    }, 900);
} 
 
setInterval(changeImage, 5000); // Change image every 5 seconds 
</script>

</body>
</html>