$(document).ready(function() {
    let table = $("#tabla_cargos").DataTable({

    "ajax": { 
        "url": "../../BD/peticiones/tablaCargos.php",
        "type": "POST",
        "dataSrc": ""
    },

    "columnDefs": [{
        "targets": 3,
        "sortable": false,
        "render": function(data, type, row, meta) {

            var registroId = row.ID_cargo; 
            

            var eliminarUrl = "cargos.php?id=" + registroId;

            return '<td><div class="text-center p-2"><button type="button" value="'+ registroId +'" class="btn btn-small btn-primary ms-1 mt-1 mb-1 cargoss" data-bs-toggle="modal" data-bs-target="#modal_cargo"><i class="fa-regular fa-pen-to-square"></i></button><a class="btn btn-small btn-warning ms-1" onclick="eliminar_registro(event)" href="'+ eliminarUrl +'"><i class="fa-solid fa-trash"></i></a></div></td>'; 
        }
    }],
    
    "columns": [
        {"data": "N_gerencia","render": function(data){return '<td><div class="mt-3">'+data+'</div></td>'}},
        {"data": "N_division","render": function(data){return '<td><div class="mt-3">'+data+'</div></td>'}},
        {"data": "N_cargo","render": function(data){return '<td><div class="mt-3">'+data+'</div></td>'}},
        {"data": "acciones"},
    ],

    "lengthMenu": [5,10,25,50,1000],
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

empleadosacc("#tabla_cargos tbody",table);

});

var empleadosacc = function(tbody, table) {

$("#tabla_cargos tbody").on("click", "button.cargoss", function() {
    let registroId = $(this).val();
    actEmpleado(registroId);
});

let actdivision = document.querySelector('#Division_act')

function Actdivision(registroId){

    $.ajax({
        type:"GET",
        url:"../../BD/peticiones/getDivisionAct.php",
        data:{
            division_cargo: registroId
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

function actEmpleado(registroId) {
    
    Actdivision(registroId);
}

$(tbody).on("click", "button.cargoss", function() {
    let data = table.row($(this).parents("tr")).data();

    $("#id_cargo").val(data.ID_cargo);
    $("#gerencia_act").val(data.ID_gerencia);
    $("#cargo_act").val(data.N_cargo);
    });
};

//----------------- REGISTRO -------------------------
$(document).ready(function(){
    $("#gerencia").on('change', function () {
        $("#gerencia option:selected").each(function () {
            var id = $(this).val();
            $.post("../../BD/peticiones/getDivisiones.php", { id: id }, function(data) {

                $("#Division").html(data);

            });			
        });
    });
});

//---------------------- ACTUALIZAR ---------------

$(document).ready(function(){
    $("#gerencia_act").on('change', function () {
        $("#gerencia_act option:selected").each(function () {
            var id = $(this).val();
            $.post("../../BD/peticiones/getDivisiones.php", { id: id }, function(data) {

                $("#Division_act").html(data);

            });			
        });
    });
});
