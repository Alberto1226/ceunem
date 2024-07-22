console.log(APP_URL);

document.addEventListener("DOMContentLoaded", function () {
  var formulario1 = document.getElementById("formEditImg3");
  formulario1.addEventListener("submit", editar);

  const imagen = document.getElementById("img");
  imagen.addEventListener("keyup", validImg);
  imagen.addEventListener("blur", validImg);

  const texto = document.querySelectorAll('input[type="text"]');
  texto.forEach((input) => {
    input.addEventListener("keyup", validText);
    input.addEventListener("blur", validText);
  });

  const textArea = document.getElementById("descripcion");
  textArea.addEventListener("keyup", validText);
  textArea.addEventListener("blur", validText);

  const select = document.querySelectorAll("select");
  select.forEach((select) => {
    select.addEventListener("keyup", valSelect);
    select.addEventListener("blur", valSelect);
  });

  obtenerDatos();
});

const campos = {
  img: false,
  tit: false,
  descripcion: false,
  btn_name: false,
  link: false,
};

const validImg = (e) => {
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
    var ext = ["jpg", "jpeg", "png"];
    var filext = url.split(".").pop();
    var img = ext.includes(filext);

    if (img === false) {
      document.getElementById(`${campo}`).classList.remove("is-valid");
      document.getElementById(`${campo}`).classList.add("is-warning");
      showToastr(
        "warning",
        "Formato no valido Solo jpg, jpeg, png",
        `${titulo}`
      );
      campos[campo] = false;
    } else {
      document.getElementById(`${campo}`).classList.add("is-valid");
      document.getElementById(`${campo}`).classList.remove("is-warning");
      campos[campo] = true;
    }
  }
};

const validText = (e) => {
  var campo = e.target.name;
  var input = e.target;
  var titulo = "";

  if (campo === "tit") {
    titulo = "Título";
  }
  if (campo === "descripcion") {
    titulo = "Descripción";
  }
  if (campo === "link") {
    titulo = "Link fuera del sitio";
  }

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

const valSelect = (e) => {
  var campo = e.target.name;
  if (e.target.value === "Seleccione una opción") {
    showToastr("error", "Seleccione una opción", "Link del botón");
    document.getElementById(`${campo}`).classList.remove("border-success");
    document.getElementById(`${campo}`).classList.add("border-danger");
    document.getElementById(`${campo}`).classList.add("is-invalid");
    campos["btn_name"] = false;
    campos["link"] = false;
    if (campo === "sLink") {
      document.getElementById("otroLink").style.display = "none";
    }
  } else {
    document.getElementById(`${campo}`).classList.add("border-success");
    document.getElementById(`${campo}`).classList.remove("border-danger");
    document.getElementById(`${campo}`).classList.remove("is-invalid");
    if (campo == "sName") {
      campos["btn_name"] = true;
    } else if (campo == "sLink" && e.target.value === "otro") {
      document.getElementById("otroLink").style.display = "block";
      campos["link"] = false;
    } else {
      document.getElementById("otroLink").style.display = "none";
      campos["link"] = true;
    }
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

function obtenerDatos() {
  var baseURL = APP_URL + "/admin/slider1OfEducativa/getImg";
  var url = APP_URL + "/admin/";
  axios.post(baseURL).then((response) => {
    const slider = response.data;
    const entries = Object.entries(slider);

    let sLink = document.getElementById("sLink");
    let sName = document.getElementById("sName");
    let otroLink = document.getElementById("otroLink");

    entries.forEach(([key, value]) => {
      const input = document.getElementById(key);
      const imgBD = document.getElementById(key + "BD");
      const label = document.getElementById(key + "Tit");

      let tipo = response.data["tUrl"];
      if (
        key !== "tUrl" &&
        key !== "link" &&
        key !== "img" &&
        key !== "btn_name"
      ) {
        campos[key] = true;
        input.value = value;
        document.getElementById("titImg").textContent = response.data.tit;
        document.getElementById("descImg").textContent =
          response.data.descripcion;
      } else if (key !== "tUrl" && key !== "link" && key !== "btn_name") {
        const img = value;
        const file = img.split("/").pop().split(".")[0];
        label.textContent = "Imagen Actual: " + file;
        imgBD.value = img;
        urlImg = url + img;
        campos["img"] = true;
        document.getElementById("sliderImg").src = urlImg;
      } else if (key === "tUrl") {
        if (tipo === 1) {
          sLink.value = response.data.link;
          campos["link"] = true;
        } else {
          sLink.value = "otro";
          otroLink.style.display = "block";
          otroLink.value = response.data.link;
          campos["link"] = true;
        }
      } else if (key === "btn_name") {
        sName.value = response.data.btn_name;
        campos["btn_name"] = true;
        document.getElementById("btnTit").textContent = response.data.btn_name;
        document.getElementById("linkImg").style.display = "inline";
      }
    });
  });
}

function editar(e) {
  e.preventDefault();
  var baseURL = APP_URL + "/admin/slider1OfEducativa/upImg";
  let datos = new FormData(this);
  let encabezados = new Headers();
  if (Object.values(campos).every((value) => value === true)) {
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
    showSwal2("error", "Oops...", "Verifique que este correcta la información");
  }
}
