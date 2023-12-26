document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("formEditProg").addEventListener('submit', editar);

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

    obtenerDatos()
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
    var titulo = '';
    if (campo === 'nom_menu') {
        titulo = 'Sección a la que hace referencia';
    }
    if (campo === 'btn_name') {
        titulo = 'Nombre del botón';
    }
    if (campo === 'sLink') {
        titulo = 'Link del botón'
    }

    if (e.target.value === 'Seleccione una opción') {
        showToastr("error", "Seleccione una opción", titulo);
        document.getElementById(`${campo}`).classList.remove('border-success');
        document.getElementById(`${campo}`).classList.add('border-danger');
        document.getElementById(`${campo}`).classList.add('is-invalid');
        //campos[campo] = false;
        if (campo === 'btn_name') {
            campos['btn_name'] = false;
        } else if (campo === 'nom_menu') {
            campos['nom_menu'] = false;
        }
        else if (campo === 'sLink') {
            document.getElementById('otroLink').style.display = 'none';
            campos['link'] = false;
        }
    } else {
        document.getElementById(`${campo}`).classList.add('border-success');
        document.getElementById(`${campo}`).classList.remove('border-danger');
        document.getElementById(`${campo}`).classList.remove('is-invalid');
        //campos[campo] = true;
        if (campo === 'btn_name') {
            campos['btn_name'] = true;
        } else if (campo === 'nom_menu') {
            campos['nom_menu'] = true;
        }
        else if (campo === 'sLink' && e.target.value === 'otro') {
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

function invalid() {
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
}

function obtenerDatos() {
    var baseURL = 'http://localhost/ceunem/admin/programaCalidad/getProg';
    var url = 'http://localhost/ceunem/admin/';
    axios.post(baseURL).then((response) => {
        const programa = response.data;
        const entries = Object.entries(programa);

        let sLink = document.getElementById("sLink");
        let otroLink = document.getElementById('otroLink');

        entries.forEach(([key, value]) => {
            const input = document.getElementById(key);
            const label = document.getElementById(key + 'Tit');
            const imgBD = document.getElementById(key + 'Bd');

            let tipo = response.data['tUrl'];
            if (key !== 'tUrl' && key !== 'link' && key !== 'img_url') {
                input.value = value;
                campos[key] = true;
            } else if (key !== 'tUrl' && key !== 'link') {
                const img = value;
                const file = img.split("/").pop().split(".")[0];
                label.textContent = "Actual: " + file;
                imgBD.value = img;
                campos[key] = true;
            } else if (key === 'tUrl') {
                if (tipo === 1) {
                    sLink.value = response.data.link;
                    campos['link'] = true;
                } else {
                    sLink.value = 'otro';
                    otroLink.style.display = 'block';
                    otroLink.value = response.data.link;
                    campos['link'] = true;
                }
            }
        });

        document.getElementById('divSec').style.display = 'inline';
        document.getElementById('secProg').innerHTML = response.data.nom_menu;
        document.getElementById('titProg').textContent = response.data.tit;
        document.getElementById('descProg').style.display = 'block';
        document.getElementById('descProg').innerHTML = response.data.descripcion;
        const btn = document.getElementById('btn');
        const span = btn.querySelector('span');
        span.textContent = response.data.btn_name;
        document.getElementById('divBtns').style.display = 'inline';


        const file = response.data.img_url
        const ext = ['jpg', 'jpeg', 'png'];
        const url2 = url + file
        var filext = file.split(".").pop();
        var fileType = ext.includes(filext)

        if (fileType) {
            let img_prog = document.getElementById('img_prog');
            img_prog.src = url2
            img_prog.style.display = 'inline'
            video.style.display = 'none';
        } else {
            let video = document.getElementById('video');
            video.src = url2;
            video.autoplay = true;
            video.style.display = 'inline';
            img_prog.style.display = 'none'
        }
    });
}




function editar(e) {
    e.preventDefault();
    var baseURL = 'http://localhost/ceunem/admin/programaCalidad/upProg';
    let datos = new FormData(this);
    let encabezados = new Headers();
    if (Object.values(campos).every(value => value === true)) {
        axios.post(baseURL, datos, { encabezados }).then((response) => {
            if (response.data.status) {
                showSwal("success", "Actualización exitosa", "Se enviaron los datos con exito", response.data.url)
            } else {
                showToastr("error", response.data.msg, "Error");
            }
        });
    } else {
        showSwal2("error", "Oops...", "Verifique que este correcta la información")
    }
}