<?php include "../../controladores/acceso/session_T.php"; ?>

<!DOCTYPE html>
<html lang="es">

<head>
    
    <meta charset="utf-8">
    <title>SIGETEL - Perfil</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- Favicon -->
    <link href="../../assets/img/FAVicon.ico" rel="icon">
    <link rel="stylesheet" href="../../assets/css/appstyles.css">
    
    <body>
        
        <?php include "../estructura/barra_lat.php" ?>
        
        <div class="content">
            
            <?php include "../estructura/header.php" ?>
            
            <div class="container-fluid px-4 pb-4 perfil">
                
                <div class="row g-4 d-flex justify-content-center">
                
                <?php include "../../controladores/administracion/usuarios.php"; ?>
                    
                    <div class="col-lg-3">
                        
                        <div class="bg-transparent rounded h-100 tope">
                            
                    <div class="card profile-card-2 mb-1" style="background-color: #191c24;" >
                        
                        <div class="card card-img-block bg-transparent">

                            <div class="d-flex flex-column align-items-center text-center">
                            <!-- <img class="img-fluid" style="width: 120px; height: 120px;" src="" alt=""> -->
                            </div>

                        </div>
                        
                        <div class="card-body pt-4">

                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="<?php echo $foto ?>" alt="profile-image" class="profile">
                            </div>

                            <div class="d-flex flex-column align-items-center tex-center">
                                <p><?php echo $nombre ?></p>
                            </div>

                        </div>

                    </div>

                
                    <div class="card card-img-block bg-secondary">

                        <div class="d-flex flex-column align-items-center text-center pt-3">
                            <P><?php echo $user ?></P>
                        </div>

                    </div>
                        

                    <div class="card-body pt-5">

                        <div class="d-flex flex-column align-items-center text-center">
                        </div>

                    </div>

                    <div class="card-body pt-5">
                        
                        <div class="d-flex flex-column align-items-center text-center">
                        </div>
                        
                    </div>
                    
                </div>
                
            </div>

            

            <div class="col-lg-5">

                <div class="bg-transparent rounded h-100 p-4">

                    <h5 class="mb-4 text text-center">Informacion </h5>

                    <ul class="nav nav-pills mb-3" id="pills-tab" style="justify-content: center;" role="tablist">

                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-profile" type="button" role="tab"
                                aria-controls="pills-profile" aria-selected="false">Perfil</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link " id="pills-contact-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-contact" type="button" role="tab"
                                aria-controls="pills-contact" aria-selected="false"> Editar</button>
                        </li>
                    </ul>

                    <div class="tab-content pt-4 " id="pills-tabContent">

                        <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

                            <div class="card card-img-block bg-secondary ">

                                <div class="d-flex flex-column pt-3">

                                    <div class="ps-3">
                                        <p> <strong style="color: #fff;" >Gerencia:</strong> <?php echo $gerencia ?></p>
                                    </div>

                                </div>

                            </div>

                            <div class="card card-img-block bg-secondary ">

                                <div class="d-flex flex-column pt-3">

                                    <div class="ps-3">
                                        <p><strong style="color: #fff;" > Division:</strong> <?php echo $division ?></p>
                                    </div>

                                </div>

                            </div>

                            <div class="card card-img-block bg-secondary ">

                                <div class="d-flex flex-column pt-3">

                                    <div class="ps-3">
                                        <p><strong style="color: #fff;" >Cargo:</strong> <?php echo $cargo ?></p>
                                    </div>

                                </div>

                            </div>

                            <div class="card card-img-block bg-secondary ">

                                <div class="d-flex flex-column pt-3">

                                    <div class="ps-3">
                                        <p><strong style="color: #fff;">Correo:</strong> <?php echo $correo ?></p>
                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">

                        <h5 class="text text-center">Cambiar clave</h5>

                            <div class="d-flex justify-content-center">

                                <form action="" enctype="multipart/form-data" method="POST">

                                <input type="hidden" value="<?php echo $usuarioA ?>" name="iduserAct">

                                    <div class="input-group mt-4 mb-4" style="width: 105%;">

                                        <span class="input-group-text" style="width: 100px;" id="basic-addon3">Clave</span>

                                        <input type="password" class="form-control" id="clave" name="claveUser" placeholder="Nueva clave" value="" aria-describedby="basic-addon3">

                                    </div>

                                    <div class="input-group mb-4" style="width: 105%;" >

                                        <span class="input-group-text" style="width: 100px;" id="basic-addon3">Confirmar</span>

                                        <input type="password" class="form-control" id="confirmar" name="confirmarClave" placeholder="Confirme la clave" value="" aria-describedby="basic-addon3">

                                    </div>

                                    <button type="submit" name="btnactuser" value="info" class="btn btn-primary text tex-center mt-1" style="margin-left: 40%;" >Editar</button>

                                </form>
                                
                            </div>  

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

<?php include "../estructura/footer.php" ?>

</div>

</body>

</html>