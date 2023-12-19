document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("formInsertImg").addEventListener('submit', insert);
    const imagenes = document.querySelectorAll('input[type="file"]');
    imagenes.forEach((input) => {
        input.addEventListener('keyup', validImg);
        input.addEventListener('blur', validImg);
    });

    const texto = document.querySelectorAll('input[type="text"]');
    texto.forEach((input) => {
        input.addEventListener('keyup', validText);
        input.addEventListener('blur', validText);
    });

    const select = document.querySelectorAll('select');
    select.forEach((select) => {
        select.addEventListener('keyup', valSelect);
        select.addEventListener('blur', valSelect);
    });

    const formInsertImg = document.getElementById('formInsertImg');
});

const campos = {
    img1: false,
    tit1: false,
    descripcion1: false,
    link1: false,
    img2: false,
    tit2: false,
    descripcion2: false,
    link2: false,
}
const valSelect = (e) => {
    var campo = e.target.name;
    var link = campo === 'sLink1' ? 'link1' : 'link2';

    if (e.target.value === 'Seleccione una opción') {
        showToastr("error", "Seleccione una opción", "Link del botón");
        document.getElementById(`${campo}`).classList.remove('border-success');
        document.getElementById(`${campo}`).classList.add('border-danger');
        document.getElementById(`${campo}`).classList.add('is-invalid');
        campos[link] = false;
        if (campo === 'sLink1') {
            document.getElementById('otroLink1').style.display = 'none';
        }
        if (campo === 'sLink2') {
            document.getElementById('otroLink2').style.display = 'none';
        }
    } else {
        document.getElementById(`${campo}`).classList.add('border-success');
        document.getElementById(`${campo}`).classList.remove('border-danger');
        document.getElementById(`${campo}`).classList.remove('is-invalid');
        campos[link] = true;
        if (e.target.value === 'otro' && campo === 'sLink1') {
            document.getElementById('otroLink1').style.display = 'block';
        } else {
            document.getElementById('otroLink1').style.display = 'none';
        }
        if (e.target.value === 'otro' && campo === 'sLink2') {
            document.getElementById('otroLink2').style.display = 'block';
        } else {
            document.getElementById('otroLink2').style.display = 'none';
        }
    }
}

const validImg = (e) => {
    var campo = e.target.name;
    var input = e.target;
    var titulo = '';
    if (campo === 'img1') {
        titulo = 'Imagen principal'
    } else {
        titulo = 'Imagen Secundaria'
    }

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
            showToastr("warning", "Formato no valido Solo jpg, jpeg, png", `${titulo}`);
            campos[campo] = false;
        } else {
            document.getElementById(`${campo}`).classList.add('is-valid');
            document.getElementById(`${campo}`).classList.remove('is-warning');
            campos[campo] = true;
        }
    }
}

const validText = (e) => {
    var campo = e.target.name;
    var input = e.target;
    var titulo = '';

    if (campo === 'tit1') {
        titulo = "Título Imagen Principal";
    }
    if (campo === 'tit2') {
        titulo = "Título Imagen Secundaria";
    }
    if (campo === 'desc1') {
        titulo = "Desecripción Imagen Principal";
    }
    if (campo === 'desc2') {
        titulo = "Desecripción Imagen Secundaria";
    }
    if (campo === 'link1') {
        titulo = "Link imagen Principal";
    }
    if (campo === 'link2') {
        titulo = "Link imagen Secundaria";
    }

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

function vaciar() {
    Object.values(campos).forEach(value => value = false)
    formInsertImg.reset();
    let imgPrin = document.getElementById('imgPrincipal');
    let imgSec = document.getElementById('imgSecundaria');
    imgPrin.src = "";
    imgSec.src = "";

}

function insert(event) {
    event.preventDefault();
    if (Object.values(campos).every(value => value === true)) {
        var baseURL = 'http://localhost/proyectos/ceunem/admin/sliders/addImgs';
        let datos = new FormData(this);
        let encabezados = new Headers();
        axios.post(baseURL, datos, { encabezados }).then((response) => {
            if (response.data.status) {
                showSwal("success", "Actualización exitosa", "Se enviaron los datos con exito", response.data.url)
                vaciar();
            } else {
                showToastr("error", response.data.msg, "Error");
            }
            vaciar()
        });
    } else {
        showSwal2("error", "Oops...", "No podemos enviar un formulario vacio")
    }
}