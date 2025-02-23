<?php include "../../controladores/acceso/session_T.php"; ?>
<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="utf-8">
<title>SIGETEL - Inicio</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta content="" name="keywords">
<meta content="" name="description">
<link href="../../assets/img/FAVicon.ico" rel="icon">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
.th {
  display: inline-block;
  width: 50%;
  
}

.dflex {
  display: flex !important;
  flex-wrap: wrap;
}

.chome {

  position: relative;
  display: flex;
  flex-direction: column;
  min-width: 0;
  word-wrap: break-word;
  background-color: #000;
  background-clip: border-box;
  border: 1px solid rgba(0, 0, 0, 0.125);
  border-radius: 10px;
  border-color: #dc3545;
}

.chome:hover {
  color: #000;
  background-color: #dc3545;

}

.imginv {
  height: auto;
  width: 80%;

}

img {
  height: auto;
  width: 70%;
}

.img2 {
  height: auto;
  width: 60%;
}

</style>

</head>

<body>

<?php include "../estructura/barra_lat.php" ?>

    <div class="content">

        <?php include "../estructura/header.php" ?>

        <div class="container-fluid pt-4 px-4">

            <div class="row g-4 ">

                <?php if ($rol == 'Tecnico'): ?>
                    
                  <div class="col-12">
                    <div class="bg-dark rounded h-100 p-4 dflex ">

                      <div class="col-md-3 m-4 th">
                        <a href="inventario.php" class="chome text text-center">
                          <div class="card-body m-2">
                            <h5 class="card-title">Inventario</h5>
                            <img class="imginv" src="../../assets/img/lista.png" alt="">
                          </div>
                        </a>
                      </div>
                      
                      <div class="col-md-3 m-4 th">
                        <a href="lineas.php" class="chome text text-center">
                          <div class="card-body m-2">
                            <h5 class="card-title">Lineas</h5>
                            <img src="../../assets/img/phone.png" alt="">
                          </div>
                        </a>
                      </div>

                      <div class="col-md-3 m-4 th">
                        <a href="empleados.php" class="chome text text-center">
                          <div class="card-body m-2">
                            <h5 class="card-title">Empleados</h5>
                            <img src="../../assets/img/users.png" alt="">
                          </div>
                        </a>
                      </div>

                      <div class="col-md-3 m-4 th">
                        <a href="reportes.php" class="chome text text-center">
                          <div class="card-body m-2">
                            <h5 class="card-title">Reportes</h5>
                            <img src="../../assets/img/asig.png" alt="">
                          </div>
                        </a>
                      </div>

                <?php elseif ($rol == 'Coordinador'): ?>
                    
                  <div class="col-12 ">
                    <div class="bg-dark rounded h-100 p-4 dflex justify-content-center">

                      <div class="col-md-3 m-4 th">
                        <a href="inventario.php" class="chome text text-center">
                          <div class="card-body m-2">
                            <h5 class="card-title">Inventario</h5>
                            <img class="imginv" src="../../assets/img/lista.png" alt="">
                          </div>
                        </a>
                      </div>
                      
                      <div class="col-md-3 m-4 th">
                        <a href="lineas.php" class="chome text text-center">
                          <div class="card-body m-2">
                            <h5 class="card-title">Lineas</h5>
                            <img src="../../assets/img/phone.png" alt="">
                          </div>
                        </a>
                      </div>

                      <div class="col-md-3 m-4 th">
                        <a href="empleados.php" class="chome text text-center">
                          <div class="card-body m-2">
                            <h5 class="card-title">Empleados</h5>
                            <img src="../../assets/img/users.png" alt="">
                          </div>
                        </a>
                      </div>

                      <div class="col-md-3 m-4 th">
                        <a href="asigEquipos.php" class="chome text text-center">
                          <div class="card-body m-2">
                            <h5 class="card-title">Asignaciones</h5>
                            <img class="img2 pt-3 pb-3" src="../../assets/img/imgasigg.png" alt="">
                          </div>
                        </a>
                      </div>

                      <div class="col-md-3 m-4 th">
                        <a href="reportes.php" class="chome text text-center">
                          <div class="card-body m-2">
                            <h5 class="card-title">Reportes</h5>
                            <img src="../../assets/img/asig.png" alt="">
                          </div>
                        </a>
                      </div>

                <?php else: ?>
                    
                    <div class="col-12 ">
                      <div class="bg-dark rounded h-100 p-4 dflex justify-content-center">
  
                        <div class="col-md-3 m-4 th">
                          <a href="inventario.php" class="chome text text-center">
                            <div class="card-body m-2">
                              <h5 class="card-title">Inventario</h5>
                              <img class="imginv" src="../../assets/img/lista.png" alt="">
                            </div>
                          </a>
                        </div>
                        
                        <div class="col-md-3 m-4 th">
                          <a href="lineas.php" class="chome text text-center">
                            <div class="card-body m-2">
                              <h5 class="card-title">Lineas</h5>
                              <img src="../../assets/img/phone.png" alt="">
                            </div>
                          </a>
                        </div>
  
                        <div class="col-md-3 m-4 th">
                          <a href="usuarios.php" class="chome text text-center">
                            <div class="card-body m-2">
                              <h5 class="card-title">Usuarios</h5>
                              <img src="../../assets/img/user2.png" alt="">
                            </div>
                          </a>
                        </div>
  
                        <div class="col-md-3 m-4 th">
                          <a href="empleados.php" class="chome text text-center">
                            <div class="card-body m-2">
                              <h5 class="card-title">Empleados</h5>
                              <img src="../../assets/img/users.png" alt="">
                            </div>
                          </a>
                        </div>
  
                        <div class="col-md-3 m-4 th">
                          <a href="asigEquipos.php" class="chome text text-center">
                            <div class="card-body m-2">
                              <h5 class="card-title">Asignaciones</h5>
                              <img class="img2 pt-3 pb-3" src="../../assets/img/imgasigg.png" alt="">
                            </div>
                          </a>
                        </div>
  
                        <div class="col-md-3 m-4 th">
                          <a href="reportes.php" class="chome text text-center">
                            <div class="card-body m-2">
                              <h5 class="card-title">Reportes</h5>
                              <img src="../../assets/img/asig.png" alt="">
                            </div>
                          </a>
                        </div>

                <?php endif; ?>

                    </div>
                </div>

            </div>

        </div>

        <?php include "../estructura/footer.php" ?>

    </div>

</div>

</body>

</html>