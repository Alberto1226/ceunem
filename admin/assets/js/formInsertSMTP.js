document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("formSMTP").addEventListener('submit', insert);
    const inputs = document.querySelectorAll('input');
    inputs.forEach((input) => {
        input.addEventListener('keyup', validar);
        input.addEventListener('blur', validar);
    })

    const select = document.querySelector('select');
    select.addEventListener('blur', valSelect);
});

const campos = {
    dirServer: false,
    email: false,
    pass: false,
    portServer: false,
    conect: false,
    nombre: false,
}

const valSelect = (e) => {
    if (e.target.value === 'Seleccione una opción') {
        showToastr("error", "Seleccione una opción", "Conexión SMTP");
        document.getElementById('conect').classList.remove('border-success');
        document.getElementById('conect').classList.add('border-danger');
        document.getElementById('conect').classList.add('is-invalid');
        campos[e.target.name] = false;
    } else {
        document.getElementById('conect').classList.add('border-success');
        document.getElementById('conect').classList.remove('border-danger');
        document.getElementById('conect').classList.remove('is-invalid');
        campos[e.target.name] = true;
    }
}

const validar = (e) => {
    switch (e.target.name) {
        case "dirServer":
            validarCampo(e.target, e.target.name)
            break;
        case "email":
            validarEmail(e.target, e.target.name)
            break;
        case "pass":
            validarCampo(e.target, e.target.name)
            break;
        case "nombre":
            validarCampo(e.target, e.target.name)
            break;
        case "portServer":
            validarPort(e.target, e.target.name)
            break;
        default:
            break;
    }
}

const validarCampo = (input, campo) => {
    var nameCampo = campo;
    var lCapital = nameCampo[0].toUpperCase()
    var restName = nameCampo.slice(1);
    var titulo = lCapital + restName;

    if (input.value.trim() === '') {
        document.getElementById(`${campo}`).classList.remove('border-success');
        document.getElementById(`${campo}`).classList.add('border-danger');
        document.getElementById(`${campo}`).classList.add('is-invalid');
        showToastr("error", "Verifique el campo", `${titulo}`);
        campos[campo] = false;
    } else {
        document.getElementById(`${campo}`).classList.add('border-success');
        document.getElementById(`${campo}`).classList.remove('border-danger');
        document.getElementById(`${campo}`).classList.remove('is-invalid');
        campos[campo] = true;
    }
}

const validarEmail = (input, campo) => {
    var nameCampo = campo;
    var lCapital = nameCampo[0].toUpperCase()
    var restName = nameCampo.slice(1);
    var titulo = lCapital + restName;

    const regex = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/;

    if (regex.test(input.value)) {
        document.getElementById(`${campo}`).classList.add('border-success');
        document.getElementById(`${campo}`).classList.remove('border-danger');
        document.getElementById(`${campo}`).classList.remove('is-invalid');
        campos[campo] = true;
    } else {
        document.getElementById(`${campo}`).classList.remove('border-primary');
        document.getElementById(`${campo}`).classList.add('border-danger');
        document.getElementById(`${campo}`).classList.add('is-invalid');
        showToastr("error", "Verifique el campo", `${titulo}`);
        campos[campo] = false;
    }
}

const validarPort = (input, campo) => {
    var nameCampo = campo;
    var lCapital = nameCampo[0].toUpperCase()
    var restName = nameCampo.slice(1);
    var titulo = lCapital + restName;

    const regex = /^[0-9]{2,6}$/;

    if (regex.test(input.value)) {
        document.getElementById(`${campo}`).classList.add('border-success');
        document.getElementById(`${campo}`).classList.remove('border-danger');
        document.getElementById(`${campo}`).classList.remove('is-invalid');
        campos[campo] = true;
    } else {
        document.getElementById(`${campo}`).classList.remove('border-primary');
        document.getElementById(`${campo}`).classList.add('border-danger');
        document.getElementById(`${campo}`).classList.add('is-invalid');
        showToastr("error", "Verifique el campo", `${titulo}`);
        campos[campo] = false;
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

function insert(event) {
    event.preventDefault();
    if (campos.dirServer && campos.email && campos.pass
        && campos.portServer && campos.conect && campos.nombre) {
            var baseURL = 'http://localhost/ceunem/admin/servidor/configuracion';
            let datos = new FormData(this);
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