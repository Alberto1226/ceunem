document.addEventListener("DOMContentLoaded", function () {
    // Obtén todos los elementos del documento
var todosLosElementos = document.querySelectorAll('*');

// Itera sobre cada elemento
todosLosElementos.forEach(function(elemento) {
    // Alternativamente, si deseas eliminar solo algunas clases específicas, puedes hacerlo así:
    elemento.classList.remove('btn-primary', 'text-primary', 'bg-primary', 'btn-outline-primary');
});

    obtenerColores();
});

function obtenerColores() {
    var baseURL = 'http://localhost/ceunem/public/home/getColores';
    const data = { encabezado: 'Testimonios' }
    axios.post(baseURL, data).then((response) => {
        console.log(response.data)
        const btnPag = document.querySelectorAll('.btnPag');
        //var fondo = response.data.btn_hover == '#ffffff' ? fondo = 'transparent' : fondo = response.data.btn_hover;

        btnPag.forEach(function (boton) {
            boton.style.border = `1px solid  ${response.data.btn_color}`;
            boton.style.backgroundColor = response.data.btn_color;
            boton.style.color = response.data.btn_font;

            var iconos = boton.querySelectorAll('i');
                iconos.forEach(function (icono) {
                    icono.style.color =   response.data.btn_color;
            });   
            
            // Agrega un evento al pasar el mouse sobre el botón efecto hover
            boton.addEventListener('mouseover', function () {
                // Cambia el color de fondo al pasar el mouse sobre el botón
                boton.style.backgroundColor = fondo;
                boton.style.color = response.data.btn_hfont;

                iconos.forEach(function (icono) {
                    icono.style.color = response.data.btn_hover;
                });

                divs.forEach(function(div){
                    div.classList.remove('bg-primary');
                    div.classList.add('bg-transparent');
                });
            });

            // Agrega un evento al quitar el mouse del botón
            boton.addEventListener('mouseout', function () {
                // Restaura el color de fondo cuando el mouse deja el botón
                boton.style.backgroundColor = response.data.btn_color;
                boton.style.color = response.data.btn_font;
                
                iconos.forEach(function (icono) {
                    icono.style.color =   response.data.btn_color;
                });

                divs.forEach(function(div){
                    div.classList.remove('bg-primary');
                    div.classList.add('bg-white');
                });
            });
        });
    })
}