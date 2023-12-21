document.addEventListener("DOMContentLoaded", function () {
    var formulario1 = document.getElementById("formInsertImg1");
    formulario1.addEventListener('submit', insertar)

    const imagen = document.getElementById('img');
    imagen.addEventListener('keyup', validImg);
    imagen.addEventListener('blur', validImg);


    const texto = document.getElementById('tit');
    texto.addEventListener('keyup', validText);
    texto.addEventListener('blur', validText);

    const textArea = document.getElementById('descripcion');
    textArea.addEventListener('keyup', validText);
    textArea.addEventListener('blur', validText);

    const select = document.querySelectorAll('select');
    select.forEach((select) => {
        select.addEventListener('keyup', valSelect);
        select.addEventListener('blur', valSelect);
    });
});

const campos = {
    img: false,
    tit: false,
    descripcion: false,
    btn_name: false,
    link: false,
}

const validImg = (e) => {
    var campo = e.target.name;
    var input = e.target;
    var titulo = 'Imagen';

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

    if (campo === 'tit') {
        titulo = "Título";
    }
    if (campo === 'descripcion') {
        titulo = "Descripción";
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

const valSelect = (e) => {
    var campo = e.target.name;
    var select = campo === 'sName' ? 'btn_name' : 'link';
    if (e.target.value === 'Seleccione una opción') {
        showToastr("error", "Seleccione una opción", "Link del botón");
        document.getElementById(`${campo}`).classList.remove('border-success');
        document.getElementById(`${campo}`).classList.add('border-danger');
        document.getElementById(`${campo}`).classList.add('is-invalid');
        campos[select] = false;
        if (campo === 'sLink') {
            document.getElementById('otroLink').style.display = 'none';
        }
    } else {
        document.getElementById(`${campo}`).classList.add('border-success');
        document.getElementById(`${campo}`).classList.remove('border-danger');
        document.getElementById(`${campo}`).classList.remove('is-invalid');
        campos[select] = true;
        if (campo == 'sLink' && e.target.value === 'otro') {
            document.getElementById('otroLink').style.display = 'block';
        } else {
            document.getElementById('otroLink').style.display = 'none';
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

function insertar(event) {
    event.preventDefault();
    var baseURL = 'http://localhost/proyectos/ceunem/admin/slider1/addImg';
    let datos = new FormData(this);
    let encabezados = new Headers();

    if (Object.values(campos).every(value => value === true)) {
        axios.post(baseURL, datos, { encabezados }).then((response) => {
            if (response.data.status) {
                showSwal("success", "Actualización exitosa", "Se enviaron los datos con exito", response.data.url);
                vaciar()
            } else {
                showToastr("error", response.data.msg, "Error");
            }
        });
    } else {
        showSwal2("error", "Oops...", "Verifique que todos los colores esten seleccionados")
    }
}