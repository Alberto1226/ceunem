document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("formEditMis").addEventListener('submit', update);


    /*recuperar los elementos y mandarlos a las funciones de preview
    recupremos la imagen*/
    const imgBD = document.getElementById('img_bd');
    baseURL = 'http://localhost/ceunem/admin/';
    urlImg = imgBD.value;
    url = baseURL+urlImg;
    showImgHeader(url);
    
    /*ecupremos los imputs de texto*/
    const frase = document.getElementById('frase');
    showInputs(frase);
    const autor = document.getElementById('autor');
    showInputs(autor);
    const mision = document.getElementById('mision');
    showInputs(mision);
    
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
});

const validEdit = (e) => {
    switch (e.target.name) {
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
    frase: false,
    autor: false,
    mision: false,
    img_body: false,
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

function showSwal(icono, titulo, mensaje) {
    Swal.fire({
        icon: icono,
        title: titulo,
        text: mensaje,
    });
}

function update(event) {
    event.preventDefault();
    var baseURL = 'http://localhost/ceunem/admin/mision/upMision';
    let datos = new FormData(this);
    let encabezados = new Headers();
    axios.post(baseURL, datos, { encabezados }).then((response) => {
        console.log(response.data)
        if (response.data.status === false) {
            showToastr("error", response.data.msg, "Error");
        } else {
            showSwal("success", "Envio exitoso", "Se enviaron los datos con exito")
        }
    });
}
