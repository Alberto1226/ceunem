document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("formInsertVision").addEventListener('submit', insert);
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
    const formInsertVision = document.getElementById('formInsertVision');
});

const validInsert = (e) => {
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

function showSwal2(icono, titulo, mensaje) {
    Swal.fire({
        icon: icono,
        title: titulo,
        text: mensaje,
    });
}

function vaciar() {
    campos.desc_sec = false;
    campos.img_sec = false;
    formInsertVision.reset();
}

function vaciarPreview() {
    const imgVision = document.getElementById('imgVision'); //se oculta y se limpia
    const cardBodyVision = document.getElementById('cardBodyVision'); //se oculta
    const titVision = document.getElementById('titVision'); //se oculta
    const desVision = document.getElementById('desVision');//se oculta y se limpia

    imgVision.src = '';
    imgVision.style.display = "none";
    cardBodyVision.style.display = "none";
    desVision.style.display = "none";
    desVision.innerHTML = '';
    titVision.style.display = "none";
}

function insert(event) {
    event.preventDefault();
    var baseURL = 'http://localhost/ceunem/admin/vision/addVision';
    let datos = new FormData(this);
    let encabezados = new Headers();
    if (campos.desc_sec && campos.img_sec) {
        axios.post(baseURL, datos, { encabezados }).then((response) => {
            if(response.data.status){
                showSwal("success", "Actualización exitosa", "Se enviaron los datos con exito", response.data.url)
                vaciar();
            }else{
                showToastr("error", response.data.msg, "Error");
            }
            vaciarPreview();
        });
    } else {
        showSwal2("error", "Oops...", "No podemos enviar un formulario vacio")
    }
}