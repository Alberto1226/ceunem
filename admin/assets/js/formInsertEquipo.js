document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("formInsertEquipo").addEventListener('submit', insert);
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
    const formInsertEquipo = document.getElementById('formInsertEquipo');
});

const validInsert = (e) => {
    switch (e.target.name) {
        case "nombre":
            validarCampos(e.target, e.target.name)
            break;
        case "puesto":
            validarCampos(e.target, e.target.name)
            break;
        case "img_url":
            validarImg(e.target, e.target.name)
            break;
        default:
            break;
    }
}

const campos = {
    nombre: false,
    puesto: false,
    img_url: false,
}

const validarCampos = (input, campo) => {
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

const validarImg = (input, campo) => {
    var nameCampo = campo;
    var lCapital = nameCampo[0].toUpperCase()
    var restName = nameCampo.slice(1);
    var titulo = lCapital + restName;
    if (input.value.trim() === null) {
        document.getElementById(`${campo}`).classList.remove('is-valid');
        document.getElementById(`${campo}`).classList.add('is-invalid');
        showToastr("error", "Verifique el campo", `${titulo}`);
        campos[campo] = false;
    } else {
        var url = input.value;
        var ext = ['jpg', 'jpeg', 'png'];
        var filext = url.split(".").pop();
        var img = ext.includes(filext)

        if (img === false) {
            document.getElementById(`${campo}`).classList.remove('is-valid');
            document.getElementById(`${campo}`).classList.add('is-warning');
            showToastr("warning", "Formato no valido", "Solo jpg, jpeg, png");
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
    }).then(resultado =>{
        if(resultado.value){
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

function vaciar() {
    campos.nombre = false;
    campos.puesto = false;
    campos.img_url = false;
    formInsertEquipo.reset();
}

function insert(event) {
    event.preventDefault();
    var baseURL = 'http://localhost/proyectos/ceunem/admin/equipo/addEquipo';
    let datos = new FormData(this);
    let encabezados = new Headers();
    if (campos.nombre && campos.puesto && campos.img_url) {
        axios.post(baseURL, datos, { encabezados }).then((response) => {
            if(response.data.status){
                showSwal("success", "Actualización exitosa", "Se enviaron los datos con exito", response.data.url)
                vaciar();
            }else{
                showToastr("error", response.data.msg, "Error");
            }
        });
    } else {
        showSwal2("error", "Oops...", "No podemos enviar un formulario vacio")
    }
}