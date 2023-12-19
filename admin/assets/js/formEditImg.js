document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("formEditImg").addEventListener('submit', editar)
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
    const formEditImg = document.getElementById('formEditImg');
    obtnerDatos();
});
const campos = {
    tit1: false,
    descripcion1: false,
    link1: false,
    tit2: false,
    descripcion2: false,
    link2: false,
}

const valSelect = (e) => {
    var campo = e.target.name + "Up";
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
        }
        if (e.target.value === 'otro' && campo === 'sLink2') {
            document.getElementById('otroLink2').style.display = 'block';
        }
    }
}

const validImg = (e) => {
    var campo = e.target.name + "Up";
    var input = e.target;
    var titulo = '';
    if (campo === 'img1Up') {
        titulo = 'Imagen principal'
    } else {
        titulo = 'Imagen Secundaria'
    }

    if (input.value.trim() === null) {
        document.getElementById(`${campo}`).classList.remove('is-valid');
        document.getElementById(`${campo}`).classList.add('is-invalid');
        showToastr("error", "Verifique el campo", `${titulo}`);
        camposImg[e.target.name] = false;
    } else {
        var url = input.value;
        var ext = ['jpg', 'jpeg', 'png'];
        var filext = url.split(".").pop();
        var img = ext.includes(filext)

        if (img === false) {
            document.getElementById(`${campo}`).classList.remove('is-valid');
            document.getElementById(`${campo}`).classList.add('is-warning');
            showToastr("warning", "Formato no valido Solo jpg, jpeg, png", `${titulo}`);
            camposImg[e.target.name] = false;
        } else {
            document.getElementById(`${campo}`).classList.add('is-valid');
            document.getElementById(`${campo}`).classList.remove('is-warning');
            camposImg[e.target.name] = true;
        }
    }
}

const validText = (e) => {
    var campo = e.target.name + "Up";
    var input = e.target;
    var titulo = '';
    if (campo === 'tit1Up') {
        titulo = "Título Imagen Principal";
    }
    if (campo === 'tit2Up') {
        titulo = "Título Imagen Secundaria";
    }
    if (campo === 'desc1Up') {
        titulo = "Desecripción Imagen Principal";
    }
    if (campo === 'desc2Up') {
        titulo = "Desecripción Imagen Secundaria";
    }
    if (campo === 'link1Up') {
        titulo = "Link imagen Principal";
    }
    if (campo === 'link2Up') {
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

var campo1 = false;

function obtnerDatos() {

    var baseURL = 'http://localhost/proyectos/ceunem/admin/sliders/getImgs';
    var url = 'http://localhost/proyectos/ceunem/admin/';
    axios.post(baseURL).then((response) => {
        const sliders = response.data;
        const slider1 = sliders[0];
        const slider2 = sliders[1];
        const entries1 = Object.entries(slider1);
        const entries2 = Object.entries(slider2);

        let s1 = document.getElementById("sLink1Up");
        let s2 = document.getElementById("sLink2Up");
        let int1 = document.getElementById("otroLink1Up");
        let int2 = document.getElementById("otroLink2Up");


        entries1.forEach(([key, value]) => {
            const input = document.getElementById(key + "1Up");
            const label = document.getElementById(key + "1Tit");
            const imgBd = document.getElementById(key + "1Bd");
            let tipo = response.data['tUrl'] = 1 ? 1 : 2;
            let keyCampo = key + "1";
            if (key !== "img" && key !== 'link' && key !== 'tUrl') {
                campos[keyCampo] = true;
                input.value = value;
            } else if (key !== 'link' && key !== 'tUrl') {
                const img = value;
                const file = img.split("/").pop().split(".")[0];
                label.textContent = "Imagen Actual: " + file;
                imgBd.value = img;
                urlImg = url + img;
                showSlider(urlImg, imgBd.id);
                campos[keyCampo] = true;
            } else if (key === 'tUrl') {
                if (tipo === 1) {
                    s1.value = slider1.link;
                    campos['link1'] = true;
                } else {
                    s1.value = 'otro';
                    int1.style.display = 'block';
                    int1.value = slider1.link;
                    campos['link1'] = true;
                }
            }
        });

        entries2.forEach(([key, value]) => {
            const input = document.getElementById(key + "2Up");
            const label = document.getElementById(key + "2Tit");
            const imgBd = document.getElementById(key + "2Bd");
            let tipo = response.data['tUrl'] = 1 ? 1 : 2;
            let keyCampo = key + "2";
            if (key !== "img" && key !== 'link' && key !== 'tUrl') {
                campos[keyCampo] = true;
                input.value = value;
            } else if (key !== 'link' && key !== 'tUrl') {
                const img = value;
                const file = img.split("/").pop().split(".")[0];
                label.textContent = "Imagen Actual: " + file;
                imgBd.value = img;
                urlImg = url + img;
                showSlider(urlImg, imgBd.id);
                campos[keyCampo] = true;
            } else if (key === 'tUrl') {
                if (tipo === 1) {
                    s2.value = slider2.link;
                    campos['link2'] = true;
                } else {
                    s2.value = 'otro';
                    int2.style.display = 'block';
                    int2.value = slider2.link;
                    campos['link2'] = true;
                }
            }
        });
        campo1 = Object.values(campos).every(value => value === true);
    });
}

function editar(event) {
    event.preventDefault();
    var baseURL = 'http://localhost/proyectos/ceunem/admin/sliders/upImgs';
    let datos = new FormData(this);
    let encabezados = new Headers();
    if (campo1) {
        axios.post(baseURL, datos, { encabezados }).then((response) => {
            if (response.data.status) {
                showSwal("success", "Actualización exitosa", "Se enviaron los datos con exito", response.data.url)
            } else {
                showToastr("error", response.data.msg, "Error");
            }
        });
    } else {
        showSwal2("error", "Oops...", "Seleccione almenos una imagen, favor de no dejar datos a mostrar vacios")
    }
}