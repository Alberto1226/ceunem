document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("formInsertPrograma").addEventListener('submit', insert);

    const select = document.querySelectorAll('select');
    select.forEach((select) => {
        select.addEventListener('mouseup', valSelect);
    });

    const imagen = document.getElementById('img_url');
    imagen.addEventListener('focus', valImagen);
    imagen.addEventListener('change', valImagen);

    const texto = document.querySelectorAll('input[type="text"]');
    texto.forEach((input) => {
        input.addEventListener('focus', valText);
        input.addEventListener('keyup', valText);
    });

    const txtAreas = document.querySelectorAll('textarea');
    txtAreas.forEach((input) => {
        input.addEventListener('focus', valText);
        input.addEventListener('keyup', valText);
    })

    const formInsertPrograma = document.getElementById('formInsertPrograma');
});

const campos = {
    nom_menu: false,
    tit: false,
    descripcion: false,
    img_url: false,
    btn_name: false,
    link: false,
}

const valSelect = (e) => {
    var campo = e.target.name;
    if (e.target.value === 'Seleccione una opción') {
        showToastr("error", "Seleccione una opción", "Link del botón");
        document.getElementById(`${campo}`).classList.remove('border-success');
        document.getElementById(`${campo}`).classList.add('border-danger');
        document.getElementById(`${campo}`).classList.add('is-invalid');
        campos[campo] = false;
        if (campo === 'sLink') {
            document.getElementById('otroLink').style.display = 'none';
        }
    } else {
        document.getElementById(`${campo}`).classList.add('border-success');
        document.getElementById(`${campo}`).classList.remove('border-danger');
        document.getElementById(`${campo}`).classList.remove('is-invalid');
        //campos[campo] = true;
        if (campo === 'btn_name') {
            campos['btn_name'] = true;
        }else if(campo === 'nom_menu'){
            campos['nom_menu'] = true;
        } 
        else if (campo == 'sLink' && e.target.value === 'otro') {
            document.getElementById('otroLink').style.display = 'block';
            campos['link'] = false;
        } else {
            document.getElementById('otroLink').style.display = 'none';
            campos['link'] = true;
        }
    }
}

const valImagen = (e) => {
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
        var ext = ['jpg', 'jpeg', 'png', 'mp4'];
        var filext = url.split(".").pop();
        var img = ext.includes(filext)

        if (img === false) {
            document.getElementById(`${campo}`).classList.remove('is-valid');
            document.getElementById(`${campo}`).classList.add('is-invalid');
            showToastr("error", "Formato no valido Solo jpg, jpeg, png", `${titulo}`);
            campos[campo] = false;
        } else {
            document.getElementById(`${campo}`).classList.add('is-valid');
            document.getElementById(`${campo}`).classList.remove('is-invalid');
            campos[campo] = true;
        }
    }
}

const valText = (e) => {
    var campo = e.target.name;
    var input = e.target;
    var titulo = '';
    if (campo === 'tit') {
        titulo = "Título";
    }
    if (campo === 'descripcion') {
        titulo = "Descripción";
    }

    if (campo === 'link') {
        titulo = 'Link fuera del sitio';
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

function invalid(){
    for (const key in campos) {
        if (campos.hasOwnProperty(key)) {
            if (!campos[key]) {
                document.getElementById(`${key}`).classList.remove('border-success');
                document.getElementById(`${key}`).classList.add('border-danger');
                document.getElementById(`${key}`).classList.add('is-invalid');
            }
            if (!campos['link']) {
                document.getElementById('sLink').classList.remove('border-success');
                document.getElementById('sLink').classList.add('border-danger');
                document.getElementById('sLink').classList.add('is-invalid');
            }
        }
    }
    console.log(campos)
}

function insert(e) {
    e.preventDefault();
    var baseURL = 'http://localhost/ceunem/admin/slider1/addImg';
    let datos = new FormData(this);
    let encabezados = new Headers();

    if (Object.values(campos).every(value => value === true)) {
        console.log('formulario enviado')
        /*axios.post(baseURL, datos, { encabezados }).then((response) => {
            if (response.data.status) {
                showSwal("success", "Actualización exitosa", "Se enviaron los datos con exito", response.data.url);
            } else {
                showToastr("error", response.data.msg, "Error");
            }
        });*/
    } else {
        invalid()
        showSwal2("error", "Oops...", "Verifique que todos los datos esten correctos")
    }
}