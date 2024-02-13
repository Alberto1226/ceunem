document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("formEnLic").addEventListener('submit', insert);
    const txtAreas = document.getElementById('descripcion');
    txtAreas.addEventListener('focus', valTextArea);
    txtAreas.addEventListener('keyup', valTextArea);
    obtenerDatos();
});

const camposEn = {
    descripcion: false,
}
const valTextArea = (e) => {
    var campo = e.target.name;
    var estilo = e.target.id;
    var input = e.target;
    var titulo = '';

    if (campo === 'descripcion') {
        titulo = "Descripción";
    }

    if (input.value.trim() === '') {
        document.getElementById(`${estilo}`).classList.remove('border-success');
        document.getElementById(`${estilo}`).classList.add('border-danger');
        document.getElementById(`${estilo}`).classList.add('is-invalid');
        showToastr("error", "Verifique el campo", `${titulo}`);
        camposEn[campo] = false;
    } else {
        document.getElementById(`${estilo}`).classList.add('border-success');
        document.getElementById(`${estilo}`).classList.remove('border-danger');
        document.getElementById(`${estilo}`).classList.remove('is-invalid');
        camposEn[campo] = true;
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
    var baseURL = 'http://localhost/ceunem/admin/licenciatura/addEncabezado';
    let datos = new FormData(this);
    let encabezados = new Headers();
    if (Object.values(camposEn).every(value => value === true)) {
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
    var baseURL = 'http://localhost/ceunem/admin/licenciatura/getEncabezado';
    const data = { encabezado: 'Licenciaturas' }
    axios.post(baseURL, data).then((response) => {
        const data = response.data;
        if(data !== false){
            document.getElementById('id_usu').value = response.data.id_usu;
            document.getElementById('encabezado').value = response.data.encabezado;
            document.getElementById('descripcion').value = response.data.descripcion;
            document.getElementById('id_en').value = response.data.id_en;
            camposEn['descripcion'] = true;
            
        }   
    })
}

function idLic(id){
    document.getElementById('id_lic').value = id;
}