document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("formInsertVal").addEventListener('submit', insert);
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
    const formInsertVal = document.getElementById('formInsertVal');
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

function vaciar() {
    campos.desc_sec = false;
    campos.img_sec = false;
    formInsertVal.reset();
}

function vaciarPreview() {
    const imgVal = document.getElementById('imgVal'); //se oculta y se limpia
    const cardBodyVal = document.getElementById('cardBodyVal'); //se oculta
    const titVal = document.getElementById('titVal'); //se oculta
    const desVal = document.getElementById('desVal');//se oculta y se limpia

    imgVal.src = '';
    imgVal.style.display = "none";
    cardBodyVal.style.display = "none";
    desVal.style.display = "none";
    desVal.innerHTML = '';
    titVal.style.display = "none";
}

function insert(event) {
    event.preventDefault();
    var baseURL = 'http://localhost/proyectos/ceunem/admin/valor/addValores';
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
        showSwal("error", "Oops...", "No podemos enviar un formulario vacio")
    }
}