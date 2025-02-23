var tiempoParaMensaje = 5 * 60000;
var tiempoInactividad = 5 * 60000; 
var temporizadorInactividad;

function reiniciarTemporizador() {
    clearTimeout(temporizadorInactividad);
    temporizadorInactividad = setTimeout(mostrarMensaje, tiempoInactividad);
}

function mostrarMensaje() {
    Swal.fire({
        title: 'Tu sesión está a punto de expirar',
        text: "¿Deseas extenderla?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sí, extender',
        cancelButtonText: 'No, cerrar sesión',
        background: '#191c24',
        timer: 20000,
        timerProgressBar: true,
        willClose: () => {
            if (Swal.getTimerLeft() === 0) {
                window.location.href = '../../controladores/acceso/cerrar_sesion.php';
            }
        }
    }).then((result) => {
        if (result.isConfirmed) {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "../../controladores/acceso/extender_sesion.php", true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    reiniciarTemporizador();
                }
            };
            xhr.send();
        } else {
            window.location.href = '../../controladores/acceso/cerrar_sesion.php';
        }
    });
}

// Eventos para detectar actividad
window.addEventListener('mousemove', reiniciarTemporizador);
window.addEventListener('keydown', reiniciarTemporizador);
window.addEventListener('click', reiniciarTemporizador);

// Iniciar el temporizador por primera vez
reiniciarTemporizador();
