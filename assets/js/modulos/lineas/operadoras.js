$(document).ready(function(){
    let tabla_operadora = $('#tabla-operadora').DataTable({

        "ajax": { 
            "url": "../../ajax/lineas/operadoras.php",
            "type": "POST",
            "dataSrc": ""
        },

        "columns": [
            { "data": "operadora", "render": function(data) {return `<td><div class="m-3">${data}</div></td>`} },
            { "data": "botones", "render": function(data) {return `<td><div class="m-3">${data}</div></td>`} },
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
})

$(document).on('click', '#registrar', function(){

    let estado = document.getElementById("acciones")
    let titulo = document.getElementById("titulo-modal")
    let boton = document.getElementById("boton-modal")

    titulo.innerHTML = `Registrar operadora`
    estado.innerHTML = `<input type="text" value="registrar" name="accion">`
    boton.innerHTML = `Registrar`
})

$(document).on('click', '#editar', function(){

    let estado = document.getElementById("acciones")
    let titulo = document.getElementById("titulo-modal")
    let boton = document.getElementById("boton-modal")

    titulo.innerHTML = `Editar registro de operadora`
    estado.innerHTML = `<input id="id_operadora" type="text" value="" name="id_registro"><input type="text" value="editar" name="accion">`
    boton.innerHTML = `Editar`
})