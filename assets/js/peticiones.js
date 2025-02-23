const chMarcas = document.getElementById('marca')
chMarcas.addEventListener('change', getEquipos)

const chMarcasvacia = document.getElementById('marca')
chMarcasvacia.addEventListener('change', getmodelovacio)

const chEquipo = document.getElementById('equipo')
chEquipo.addEventListener('change', getModelos)

const chModelos = document.getElementById('modelo')

function fetchAndSetData(url, formData, targetElement){

    return fetch(url, {
        method: "POST",
        body: formData,
        mode: 'cors'
    })
        .then(response => response.json())
        .then(data => {
        targetElement.innerHTML = data;
        })
        .catch(err => console.log(err));
}

function getEquipos(){
    let marca = chMarcas.value
    let url = '../../BD/peticiones/getEquipos.php'
    let formData = new FormData()
    formData.append('marca_e', marca)

    fetchAndSetData(url, formData, chEquipo)
}

function getModelos() {
    let modelos = chEquipo.value;
    let marca = chMarcas.value;
    let url = '../../BD/peticiones/getModelos.php';
    let formData = new FormData();
    formData.append('equipo_e', modelos);
    formData.append('marca_e', marca)

    fetchAndSetData(url, formData, chModelos)
        .catch(err => console.log(err));
}

function getmodelovacio() {

    let url = '../../BD/peticiones/select.php';
    let formData = new FormData();
    fetchAndSetData(url, formData, chModelos)
        .catch(err => console.log(err));
}