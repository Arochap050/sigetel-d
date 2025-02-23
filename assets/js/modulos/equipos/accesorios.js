/*------------------------ tabla accesorios ------------------------*/
$(document).ready(function(){
    let tabla_accesorio = $('#tabla-accesorios').DataTable({

        "ajax": { 
            "url": "../../BD/peticiones/tabla_accesorios.php",
            "type": "POST",
            "dataSrc": ""
        },

        "columns": [
            { "data": "Nombre_Accesorio", "render": function(data) {return `<td><div class="mt-3">${data}</div></td>`} },
            { "data": "botones", "render": function(data) {return `<td><div class="">${data}</div></td>`} },
        ],

        "lengthMenu": [5,10,25,50],
        "destroy": true,
        "language": {
        "lengthMenu": " _MENU_ Mostrar",
        "zeroRecords": "Ningún registro encontrado",
        "info": "Mostrando de _START_ a _END_ de un total de _TOTAL_ registros",
        "infoEmpty": "Ningún registro encontrado",
        "infoFiltered": "(filtrados desde _MAX_ registros totales)",
        "search": "Buscar:",
        "loadingRecords": "Cargando...",
        "paginate": {
            "first": "<<",
            "last": ">>",
            "next": ">",
            "previous": "<"
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

    $(document).on("submit", '#form_accesorios', function(event){
            
        event.preventDefault(); // Evita que se recargue la página
    
        let datos = $(this).serialize();
    
        $.ajax({
            url: "../../ajax/equipos/accesorios.php",
            type: "POST",
            data: datos,
            success: function(respuesta){
                respuesta = respuesta.replace(/^"|"$/g,'');
                //console.log(respuesta);
                switch (respuesta) {
                    case "registrado":
                        alerta('Accesorio registrado!', 'Se registro un nuevo accesorio con éxito.', 'success');
                        $('#accesorio-modal').modal('hide');
                        tabla_accesorio.ajax.reload();
                        break;
                    case "editado":
                        alerta('Accesorio editado', 'El modelo ha sido editado con éxito', 'success');
                        $('#accesorio-modal').modal('hide');
                        tabla_accesorio.ajax.reload();
                        break;
                    case "existe":
                        alerta('Accesorio ya registrado!', 'Este accesorio ya se encuentra registrado en el sistema.', 'warning');
                        break
                    case "eliminado":
                        alerta('Registro eliminado', 'El registro ha sido eliminado con éxito', 'success');
                        break
                }
            }
        });
    });

/*------------------------ tabla accesorios-equipos ------------------------*/
    let tabla_acc_equipos = $('#tabla-acc-equipos').DataTable({

        "ajax": { 
            "url": "../../BD/peticiones/tabla_acc_equipo.php",
            "type": "POST",
            "dataSrc": ""
        },
        "columns": [
            { "data": "Nombre_equipo", "render": function(data) {return `<td><div class="mt-3">${data}</div></td>`} },
            { "data": "Nombre_Accesorio", "render": function(data) {return `<td><div class="mt-3">${data}</div></td>`} },
            { "data": "botones", "render": function(data) {return `<td><div class="">${data}</div></td>`} },
        ],
        "lengthMenu": [5,10,25,50],
        "destroy": true,
        "language": {
        "lengthMenu": " _MENU_ Mostrar",
        "zeroRecords": "Ningún registro encontrado",
        "info": "Mostrando de _START_ a _END_ de un total de _TOTAL_ registros",
        "infoEmpty": "Ningún registro encontrado",
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

    $(document).on("submit", '#form_accesorios_equipo', function(event){
            
        event.preventDefault(); // Evita que se recargue la página
    
        let datos = $(this).serialize();
    
        $.ajax({
            url: "../../ajax/equipos/accesorios.php",
            type: "POST",
            data: datos,
            success: function(respuesta){
                respuesta = respuesta.replace(/^"|"$/g,'');
                tabla_acc_equipos.ajax.reload();
                //console.log(respuesta);
                switch (respuesta) {
                    case "registrado":
                        alerta('Equipo agregado!', 'Se le agrego un accesorio al equipo con éxito.', 'success');
                        $('#accesorio_eq_modal').modal('hide');
                        break;
                    case "editado":
                        alerta('Registro editado!', 'El registro de accesorio ha sido editado con éxito.', 'success');
                        $('#accesorio_eq_modal').modal('hide');
                        tabla_acc_equipos.ajax.reload();
                        break;
                    case "existe":
                        alerta('Accesorio ya agregado!', 'Este equipo ya tiene este accesorio registrado.', 'warning');
                        break
                    case "eliminado":
                        alerta('Modelo eliminado', 'El modelo ha sido eliminado con éxito', 'success');
                        break
                }
            }
        });
    });

    $(document).on('click', '#editar-accesorio', function(){
        let datos = tabla_accesorio.row($(this).parents("tr")).data();
    
        let titulo = document.getElementById('titulo-accesorio');
        let accion = document.getElementById('acciones');
        let boton = document.getElementById('boton');
    
        titulo.innerHTML = 'Editar accesorio registrado';
        boton.innerHTML = 'Editar';
        accion.innerHTML = '<input type="text" id="accion" value="editar_accesorio" name="accion" readonly><input type="text" id="id_acc" value="editar" name="id_accesorio" readonly>';
    
        $("#accesorio").val(datos.Nombre_Accesorio);
        $("#id_acc").val(datos.ID_Accesorio);
    
    })

    $(document).on('click', '#editar-acc-equipo', function(){
        let datos = tabla_acc_equipos.row($(this).parents("tr")).data();
    
        let titulo = document.getElementById('titulo-acc-equipo');
        let accion = document.getElementById('acciones-acc-e');
        let boton = document.getElementById('boton-acc-e');
    
        titulo.innerHTML = 'Editar registro de un accesorio a un equipo';
        boton.innerHTML = 'Editar';
        accion.innerHTML = '<input type="text" id="accion" value="editar_acc_equipo" name="accion" readonly><input type="text" id="id_acc_eq" value="" name="id_acc_equipo" readonly>';
    
        $("#id_acc_eq").val(datos.ID_Equipo_accesorio);
        $("#equipo").val(datos.equipo);
        $("#accesorio-eq").val(datos.accesorio);
    })

// seccion de eliminar--------------------
$("#tabla-accesorios tbody").on('click', '#delete_accesorio', function(){

    let data = tabla_accesorio.row($(this).parents('tr')).data();
    let idmodelo = data['ID_Accesorio'];

    let datos = new FormData();
    datos.append('accion', "eliminar_accesorio")
    datos.append('id', idmodelo);

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
                url:"../../ajax/equipos/accesorios.php",
                method:"POST",
                data: datos,
                cache:false,
                contentType:false,
                processData: false,
                success: function(respuesta){
                respuesta = respuesta.replace(/^"|"$/g, '');
                //console.log(respuesta);
                tabla_accesorio.ajax.reload(null,false);
                switch (respuesta) {

                    case 'eliminado': 
                        alerta('Registro eliminado!', 'Registro eliminado del sistema de forma correcta.', 'success')
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

$("#tabla-acc-equipos tbody").on('click', '#delete_acc_eq', function(){

    let data = tabla_acc_equipos.row($(this).parents('tr')).data();
    let idmodelo = data['ID_Equipo_accesorio'];

    let datos = new FormData();
    datos.append('accion', "eliminar_acc_equipo")
    datos.append('id', idmodelo);

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
                url:"../../ajax/equipos/accesorios.php",
                method:"POST",
                data: datos,
                cache:false,
                contentType:false,
                processData: false,
                success: function(respuesta){
                respuesta = respuesta.replace(/^"|"$/g, '');
                //console.log(respuesta);
                tabla_acc_equipos.ajax.reload(null,false);
                switch (respuesta) {

                    case 'eliminado': 
                        alerta('Registro eliminado!', 'Registro eliminado del sistema de forma correcta.', 'success')
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

$(document).on('click', '#registrar-accesorio', function(){
    
    let titulo = document.getElementById('titulo-accesorio');
    let accion = document.getElementById('acciones');
    let boton = document.getElementById('boton');

    titulo.innerHTML = 'Registrar accesorio';
    boton.innerHTML = 'Registrar';
    accion.innerHTML = '<input type="text" id="accion" value="registrar_accesorio" name="accion" readonly>';

    $("#accesorio").val('');

})

$(document).on('click', '#registrar-acc-equipo', function(){
    
    let titulo = document.getElementById('titulo-acc-equipo');
    let accion = document.getElementById('acciones-acc-e');
    let boton = document.getElementById('boton-acc-e');

    titulo.innerHTML = 'Registrar un accesorio a un equipo';
    boton.innerHTML = 'Registrar';
    accion.innerHTML = '<input type="text" id="accion" value="registrar_acc_equipo" name="accion" readonly>';

    $("#equipo").val('');
    $("#accesorio-eq").val('');
})