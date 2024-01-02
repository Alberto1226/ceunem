document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("formMision").addEventListener('submit', validar)
    const inputs = document.querySelectorAll('input');
    inputs.forEach((input) => {
        input.addEventListener('keyup', validando);
        input.addEventListener('blur', validando);
    })
    const txtAreas = document.querySelectorAll('textarea');
    txtAreas.forEach((input) => {
        input.addEventListener('keyup', validando);
        input.addEventListener('blur', validando);
    })
    const formMision = document.getElementById('formMision');
    const axios = new Axios();
});

const validando = (e) => {
    console.log();
    switch (e.target.name) {
        case "img_header":
            validarImg(e.target, e.target.name)
            break;
        case "frase":
            validarCampos(e.target, e.target.name)
            break;
        case "autor":
            validarCampos(e.target, e.target.name)
            break;
        case "mision":
            validarCampos(e.target, e.target.name)
            break;
        case "img_body":
            validarImg(e.target, e.target.name)
            break;
        default:
            break;
    }
}

const campos = {
    img_header: false,
    frase: false,
    autor: false,
    mision: false,
    img_body: false,
}

const data = {
    img_header: "",
    frase: "",
    autor: "",
    mision: "",
    img_body: "",
}

const validarCampos = (input, campo) => {
    var nameCampo = campo;
    var lCapital = nameCampo[0].toUpperCase()
    var restName = nameCampo.slice(1);
    var titulo = lCapital + restName;

    if (input.value.trim() === '') {
        document.getElementById(`${campo}`).c
        document.getElementById(`${campo}`).classList.add('border-danger');
        document.getElementById(`${campo}`).classList.add('is-invalid');
        showToastr("error", "Verifique el campo", `${titulo}`);
        campos[campo] = false;
    } else {
        document.getElementById(`${campo}`).classList.add('border-success');
        document.getElementById(`${campo}`).classList.remove('border-danger');
        document.getElementById(`${campo}`).classList.remove('is-invalid');
        campos[campo] = true;
        data[campo] = input.value;
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
            data[campo] = input.value;
        }
    }
}

function showToastr(accion, mensaje, titulo) {
    Command: toastr[accion](mensaje, titulo);
}

function showSwal(icono, titulo, mensaje){
    Swal.fire({
        icon: icono,
        title: titulo,
        text: mensaje,
    });
}

function vaciar() {
    campos.autor = false;
    campos.frase = false;
    campos.mision = false;
    campos.img_header = false;
    campos.img_body = false;
    formMision.reset();
}

function vaciarPreview() {
    var imgMision = document.getElementById('imgMision');//se oculta y limpia
    var titSec = document.getElementById('titSec'); //se oculta
    var imgBodyMision = document.getElementById('imgBodyMision');//se oculta y se limpia
    var divFrase = document.getElementById('divFrase'); //se oculta
    var autorFrase = document.getElementById('autorFrase');//se ocula y limpia
    var titMision = document.getElementById('titMision');//se oculta
    var titFrase = document.getElementById('titFrase');//se oculta y limpia
    var descMision = document.getElementById('descMision');//se oculta  limpia
    var btnMision = document.getElementById('btnMision');//se oculta
    var titSec = document.getElementById('titSec'); //se oculta

    imgMision.src = '';
    imgMision.style.display = "none";
    titSec.style.display = "none";
    imgBodyMision.src = '';
    imgBodyMision.style.display = "none";
    divFrase.style.display = "none";
    autorFrase.style.display = "none";
    autorFrase.innerHTML = '';
    titMision.style.display = "none";
    titFrase.style.display = "none";
    titFrase.innerHTML = '';
    descMision.style.display = "none";
    descMision.innerHTML = '';
    btnMision.style.display = "none";
}

function validar(event) {
    event.preventDefault();
    var baseURL = 'http://localhost/ceunem/admin/mision/addMision';
    let datos = new FormData(this);
    let encabezados = new Headers();
    if (campos.img_header && campos.frase && campos.autor && campos.img_body && campos.mision) {
        //const formData = new FormData(formMision);
        axios.post(baseURL, datos,{encabezados}).then((response) => {
            showSwal("success","Envio exitoso","Se enviaron los datos con exito")
            vaciar();
        });
        vaciarPreview();
    } else {
        showSwal("error","Oops...","No podemos enviar un formulario vacio")
    }
}