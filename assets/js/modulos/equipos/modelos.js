$(document).ready(function(){
    let table = $('#tabla_modelo').DataTable({
        "ajax": { 
            "url": "../../ajax/equipos/modelos.php",
            "type": "POST",
            "dataSrc": ""
        },
        "columnDefs": [{
            "targets": 3,
            "sortable": false,
            "render": function(data, type, row, meta) {
    
                var registroId = row.ID_Detalle_Equipo; 
    
                return "<div class='p-2'><button title='Editar' type='button' id='editar_modelo' value='"+ registroId +"' name='btnAct' class='btn btn-small btn-primary me-1 mt-1 cerradas' data-bs-toggle='modal' data-bs-target='#modelo_modal' onclick=''>" +
                    "<i class='fa-regular fa-pen-to-square'></i>" +
                    "</button>" +
                    "<button title='Eliminar' id='delete_modelo' class='btn btn-small btn-warning mt-1'>" +
                    "<i class='fa-solid fa-trash'></i></button></div>"; 
            }
        }],

        "columns": [
            { "data": "N_Marca", "render": function(data) {return `<td><div class="mt-3">${data}</div></td>`} },
            { "data": "N_Equipo", "render": function(data) {return `<td><div class="mt-3">${data}</div></td>`} },
            { "data": "N_Modelo", "render": function(data) {return `<td><div class="mt-3">${data}</div></td>`} },
        ],

        "lengthMenu": [5,10,25,50],
        "destroy": true,
        "language": {
            "lengthMenu": "Mostrar  _MENU_ ",
            "zeroRecords": "Ningun registro encontrado",
            "info": "_START_ a _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Ningun registro encontrado",
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
     //----- registro de modelos ------------------
     $(document).on("submit", '#form_modelo', function(event){
            
        event.preventDefault(); // Evita que se recargue la página
    
        let datos = $(this).serialize();
    
        $.ajax({
            url: "../../ajax/equipos/modelos.php",
            type: "POST",
            data: datos,
            success: function(respuesta){
                respuesta = respuesta.replace(/^"|"$/g,'');
               // console.log(respuesta);
                switch (respuesta) {
                    case "registrado":
                        alerta('Modelo registrado!', 'El modelo ha sido registrado con éxito.', 'success');
                        $('#modelo_modal').modal('hide');
                        table.ajax.reload();
                        break;
                    case "editado":
                        alerta('Modelo editado', 'El modelo ha sido editado con éxito', 'success');
                        $('#modelo_modal').modal('hide');
                        table.ajax.reload();
                        break;
                    case "existe":
                        alerta('Modelo ya registrado!', 'Este modelo ya se encuentra registrado en el sistema.', 'warning');
                        break
                    case "eliminado":
                        alerta('Modelo eliminado', 'El modelo ha sido eliminado con éxito', 'success');
                        break
                }
            }
        });
     });
     //----- editar modelos   ---------------------
     //----- eliminar modelos ---------------------

     $(document).on('click', '#registrar_modelo', function(){
    
        let titulo = document.getElementById('titulo_modal');
        let accion = document.getElementById('accion');
        let boton = document.getElementById('boton');
        let marca = document.getElementById('marca');
        let equipo = document.getElementById('equipo');
    
        titulo.innerHTML = 'Registrar Modelo';
        boton.innerHTML = 'Registrar';
        accion.innerHTML = '<input type="hidden" id="accion" value="registrar" name="accion" readonly>';
        // marca.innerHTML = '<option selected>Seleccione una marca</option>';
        // equipo.innerHTML = '<option selected>Seleccione un equipo</option>';
        $("#marca").val('');
        $("#equipo").val('');
        $("#modelo").val('');

    })
        
    $(document).on('click', '#editar_modelo', function(){
        let datos = table.row($(this).parents("tr")).data();

        let titulo = document.getElementById('titulo_modal');
        let accion = document.getElementById('accion');
        let boton = document.getElementById('boton');
    
        titulo.innerHTML = 'Editar modelo registrado';
        boton.innerHTML = 'Editar';
        accion.innerHTML = '<input type="hidden" id="accion" value="editar" name="accion" readonly><input type="hidden" id="idmodelo" name="idmodelo" readonly>';

        $("#idmodelo").val(datos.ID_Modelo);
        $("#marca").val(datos.FKEY_Marca);
        $("#equipo").val(datos.FKEY_Equipo);
        $("#modelo").val(datos.N_Modelo);
    })

    $("#tabla_modelo tbody").on('click', '#delete_modelo', function(){

        let data = table.row($(this).parents('tr')).data();
        let idmodelo = data['ID_Modelo'];

        let datos = new FormData();
        datos.append('accion', "eliminar")
        datos.append('idmodelo', idmodelo);

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
                    url:"../../ajax/equipos/modelos.php",
                    method:"POST",
                    data: datos,
                    cache:false,
                    contentType:false,
                    processData: false,
                    success: function(respuesta){
                    respuesta = respuesta.replace(/^"|"$/g, '');
                    console.log(respuesta);
                    table.ajax.reload(null,false);
                    switch (respuesta) {

                        case 'eliminado': 
                            alerta('Modelo eliminado!', 'Registro eliminado del sistema de forma correcta.', 'success')
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