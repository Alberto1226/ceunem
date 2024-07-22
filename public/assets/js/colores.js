console.log(APP_URL);

document.addEventListener("DOMContentLoaded", function () {
  // Obtén todos los elementos del documento
  var todosLosElementos = document.querySelectorAll("*");

  // Itera sobre cada elemento
  todosLosElementos.forEach(function (elemento) {
    // Alternativamente, si deseas eliminar solo algunas clases específicas, puedes hacerlo así:
    elemento.classList.remove(
      "btn-primary",
      "text-primary",
      "bg-primary",
      "btn-outline-primary"
    );
  });

  obtenerColores();
  defineActivo();
});

function obtenerColores() {
  var baseURL = APP_URL + "/public/home/getColores";
  const data = { encabezado: "Testimonios" };
  axios.post(baseURL, data).then((response) => {
    const btnPag = document.querySelectorAll(".btnPag");

    //var fondo = response.data.btn_hover == '#ffffff' ? fondo = 'transparent' : fondo = response.data.btn_hover;

    btnPag.forEach(function (boton) {
      boton.style.border = `1px solid  ${response.data.btn_color}`;
      boton.style.backgroundColor = response.data.btn_color;
      boton.style.color = response.data.btn_font;

      var iconos = boton.querySelectorAll("i");
      iconos.forEach(function (icono) {
        icono.style.color = response.data.btn_color;
      });

      // Agrega un evento al pasar el mouse sobre el botón efecto hover
      boton.addEventListener("mouseover", function () {
        // Cambia el color de fondo al pasar el mouse sobre el botón
        boton.style.backgroundColor = response.data.fondo;
        boton.style.color = response.data.btn_hfont;

        iconos.forEach(function (icono) {
          icono.style.color = response.data.btn_hover;
        });

        divs.forEach(function (div) {
          div.classList.remove("bg-primary");
          div.classList.add("bg-transparent");
        });
      });

      // Agrega un evento al quitar el mouse del botón
      boton.addEventListener("mouseout", function () {
        // Restaura el color de fondo cuando el mouse deja el botón
        boton.style.backgroundColor = response.data.btn_color;
        boton.style.color = response.data.btn_font;

        iconos.forEach(function (icono) {
          icono.style.color = response.data.btn_color;
        });

        divs.forEach(function (div) {
          div.classList.remove("bg-primary");
          div.classList.add("bg-white");
        });
      });
    });
    const menuPag = document.querySelectorAll(".menuPag");
    menuPag.forEach(function (menu) {
      // let_hf color letra
      // fondo_hf color fondo
      // let_hover color de efecto para la letra
      menu.style.border = `1px solid  ${response.data.fondo_hf}`;
      menu.style.backgroundColor = response.data.fondo_hf;
      var enlaces = menu.querySelectorAll("div a:hover");
      enlaces.forEach(function (enlace) {
        enlace.style.color = response.data.let_hover;
      });
      var parrafos = menu.querySelectorAll("div p, div > p, p");
      parrafos.forEach(function (parrafo) {
        parrafo.style.color = `${response.data.let_hf} !important`;
      });
      var iconos = menu.querySelectorAll("i");
      iconos.forEach(function (icono) {
        icono.style.color = response.data.fondo_hf;
      });
    });

    // Colores generales

    // background - color fondo resto de la pagina
    // font - color de la letra resto de la pagina

    const restPagina = document.querySelectorAll(".restPagina");

    restPagina.forEach(function (restPag) {
      restPag.style.backgroundColor = response.data.background;
      restPag.style.border = `1px solid  ${response.data.background}`;
      restPag.style.color = response.data.font;
      var parrafos = restPag.querySelectorAll("div p, div > p");
      parrafos.forEach(function (parrafo) {
        parrafo.style.color = `${response.data.font} !important`;
      });
    });
  });
}

function defineActivo() {
  // Obtener la URL actual
  var url = window.location.href;

  // Dividir la URL en partes usando el carácter "/"
  var partesURL = url.split("/");

  // Obtener el último valor
  var ultimoValor = partesURL[partesURL.length - 1];
  // Activas el btn
  const busqueda = ultimoValor != "" ? ultimoValor + "-select" : "home-select";
  var miElemento = document.getElementById(busqueda);
  miElemento.className = miElemento.className + " active";
}
