<?php include "../../controladores/acceso/session_T.php"; ?>
<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="utf-8">
<title>SIGETEL - Agregar Equipos</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta content="" name="keywords">
<meta content="" name="description">
<!-- Favicon -->
<link href="../../assets/img/FAVicon.ico" rel="icon">
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.bootstrap5.css">

</head>

<body>

<?php include "../estructura/barra_lat.php" ?>

<div class="content">

<?php include "../estructura/header.php" ?>

<div class="container-fluid pt-4 px-4">

<div class="dropdown">

    <button title="Registrar" id="registrar_equipo_inv" type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#modal_inventario"><i class="fa-regular fa-square-plus"></i></button>

    <a href="#" title="Reportes" class="btn btn-success mb-4" data-bs-toggle="dropdown">
        <span class="d-none d-lg-inline-flex"><i class="fa-solid fa-print"></i></span>
    </a>

    <div class="dropdown-menu dropdown-menu-end bg-dark border-0 rounded-0 rounded-bottom m-0">

        <a target="_blank" href="../rep/inventario.php?rep=IN" class="dropdown-item3 pi"><i class="fa-solid fa-print ms-4 me-2"></i>Inventario</a>
        <a target="_blank" href="../rep/inventario.php?rep=Bueno" class="dropdown-item3 pi"><i class="fa-solid fa-print ms-4 me-2"></i>Buenos</a>
        <a target="_blank" href="../rep/inventario.php?rep=Dañado" class="dropdown-item3 pi"><i class="fa-solid fa-print ms-4 me-2"></i>Dañados</a>
        <a target="_blank" href="../rep/inventario.php?rep=Asignado" class="dropdown-item3 pi"><i class="fa-solid fa-print ms-4 me-2"></i>Asignados</a>
        <a target="_blank" href="../rep/inventario.php?rep=Prestado" class="dropdown-item3 pi"><i class="fa-solid fa-print ms-4 me-2"></i>Prestados</a>

    </div>

</div>

<div class="row g-4">

<div class="col-12">

<?php include "../modal/equipos/inventario.php"; ?>

<div class="bg-secondary rounded h-100 p-4">

    <h5 class="mb-2 text-center">Inventario de equipos</h5>

    <div class="table-responsive">

        <?php if ($rol == 'Tecnico'): ?>
            <table id="tabla_inventario_t" class="table table-striped table-hover" width="100%" >
            <thead class="bg-bl">
                <tr>
                <th>Equipo</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Estado</th>
                <th>Bien nacional</th>
                <th class="text-start">serial</th>
                <th>Ubicacion</th>
                <th>Imagen</th>
                </tr>
            </thead>

            <tbody>
            </tbody>

            <tfoot class="bg-bl">
                <th>Equipo</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Estado</th>
                <th>Bien nacional</th>
                <th class="text-start">serial</th>
                <th>Ubicacion</th>
                <th>Imagen</th>
            </tfoot>
        </table>
        <?php else: ?>
            <table id="tabla_inventario" class="table table-striped table-hover" width="100%" >
            <thead class="bg-bl">
                <tr>
                <th>Equipo</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Estado</th>
                <th>Bien nacional</th>
                <th class="text-start">serial</th>
                <th>Ubicacion</th>
                <th>Imagen</th>
                <th>CONFIG</th>
                </tr>
            </thead>

            <tbody>
            </tbody>

            <tfoot class="bg-bl">
                <th>Equipo</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Estado</th>
                <th>Bien nacional</th>
                <th class="text-start">serial</th>
                <th>Ubicacion</th>
                <th>Imagen</th>
                <th>CONFIG</th>
            </tfoot>
        </table>
        <?php endif ?>
            
    </div>
    
</div>
    
</div> 

<div class="col-12">

</div>

</div>

</div>

<script src="../../assets/js/peticiones.js"></script>
<script src="../../assets/js/prueba.js"></script>

<?php include "../estructura/footer.php" ?>
<script src="../../assets/js/modulos/equipos/inventario.js"></script>
<script>

$(document).on("click", "#registrar_equipo_inv", function(){

    function Amarca(){
        $.ajax({
            type:"GET",
            url:"../../BD/peticiones/getMarcaact.php",
            success: function(response){
                const marcas= JSON.parse(response)
                let template= '<option value="">Seleccione una marca...</option>'
                marcas.forEach(actmarca =>{
                    template += `<option value="${actmarca.Id}">${actmarca.marca}</option>`
                })
                marca.innerHTML = template;
            }
        })
    }
    Amarca()

    let titulo = document.getElementById("titulomodal_inventario");
    let accion = document.getElementById("accion");
    let boton = document.getElementById("boton_inv");
    let marca = document.getElementById("marca");
    let modelo = document.getElementById("modelo");
    let equipo = document.getElementById("equipo");

    $("#serial").val("")
    $("#bnacional").val("")
    
    titulo.innerHTML = '<h5 class="modal-title text-center mt-4 mb-3">Registrar equipo</h5>';
    accion.innerHTML = '<input type="hidden" id="accion" name="accion" value="registrar">';
    boton.innerHTML = 'Registrar';
    equipo.innerHTML = '<option value="">Seleccione un equipo...</option>'
    modelo.innerHTML = '<option value="">Seleccione una modelo...</option>'
    marca.innerHTML = '<option value="">Seleccione una marca...</option>'
    // marca.innerHTML = `<option value="">Seleccione una marca</option>`;

})

</script>
</div>

</body>

</html>