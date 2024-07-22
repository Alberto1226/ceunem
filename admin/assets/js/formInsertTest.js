console.log(APP_URL);

document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("formInsertTest").addEventListener("submit", addTest);

  const inputs = document.querySelectorAll('input[type="text"]');
  inputs.forEach((input) => {
    input.addEventListener("focus", valText);
    input.addEventListener("keyup", valText);
  });

  const imagen = document.getElementById("img_url");
  imagen.addEventListener("focus", valImagen);
  imagen.addEventListener("change", valImagen);

  const txtAreas = document.getElementById("testimonio");
  txtAreas.addEventListener("focus", valText);
  txtAreas.addEventListener("keyup", valText);
});

function agregar() {
  var addTestModal = new bootstrap.Modal(
    document.getElementById("addTestModal"),
    {}
  );
  addTestModal.show();
}

const campos = {
  nombre: false,
  carrera: false,
  testimonio: false,
  img_url: false,
};

const valImagen = (e) => {
  var campo = e.target.name;
  var input = e.target;
  var titulo = "Imagen";

  if (input.value.trim() === null) {
    document.getElementById(`${campo}`).classList.remove("is-valid");
    document.getElementById(`${campo}`).classList.add("is-invalid");
    showToastr("error", "Verifique el campo", `${titulo}`);
    campos[campo] = false;
  } else {
    var url = input.value;
    var ext = ["jpg", "jpeg", "png", "mp4"];
    var filext = url.split(".").pop();
    var img = ext.includes(filext);

    if (img === false) {
      document.getElementById(`${campo}`).classList.remove("is-valid");
      document.getElementById(`${campo}`).classList.add("is-invalid");
      showToastr("error", "Formato no valido Solo jpg, jpeg, png", `${titulo}`);
      campos[campo] = false;
    } else {
      document.getElementById(`${campo}`).classList.add("is-valid");
      document.getElementById(`${campo}`).classList.remove("is-invalid");
      campos[campo] = true;
    }
  }
};

const valText = (e) => {
  var campo = e.target.name;
  var input = e.target;
  var nameCampo = campo;
  var lCapital = nameCampo[0].toUpperCase();
  var restName = nameCampo.slice(1);
  var titulo = lCapital + restName;

  if (input.value.trim() === "") {
    document.getElementById(`${campo}`).classList.remove("border-success");
    document.getElementById(`${campo}`).classList.add("border-danger");
    document.getElementById(`${campo}`).classList.add("is-invalid");
    showToastr("error", "Verifique el campo", `${titulo}`);
    campos[campo] = false;
  } else {
    document.getElementById(`${campo}`).classList.add("border-success");
    document.getElementById(`${campo}`).classList.remove("border-danger");
    document.getElementById(`${campo}`).classList.remove("is-invalid");
    campos[campo] = true;
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

function invalid() {
  for (const key in campos) {
    if (campos.hasOwnProperty(key)) {
      if (!campos[key]) {
        document.getElementById(`${key}`).classList.remove("border-success");
        document.getElementById(`${key}`).classList.add("border-danger");
        document.getElementById(`${key}`).classList.add("is-invalid");
      }
      if (!campos["img_url"]) {
        document.getElementById(`${key}`).classList.remove("is-valid");
        document.getElementById(`${key}`).classList.add("is-invalid");
      }
    }
  }
}

function addTest(e) {
  e.preventDefault();
  console.log(campos);
  var baseURL = APP_URL + "/admin/testimonios/addTestimonios";
  let datos = new FormData(this);
  let encabezados = new Headers();
  if (Object.values(campos).every((value) => value === true)) {
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
    invalid();
    showSwal2(
      "error",
      "Oops...",
      "Verifique que todos los datos esten correctos"
    );
  }
}
