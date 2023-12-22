document.addEventListener("DOMContentLoaded", function(){
    document.getElementById("formEditObj").addEventListener('submit', update);

    const imgBD = document.getElementById('img_bd');
    baseURL = 'http://localhost/ceunem/admin/';
    urlImg = imgBD.value;
    url = baseURL+urlImg;
    showImgObj(url);

    const desc_sec = document.getElementById('desc_sec');
    showInput(desc_sec);

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
        case "desc_sec":
            validarCampos(e.target, e.target.name)
            break;
        case "img_sec":
            validarImg(e.target, e.target.name)
            break;
        default:
            break;
    }
}

const campos = {
    desc_sec: false,
    img_sec: false,
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

function update(event) {
    event.preventDefault();
    var baseURL = 'http://localhost/ceunem/admin/objetivo/upObj';
    let datos = new FormData(this);
    let encabezados = new Headers();
    axios.post(baseURL, datos, { encabezados }).then((response) => {
        if(response.data.status){
            showSwal("success", "Actualización exitosa", "Se enviaron los datos con exito", response.data.url)
        }else{
            showToastr("error", response.data.msg, "Error");
        }
    });
}