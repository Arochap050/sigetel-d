$(document).ready(function() {
    let table = $("#tabla_inventario").DataTable({
    "ajax": { 
        "url": "../../ajax/equipos/inventario.php",
        "type": "POST",
        "dataSrc": ""
    },
    "columnDefs": [{
        "targets": 8,
        "sortable": false,
        "render": function(data, type, row, meta) {

            var registroId = row.ID_Detalle_Equipo; 

            return "<div class='p-2'><button title='Editar' type='button' id='actualizar_equipo_inv' value='"+ registroId +"' name='btnAct' class='btn btn-small btn-primary me-1 mt-1 cerradas' data-bs-toggle='modal' data-bs-target='#modal_inventario' onclick=''>" +
                "<i class='fa-regular fa-pen-to-square'></i>" +
                "</button>" +
                "<button title='Eliminar' id='delete_equipo' class='btn btn-small btn-warning mt-1'>" +
                "<i class='fa-solid fa-trash'></i></button></div>"; 
        }
    }],
    "columns": [
        { "data": "N_Equipo",      "render": function(data) {return `<td><div class="mt-3">${data}</div></td>`} },
        { "data": "N_Marca",       "render": function(data) {return `<td><div class="mt-3">${data}</div></td>`} },
        { "data": "N_Modelo",      "render": function(data) {return `<td><div class="mt-3">${data}</div></td>`} },
        { "data": "Estado",        "render": function(data) {return `<td><div class="mt-3">${data}</div></td>`} },
        { "data": "Bien_nacional", "render": function(data) {return `<td><div class="mt-3">${data}</div></td>`} },
        { "data": "serial",        "render": function(data) {return `<td><div class="mt-3 text-start">${data}</div></td>`} },
        { "data": "N_division",    "render": function(data) {return `<td><div class="mt-3">${data}</div></td>`} },
        { "data": "img_equipo",    "render": function(data) {return `<img src="${data}" alt="Imagen" class="imgt"/>`} },
        // { "data": "acciones" },
    ],
    "lengthMenu": [5,10,25,50],
    "destroy": true,
    "language": {
        "lengthMenu": "Mostrar  _MENU_ ",
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
    
    cerradas("#tabla_inventario tbody",table);

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

    $(document).on("submit", '#registrarInventario', function(event){

        event.preventDefault(); // Evita que se recargue la página

        let rutaimg = $("rutaimg").val();
        let id = $("registroedit").val();
        let accion = $("#accion").val();
        let marca = $("#marca").val();
        let equipo = $("#equipo").val();
        let modelo = $("#modelo").val();
        let serial = $("#serial").val();
        let bien_nacional = $("#bnacional").val();
        let fotos = $("#imagen").val();

        $.ajax({
            url: "../../ajax/equipos/inventario.php",
            method:"POST",
            data: new FormData(this),
            cache:false,
            contentType:false,
            processData: false,
            success: function(respuesta){

            respuesta = respuesta.replace(/^"|"$/g,'');
            // console.log();
            switch (respuesta) {

                case 'registrado': 
                    $("#modal_inventario").modal('hide');
                    alerta('Registrado', 'Equipo registrado en inventario', 'success');
                    table.ajax.reload(null,false);
                    break;

                case 'editado': 
                    $("#modal_inventario").modal('hide');
                    alerta('Editado', 'Registro editado con exito', 'success');
                    table.ajax.reload(null,false);
                    break;

                case 'bien_n_error': 
                    alerta('Equipo ya registrado en inventario!', 'ya se encuentra registrado un equipo con este bien nacional', 'warning');
                    break;

                case 'serial_error': 
                    alerta('Equipo ya registrado en inventario!', 'ya se encuentra registrado un equipo con este serial', 'warning');
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

    $("#tabla_inventario tbody").on('click', '#delete_equipo', function(){

        let data = table.row($(this).parents('tr')).data();
        let id_equipo = data['ID_Detalle_Equipo']

        let datos = new FormData();
        datos.append('accion', "eliminar")
        datos.append('id_registro', id_equipo);

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
                    url:"../../ajax/equipos/inventario.php",
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
                            alerta('Equipo eliminado', 'Registro eliminado del sistema', 'success')
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

var cerradas = function(tbody, table) {

    $("#tabla_inventario tbody").on("click", "button.cerradas", function() {
        let registroId = $(this).val();
        Botoncerradas(registroId);
    });

    let actmarca = document.querySelector('#marca')
    let actequipo = document.querySelector('#equipo')
    let actmodelo = document.querySelector('#modelo')

    function Amarca(){
        $.ajax({
            type:"GET",
            url:"../../BD/peticiones/getMarcaact.php",
            success: function(response){
                const marcas= JSON.parse(response)
                let template= ''
                marcas.forEach(actmarca =>{
                    template += `<option value="${actmarca.Id}">${actmarca.marca}</option>`
                })
                actmarca.innerHTML = template;
            }
        })
    }
    Amarca()

    function Actequipo(registroId){
        $.ajax({
            type:"GET",
            url:"../../BD/peticiones/getEquipoact.php",
            data:{
                registroId: registroId
            },
            success: function(response) {
                const equipo = JSON.parse(response);
                let template = ''
                equipo.forEach(actequipo => {
                    template += `<option value="${actequipo.Id}" ${actequipo.Id === actequipo.equiposelec ? 'selected' : ''}>${actequipo.equipo}</option>`;
                });
                actequipo.innerHTML = template;
            }
        })
    }

    function Actmodelo(registroId){
        $.ajax({
            type:"GET",
            url:"../../BD/peticiones/getModeloact.php",
            data:{
                registroId: registroId
            },
            success: function(response) {
                const modelo = JSON.parse(response);
                let template = ''
                modelo.forEach(actmodelo => {
                    template += `<option value="${actmodelo.Id}" ${actmodelo.Id === actmodelo.equiposelec ? 'selected' : ''}>${actmodelo.modelo}</option>`;
                });
                actmodelo.innerHTML = template;
            }
        })
    }

    function Botoncerradas(registroId) {
        Actequipo(registroId);
        Actmodelo(registroId);
    }

    $(tbody).on("click", "button.cerradas", function() {
        let data = table.row($(this).parents("tr")).data();

        let titulo = document.getElementById("titulomodal_inventario");
        let accion = document.getElementById("accion");
        let boton = document.getElementById("boton_inv");
        titulo.innerHTML = '<h5 class="modal-title text-center mt-4 mb-3">Editar equipo</h5>';
        accion.innerHTML = '<input type="hidden" id="accion" name="accion" value="editar"><input type="hidden" id="rutaimg" name="ruta_img_actual" value=""><input type="hidden" id="registroedit" name="id_registro" value="">';
        // accion.innerHTML = '';
        boton.innerHTML = 'Editar';

        $("#registroedit").val(data.ID_Detalle_Equipo);
        $("#marca").val(data.id_Marca);
        $("#equipo").val(data.ID_Equipo);
        $("#modelo").val(data.ID_Modelo);
        $("#bnacional").val(data.Bien_nacional);
        $("#serial").val(data.serial);
        $("#rutaimg").val(data.img_equipo);
    });
};

//------------------------ TABLA DE TECNICOSS --------------------------------
$(document).ready(function() {
    let table = $("#tabla_inventario_t").DataTable({
    "ajax": { 
        "url": "../../ajax/equipos/inventario.php",
        "type": "POST",
        "dataSrc": ""
    },

    "columns": [
        { "data": "N_Equipo",      "render": function(data) {return '<td><div class="mt-3">'+data+'</div></td>'} },
        { "data": "N_Marca",       "render": function(data) {return '<td><div class="mt-3">'+data+'</div></td>'} },
        { "data": "N_Modelo",      "render": function(data) {return '<td><div class="mt-3">'+data+'</div></td>'} },
        { "data": "Estado",        "render": function(data) {return '<td><div class="mt-3">'+data+'</div></td>'} },
        { "data": "Bien_nacional", "render": function(data) {return '<td><div class="mt-3">'+data+'</div></td>'} },
        { "data": "serial",        "render": function(data) {return '<td><div class="mt-3 text-start">'+data+'</div></td>'} },
        { "data": "N_division",    "render": function(data) {return '<td><div class="mt-3">'+data+'</div></td>'} },
        { "data": "img_equipo",    "render": function(data) {return '<img src="' + data + '" alt="Imagen" class="imgt"/>';} },
    ],

    "lengthMenu": [5,10,25,50],
    "destroy": true,
    "language": {
        "lengthMenu": "Mostrar  _MENU_ ",
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