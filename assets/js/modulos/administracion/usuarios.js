$(document).ready(function(){
    let table = $("#tabla_usuario").DataTable({
        "ajax": { 
            "url": "../../ajax/administracion/usuarios.php",
            "type": "POST",
            "dataSrc": ""
        },

        "columnDefs": [{
            "targets": 5,
            "sortable": false,
            "render": function(data, type, row, meta) {
    
                var registroId = row.id_usuario; 
    
                return "<div class='text-center p-2'><button type='button' id='act_usuario' value='"+ registroId +"' name='btnAct' class='btn btn-small btn-primary me-1 mt-1' data-bs-toggle='modal' data-bs-target='#ActUsuario'><i class='fa-regular fa-pen-to-square'></i></button>" +
                    "<button id='delete_usuario' class='btn btn-small btn-warning mt-1'><i class='fa-solid fa-trash'></i></button></div>"; 
            }
        }],
    
        "columns": [
            { "data": "nombres", "render": function(data) {return '<td><div class="mt-3">'+data+'</div></td>'} },
            { "data": "usuario" , "render": function(data) {return '<td><div class="mt-3 text-center">'+data+'</div></td>'} },
            { "data": "rol", "render": function(data) {return '<td><div class="mt-3 text-center">'+data+'</div></td>'} },
            { "data": "boton", "render": function(data) {return '<td><div class="mt-1 text-center">'+data+'</div></td>'} },
            { "data": "foto", "render": function(data) {return '<td><div class="text-center"><img src="' + data + '" alt="Imagen" class="imgt"/></div></td>'} },
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
    })

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

    $(document).on("submit", "#registro_usuarios", function(event){
        event.preventDefault();
        //let datos = $("#accion").val()
        $.ajax({
            url: "../../ajax/administracion/usuarios.php",
            method:"POST",
            data: new FormData(this),
            cache:false,
            contentType:false,
            processData: false,
            success: function(respuesta){
            console.log(respuesta)

            respuesta = respuesta.replace(/^"|"$/g,'');
            // console.log();
            switch (respuesta) {

                case 'registrado': 
                    $("#registroUsuariosmodal").modal('hide');
                    alerta('Registrado', 'Usuario registrado', 'success');
                    table.ajax.reload(null,false);
                    break;

                case 'bien_n_error': 
                    alerta('Equipo ya registrado en inventario!', 'ya se encuentra registrado un equipo con este bien nacional', 'warning');
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

    $(document).on("submit", "#editar_estatus", function(event){
        event.preventDefault();
        $.ajax({
            url: "../../ajax/administracion/usuarios.php",
            method:"POST",
            data: new FormData(this),
            cache:false,
            contentType:false,
            processData: false,
            success: function(respuesta){
                //console.log(respuesta)
                respuesta = respuesta.replace(/^"|"$/g,'');
                switch (respuesta) {
                    
                    case 'editado': 
                        $("#ActUsuaria").modal('hide');
                        alerta('Actualizado!', 'Se actualizo el estatus del usuario.', 'success');
                        table.ajax.reload(null,false);
                        break;

                    case 'error_editar':
                        alerta('ERROR', 'Hubo un error del lado del servidor', 'error')
                        break;
                }
            }
        })
    })

    $(document).on("submit", "#editar_usuarios", function(event){
        event.preventDefault();
        $.ajax({
            url: "../../ajax/administracion/usuarios.php",
            method:"POST",
            data: new FormData(this),
            cache:false,
            contentType:false,
            processData: false,
            success: function(respuesta){
                respuesta = respuesta.replace(/^"|"$/g,'');

                switch (respuesta) {

                    case 'editado': 
                        $("#ActUsuario").modal('hide');
                        alerta('Editado', 'Usuario editado', 'success');
                        table.ajax.reload(null,false);
                        break;

                    case 'error_editar':
                        alerta('ERROR', 'Hubo un error del lado del servidor', 'error')
                        break;
                }
            }
        })
    })

    $(document).on("click", "#boton_clave", function(){

        let id_usuario = $("#idusuario").val();

        let datos = new FormData;
            datos.append("accion","editar")
            datos.append("tipo_udt","clave")
            datos.append("id_usuario",id_usuario)

        $.ajax({
            url: "../../ajax/administracion/usuarios.php",
            method:"POST",
            data: datos,
            cache:false,
            contentType:false,
            processData: false,
            success: function(respuesta){
                //console.log(respuesta)
                respuesta = respuesta.replace(/^"|"$/g,'');
                switch (respuesta) {
                    
                    case 'editado_clave': 
                        $("#ActUsuario").modal('hide');
                        alerta('Cambio de clave!', 'Se restauro la clave de acceso por defecto con exito.', 'success');
                        table.ajax.reload(null,false);
                        break;

                    case 'error_editar':
                        alerta('ERROR', 'Hubo un error del lado del servidor', 'error')
                        break;
                }
            }
        })
    })

    $("#tabla_usuario tbody").on('click','#act_usuario', function(){
        let data = table.row($(this).parents('tr')).data();
        $("#idusuario").val(data["id_usuario"]);
        $("#usuario_act").val(data["usuario"]);
        $("#tipouseract").val(data["id_tipo_user"]);
    })

    $("#tabla_usuario tbody").on('click','#act_status', function(){
        let data = table.row($(this).parents('tr')).data();
        $("#id_usuario_st").val(data["id_usuario"]);
        $("#status_usuario").val(data["status"]);
    })

    $("#tabla_usuario tbody").on('click', '#delete_usuario', function(){
        let data = table.row($(this).parents('tr')).data();
        let id_usuario = data['id_usuario']

        let datos = new FormData();
        datos.append('accion', "eliminar")
        datos.append('id_usuario', id_usuario);

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
                    url:"../../ajax/administracion/usuarios.php",
                    method:"POST",
                    data: datos,
                    cache:false,
                    contentType:false,
                    processData: false,
                    success: function(respuesta){
                    respuesta = respuesta.replace(/^"|"$/g, '');

                    //console.log(respuesta)
                    table.ajax.reload(null,false);
                    switch (respuesta) {

                        case 'eliminado': 
                            alerta('Usuario eliminado', 'Registro eliminado del sistema', 'success')
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
})

