document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("formInsertIni").addEventListener('submit', insert);
    const inputs = document.querySelectorAll('input');
    inputs.forEach((input) => {
        input.addEventListener('keyup', validInsert);
        input.addEventListener('blur', validInsert);
    })

    const formInsertIni = document.getElementById('formInsertIni');
    obtnerDatos();
});

const validInsert = (e) => {
    switch (e.target.name) {
        case "vid_url":
            validarVid(e.target, e.target.name)
            break;
        default:
            break;
    }
}

const campos = {
    vid_url: false
}

const validarVid = (input, campo) => {
    if (input.value.trim() === null) {
        document.getElementById(`${campo}`).classList.remove('is-valid');
        document.getElementById(`${campo}`).classList.add('is-invalid');
        showToastr("error", "Verifique el campo", "Video");
        campos[campo] = false;
    } else {
        var url = input.value;
        var ext = ['mp4'];
        var filext = url.split(".").pop();
        var vid = ext.includes(filext);

        if (vid === false) {
            document.getElementById(`${campo}`).classList.remove('is-valid');
            document.getElementById(`${campo}`).classList.add('is-warning');
            showToastr("warning", "Formato no valido", "Solo mp4");
            campos[campo] = false;
        } else {
            document.getElementById(`${campo}`).classList.add('is-valid');
            document.getElementById(`${campo}`).classList.remove('is-warning');
            campos[campo] = true;
        }
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
    });
}

function vaciar() {
    campos.vid_url = false;
    formInsertIni.reset();
}

function vaciarPreview() {
    const vidIni = document.getElementById('vidIni');
    vidIni.src = '';
}

function insert(event) {
    event.preventDefault();
    var baseURL = 'http://localhost/proyectos/ceunem/admin/inicio/addInicio';
    let datos = new FormData(this);
    let encabezados = new Headers();
    if (campos.vid_url) {
        axios.post(baseURL, datos, { encabezados }).then((response) => {
            if (response.data.status) {
                showSwal("success", "Actualización exitosa", "Se enviaron los datos con exito", response.data.url)
                vaciar();
            } else {
                showToastr("error", response.data.msg, "Error");
            }
            vaciarPreview();
        });
    } else {
        showSwal2("error", "Oops...", "No podemos enviar un formulario vacio")
    }
}