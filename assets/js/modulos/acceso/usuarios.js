$(document).on("submit", "#sesion-usuario", function(event){
     event.preventDefault();
     function alerta(title, texto, icono){
        swal.fire({
            title: title,
            text: texto,
            icon: icono,
            background: '#2e323c',
            confirmButtonText: "Aceptar"
        });
    }

    function alerta2(icon, text){
        const Toast = Swal.mixin({
            toast: true,
            position: "top",
            showConfirmButton: false,
            background: '#2e323c',
            timer: 8000,
            timerProgressBar: true,
            didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
            }
        });
        Toast.fire({
            icon: icon,
            title: text
        });
    }

    let usuario = $("usuario").val();
    let Password = $("password").val();

    $.ajax({
        url: "ajax/acceso/usuario.php",
        method:"POST",
        data: new FormData(this),
        cache: false,
        contentType:false,
        processData: false,
        success: function(respuesta){
            respuesta = respuesta.replace(/^"|"$/g, '');
            //console.log(respuesta)
            switch (respuesta) {

                case 'logueado':
                    $("#usuario").val("")
                    $("#password").val("")
                    window.location="vistas/paginas/home.php"
                    break;

                case 'userNoen':
                    alerta2('warning','usuario no encontrado.')
                    break;

                case 'contra_incorrecta':
                    alerta2('error','Contraseña incorrecta.',)
                    break;

                case 'vacio':
                    alerta2('info','Debe completar el formulario de registro',)
                    break;

                case 'inactivo':
                    alerta('Usuario Inactivo', 'Este usuario se encuentra desactivado y no tiene permiso de acceso, comuniquese con un administrador para mas informacion', 'warning')
                    break;

                case 'bloqueado':
                    alerta('Bloqueado', 'Su usuario se encuentra bloqueado de momento, comuniquese con un administrador.', 'warning')
                    break;

                case 'usuario_block_int':
                    alerta('Usuario Bloqueado', 'Se ha bloqueado su usuario dado que ingreso la contraseña incorrecta mas de 3 veces seguidas, comuniquese con un administrador para su desbloqueo.', 'warning')
                    break;
                }
        }
    })
})

const images = [ 
    'assets/img/img_login/Vtv.jpg', 
    'assets/img/img_login/prueba2.jpg', 
    'assets/img/img_login/prueba3.jpg' 
]; 
 
let currentIndex = 0; 
 
function changeImage() { 
    const slideshow = document.getElementById('imagen-cambio'); 
    currentIndex = (currentIndex + 1) % images.length; 
    slideshow.style.opacity = 0;
    setTimeout(() => { 
        slideshow.src = images[currentIndex]; 
        slideshow.style.opacity = 2;
    }, 900);
} 
 
setInterval(changeImage, 5000); // Change image every 5 seconds 