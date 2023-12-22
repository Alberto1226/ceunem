document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("formInserTel").addEventListener('submit', insert);
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
        document.getElementById(`${campo}`).classList.add('border-success');
        document.getElementById(`${campo}`).classList.remove('border-danger');
        document.getElementById(`${campo}`).classList.remove('is-invalid');
        campos[campo] = true;
    } else {
        document.getElementById(`${campo}`).classList.remove('border-success');
        document.getElementById(`${campo}`).classList.add('border-danger');
        document.getElementById(`${campo}`).classList.add('is-invalid');
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
    const formInserTel = document.getElementById("formInserTel");
    if (campos.numero && campos.mensaje) {
            var baseURL = 'http://localhost/ceunem/admin/telefono/addWhats';
            let datos = new FormData(formInserTel);
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