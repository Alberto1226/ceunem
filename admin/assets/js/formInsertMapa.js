document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("formMaps").addEventListener('submit', insert);
    const txtAreas = document.getElementById('mapa');
    txtAreas.addEventListener('focus', valTextArea);
    txtAreas.addEventListener('keyup', valTextArea);
    obtenerDatos();
});

const campos = {
    mapa: false,
}
const valTextArea = (e) => {
    var input = e.target;


    if (input.value.trim() === '') {
        document.getElementById('mapa').classList.remove('border-success');
        document.getElementById('mapa').classList.add('border-danger');
        document.getElementById('mapa').classList.add('is-invalid');
        showToastr("error", "Verifique el campo", "Mapa");
        campos['mapa'] = false;
    } else {
        document.getElementById('mapa').classList.add('border-success');
        document.getElementById('mapa').classList.remove('border-danger');
        document.getElementById('mapa').classList.remove('is-invalid');
        campos['mapa'] = true;

        const iframeCode = input.value;
        var nuevoCodigoIframe = iframeCode.replace(/width="(\d+)"/, 'width="650"');
        nuevoCodigoIframe = nuevoCodigoIframe.replace(/height="(\d+)"/, 'height="700"');
        console.log(nuevoCodigoIframe);
        input.value = nuevoCodigoIframe;
        const divMapa = document.getElementById("divMapa");
        divMapa.innerHTML = iframeCode;
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

function insert(e) {
    e.preventDefault();

    var baseURL = 'http://localhost/ceunem/admin/mapa/addMapa';
    let datos = new FormData(this);
    let encabezados = new Headers();
    if (Object.values(campos).every(value => value === true)) {
        axios.post(baseURL, datos, { encabezados }).then((response) => {
            if (response.data.status) {
                showSwal("success", "Se enviaron los datos", "Con exito", response.data.url);
            } else {
                showToastr("error", response.data.msg, "Error");
            }
        });
    } else {
        showSwal2("error", "Oops...", "Verifique que todos los datos esten correctos")
    }
}

function obtenerDatos() {
    var baseURL = 'http://localhost/ceunem/admin/mapa/getMapa';
    axios.post(baseURL).then((response) => {
        let data = response.data
        if (data !== false) {
            document.getElementById('id_usu').value = response.data.id_usu;
            document.getElementById('mapa').value = response.data.mapa;
            document.getElementById('id_mapa').value = response.data.id_mapa;
            campos['mapa'] = true;

            const iframeCode = response.data.mapa;
            const divMapa = document.getElementById("divMapa");
            divMapa.innerHTML = iframeCode;            
        }
    })
}