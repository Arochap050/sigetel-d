$(document).ready(function(){

    let tabla = $("#tabla_asignaciones_li").DataTable({
        
        "ajax": { 
            "url": "../../BD/peticiones/tablaAsglineas.php",
            "type": "POST",
            "dataSrc": ""
        },

        "columns": [
            { "data": "N_tipolinea",       "render": function(data) {return '<td><div class="mt-3">'+data+'</div></td>'} },
            { "data": "N_Operadora",      "render": function(data) {return '<td><div class="mt-3">'+data+'</div></td>'} },
            { "data": "Numero",      "render": function(data) {return '<td><div class="mt-3 text-start">'+data+'</div></td>'} },
            { "data": "N_estado_linea", "render": function(data) {return '<td><div class="mt-3">'+data+'</div></td>'} },
            { "data": "acciones", "render": function(data) {return '<td><div class="text text-center p-2"> <button id="btn-asignar-linea-modal" title="Asignar" name="btn_asignarM" value="btn1" class="btn btn-success asignar" data-bs-toggle="modal" data-bs-target="#modal-linea-asg-pres" ><i class="fa-solid fa-ticket"></i> </button> ' + '  <button id="btn-prestar-linea-modal" title="Prestar" name="btn_prestaM" value="btn2" class="btn btn-info asignar" data-bs-toggle="modal" data-bs-target="#modal-linea-asg-pres" ><i class="fa-solid fa-ticket"></i></button></div></td>'} },
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


    let tabla_lineas_asg_pres = $("#tabla_linas_asg_pres").DataTable({
        
        "ajax": { 
            "url": "../../BD/peticiones/tablalineas_asg_pres.php",
            "type": "POST",
            "dataSrc": ""
        },

        "columns": [
            { "data": "tipolinea",       "render": function(data) {return '<td><div class="mt-3">'+data+'</div></td>'} },
            { "data": "operadora",      "render": function(data) {return '<td><div class="mt-3">'+data+'</div></td>'} },
            { "data": "numero",      "render": function(data) {return '<td><div class="mt-3 text-start">'+data+'</div></td>'} },
            { "data": "empleado", "render": function(data) {return '<td><div class="mt-3">'+data+'</div></td>'} },
            { "data": "estado", "render": function(data) {return '<td><div class="mt-3">'+data+'</div></td>'} },
            { "data": "fecha", "render": function(data) {return '<td><div class="mt-3 text-center">'+data+'</div></td>'} },
            { "data": "botones", "render": function(data) {return '<td><div class="m-2 text-center">'+data+'</div></td>'} },
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

    let tabla_lineas_dev = $("#tabla_lineas_dev").DataTable({
        
        "ajax": { 
            "url": "../../BD/peticiones/tablalineas_dev.php",
            "type": "POST",
            "dataSrc": ""
        },

        "columns": [
            { "data": "tipolinea",       "render": function(data) {return '<td><div class="mt-3">'+data+'</div></td>'} },
            { "data": "operadora",      "render": function(data) {return '<td><div class="mt-3">'+data+'</div></td>'} },
            { "data": "numero",      "render": function(data) {return '<td><div class="mt-3 text-start">'+data+'</div></td>'} },
            { "data": "empleado", "render": function(data) {return '<td><div class="mt-3">'+data+'</div></td>'} },
            { "data": "fecha", "render": function(data) {return '<td><div class="mt-3 text-center">'+data+'</div></td>'} },
            { "data": "fecha_dev", "render": function(data) {return '<td><div class="mt-3 text-center">'+data+'</div></td>'} },
            { "data": "botones", "render": function(data) {return '<td><div class="m-2 text-center">'+data+'</div></td>'} },
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


    asignar("#tabla_asignaciones_li tbody",tabla);

    function alerta(title, texto, icono){
        swal.fire({
            title: title,
            text: texto,
            icon: icono,
            background: '#191C24',
            confirmButtonText: "Aceptar"
        });
    }
    $(document).on("submit", '#form_asg_pres_linea', function(event){
            
        event.preventDefault();
    
        let datos = $(this).serialize();
    
        $.ajax({
            url: "../../ajax/asignaciones/asgLineas.php",
            type: "POST",
            data: datos,
            success: function(respuesta){
                respuesta = respuesta.replace(/^"|"$/g,'');
                console.log(respuesta);
                switch (respuesta) {
                    case "asignado":
                        alerta('Equipo asignado!', 'Se ha asignado el equipo.', 'success');
                        $('#modal-linea-asg-pres').modal('hide');
                        tabla.ajax.reload();
                        tabla_lineas_asg_pres.ajax.reload();

                        break;
                    case "prestado":
                        alerta('Prestamo realizado', 'Se ha prestado el equipo de forma correcta', 'success');
                        $('#modal-linea-asg-pres').modal('hide');
                        tabla.ajax.reload();
                        tabla_lineas_asg_pres.ajax.reload();

                        break;
                }
            }
        });
    });


    $(document).on('click', '#info-asg-pres-linea', function(){
        let data = tabla_lineas_asg_pres.row($(this).parents('tr')).data();
        $("#linea-info").val(data.tipolinea+": "+data.operadora);
        $("#codigo").val(data.cod);
        $("#empleado-info").val(data.empleado);
        $("#tecnico-info").val(data.responsable);
        $("#bnacional-info").val(data.bien_nacional);
        $("#observacion-linea-info").val(data.observacion);
        //let estado = document.getElementById("status_eq_dev")
        //estado.innerHTML = ``   
    })

    $(document).on('click', '#recepcion-linea', function(){
        let data = tabla_lineas_asg_pres.row($(this).parents('tr')).data();
        $("#linea-ret").val(data.tipolinea+": "+data.operadora);
        $("#numero-ret").val(data.numero);
        $("#observacion-ret").val(data.observacion);
        $("#empleado-ret").val(data.empleado);
        $("#idlinea-inv").val(data.id_linea_inv);
        $("#idlinea-asg-ret").val(data.id_linea_asg);
    })
    $(document).on('click', '#boton-retorno', function(){
     
        let linea = $("#idlinea-inv").val(),
            id_linea_asg = $("#idlinea-asg-ret").val(),
            tecnico = $("#id_usuario_ret").val(),
            estado = $("#estado-ret").val(),
            observacion = $("#observacion-ret").val()

        let datos = new FormData();
            datos.append('accion', "retorno")
            datos.append('idlinea_inv', linea);
            datos.append('idlinea_asg_ret', id_linea_asg);
            datos.append('id_usuario_ret', tecnico);
            datos.append('estadoinv', estado);
            datos.append('observacion', observacion);

        swal.fire({
            title: "Retorno de linea",
            text: "Se regresara la linea: Si realiza este proceso es por que el usuario a quien se le asigno/presto la determinada linea lo esta regresando. Esta seguro de querer continuar?",
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
                    url:"../../ajax/asignaciones/asgLineas.php",
                    method:"POST",
                    data: datos,
                    cache:false,
                    contentType:false,
                    processData: false,
                    success: function(respuesta){
                    
                    respuesta = respuesta.replace(/^"|"$/g, '');

                    console.log(respuesta)
                    switch (respuesta) {
                        
                        case "regresado":
                            
                            alerta('Linea reincorporada!', 'La linea se regreso a soporte tecnico.', 'success');
                            $('#retornolinea').modal('hide');
                            tabla.ajax.reload(null,false);
                            tabla_lineas_asg_pres.ajax.reload(null,false);
                            tabla_lineas_dev.ajax.reload(null,false);

                            //tabla_equipo_dev.ajax.reload(null,false);

                            break;
                        case "vacio":
                            
                            alerta('Campo vacio!', 'Indique el estado en que se encuentra la linea.', 'info');
                            // $('#retornolinea').modal('hide');
                            // tabla_lineas_asg_pres.ajax.reload(null,false);
                            //tabla_equipo_dev.ajax.reload(null,false);

                            break;
                        }
                    }
                })
            }
        });
    })
})

let asignar = function(tbody, table, row) {
    $(tbody).on("click", "button.asignar", function(){

        let data =table.row($(this).parents("tr")).data();

        $("#lineaasignar").val(data.ID_Linea);
        $("#lineaasg").val(data.N_tipolinea + ' ' + data.N_Operadora);
        $("#numeroasg").val(data.Numero);
        $("#lineaprestamo").val(data.ID_Linea);
        $("#lineapres").val(data.N_tipolinea + ' ' + data.N_Operadora);
        $("#numeropres").val(data.Numero);

    })
}

// --------------------------- asignacion de equipos ----------------------------------

$(document).ready(function(){
    $("#gerencia").on('change', function () {
        $("#gerencia option:selected").each(function () {
            var id = $(this).val();
            $.post("../../BD/peticiones/getDivisiones.php", { id: id }, function(data) {

                $("#Division").html(data);
                $("#Empleadoo").html('<option>Seleccione una Division</option>')
            });			
        });
    });
});

$(document).ready(function(){
    $("#Division").on('change', function () {
        $("#Division option:selected").each(function () {
            var id = $(this).val();
            $.post("../../BD/peticiones/getEmpleados.php", { id: id }, function(data) {
                $("#Empleadoo").html(data);
            });			
        });
    });
});

// ---------------------------- prestamo de equipos ---------------------------------
//$(document).ready(function(){
//     $("#gerenciap").on('change', function () {
//         $("#gerenciap option:selected").each(function () {
//             var id = $(this).val();
//             $.post("../../BD/peticiones/getDivisiones.php", { id: id }, function(data) {
//                 $("#Divisionp").html(data);
//                 $("#Empleadoop").html('<option>Empleado</option>')
//             });			
//         });
//     });
// });

// $(document).ready(function(){
//     $("#Divisionp").on('change', function () {
//         $("#Divisionp option:selected").each(function () {
//             var id = $(this).val();
//             $.post("../../BD/peticiones/getEmpleados.php", { id: id }, function(data) {

//                 $("#Empleadoop").html(data);

//             });			
//         });
//     });
// });


$(document).on('click', '#btn-asignar-linea-modal', function(){

    let titulo = document.getElementById('titulo_modal_asg');
    let accion = document.getElementById('accion-acc');
    let boton = document.getElementById('boton-acc');

    $("#tipo").val("asignar");
    
    titulo.innerHTML = 'Asignar Linea';
    boton.innerHTML = '<button type="submit" class="btn btn-success letf" name="btn_asignar_equipo" value="asignar_equipo">Asignar</button>';

})

$(document).on('click', '#btn-prestar-linea-modal', function(){

    let titulo = document.getElementById('titulo_modal_asg');
    let accion = document.getElementById('accion-acc');
    let boton = document.getElementById('boton-acc');

    $("#tipo").val("prestar");
    titulo.innerHTML = 'Prestar Linea';
    boton.innerHTML = '<button type="submit" class="btn btn-info letf" name="btn_asignar_equipo" value="asignar_equipo">Prestar</button>';
    // accion.innerHTML = '<input type="hidden" id="accion" value="prestar" name="tipo" readonly>';
})
