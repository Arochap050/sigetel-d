$(document).ready(function() {

    let tabla = $("#tabla_asignaciones_eq").DataTable({
        
        "ajax": { 
            "url": "../../BD/peticiones/tablaAsignaciones.php",
            "type": "POST",
            "dataSrc": ""
        },

        "columnDefs": [{
            "targets": 5,
            "sortable": false,
            "render": function(data, type, row, meta) {
    
                var registroId = row.ID_Detalle_Equipo; 
        
                return '<td><div class="text text-center"> <button title="Asignar" name="btn_asignarM" value="'+ registroId +'" class="btn btn-success mt-2 asignar" id="asignar-equipo" data-bs-toggle="modal" data-bs-target="#modal-equipo-asg-pres" ><i class="fa-solid fa-ticket"></i></button> ' + '  <button title="Prestar" name="btn_prestaM" value="'+ registroId +'" class="btn btn-info mt-2 asignar" id="prestar-equipo" data-bs-toggle="modal" data-bs-target="#modal-equipo-asg-pres" ><i class="fa-solid fa-ticket"></i></button></div></td>'; 
            }
        }],

        "columns": [
            { "data": "N_Marca",       "render": function(data) {return '<td><div class="mt-3">'+data+'</div></td>'} },
            { "data": "N_Equipo",      "render": function(data) {return '<td><div class="mt-3">'+data+'</div></td>'} },
            { "data": "N_Modelo",      "render": function(data) {return '<td><div class="mt-3">'+data+'</div></td>'} },
            { "data": "Bien_nacional", "render": function(data) {return '<td><div class="mt-3 text-center">'+data+'</div></td>'} },
            { "data": "img_equipo",    "render": function(data) {return '<div class="text-center"><img src="' + data + '" alt="Imagen" class="imgt"/></div>';} },
            { "data": "acciones",},
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

    let tabla_equipo_asg = $("#tabla_equipo_asg_pres").DataTable({
        
        "ajax": { 
            "url": "../../BD/peticiones/tabla_equipos_asg_pres.php",
            "type": "POST",
            "dataSrc": ""
        },

        "columns": [

            { "data": "marca","render": function(data) {return '<td><div class="mt-3">'+data+'</div></td>'} },
            { "data": "equipo","render": function(data) {return '<td><div class="mt-3">'+data+'</div></td>'} },
            { "data": "modelo","render": function(data) {return '<td><div class="mt-3">'+data+'</div></td>'} },
            { "data": "solicitante","render": function(data) {return '<td><div class="mt-3 ">'+data+'</div></td>'} },
            { "data": "estado","render": function(data) {return '<td><div class="mt-3 ">'+data+'</div></td>'} },
            { "data": "fecha","render": function(data) {return '<td><div class="mt-3 text-center">'+data+'</div></td>'} },
            { "data": "foto","render": function(data) {return '<div class="text-center"><img src="' + data + '" alt="Imagen" class="imgt"/></div>';} },
            { "data": "botones","render": function(data) {return '<td><div class="mt-2 text-center">'+data+'</div></td>'} },
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

    let tabla_equipo_dev = $("#tabla_equipo_dev").DataTable({
        
        "ajax": { 
            "url": "../../BD/peticiones/tabla_equipos_dev.php",
            "type": "POST",
            "dataSrc": ""
        },

        "columns": [

            { "data": "marca","render": function(data) {return '<td><div class="mt-3">'+data+'</div></td>'} },
            { "data": "equipo","render": function(data) {return '<td><div class="mt-3">'+data+'</div></td>'} },
            { "data": "modelo","render": function(data) {return '<td><div class="mt-3">'+data+'</div></td>'} },
            { "data": "solicitante","render": function(data) {return '<td><div class="mt-3 ">'+data+'</div></td>'} },
            { "data": "fecha","render": function(data) {return '<td><div class="mt-3 text-center">'+data+'</div></td>'} },
            { "data": "fecha_dev","render": function(data) {return '<td><div class="mt-3 text-center">'+data+'</div></td>'} },
            { "data": "tipo","render": function(data) {return '<td><div class="mt-3 text-center">'+data+'</div></td>'} },
            { "data": "foto","render": function(data) {return '<div class="text-center"><img src="' + data + '" alt="Imagen" class="imgt"/></div>';} },
            { "data": "botones","render": function(data) {return '<td><div class="mt-2 text-center">'+data+'</div></td>'} },
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

    asignar("#tabla_asignaciones_eq tbody",tabla);

    function alerta(title, texto, icono){
        swal.fire({
            title: title,
            text: texto,
            icon: icono,
            background: '#191C24',
            confirmButtonText: "Aceptar"
        });
    }
    $(document).on("submit", '#form_asg_pres', function(event){
            
        event.preventDefault();
    
        let datos = $(this).serialize();
    
        $.ajax({
            url: "../../ajax/asignaciones/asgEquipos.php",
            type: "POST",
            data: datos,
            success: function(respuesta){
                respuesta = respuesta.replace(/^"|"$/g,'');
                //console.log(respuesta);
                switch (respuesta) {
                    case "asignado":
                        alerta('Equipo asignado!', 'Se ha asignado el equipo.', 'success');
                        $('#modal-equipo-asg-pres').modal('hide');
                        tabla.ajax.reload();
                        tabla_equipo_asg.ajax.reload();

                        break;
                    case "prestado":
                        alerta('Prestamo realizado', 'Se ha prestado el equipo de forma correcta', 'success');
                        $('#modal-equipo-asg-pres').modal('hide');
                        tabla.ajax.reload();
                        tabla_equipo_asg.ajax.reload();

                        break;
                }
            }
        });
    });

    $(document).on('click', '#info-asg-pres', function(){
        let data = tabla_equipo_asg.row($(this).parents('tr')).data();
        $("#equipo-info").val(data.equipo+": "+data.marca+" "+data.modelo);
        $("#empleado-info").val(data.solicitante);
        $("#tecnico-info").val(data.responsable);
        $("#bnacional-info").val(data.bien_nacional);
        $("#observacion-info").val(data.observacion);
        let estado = document.getElementById("status_eq_dev")
        estado.innerHTML = ``   
    })

    $(document).on('click', '#info-asg-pres-dev', function(){
        let data = tabla_equipo_dev.row($(this).parents('tr')).data();
        $("#equipo-info").val(data.equipo+": "+data.marca+" "+data.modelo);
        $("#empleado-info").val(data.solicitante);
        $("#tecnico-info").val(data.responsable);
        $("#bnacional-info").val(data.bien_nacional);
        $("#observacion-info").val(data.observacion);

        let estado = document.getElementById("status_eq_dev")

        estado.innerHTML = `<label for="estado" class="col-sm-2 col-form-label">Estado</label>
                            <div class="col-sm-10">
                                <input id="status-eq-dev" type="text" class="form-control mb-4" id="estado-info" value="" readonly>
                            </div>
                            `
        $("#status-eq-dev").val(data.estado);   
    })

    $(document).on('click', '#recepcion-equipo', function(){
        let data = tabla_equipo_asg.row($(this).parents('tr')).data();
        $("#equipo-ret").val(data.equipo+": "+data.marca+" "+data.modelo);
        $("#empleado-ret").val(data.solicitante);
        $("#observacion-ret").val(data.observacion);
        $("#idequipo-ret").val(data.id);
        $("#idequipoinv-ret").val(data.id_equipo);
    })

    $(document).on('click', '#boton-retorno', function(){
     
        let id_equipo = $("#idequipo-ret").val(),
            id_equipo_inv = $("#idequipoinv-ret").val(),
            id_tecnico_ret = $("#id_usuario-ret").val(),
            observacion = $("#observacion-ret").val(),
            estado_equipo = $("#estado-ret").val()

        let datos = new FormData();
            datos.append('accion', "retorno")
            datos.append('id_equipo', id_equipo);
            datos.append('id_equipo_inv', id_equipo_inv);
            datos.append('id_tecnico_ret', id_tecnico_ret);
            datos.append('observacion', observacion);
            datos.append('estado_equipo', estado_equipo);

        swal.fire({
            title: "Retorno de equipo",
            text: "Se regresara el equipo: Si realiza este proceso es por que el usuario a quien se le asigno/presto el determinado equipo lo esta regresando. Esta seguro de querer continuar?",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: '#0dcaf0',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Continuar',
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
                    url:"../../ajax/asignaciones/asgEquipos.php",
                    method:"POST",
                    data: datos,
                    cache:false,
                    contentType:false,
                    processData: false,
                    success: function(respuesta){
                    
                    respuesta = respuesta.replace(/^"|"$/g, '');
                    //console.log(respuesta)
                    switch (respuesta) {
                        
                        case "regresado":
                            
                            alerta('Equipo reincorporado!', 'El equipo se regreso al almacen.', 'success');
                            $('#retornoEquipo').modal('hide');
                            tabla_equipo_asg.ajax.reload(null,false);
                            tabla.ajax.reload(null,false);
                            tabla_equipo_dev.ajax.reload(null,false);

                            break;

                        case "estado_v":
                            
                            alerta('Campo vacio!', 'Indique en que estado se encuentra el equipo.', 'info');
                            
                            break;
                        }
                    }
                })
            }
        });
    })
})

let asignar = function(tbody, table, row) {

    $("#tabla_asignaciones_eq tbody").on("click", "button.asignar", function() {
        let registroId = $(this).val();
        traer_accesorios(registroId);
    });
    
    let accesorioss = document.querySelector('#accesorios_cargar')
    let accesorioss_asig = document.querySelector('#accesorios_cargar_asig')

    function accesorios(registroId){
    
        $.ajax({
            type:"GET",
            url:"../../BD/peticiones/getAsignaciones.php",
            data:{
                accesorios: registroId
            },
            success: function(response) {
    
                const equipo = JSON.parse(response);
                let template = ``
                equipo.forEach(accesorioss => {
                    template += `
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="${accesorioss.Id}" name="accesorios[]" value="${accesorioss.Id}">
                                <label class="form-check-label" for="">${accesorioss.accesorio}</label>
                            </div>`;
                });
                accesorioss.innerHTML = template;
            }
        })
    }

    function accesorios_asig(registroId){
    
        $.ajax({
            type:"GET",
            url:"../../BD/peticiones/getAsignaciones.php",
            data:{
                accesorios: registroId
            },
            success: function(response) {
    
                const equipo = JSON.parse(response);
                let template = ''
                equipo.forEach(accesorioss_asig => {
                    template += `
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="${accesorioss_asig.Id}" name="accesorios[]" value="${accesorioss_asig.Id}">
                                <label class="form-check-label" for="${accesorioss_asig.Id}">${accesorioss_asig.accesorio}</label>
                            </div>`;
                });
                accesorioss_asig.innerHTML = template;
            }
        })
    }

    function traer_accesorios(registroId) {
        accesorios(registroId);
        accesorios_asig(registroId);
    }

    $(tbody).on("click", "button.asignar", function(){

        let data =table.row($(this).parents("tr")).data();

        $("#equipo_asig").val(data.ID_Detalle_Equipo);
        $("#equipoasg").val(data.N_Equipo + ': ' + data.N_Marca + ' ' + data.N_Modelo);
        $("#equipo_pres").val(data.ID_Detalle_Equipo);
        $("#equipopres").val(data.N_Equipo + ': ' + data.N_Marca + ' ' + data.N_Modelo);
        
    })
}

// --------------------------- asignacion de equipos ----------------------------------

$(document).ready(function(){
    $("#gerencia").on('change', function () {
        $("#gerencia option:selected").each(function () {
            var id = $(this).val();
            $.post("../../BD/peticiones/getDivisiones.php", { id: id }, function(data) {

                $("#Division").html(data);
                $("#Empleado").html('<option>Seleccione un empleado</option>')
                //console.log(data)
            });			
        });
    });
});

$(document).ready(function(){
    $("#Division").on('change', function () {
        $("#Division option:selected").each(function () {
            var id = $(this).val();
            $.post("../../BD/peticiones/getEmpleados.php", { id: id }, function(data) {
                $("#Empleado").html(data);
                //console.log(data)
            });			
        });
    });
});

$(document).on('click', '#asignar-equipo', function(){

    let titulo = document.getElementById('titulo_modal_asg');
    let accion = document.getElementById('accion-acc');
    let boton = document.getElementById('boton-acc');

    titulo.innerHTML = 'Asignar equipo';
    boton.innerHTML = '<button type="submit" class="btn btn-success letf" name="btn_asignar_equipo" value="asignar_equipo">Asignar</button>';
    accion.innerHTML = '<input type="hidden" id="accion" value="asignar" name="tipo" readonly>';

    $("#gerencia").val("");
    $("#Division").val('<option value="">Seleccione una division</option>');
    $("#Empleado").val('<option value="">Seleccione un empleado</option>');
    $("#Division").val('');
    $("#Empleado").val('');

})

$(document).on('click', '#prestar-equipo', function(){

    let titulo = document.getElementById('titulo_modal_asg');
    let accion = document.getElementById('accion-acc');
    let boton = document.getElementById('boton-acc');

    titulo.innerHTML = 'Prestar equipo';
    boton.innerHTML = '<button type="submit" class="btn btn-info letf" name="btn_asignar_equipo" value="asignar_equipo">Prestar</button>';
    accion.innerHTML = '<input type="hidden" id="accion" value="prestar" name="tipo" readonly>';
})
