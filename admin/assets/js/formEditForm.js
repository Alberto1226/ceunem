console.log(APP_URL);

document.addEventListener("DOMContentLoaded", function () {
  document
    .getElementById("formEditContacto")
    .addEventListener("submit", editar);
  obtenerCheck();
  const inputs = document.querySelectorAll('input[type="checkbox"]');
});

const campos = {
  nCompleto: 0,
  nombre: 0,
  apellidos: 0,
  email: 0,
  tel: 0,
  face: 0,
  mensaje: 0,
  asunto: 0,
  live: 0,
};

function showToastr(accion, mensaje, titulo) {
  Command: toastr[accion](mensaje, titulo);
}

function showSwal(icono, titulo, mensaje, url) {
  Swal.fire({
    icon: icono,
    title: titulo,
    text: mensaje,
    confirmButtonText: "OK",
  }).then((resultado) => {
    if (resultado.value) {
      window.location.href = url;
    }
  });
}

function showSwal2(icono, titulo, mensaje) {
  Swal.fire({
    icon: icono,
    title: titulo,
    text: mensaje,
  });
}

function obtenerCheck() {
  var baseURL = APP_URL + "/admin/contacto/getInputs";
  axios.post(baseURL).then((response) => {
    let checkbox;
    for (const key in response.data) {
      campos[key] = response.data[key];
      checkbox = document.getElementById(key + "2");
      const showInput = document.getElementById(key + "F");
      const showLabel = document.getElementById(key + "L");
      if (checkbox === "id_usu2" || checkbox === "id_form2") {
        checkbox.value = response.data[key];
      } else {
        checkbox.value = 1;
        checkbox.checked = response.data[key] === 1 ? true : false;
        if (showInput) {
          showInput.style.display = checkbox.checked ? "block" : "none";
        }
        if (showLabel) {
          showLabel.style.display = checkbox.checked ? "block" : "none";
        }
      }
    }
  });
}

function editar(event) {
  event.preventDefault();
  const camposUno = Object.values(campos).reduce((acum, valor) => {
    return acum + (valor === 1 ? 1 : 0);
  }, 0);
  if (camposUno > 2) {
    var baseURL = APP_URL + "/admin/contacto/upForm";
    let datos = new FormData(formEditContacto);

    let encabezados = new Headers();
    axios.post(baseURL, datos, { encabezados }).then((response) => {
      if (response.data.status) {
        showSwal(
          "success",
          "Actualización exitosa",
          "Se enviaron los datos con exito",
          response.data.url
        );
      } else {
        showToastr("error", response.data.msg, "Error");
      }
    });
  } else {
    showSwal2("error", "Oops...", "No podemos enviar un formulario vacio");
  }
}
