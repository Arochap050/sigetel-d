$(document).ready(function() {
    let tabla = $("#tabla_Lineas").DataTable({
        "ajax": { 
            "url": "../../BD/peticiones/tablaLineas.php",
            "type": "POST",
            "dataSrc": ""
        },

        "columnDefs": [{
            "targets": 6,
            "sortable": false,
            "render": function(data, type, row, meta) {

                var registroId = row.ID_Linea; 
                var eliminarUrl = "lineas.php?id=" + registroId;
                
                return '<td><div class="text text-center p-3"><button type="button" class="btn btn-small btn-primary actlinea" value="'+ registroId +'" data-bs-toggle="modal" data-bs-target="#actualizarLineamodal" ><i class="fa-regular fa-pen-to-square"></i></button>' + '<a class="btn btn-small btn-warning ms-1" onclick="eliminar_registro(event)" href="'+ eliminarUrl +'"><i class="fa-solid fa-trash"></i></a></div></td>'

            }
        }],

        "columns": [
            { "data": "N_tipolinea", "render": function(data) {return '<td><div class="mt-3">'+data+'</div></td>'} },
            { "data": "N_Operadora", "render": function(data) {return '<td><div class="mt-3">'+data+'</div></td>'} },
            { "data": "N_estado_linea", "render": function(data) {return '<td><div class="mt-3">'+data+'</div></td>'} },
            { "data": "Numero", "render": function(data) {return '<td><div class="mt-3 text-start">'+data+'</div></td>'} },
            { "data": "Cod_puk", "render": function(data) {return '<td><div class="mt-3 text-start">'+data+'</div></td>'} },
            { "data": "Pin", "render": function(data) {return '<td><div class="mt-3 text-start">'+data+'</div></td>'} },
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

    act_linea("#tabla_Lineas tbody", tabla);

})

let act_linea = function(tbody, table) {

    $("#tabla_Lineas tbody").on("click", "button.actlinea", function() {
        let registroId = $(this).val();
        actualizarlinea(registroId);
    });

    let tipolineaact = document.querySelector('#tipoActt')

    function tipolinea(registroId){

        $.ajax({
            type:"GET",
            url:"../../BD/peticiones/getTipolinea.php",
            data:{
                lineaact: registroId
            },
            success: function(response) {
                const equipo = JSON.parse(response);
                let template = ''
                equipo.forEach(tipolineaact => {
                    template += `<option value="${tipolineaact.Id}" ${tipolineaact.Id === tipolineaact.divselec ? 'selected' : ''}>${tipolineaact.tipolinea}</option>`;
                });
    
                tipolineaact.innerHTML = template;
            }
        })
    }

    function actualizarlinea(registroId) {
        tipolinea(registroId);
    }

    $(tbody).on("click", "button.actlinea", function(){
        let data =table.row($(this).parents("tr")).data();

        $("#lineaaCT").val(data.ID_Linea);
        $("#numeroact").val(data.Numero);
        $("#codpukact").val(data.Cod_puk);
        $("#pinact").val(data.Pin);
        $("#operadoraAct").val(data.ID_Operadora);
        $("#tipoActt").val(data.ID_tipolinea);

    })
}

// --------------------------- lineas registro y actualizacion ----------------------------------

$(document).ready(function(){
    $("#operadoraR").on('change', function () {
        $("#operadoraR option:selected").each(function () {
            var id = $(this).val();
            $.post("../../BD/peticiones/getTipolinea.php", { id: id }, function(data) {

                $("#tiposs").html(data);
                
            });			
        });
    });
});

$(document).ready(function(){
    $("#operadoraAct").on('change', function () {
        $("#operadoraAct option:selected").each(function () {
            var id = $(this).val();
            $.post("../../BD/peticiones/getTipolinea.php", { id: id }, function(data) {

                $("#tipoActt").html(data);
                
            });			
        });
    });
});


//------------------------ TABLA DE TECNICOSS --------------------------------
$(document).ready(function() {
    let tabla = $("#tabla_Lineas_t").DataTable({
        "ajax": { 
            "url": "../../BD/peticiones/tablaLineas.php",
            "type": "POST",
            "dataSrc": ""
        },
        "columns": [

            { "data": "N_tipolinea", "render": function(data) {return '<td><div class="mt-3">'+data+'</div></td>'} },
            { "data": "N_Operadora", "render": function(data) {return '<td><div class="mt-3">'+data+'</div></td>'} },
            { "data": "N_estado_linea", "render": function(data) {return '<td><div class="mt-3">'+data+'</div></td>'} },
            { "data": "Numero", "render": function(data) {return '<td><div class="my-3 text-start">'+data+'</div></td>'} },
            { "data": "Cod_puk", "render": function(data) {return '<td><div class="mt-3 text-start">'+data+'</div></td>'} },
            { "data": "Pin", "render": function(data) {return '<td><div class="mt-3 text-start">'+data+'</div></td>'} },
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
})