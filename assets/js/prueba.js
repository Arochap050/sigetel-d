// const chactMarcas = document.getElementById('marca-a')
// chactMarcas.addEventListener('change', getEquiposact)

// const chactMarcasvacia = document.getElementById('marca-a')
// chactMarcasvacia.addEventListener('change', getmodelovacioact)

// const chactEquipo = document.getElementById('equipo-a')
// chactEquipo.addEventListener('change', getModelosact)

// const chactModelos = document.getElementById('modelo-a')

// function fetchAndSetData(url, formData, targetElement){

//     return fetch(url, {
//         method: "POST",
//         body: formData,
//         mode: 'cors'
//     })
//         .then(response => response.json())
//         .then(data => {
//         targetElement.innerHTML = data;
//         })
//         .catch(err => console.log(err));
// }

// function getEquiposact(){
//     let actmarca = chactMarcas.value
//     let url = '../../BD/peticiones/getEquipos.php'
//     let formData = new FormData()
//         formData.append('marca_e', actmarca)

//     fetchAndSetData(url, formData, chactEquipo)
// }

// function getmodelovacioact() {
//     let url = '../../BD/peticiones/select.php';
//     let formData = new FormData();
//     fetchAndSetData(url, formData, chactModelos)
//         .catch(err => console.log(err));
// }

// function getModelosact() {

//     let actmodelos = chactEquipo.value;
//     let actmarca = chactMarcas.value;
//     let url = '../../BD/peticiones/getModelos.php';
//     let formData = new FormData();
//         formData.append('equipo_e', actmodelos);
//         formData.append('marca_e', actmarca)

//     fetchAndSetData(url, formData, chactModelos)
//         .catch(err => console.log(err));
// }

