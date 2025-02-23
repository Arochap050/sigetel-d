function eliminar_registro(e){

	e.preventDefault();

	var url = e.currentTarget.getAttribute('href');

	Swal.fire({
		title: '¿Está seguro?',
		text: '¡No podrá recuperar este registro!',
		icon: 'question',/*icono que va mostrar success-error-info-warning-question*/
		showCancelButton: true,
		confirmButtonColor: '#2CB073',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Eliminar',
		cancelButtonText: 'Cancelar',
		reverseButtons: true,
		//width:'300px',
		padding: '20px',
		backdrop: true,	/* color oscuro de la pagina true-false */

		//position: 'top',	/* posicion de ubicacion top--bottom--center top-end bottom-end top-start */
		background: '#191c24',
		allowOutsideClick: true,	/* para NO salir con un click */
		allowEscapeKey: true,	/* para salir con un escape */
		allowEnterKey: false,	/* para salir con un enter */

	}).then((result) => {
		if (result.isConfirmed) {
			window.location.href = url;
		//this.submit();
		}
	})
}

function cerrarSession(e){

	e.preventDefault();

	var url = e.currentTarget.getAttribute('href');

	Swal.fire({
		title: 'Cerrar session',
		text: '¿Seguro que desea cerrar la session?',
		icon: 'question',/*icono que va mostrar success-error-info-warning-question*/
		showCancelButton: true,
		confirmButtonColor: '#02d5ff9c',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Si',
		cancelButtonText: 'No',
		reverseButtons: true,
		padding: '20px',
		backdrop: true,	/* color oscuro de la pagina true-false */
		background: '#191c24',
		allowOutsideClick: true,
		allowEscapeKey: true,
		allowEnterKey: false,

	}).then((result) => {
		if (result.isConfirmed) {
			window.location.href = url;
		//this.submit();
		}
	})
}

function retorno(e){

	e.preventDefault();

	var url = e.currentTarget.getAttribute('href');

	Swal.fire({
		title: 'Reincorporar',
		text: '¿Seguro que desea reincorporar la Linea?',
		icon: 'question',/*icono que va mostrar success-error-info-warning-question*/
		showCancelButton: true,
		confirmButtonColor: '#ffc107',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Si',
		cancelButtonText: 'No',
		reverseButtons: true,
		//width:'300px',
		padding: '20px',
		backdrop: true,	/* color oscuro de la pagina true-false */

		//position: 'top',	/* posicion de ubicacion top--bottom--center top-end bottom-end top-start */
		background: '#191c24',
		allowOutsideClick: false,	/* para NO salir con un click */
		allowEscapeKey: true,	/* para salir con un escape */
		allowEnterKey: false,	/* para salir con un enter */

	}).then((result) => {
		if (result.isConfirmed) {
			window.location.href = url;
		//this.submit();
		}
	})
}

function retornoequipo(e){

	e.preventDefault();

	var url = e.currentTarget.getAttribute('href');

	Swal.fire({
		title: 'Reincorporar',
		text: '¿Seguro que desea reincorporar el equipo?',
		icon: 'question',/*icono que va mostrar success-error-info-warning-question*/
		showCancelButton: true,
		confirmButtonColor: '#ffc107',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Si',
		cancelButtonText: 'No',
		reverseButtons: true,
		//width:'300px',
		padding: '20px',
		backdrop: true,	/* color oscuro de la pagina true-false */

		//position: 'top',	/* posicion de ubicacion top--bottom--center top-end bottom-end top-start */
		background: '#191c24',
		allowOutsideClick: false,	/* para NO salir con un click */
		allowEscapeKey: true,	/* para salir con un escape */
		allowEnterKey: false,	/* para salir con un enter */

	}).then((result) => {
		
		if (result.isConfirmed) {
			window.location.href = url;
		//this.submit();
		}
	})
}

// document.addEventListener('DOMContentLoaded', function() {

// function getParameterByName(name) {

// 	const url = new URL(window.location.href);
// 	return url.searchParams.get(name);
// }

// function notificacion(title, text, icon) {

// 	Swal.fire({
// 		title: title,
// 		text: text,
// 		icon: icon,
// 		confirmButtonText: 'Aceptar',
// 		background: '#191c24',
// 	});
// }

// const mensaje = getParameterByName('msg');

// switch(mensaje) {

// 	case '1':
// 		notificacion('Usuario no encontrado.', '', 'warning');

// 		break;

// 	case '2':
// 		notificacion('Contraseña incorrecta.', '', 'error');

// 		break;

// 	case '3':
// 		notificacion('Usuario Inactivo.', 'Este usuario se encuentra desactivado y no tiene permiso de acceso, comuniquese con un administrador para mas informacion.', 'error');

// 		break;

// 	case '4':
// 		notificacion('Usuario Bloqueado.', 'Este usuario se encuentra bloqueado, comuniquese con un administrador para su desbloqueo.', 'warning');

// 		break;

// 	case '5':
// 		notificacion('Usuario Bloqueado.', 'Se ha bloqueado su usuario dado que ingreso la contraseña incorrecta mas de 3 veces seguidas, comuniquese con un administrador para su desbloqueo.', 'warning');
		
// 		break;
// 	}
// });

