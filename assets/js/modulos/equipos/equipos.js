$(document).ready(function(){
    let table = $('#tabla_equipos').DataTable({
    "ajax": { 
        "url": "../../ajax/equipos/equipos.php",
        "type": "POST",
        "dataSrc": ""
    },
    "columnDefs": [{
        "targets": 1,
        "sortable": false,
        "render": function(data, type, row, meta) {

            var registroId = row.ID_Equipo; 

            return "<div class='p-2'><button title='Editar' type='button' id='editar_equipo' value='"+ registroId +"' name='btnAct' class='btn btn-small btn-primary me-1 mt-1 cerradas' data-bs-toggle='modal' data-bs-target='#modal_equipo' onclick=''>" +
                "<i class='fa-regular fa-pen-to-square'></i>" +
                "</button>" +
                "<button title='Eliminar' id='delete_equipo' class='btn btn-small btn-warning mt-1'>" +
                "<i class='fa-solid fa-trash'></i></button></div>"; 
        }
    }],
    "columns": [
        { "data": "N_Equipo",      "render": function(data) {return `<td><div class="mt-3">${data}</div></td>`} },
    ],
    "lengthMenu": [5,10,25,50],
    "destroy": true,
    "language": {
        "lengthMenu": "Mostrar  _MENU_ ",
        "zeroRecords": "Ningun equipo encontrado",
        "info": "_START_ a _END_ de un total de _TOTAL_ registros",
        "infoEmpty": "Ningun equipo encontrado",
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

     $(document).on("submit", "#form_equipo", function(event){
        event.preventDefault(); // Evita que se recargue la página
        var formData = new FormData(this);
        $.ajax({
            url: '../../ajax/equipos/equipos.php',
            type: "POST",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta){

            respuesta = respuesta.replace(/^"|"$/g, '');

            switch (respuesta) {
                case 'registrado':
                    alerta('Equipo registrado!', 'Registro exitoso', 'success');
                    $('#modal_equipo').modal('hide');
                    table.ajax.reload(null,false);
                    break;
                case 'editado':
                    alerta('Equipo editado!', 'Registro editado exitosamente', 'success');
                    $('#modal_equipo').modal('hide');
                    table.ajax.reload(null,false);
                    break;
                case 'existe':
                    alerta('Equipo existente!', 'El equipo ya se encuentra registrado', 'warning');
                    break;
                default:
                    console.log(respuesta);
                    break
                }
            }           
        })
    })

     $(document).on('click', '#registrar_equipo', function(){
        let titulo = document.getElementById('titulo_modal');
        let accion = document.getElementById('accion');
        let boton = document.getElementById('boton');

        titulo.innerHTML = 'Registrar equipo';
        boton.innerHTML = 'Registrar';
        accion.innerHTML = '<input type="hidden" id="accion" value="registrar" name="accion" readonly>';
        $("#equipo").val('');
    })

    $(document).on('click', '#editar_equipo', function(){

        let data = table.row($(this).parents('tr')).data();

        let titulo = document.getElementById('titulo_modal');
        let accion = document.getElementById('accion');
        let boton = document.getElementById('boton');

        titulo.innerHTML = 'Editar equipo registrado';
        boton.innerHTML = 'Editar';
        accion.innerHTML = '<input type="hidden" id="accion" value="editar" name="accion" readonly><input type="hidden" id="idequipo" name="idequipo" readonly>';
        
        $("#idequipo").val(data.ID_Equipo);
        $("#equipo").val(data.N_Equipo);
    })

    $("#tabla_equipos tbody").on('click', '#delete_equipo', function(){

        let data = table.row($(this).parents('tr')).data();
        let idequipo = data['ID_Equipo']

        let datos = new FormData();
        datos.append('accion', "eliminar")
        datos.append('idequipo', idequipo);

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
                    url:"../../ajax/equipos/equipos.php",
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
                            alerta('Equipo eliminado!', 'Registro eliminado del sistema de forma correcta.', 'success')
                            break;

                        case 'error_eliminar':
                            alerta('Hubo un error', 'Error de llave foranea (otros registros dependen de este por eso no se logro eliminar).', 'warning')
                            break;
                        }
                    }
                })
            }
        });
    })
 })