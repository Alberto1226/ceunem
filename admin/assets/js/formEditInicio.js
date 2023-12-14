document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("formEditIni").addEventListener('submit', editar)
    const inputs = document.querySelectorAll('input');
    inputs.forEach((input) => {
        input.addEventListener('keyup', validEditar);
        input.addEventListener('blur', validEditar);
    })

    const formInsertIni = document.getElementById('formInsertIni');
    obtnerDatos();
});

const validEditar = (e) => {
    switch (e.target.name) {
        case "vid_url2":
            validarVid2(e.target, e.target.name)
            break;
        default:
            break;
    }
}

const campos = {
    vid_url2: false
}

const validarVid2 = (input, campo) => {
    if (input.value.trim() === null) {
        campos[campo] = true;
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

//obtner datos
function obtnerDatos() {

    var baseURL = 'http://localhost/proyectos/ceunem/admin/inicio/getIni';

    axios.post(baseURL).then((response) => {
        const vid = response.data.vid_url;
        const file = vid.split("/").pop().split(".")[0];
        document.getElementById('id_usu2').value = response.data.id_usu;
        document.getElementById('id_ini').value = response.data.id_ini;
        document.getElementById('vid_bd').value = response.data.vid_url;
        document.getElementById('vidAct').textContent = "Videio Actual: " + file;
        var url = 'http://localhost/proyectos/ceunem/admin/'+response.data.vid_url;
        showVid(url);
    });
}

//editar-----------------
function editar(event) {
    event.preventDefault();
    var baseURL = 'http://localhost/proyectos/ceunem/admin/inicio/upIni';
    let datos = new FormData(this);
    let encabezados = new Headers();
    if(!campos.vid_url2) return campos.vid_url2 = true;
    if (campos.vid_url2) {
        axios.post(baseURL, datos, { encabezados }).then((response) => {
            if (response.data.status) {
                showSwal("success", "Actualización exitosa", "Se enviaron los datos con exito", response.data.url)
            } else {
                showToastr("error", response.data.msg, "Error");
            }
        });
    } else {
        showSwal2("error", "Oops...", "No podemos enviar un formulario vacio")
    }
}