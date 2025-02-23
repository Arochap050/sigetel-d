$(document).ready(function(){
   let table = $('#tabla_marcas').DataTable({
    "ajax": { 
        "url": "../../ajax/equipos/marcas.php",
        "type": "POST",
        "dataSrc": ""
    },
    "columnDefs": [{
        "targets": 1,
        "sortable": false,
        "render": function(data, type, row, meta) {

            var registroId = row.id_marca; 

            return "<div class='p-2'><button title='Editar' type='button' id='editar_marca' value='"+ registroId +"' name='btnAct' class='btn btn-small btn-primary me-1 mt-1 cerradas' data-bs-toggle='modal' data-bs-target='#marca_modal'>" +
                "<i class='fa-regular fa-pen-to-square'></i>" +
                "</button>" +
                "<button title='Eliminar' id='delete_marca' class='btn btn-small btn-warning mt-1'>" +
                "<i class='fa-solid fa-trash'></i></button></div>"; 
        }
    }],
    "columns": [
        { "data": "N_Marca",      "render": function(data) {return `<td><div class="mt-3">${data}</div></td>`} },
    ],
    "lengthMenu": [5,10,25,50],
    "destroy": true,
    "language": {
        "lengthMenu": "Mostrar  _MENU_ ",
        "zeroRecords": "Ninguna marca encontrada",
        "info": "_START_ a _END_ de un total de _TOTAL_ registros",
        "infoEmpty": "Ninguna marca encontrada",
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

    function alerta(title, texto, icono){
        swal.fire({
            title: title,
            text: texto,
            icon: icono,
            background: '#191C24',
            confirmButtonText: "Aceptar"
        });
    }

    //registro de marca
    $(document).on("submit", '#form_marcas', function(event){

        event.preventDefault(); // Evita que se recargue la página

        let rutaimg = $("rutaimg").val();
        let id = $("registroedit").val();

        $.ajax({
            url: "../../ajax/equipos/marcas.php",
            method:"POST",
            data: new FormData(this),
            cache:false,
            contentType:false,
            processData: false,
            success: function(respuesta){

            respuesta = respuesta.replace(/^"|"$/g,'');
            console.log(respuesta);
            switch (respuesta) {

                case 'registrado': 
                    $("#marca_modal").modal('hide');
                    alerta('Registrado', 'Marca registrada con exito!', 'success');
                    table.ajax.reload(null,false);
                    break;

                case 'editado':
                    $("#marca_modal").modal('hide');
                    alerta('Editado', 'Registro editado con exito', 'success');
                    table.ajax.reload(null,false);
                    break;

                case 'existe': 
                    alerta('Marca ya registrada!', 'La marca ya se encuentra registrada.', 'warning');
                    break;

                case 'error': 
                    //alerta('Equipo ya registrado en inventario!', 'ya se encuentra registrado un equipo con este bien nacional', 'warning');
                    break;

                case 'vacio':
                    alerta2()
                    break;

                default:
                    console.log(respuesta);
                    break;

                }
            }
        })
    })

    $(document).on('click', '#registrar_marca', function(){

        let titulo = document.getElementById('titulo_modal');
        let accion = document.getElementById('accion');
        let boton = document.getElementById('btn_accion');

        titulo.innerHTML = 'Registrar Marca';
        boton.innerHTML = 'Registrar';
        accion.innerHTML = '<input type="hidden" id="accion" value="registrar" name="accion" readonly>';
        $("#marca").val("");

    })

    $("#tabla_marcas tbody").on('click', '#editar_marca', function(){
        let datos = table.row($(this).parents("tr")).data();

        let titulo = document.getElementById('titulo_modal');
        let accion = document.getElementById('accion');
        let boton = document.getElementById('btn_accion');

        titulo.innerHTML = 'Editar Marca';
        boton.innerHTML = 'Editar';
        accion.innerHTML = '<input type="hidden" id="accion" value="editar" name="accion" readonly><input type="hidden" id="idmarca" value="" name="idmarca" readonly>';

        $("#idmarca").val(datos.id_Marca);
        $("#marca").val(datos.N_Marca);

    })

    $("#tabla_marcas tbody").on('click', '#delete_marca', function(){

        let data = table.row($(this).parents('tr')).data();
        let idmarca = data['id_Marca']

        let datos = new FormData();
        datos.append('accion', "eliminar")
        datos.append('idmarca', idmarca);

        swal.fire({
            title: "Eliminar",
            text: "Esta seguro de querer eliminar este registro?",
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
                    url:"../../ajax/equipos/marcas.php",
                    method:"POST",
                    data: datos,
                    cache:false,
                    contentType:false,
                    processData: false,
                    success: function(respuesta){
                    respuesta = respuesta.replace(/^"|"$/g, '');
                    //console.log(respuesta);
                    table.ajax.reload(null,false);
                    switch (respuesta) {

                        case 'eliminado': 
                            alerta('Marca eliminada', 'Registro eliminado del sistema de forma correcta', 'success')
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