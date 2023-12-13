document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("formEditEquipo").addEventListener('submit', update);
    document.getElementById("formDelEquipo").addEventListener('submit', deleteEq);
    document.getElementById("formStatusEq").addEventListener('submit', changeEq);

    const inputs = document.querySelectorAll('input');
    inputs.forEach((input) => {
        input.addEventListener('keyup', validEdit);
        input.addEventListener('blur', validEdit);
    });
    const txtAreas = document.querySelectorAll('textarea');
    txtAreas.forEach((input) => {
        input.addEventListener('keyup', validEdit);
        input.addEventListener('blur', validEdit);
    });

    const formEditEquipo = document.getElementById("formEditEquipo")
});

var editEquipoModal = new bootstrap.Modal(document.getElementById('editEquipoModal'), {})

function editarEquipo(id) {
    var baseURL = 'http://localhost/proyectos/ceunem/admin/equipo/getEquipo';
    const data = { id_eq: id }
    axios.post(baseURL, data).then((response) => {
        const img = response.data.img_url;
        const filename = img.split("/").pop().split(".")[0];
        document.getElementById('id_usuE').value = response.data.id_usu;
        document.getElementById('id_eqE').value = response.data.id_eq;
        document.getElementById('img_bd').value = response.data.img_url;

        if (response.data.nombre) {
            document.getElementById('nombreE').value = response.data.nombre;
            document.getElementById('nombreE').classList.add('border-success');
            document.getElementById('nombreE').classList.remove('border-warning');
            camposEdit['nombreE'] = true;
        }

        if (response.data.puesto) {
            document.getElementById('puestoE').value = response.data.puesto;
            document.getElementById('puestoE').classList.add('border-success');
            document.getElementById('puestoE').classList.remove('border-warning');
            camposEdit['puestoE'] = true;
        }

        document.getElementById('imgName').textContent = "Imagen Actual: " + filename;
        document.getElementById('rFaceE').value = response.data.rFace;
        document.getElementById('rTwE').value = response.data.rTw;
        document.getElementById('rInsE').value = response.data.rIns;
        editEquipoModal.show();
    });
}

const validEdit = (e) => {
    switch (e.target.name) {
        case "nombreE":
            validarCamposEdit(e.target, e.target.name)
            break;
        case "puestoE":
            validarCamposEdit(e.target, e.target.name)
            break;
        case "img_urlE":
            validarImgEdit(e.target, e.target.name)
            break;
        default:
            break;
    }
}

const camposEdit = {
    nombreE: false,
    puestoE: false
}

const validarCamposEdit = (input, campo) => {
    var nameCampo = campo;
    var lCapital = nameCampo[0].toUpperCase()
    var restName = nameCampo.slice(1);
    var titulo = lCapital + restName;

    if (input.value.trim() === '') {
        document.getElementById(`${campo}`).classList.remove('border-warning');
        document.getElementById(`${campo}`).classList.add('border-danger');
        document.getElementById(`${campo}`).classList.add('is-invalid');
        showToastr("error", "Verifique el campo", `${titulo}`);
        camposEdit[campo] = false;
    } else {
        document.getElementById(`${campo}`).classList.add('border-success');
        document.getElementById(`${campo}`).classList.remove('border-danger');
        document.getElementById(`${campo}`).classList.remove('is-invalid');
        camposEdit[campo] = true;
    }
}

const validarImgEdit = (input, campo) => {
    var nameCampo = campo;
    var lCapital = nameCampo[0].toUpperCase()
    var restName = nameCampo.slice(1);
    var titulo = lCapital + restName;
    if (input.value.trim() === null) {
        document.getElementById(`${campo}`).classList.remove('is-warning');
        document.getElementById(`${campo}`).classList.add('is-invalid');
        showToastr("error", "Verifique el campo", `${titulo}`);

    } else {
        var url = input.value;
        var ext = ['jpg', 'jpeg', 'png'];
        var filext = url.split(".").pop();
        var img = ext.includes(filext)

        if (img === false) {
            document.getElementById(`${campo}`).classList.remove('is-valid');
            document.getElementById(`${campo}`).classList.add('is-warning');
            showToastr("warning", "Formato no valido", "Solo jpg, jpeg, png");

        } else {
            document.getElementById(`${campo}`).classList.add('is-valid');
            document.getElementById(`${campo}`).classList.remove('is-warning');

        }
    }
}


function update(event) {
    event.preventDefault();
    var baseURL = 'http://localhost/proyectos/ceunem/admin/equipo/upEquipo';

    let encabezados = new Headers();
    if (camposEdit.nombreE && camposEdit.puestoE) {
        let form = new FormData(this)
        axios.post(baseURL, form, { encabezados }).then((response) => {
            if (response.data.status) {
                showSwal("success", "Actualización exitosa", "Se actualizaron los datos con exito", response.data.url)
                vaciar();
            } else {
                showToastr("error", response.data.msg, "Error");
            }
        })
    } else {
        showSwal2("error", "Oops...", "No podemos enviar un formulario vacio")
    }
}

// eliminar
var deleteEquipoModal = new bootstrap.Modal(document.getElementById('deleteEquipoModal'), {});

function eliminarEquipo(id) {
    var baseURL = 'http://localhost/proyectos/ceunem/admin/equipo/getEquipo';
    const data = { id_eq: id }
    axios.post(baseURL, data).then((response) => {
        document.getElementById('lName').textContent = "Nombre: " + response.data.nombre;
        document.getElementById('lPuesto').textContent = "Puesto: " + response.data.puesto;
        document.getElementById('id_eqD').value = response.data.id_eq;
        document.getElementById('id_usuD').value = response.data.id_usu;
        document.getElementById('img_delete').value = response.data.img_url;
    });
    deleteEquipoModal.show();
}

function deleteEq(event) {
    event.preventDefault();
    var baseURL = 'http://localhost/proyectos/ceunem/admin/equipo/delEquipo';
    let encabezados = new Headers();
    let form = new FormData(this)
    axios.post(baseURL, form, { encabezados }).then((response) => {
        if (response.data.status) {
            showSwal("success", "Eliminación exitosa", "Se eliminaron los datos con exito", response.data.url)
        } else {
            showToastr("error", response.data.msg, "Error");
        }
    })
}

//status
var statusEquipoModel = new bootstrap.Modal(document.getElementById('statusEquipoModel'), {});

function estadoEq(id) {
    var baseURL = 'http://localhost/proyectos/ceunem/admin/equipo/getEquipo';
    const data = { id_eq: id }
    axios.post(baseURL, data).then((response) => {
        if (response.data.estado == 1) {
            document.getElementById('titModel').textContent = "¿Deseas dar de baja?, a:";
            document.getElementById('btnStatus').textContent = "Dar de baja";

            document.getElementById('btnStatus').classList.remove('btn-primary');
            document.getElementById('btnStatus').classList.add('btn-dark');
            document.getElementById('divCard').classList.remove('border-primary');
            document.getElementById('divCard').classList.add('border-dark');
        }
        else if (response.data.estado == 0) {
            document.getElementById('titModel').textContent = "¿Deseas dar de alta?, a:";
            document.getElementById('btnStatus').textContent = "Dar de alta";

            document.getElementById('btnStatus').classList.remove('btn-dark');
            document.getElementById('btnStatus').classList.add('btn-primary');
            document.getElementById('divCard').classList.remove('border-dark');
            document.getElementById('divCard').classList.add('border-primary');
        }
        document.getElementById('sNombre').textContent = "Nombre: " + response.data.nombre;
        document.getElementById('sPuesto').textContent = "Puesto: " + response.data.puesto;

        document.getElementById('sId_eq').value = response.data.id_eq;
        document.getElementById('sId_usu').value = response.data.id_usu;
        document.getElementById('sEstado').value = response.data.estado;
        statusEquipoModel.show();
    });
}

function changeEq(event){
    event.preventDefault();
    var baseURL = 'http://localhost/proyectos/ceunem/admin/equipo/statusEquipo';
    let encabezados = new Headers();
    let form = new FormData(this)
    axios.post(baseURL, form, { encabezados }).then((response) => {
        if (response.data.status) {
            showSwal("success", "Actualización exitosa", "Se cambio el status con exito", response.data.url)
        } else {
            showToastr("error", response.data.msg, "Error");
        }
    })
}