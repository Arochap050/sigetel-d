<?php include "../../controladores/acceso/session_T.php"; ?>
<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="utf-8">
<title>SIGETEL - Lineas</title>
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

<div class="container-fluid pt-4 px-4">

<?php if ($rol == 'Administrador'): ?>
<div class="dropdown">
        
    <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#registroLineamodal"><i class="fa-regular fa-square-plus"></i></button>

    <a href="#" class="btn btn-success mb-4" data-bs-toggle="dropdown">
        <span class="d-none d-lg-inline-flex"><i class="fa-solid fa-print"></i></span>
    </a>

    <div class="dropdown-menu dropdown-menu-end bg-dark border-0 rounded-0 rounded-bottom m-0">

        <a target="_blank" href="../rep/lineas.php?rep=IN" class="dropdown-item3 pi"><i class="fa-solid fa-print ms-4 me-2"></i>Inventario</a>
        <a target="_blank" href="../rep/lineas.php?rep=Activo" class="dropdown-item3 pi "><i class="fa-solid fa-print ms-4 me-2"></i>Activos</a>
        <a target="_blank" href="../rep/lineas.php?rep=Bloqueada" class="dropdown-item3 pi "><i class="fa-solid fa-print ms-4 me-2"></i>Bloqueados</a>
        <a target="_blank" href="../rep/lineas.php?rep=Asignado" class="dropdown-item3 pi"><i class="fa-solid fa-print ms-4 me-2"></i>Asignados</a>
        <a target="_blank" href="../rep/lineas.php?rep=Prestado" class="dropdown-item3 pi "><i class="fa-solid fa-print ms-4 me-2"></i>Prestados</a>

    </div>

</div>
<?php elseif ($rol == 'Coordinador'): ?>
<div class="dropdown">
    
    <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#registroLineamodal"><i class="fa-regular fa-square-plus"></i></button>

    <a href="#" class="btn btn-success mb-4" data-bs-toggle="dropdown">
        <span class="d-none d-lg-inline-flex"><i class="fa-solid fa-print"></i></span>
    </a>

    <div class="dropdown-menu dropdown-menu-end bg-dark border-0 rounded-0 rounded-bottom m-0">

        <a target="_blank" href="../rep/lineas.php?rep=IN" class="dropdown-item3 pi"><i class="fa-solid fa-print ms-4 me-2"></i>Inventario</a>
        <a target="_blank" href="../rep/lineas.php?rep=Activo" class="dropdown-item3 pi "><i class="fa-solid fa-print ms-4 me-2"></i>Activos</a>
        <a target="_blank" href="../rep/lineas.php?rep=Bloqueada" class="dropdown-item3 pi "><i class="fa-solid fa-print ms-4 me-2"></i>Bloqueados</a>
        <a target="_blank" href="../rep/lineas.php?rep=Asignado" class="dropdown-item3 pi"><i class="fa-solid fa-print ms-4 me-2"></i>Asignados</a>
        <a target="_blank" href="../rep/lineas.php?rep=Prestado" class="dropdown-item3 pi "><i class="fa-solid fa-print ms-4 me-2"></i>Prestados</a>

    </div>

</div>

<?php elseif ($rol == 'Tecnico'): ?>
<div class="dropdown">
    
    <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#registroLineamodal"><i class="fa-regular fa-square-plus"></i></button>

    <a href="#" class="btn btn-success mb-4" data-bs-toggle="dropdown">
        <span class="d-none d-lg-inline-flex"><i class="fa-solid fa-print"></i></span>
    </a>

    <div class="dropdown-menu dropdown-menu-end bg-dark border-0 rounded-0 rounded-bottom m-0">

        <a target="_blank" href="../rep/lineas.php?rep=IN" class="dropdown-item3 pi"><i class="fa-solid fa-print ms-4 me-2"></i>Inventario</a>
        <a target="_blank" href="../rep/lineas.php?rep=Activo" class="dropdown-item3 pi "><i class="fa-solid fa-print ms-4 me-2"></i>Activos</a>
        <a target="_blank" href="../rep/lineas.php?rep=Bloqueada" class="dropdown-item3 pi "><i class="fa-solid fa-print ms-4 me-2"></i>Bloqueados</a>
        <a target="_blank" href="../rep/lineas.php?rep=Asignado" class="dropdown-item3 pi"><i class="fa-solid fa-print ms-4 me-2"></i>Asignados</a>
        <a target="_blank" href="../rep/lineas.php?rep=Prestado" class="dropdown-item3 pi "><i class="fa-solid fa-print ms-4 me-2"></i>Prestados</a>

    </div>

</div>
<?php endif ?>

    <div class="row g-4">

        <div class="col-12">

        <?php
            //include "../../controladores/lineas/lineas.php";
            //include "../../controladores/lineas/lineasDel.php";
        ?>

            <div class="bg-secondary rounded h-100 p-4">

                <h5 class="mb-4 text-center">Lineas</h5>

                <div class="table-responsive">

                <?php if ($rol == 'Tecnico'): ?>
                    <table class="table" id="tabla_Lineas_t" width="100%">
                        <thead class="bg-bl">
                            <tr>
                                <th scope="col">Linea</th>
                                <th scope="col">Operadora</th>
                                <th scope="col">Estado</th>
                                <th style="text-align: left;" scope="col">Numero</th>
                                <th style="text-align: left;" scope="col">Puk</th>
                                <th style="text-align: left;" scope="col">PIN</th>
                            </tr>
                        </thead>

                        <tbody>
                        </tbody>

                        <tfoot class="bg-bl">
                            <tr>
                                <th scope="col">Linea</th>
                                <th scope="col">Operadora</th>
                                <th scope="col">Estado</th>
                                <th style="text-align: left;" scope="col">Numero</th>
                                <th style="text-align: left;" scope="col">Puk</th>
                                <th style="text-align: left;" scope="col">PIN</th>
                            </tr>
                        </tfoot>    
                    </table>
                <?php else: ?>
                    <table class="table" id="tabla_Lineas" width="100%">
                        <thead class="bg-bl">
                            <tr>
                                <th scope="col">Linea</th>
                                <th scope="col">Operadora</th>
                                <th scope="col">Estado</th>
                                <th style="text-align: left;" scope="col">Numero</th>
                                <th style="text-align: left;" scope="col">Puk</th>
                                <th style="text-align: left;" scope="col">PIN</th>
                                <th style="text-align: center;">CONFIG</th>
                            </tr>
                        </thead>

                        <tbody>
                        </tbody>

                        <?php //include "../modal/actualizar/lineas/lineas.php" ?>

                        <tfoot class="bg-bl">
                            <tr>
                                <th scope="col">Linea</th>
                                <th scope="col">Operadora</th>
                                <th scope="col">Estado</th>
                                <th style="text-align: left;" scope="col">Numero</th>
                                <th style="text-align: left;" scope="col">Puk</th>
                                <th style="text-align: left;" scope="col">PIN</th>
                                <th style="text-align: center;">CONFIG</th>
                            </tr>
                        </tfoot>    
                    </table>
                <?php endif ?>

                </div>

            </div>

        </div>

        <div class="col-12">

        </div>

    </div>
    
<?php //include "../modal/registrar/lineas/lineas.php" ?>

</div>

<?php include "../estructura/footer.php" ?>

</div>

<script src="../../assets/tablajs/tablalineas.js" ></script>

</body>

</html>  
