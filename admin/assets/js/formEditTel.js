document.addEventListener("DOMContentLoaded", function () {
    obtenerTel();
    document.getElementById("formEditTel").addEventListener('submit', editar);
    const inputs = document.querySelectorAll('input');
    inputs.forEach((input) => {
        input.addEventListener('keyup', validInsert);
        input.addEventListener('blur', validInsert);
    })

    const txtAreas = document.querySelectorAll('textarea');
    txtAreas.forEach((input) => {
        input.addEventListener('keyup', validInsert);
        input.addEventListener('blur', validInsert);
    })
});

const validInsert = (e) => {
    switch (e.target.name) {
        case "numero":
            validarNum(e.target, e.target.name)
            break;
        case "mensaje":
            validarMensaje(e.target, e.target.name)
            break;
        default:
            break;
    }
}

const campos = {
    numero: false,
    mensaje: false,
}

const validarNum = (input, campo) => {
    var nameCampo = campo;
    var lCapital = nameCampo[0].toUpperCase()
    var restName = nameCampo.slice(1);
    var titulo = lCapital + restName;

    const regex = /^[0-9]{10,12}$/;

    if (regex.test(input.value)) {
        document.getElementById(`${campo + "2"}`).classList.add('border-success');
        document.getElementById(`${campo + "2"}`).classList.remove('border-danger');
        document.getElementById(`${campo + "2"}`).classList.remove('is-invalid');
        campos[campo] = true;
    } else {
        document.getElementById(`${campo + "2"}`).classList.remove('border-success');
        document.getElementById(`${campo + "2"}`).classList.add('border-danger');
        document.getElementById(`${campo + "2"}`).classList.add('is-invalid');
        showToastr("error", "Verifique el campo", `${titulo}`);
        campos[campo] = false;
    }
}

const validarMensaje = (input, campo) => {
    var nameCampo = campo;
    var lCapital = nameCampo[0].toUpperCase()
    var restName = nameCampo.slice(1);
    var titulo = lCapital + restName;

    if (input.value.trim() === '') {
        document.getElementById(`${campo + "2"}`).classList.remove('border-success');
        document.getElementById(`${campo + "2"}`).classList.add('border-danger');
        document.getElementById(`${campo + "2"}`).classList.add('is-invalid');
        showToastr("error", "Verifique el campo", `${titulo}`);
        campos[campo] = false;
    } else {
        document.getElementById(`${campo + "2"}`).classList.add('border-success');
        document.getElementById(`${campo + "2"}`).classList.remove('border-danger');
        document.getElementById(`${campo + "2"}`).classList.remove('is-invalid');
        campos[campo] = true;
    }
}

function showToastr(accion, mensaje, titulo) {
    Command: toastr[accion](mensaje, titulo);
}

function showSwal(icono, titulo, mensaje, url) {
    Swal.fire({
        icon: icono,
        title: titulo,
        text: mensaje,
        confirmButtonText: "OK"
    }).then(resultado => {
        if (resultado.value) {
            window.location.href = url
        }
    })
}

function showSwal2(icono, titulo, mensaje) {
    Swal.fire({
        icon: icono,
        title: titulo,
        text: mensaje,
    })
}

function obtenerTel() {
    var baseURL = 'http://localhost/ceunem/admin/telefono/getWhats';
    axios.post(baseURL).then((response) => {
        for (const key in response.data) {
            campos[key] = response.data[key];
            const input = document.getElementById(key + "2");
            input.value = response.data[key];
        }
    })
}

function editar(event) {
    event.preventDefault();
    const formEditTel= document.getElementById("formEditTel");
    if (campos.numero && campos.mensaje) {
            var baseURL = 'http://localhost/ceunem/admin/telefono/upWhats';
            let datos = new FormData(formEditTel);
            let encabezados = new Headers();
            axios.post(baseURL, datos, { encabezados }).then((response) => {
                if (response.data.status) {
                    showSwal("success", "Actualización exitosa", "Se enviaron los datos con exito", response.data.url);
                } else {
                    showToastr("error", response.data.msg, "Error");
                }
            })
    } else {
        showSwal2("error", "Oops...", "No podemos enviar un formulario vacio");
    }
}