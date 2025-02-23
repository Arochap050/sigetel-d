$(document).ready(function() {
    let table = $("#tabla_empleados").DataTable({

    "ajax": { 
        "url": "../../ajax/administracion/empleados.php",
        "type": "POST",
        "dataSrc": ""
    },

    "columnDefs": [{
        "targets": 8,
        "sortable": false,
        "render": function(data, type, row, meta) {

            var registroId = row.ID_empleado; 

            return "<div class='p-2'><button type='button' id='btnAct' value='"+ registroId +"' name='btnAct' class='btn btn-small btn-primary me-1 mt-1 empleadosacc' data-bs-toggle='modal' data-bs-target='#modalEmpleado'><i class='fa-regular fa-pen-to-square'></i></button>" +
                "<button id='delete_persona' class='btn btn-small btn-warning mt-1'><i class='fa-solid fa-trash'></i></button></div>"; 
        }
    }],

    "columns": [
        { "data": "nombres", "render": function(data) {return '<td><div class="mt-3">'+data+'</div></td>'} },
        { "data": "apellidos" , "render": function(data) {return '<td><div class="mt-3">'+data+'</div></td>'} },
        { "data": "cedula", "render": function(data) {return '<td><div class="mt-3 text-start">'+data+'</div></td>'} },
        { "data": "N_gerencia", "render": function(data) {return '<td><div class="mt-3">'+data+'</div></td>'} },
        { "data": "N_division","render": function(data) {return '<td><div class="mt-3">'+data+'</div></td>'} },
        { "data": "N_cargo", "render": function(data) {return '<td><div class="mt-3">'+data+'</div></td>'} },   
        { "data": "correo", "render": function(data) {return '<td><div class="mt-3">'+data+'</div></td>'} },
        { "data": "foto", "render": function(data) {return '<img src="' + data + '" alt="Imagen" class="imgt"/>';} },
        { "data": "acciones" },
    ],

    "lengthMenu": [5,10,25,50],
    "destroy": true,
    "language": {

        "lengthMenu": "Mostrar _MENU_ ",
        "zeroRecords": "Ningún equipo encontrado",
        "info": "_START_ a _END_ de un total de _TOTAL_ registros",
        "infoEmpty": "Ningún equipo encontrado",
        "infoFiltered": "(filtrados desde _MAX_ registros totales)",
        "search": "Buscar:",
        "loadingRecords": "Cargando...",
        "paginate": {
            
            "first": "<<",
            "last": ">>",
            "next": ">",
            "previous": "<",
            }
        }
    });

empleadosacc("#tabla_empleados tbody",table);

function alerta(title, texto, icono){
    swal.fire({
        title: title,
        text: texto,
        icon: icono,
        background: '#191C24',
        confirmButtonText: "Aceptar"
    });
}

function alerta2(){
    const Toast = Swal.mixin({
        toast: true,
        position: "top",
        showConfirmButton: false,
        background: '#2e323c',
        timer: 8000,
        timerProgressBar: true,
        didOpen: (toast) => {
        toast.onmouseenter = Swal.stopTimer;
        toast.onmouseleave = Swal.resumeTimer;
        }
    });
    Toast.fire({
        icon: "warning",
        title: "Debe completar el formulario de registro"
    });
}

$(document).on("submit", "#formulario_empleado", function(event){
    event.preventDefault();

    let rutaimg = $("#rutaimg").val();
    let id = $("#registroedit").val();
    let pnombre = $("#pnombre").val();
    let snombre = $("#snombre").val();
    let papellido = $("#papellido").val();
    let sapellido = $("#sapellido").val();
    let cedula = $("#cedula").val();
    let gerencia = $("#gerencia").val();
    let division = $("#division").val();
    let cargo = $("#cargo").val();
    let extension = $("#extension").val();
    let telefono = $("#telefono").val();
    let correo = $("#correo").val();

    $.ajax({
        url: "../../ajax/administracion/empleados.php",
        method:"POST",
        data: new FormData(this),
        cache:false,
        contentType:false,
        processData: false,
        success: function(respuesta){

        respuesta = respuesta.replace(/^"|"$/g,'');
        // console.log(respuesta);
        switch (respuesta) {

            case 'registrado': 
                $("#modalEmpleado").modal('hide');
                alerta('Registrado.', 'Empleado registrado con exito.', 'success');
                table.ajax.reload(null,false);
                break;

            case 'editado': 
                $("#modalEmpleado").modal('hide');
                alerta('Editado.', 'Registro editado con exito.', 'success');
                table.ajax.reload(null,false);
                break;

            case 'cedula': 
                alerta('Empleado ya registrado!', 'ya se encuentra registrado un empleado con este numero de cedula.', 'warning');
                break;

            case 'error_jefe_div': 
                alerta('Jefe de division!', 'ya se encuentra un jefe de division encargado en el area seleccionada.', 'warning');
                break;

            case 'imagen_error': 
                alerta('Formato de imagen no valido', 'No se acepta ese formato de imagen, solo: PNG, JPG, JPEG y WEBP ', 'info');
                break;

            case 'vacio':
                alerta2()
                break;

            }
        }
    })
})

$("#tabla_empleados tbody").on('click', '#delete_persona', function(){

    let data = table.row($(this).parents('tr')).data();
    let id_empleado = data['ID_empleado']

    let datos = new FormData();
    datos.append('accion', "eliminar")
    datos.append('id_empleado', id_empleado);

    swal.fire({
        title: "Eliminar",
        text: "Esta seguro de quere eliminar este registro??",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: '#2CB073',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Eliminar',
        cancelButtonText: 'Cancelar',
        background: '#191C24',
        reverseButtons: true,
        padding: '20px',
        backdrop: true,	/* color oscuro de la pagina true-false */
        allowOutsideClick: true,	/* para NO salir con un click */
        allowEscapeKey: true,	/* para salir con un escape */
        allowEnterKey: false,	/* para salir con un enter */

      }).then((willDelete) => {

        if (willDelete.value) {

            $.ajax({
                url:"../../ajax/administracion/empleados.php",
                method:"POST",
                data: datos,
                cache:false,
                contentType:false,
                processData: false,
                success: function(respuesta){
                respuesta = respuesta.replace(/^"|"$/g, '');

                table.ajax.reload(null,false);
                switch (respuesta) {

                    case 'eliminado': 
                        alerta('Empleado eliminado', 'Registro eliminado del sistema', 'success')
                        break;
                
                    case 'error_eliminar':
                        alerta('ERROR', 'Hubo un error del lado del servidor', 'error')
                        break;
                    }
                }
            })
        }
    });
})

});

//------------------ control de formulario ------------------
$(document).on("click","#registroempleado", function(){

    $("#pnombre").val("");
    $("#snombre").val("");
    $("#papellido").val("");
    $("#sapellido").val("");
    $("#cedula").val("");
    $("#extension").val("");
    $("#telefono").val("");
    $("#correo").val("");
    let gerencia = document.getElementById("gerencia");

    function gerenciaa(){
        $.ajax({
            type:"GET",
            url:"../../BD/peticiones/getGerencias.php",
            success: function(response){
                const marcas= JSON.parse(response)
                let template= '<option value="">Seleccione una gerencia</option>'
                marcas.forEach(gerenciaa =>{
                    template += `<option value="${gerenciaa.Id}">${gerenciaa.gerencia}</option>`
                })
                gerencia.innerHTML = template;
            }
        })
    }
    gerenciaa()

    let titulo = document.getElementById("titulomodal_empleados");
    let accion = document.getElementById("funciones");
    let boton = document.getElementById("boton_inv");
    let cargo = document.getElementById("cargo");
    let division = document.getElementById("division");

    titulo.innerHTML = 'Registrar empleado';
    accion.innerHTML = '<input type="hidden" id="accion" name="accion" value="registrar">';
    boton.innerHTML = 'Registrar';
    division.innerHTML = '<option value="">Seleccione una gerencia...</option>'
    cargo.innerHTML = '<option value="">Seleccione una division...</option>'

})

//-----------------------------------------------------------

var empleadosacc = function(tbody, table) {

$("#tabla_empleados tbody").on("click", "button.empleadosacc", function() {
    let registroId = $(this).val();
    actEmpleado(registroId);
});

let gerencia = document.querySelector('#gerencia')
let actdivision = document.querySelector('#division')
let actcargo = document.querySelector('#cargo')

function gerenciaa(){
    $.ajax({
        type:"GET",
        url:"../../BD/peticiones/getGerencias.php",
        success: function(response){
            const marcas= JSON.parse(response)
            let template= '<option value="">Seleccione una gerencia</option>'
            marcas.forEach(gerenciaa =>{
                template += `<option value="${gerenciaa.Id}">${gerenciaa.gerencia}</option>`
            })
            gerencia.innerHTML = template;
        }
    })
}
gerenciaa()

function Actdivision(registroId){
    $.ajax({
        type:"GET",
        url:"../../BD/peticiones/getDivisionAct.php",
        data:{
            gerencia: registroId
        },
        success: function(response) {
            const equipo = JSON.parse(response);
            let template = ''
            equipo.forEach(actdivision => {
                template += `<option value="${actdivision.Id}" ${actdivision.Id === actdivision.divselec ? 'selected' : ''}>${actdivision.division}</option>`;
            });
            actdivision.innerHTML = template;
        }
    })
}

function Actcargo(registroId){
    $.ajax({
        type:"GET",
        url:"../../BD/peticiones/getDivisionAct.php",
        data:{
            division: registroId
        },
        success: function(response) {
            const equipo = JSON.parse(response);
            let template = ''
            equipo.forEach(actcargo => {
                template += `<option value="${actcargo.Id}" ${actcargo.Id === actcargo.divselec ? 'selected' : ''}>${actcargo.cargo}</option>`;
            });
            actcargo.innerHTML = template;
        }
    })
}

function actEmpleado(registroId) {
    
    Actdivision(registroId);
    Actcargo(registroId)
}

$(tbody).on("click", "button.empleadosacc", function() {

    let data = table.row($(this).parents("tr")).data();
    let titulo = document.getElementById("titulomodal_empleados");
    let accion = document.getElementById("funciones");
    let boton = document.getElementById("boton_inv");

    titulo.innerHTML = 'Editar registro del empleado';
    accion.innerHTML = '<input type="hidden" id="accion" name="accion" value="editar" readonly><input type="hidden" id="rutaimg" name="ruta_img_actual" value="" readonly><input type="hidden" id="idempleadoact" name="id_empleado" readonly value="">';
    boton.innerHTML = 'Editar';

    $("#idempleadoact").val(data.ID_empleado);
    $("#pnombre").val(data["p_Nombre_empleado"]);
    $("#snombre").val(data["s_Nombre_empleado"]);
    $("#papellido").val(data.p_Apellido_empleado);
    $("#sapellido").val(data.s_Apellido_empleado);
    $("#cedula").val(data.cedula);
    $("#gerencia").val(data.ID_gerencia);
    $("#cargo").val(data.ID_cargo);
    $("#division").val(data.ID_division);
    $("#extension").val(data.extension);
    $("#telefono").val(data.telefono);
    $("#correo").val(data.correo);
    $("#rutaimg").val(data.foto);
});

};

$(document).ready(function(){
    $("#gerencia").on('change', function () {
        $("#gerencia option:selected").each(function () {
            var id = $(this).val();
            $.post("../../BD/peticiones/getDivisiones.php", { id: id }, function(data) {

                $("#division").html(data);
            });			
        });
    });
});

$(document).ready(function(){
    $("#division").on('change', function () {
        $("#division option:selected").each(function () {
            var idcargo = $(this).val();
            $.post("../../BD/peticiones/getDivisiones.php", { idcargo: idcargo }, function(data) {

                $("#cargo").html(data);
            });			
        });
    });
});

//--------------------------- tabla de tecnicos ----------------------------- 
$(document).ready(function() {
    let table = $("#tabla_empleados_t").DataTable({
    "ajax": { 
        "url": "../../ajax/administracion/empleados.php",
        "type": "POST",
        "dataSrc": ""
    },

    "columns": [
        { "data": "nombres", "render": function(data) {return '<td><div class="mt-3">'+data+'</div></td>'} },
        { "data": "apellidos" , "render": function(data) {return '<td><div class="mt-3">'+data+'</div></td>'} },
        { "data": "cedula", "render": function(data) {return '<td><div class="mt-3 text-start">'+data+'</div></td>'} },
        { "data": "N_gerencia", "render": function(data) {return '<td><div class="mt-3">'+data+'</div></td>'} },
        { "data": "N_division","render": function(data) {return '<td><div class="mt-3">'+data+'</div></td>'} },
        { "data": "N_cargo", "render": function(data) {return '<td><div class="mt-3">'+data+'</div></td>'} },   
        { "data": "correo", "render": function(data) {return '<td><div class="mt-3">'+data+'</div></td>'} },
        { "data": "foto", "render": function(data) {return '<img src="' + data + '" alt="Imagen" class="imgt"/>';} },
    ],
    "lengthMenu": [5,10,25,50],
    "destroy": true,
    "language": {
        "lengthMenu": "Mostrar _MENU_ ",
        "zeroRecords": "Ningún equipo encontrado",
        "info": "_START_ a _END_ de un total de _TOTAL_ registros",
        "infoEmpty": "Ningún equipo encontrado",
        "infoFiltered": "(filtrados desde _MAX_ registros totales)",
        "search": "Buscar:",
        "loadingRecords": "Cargando...",
        "paginate": {
            
            "first": "<<",
            "last": ">>",
            "next": ">",
            "previous": "<",
            }
        }
    });
});