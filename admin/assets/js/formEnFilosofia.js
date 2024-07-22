console.log(APP_URL);

document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("formEnFilosofia").addEventListener("submit", insert);
  const txtAreas = document.getElementById("descripcion");
  txtAreas.addEventListener("focus", valText);
  txtAreas.addEventListener("keyup", valText);
  obtenerDatos();
});

const camposEn = {
  descripcion: false,
};
const valText = (e) => {
  var campo = e.target.name;
  var estilo = e.target.id;
  var input = e.target;
  var titulo = "";

  if (campo === "descripcion") {
    titulo = "Descripción";
  }

  if (input.value.trim() === "") {
    document.getElementById(`${estilo}`).classList.remove("border-success");
    document.getElementById(`${estilo}`).classList.add("border-danger");
    document.getElementById(`${estilo}`).classList.add("is-invalid");
    showToastr("error", "Verifique el campo", `${titulo}`);
    camposEn[campo] = false;
  } else {
    document.getElementById(`${estilo}`).classList.add("border-success");
    document.getElementById(`${estilo}`).classList.remove("border-danger");
    document.getElementById(`${estilo}`).classList.remove("is-invalid");
    camposEn[campo] = true;
  }
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

function insert(e) {
  e.preventDefault();
  var baseURL = APP_URL + "/admin/vision/addEncabezado";
  let datos = new FormData(this);
  let encabezados = new Headers();
  if (Object.values(camposEn).every((value) => value === true)) {
    axios.post(baseURL, datos, { encabezados }).then((response) => {
      if (response.data.status) {
        showSwal(
          "success",
          "Se enviaron los datos",
          "Con exito",
          response.data.url
        );
      } else {
        showToastr("error", response.data.msg, "Error");
      }
    });
  } else {
    showSwal2(
      "error",
      "Oops...",
      "Verifique que todos los datos esten correctos"
    );
  }
}

function obtenerDatos() {
  var baseURL = APP_URL + "/admin/vision/getEncabezado";
  const data = { encabezado: "Filosofía" };
  axios.post(baseURL, data).then((response) => {
    const data = response.data;
    if (data !== false) {
      document.getElementById("id_usu").value = response.data.id_usu;
      document.getElementById("encabezado").value = response.data.encabezado;
      document.getElementById("descripcion").value = response.data.descripcion;
      camposEn["descripcion"] = true;
      const input = document.createElement("input");
      input.type = "hidden";
      input.id = "id_en";
      input.name = "id_en";
      const form = document.getElementById("formEnFilosofia");
      form.appendChild(input);
      input.value = response.data.id_en;
    }
  });
}
