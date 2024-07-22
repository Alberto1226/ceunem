console.log(APP_URL);

document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("formEditTest").addEventListener("submit", update);
  document.getElementById("formDelTest").addEventListener("submit", del);
  document
    .getElementById("formStatusTest")
    .addEventListener("submit", statusChange);

  const inputs = document.querySelectorAll('input[type="text"]');
  inputs.forEach((input) => {
    input.addEventListener("focus", valText2);
    input.addEventListener("keyup", valText2);
  });

  const imagen = document.getElementById("img_url2");
  imagen.addEventListener("focus", valImagen2);
  imagen.addEventListener("change", valImagen2);

  const txtAreas = document.getElementById("testimonio");
  txtAreas.addEventListener("focus", valText2);
  txtAreas.addEventListener("keyup", valText2);
});

const camposEdit = {
  nombre: false,
  carrera: false,
  testimonio: false,
  img_url: false,
};

const valImagen2 = (e) => {
  var campo = e.target.name + "2";
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

const valText2 = (e) => {
  var campo = e.target.name + "2";
  var input = e.target;
  var nameCampo = campo;
  var lCapital = nameCampo[0].toUpperCase();
  var restName = nameCampo.slice(1);
  var pretit = lCapital + restName;
  const titulo = pretit.replace(/[0-9]$/, "");

  if (input.value.trim() === "") {
    document.getElementById(`${campo}`).classList.remove("border-success");
    document.getElementById(`${campo}`).classList.add("border-danger");
    document.getElementById(`${campo}`).classList.add("is-invalid");
    //showToastr("error", "Verifique el campo", `${titulo}`);
    camposEdit[campo] = false;
  } else {
    document.getElementById(`${campo}`).classList.add("border-success");
    document.getElementById(`${campo}`).classList.remove("border-danger");
    document.getElementById(`${campo}`).classList.remove("is-invalid");
    camposEdit[campo] = true;
  }
};

function editarTest(id) {
  var editTestModal = new bootstrap.Modal(
    document.getElementById("editTestModal"),
    {}
  );
  var baseURL = APP_URL + "/admin/testimonios/getTestimonio";
  const data = { id_tes: id };
  axios.post(baseURL, data).then((response) => {
    const test = response.data;
    const entries = Object.entries(test);

    entries.forEach(([key, value]) => {
      const input = document.getElementById(key + "2");
      const label = document.getElementById(key + "Tit");
      const imgBD = document.getElementById(key + "Bd");
      if (key === "img_url") {
        const img = value;
        const file = img.split("/").pop().split(".")[0];
        label.textContent = "Actual: " + file;
        imgBD.value = img;
        camposEdit[key] = true;
      } else {
        input.value = value;
        camposEdit[key] = true;
      }
    });
    editTestModal.show();
  });
}

function update(event) {
  event.preventDefault();
  var baseURL = APP_URL + "/admin/testimonios/upTestimonio";
  let encabezados = new Headers();
  if (Object.values(camposEdit).every((value) => value === true)) {
    let form = new FormData(this);
    axios.post(baseURL, form, { encabezados }).then((response) => {
      if (response.data.status) {
        showSwal(
          "success",
          "Actualización exitosa",
          "Se actualizaron los datos con exito",
          response.data.url
        );
        vaciar();
      } else {
        showToastr("error", response.data.msg, "Error");
      }
    });
  } else {
    showSwal2("error", "Oops...", "No podemos enviar un formulario vacio");
  }
}

function eliminarTest(id) {
  var deleteTestModal = new bootstrap.Modal(
    document.getElementById("deleteTestModal"),
    {}
  );
  var baseURL = APP_URL + "/admin/testimonios/getTestimonio";
  var url = APP_URL + "/admin/";
  const data = { id_tes: id };
  axios.post(baseURL, data).then((response) => {
    const file = response.data.img_url;
    const url2 = url + file;

    let imagen = document.getElementById("imagen");
    imagen.src = url2;

    document.getElementById("lNombre").textContent = response.data.nombre;
    document.getElementById("lCarrera").textContent = response.data.carrera;
    document.getElementById("lDescripcion").textContent =
      response.data.testimonio;
    document.getElementById("id_tesD").value = response.data.id_ofe;
    document.getElementById("id_usuD").value = response.data.id_usu;
    document.getElementById("img_urlD").value = response.data.img_url;

    deleteTestModal.show();
  });
}

function del(event) {
  event.preventDefault();
  var baseURL = APP_URL + "/admin/testimonios/delTest";

  let encabezados = new Headers();
  let form = new FormData(this);
  axios.post(baseURL, form, { encabezados }).then((response) => {
    if (response.data.status) {
      showSwal(
        "success",
        "Eliminación exitosa",
        "Se eliminaron los datos con exito",
        response.data.url
      );
      vaciar();
    } else {
      showToastr("error", response.data.msg, "Error");
    }
  });
}

function estadoTest(id) {
  var statusTestModal = new bootstrap.Modal(
    document.getElementById("statusTestModal"),
    {}
  );
  statusTestModal.show();
  var baseURL = APP_URL + "/admin/testimonios/getTestimonio";
  var url = APP_URL + "/admin/";
  const data = { id_tes: id };
  axios.post(baseURL, data).then((response) => {
    if (response.data.estado == 1) {
      document.getElementById("titModal").textContent =
        "¿Deseas dar de baja?, a:";
      document.getElementById("btnStatus").textContent = "Dar de baja";

      document.getElementById("btnStatus").classList.remove("btn-primary");
      document.getElementById("btnStatus").classList.add("btn-dark");
      document.getElementById("divCard").classList.remove("border-primary");
      document.getElementById("divCard").classList.add("border-dark");
    } else if (response.data.estado == 0) {
      document.getElementById("titModal").textContent =
        "¿Deseas dar de alta?, a:";
      document.getElementById("btnStatus").textContent = "Dar de alta";

      document.getElementById("btnStatus").classList.remove("btn-dark");
      document.getElementById("btnStatus").classList.add("btn-primary");
      document.getElementById("divCard").classList.remove("border-dark");
      document.getElementById("divCard").classList.add("border-primary");
    }

    const file = response.data.img_url;
    const url2 = url + file;

    let imagen = document.getElementById("imagenS");
    imagen.src = url2;

    document.getElementById("lNombreS").textContent = response.data.nombre;
    document.getElementById("lCarreraS").textContent = response.data.carrera;
    document.getElementById("lDescripcionS").textContent =
      response.data.testimonio;
    document.getElementById("id_tesS").value = response.data.id_tes;
    document.getElementById("id_usuS").value = response.data.id_usu;
    document.getElementById("estado").value = response.data.estado;

    statusTestModal.show();
  });
}

function statusChange(event) {
  event.preventDefault();
  var baseURL = APP_URL + "/admin/testimonios/statusTest";
  let encabezados = new Headers();
  let form = new FormData(this);
  axios.post(baseURL, form, { encabezados }).then((response) => {
    if (response.data.status) {
      showSwal(
        "success",
        "Actualización exitosa",
        "Se actualizaron los datos con exito",
        response.data.url
      );
      vaciar();
    } else {
      showToastr("error", response.data.msg, "Error");
    }
  });
}
