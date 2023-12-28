document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("formEditOferta").addEventListener('submit', update);
    document.getElementById("formDelOferta").addEventListener('submit', del);
    document.getElementById("formStatusOferta").addEventListener('submit', statusChange);

    const select = document.querySelectorAll('.select2');
    select.forEach((select) => {
        select.addEventListener('mouseup', valSelect2);
    });

    const imagen = document.getElementById('img_url2');
    imagen.addEventListener('focus', valImagen2);
    imagen.addEventListener('change', valImagen2);

    const txtAreas = document.getElementById('descripcion2');
    txtAreas.addEventListener('focus', valText2);
    txtAreas.addEventListener('keyup', valText2);
});

const valSelect2 = (e) => {
    var campo = e.target.name;
    var estilo = e.target.id;
    var titulo = '';
    if (campo === 'tit') {
        titulo = 'Nombre de la oferta';
    }
    if (campo === 'btn_name') {
        titulo = 'Nombre del botón';
    }
    if (campo === 'link') {
        titulo = 'Link del botón'
    }

    if (e.target.value === 'Seleccione una opción') {
        showToastr("error", "Seleccione una opción", titulo);
        document.getElementById(`${estilo}`).classList.remove('border-success');
        document.getElementById(`${estilo}`).classList.add('border-danger');
        document.getElementById(`${estilo}`).classList.add('is-invalid');
        campos[campo] = false;
    } else {
        document.getElementById(`${estilo}`).classList.add('border-success');
        document.getElementById(`${estilo}`).classList.remove('border-danger');
        document.getElementById(`${estilo}`).classList.remove('is-invalid');
        campos[campo] = true;
    }
}

const valImagen2 = (e) => {
    var estilo = e.target.id;
    var campo = e.target.name;
    var input = e.target;
    var titulo = 'Imagen';

    if (input.value.trim() === null) {
        document.getElementById(`${estilo}`).classList.remove('is-valid');
        document.getElementById(`${estilo}`).classList.add('is-invalid');
        showToastr("error", "Verifique el campo", `${titulo}`);
        campos[campo] = false;
    } else {
        var url = input.value;
        var ext = ['jpg', 'jpeg', 'png', 'mp4'];
        var filext = url.split(".").pop();
        var img = ext.includes(filext)

        if (img === false) {
            document.getElementById(`${estilo}`).classList.remove('is-valid');
            document.getElementById(`${estilo}`).classList.add('is-invalid');
            showToastr("error", "Formato no valido Solo jpg, jpeg, png", `${titulo}`);
            campos[campo] = false;
        } else {
            document.getElementById(`${estilo}`).classList.add('is-valid');
            document.getElementById(`${estilo}`).classList.remove('is-invalid');
            campos[campo] = true;
        }
    }
}

const valText2 = (e) => {
    var campo = e.target.name;
    var estilo = e.target.id;
    var input = e.target;
    var titulo = '';

    if (campo === 'descripcion2') {
        titulo = "Descripción";
    }

    if (input.value.trim() === '') {
        document.getElementById(`${estilo}`).classList.remove('border-success');
        document.getElementById(`${estilo}`).classList.add('border-danger');
        document.getElementById(`${estilo}`).classList.add('is-invalid');
        showToastr("error", "Verifique el campo", `${titulo}`);
        campos[campo] = false;
    } else {
        document.getElementById(`${estilo}`).classList.add('border-success');
        document.getElementById(`${estilo}`).classList.remove('border-danger');
        document.getElementById(`${estilo}`).classList.remove('is-invalid');
        campos[campo] = true;
    }
}


function editarOferta(id) {
    var editOfertaModal = new bootstrap.Modal(document.getElementById('editOfertaModal'), {})
    var baseURL = 'http://localhost/ceunem/admin/oferta/getOferta';
    const data = { id_ofe: id }
    axios.post(baseURL, data).then((response) => {
        const oferta = response.data;
        const entries = Object.entries(oferta);

        entries.forEach(([key, value]) => {
            const input = document.getElementById(key + "2")
            const label = document.getElementById(key + 'Tit');
            const imgBD = document.getElementById(key + 'Bd');
            if (key === 'img_url') {
                const img = value;
                const file = img.split("/").pop().split(".")[0];
                label.textContent = "Actual: " + file;
                imgBD.value = img;
                campos[key] = true;
            } else {
                input.value = value;
                campos[key] = true;
            }
        });
        editOfertaModal.show();
    })
}

function update(event) {
    event.preventDefault();
    var baseURL = 'http://localhost/ceunem/admin/oferta/upOferta';

    let encabezados = new Headers();
    if (Object.values(campos).every(value => value === true)) {
        let form = new FormData(this)
        axios.post(baseURL, form, { encabezados }).then((response) => {
            if (response.data.status) {
                showSwal("success", "Actualización exitosa", "Se actualizaron los datos con exito", response.data.url)
                vaciar();
            } else {
                showToastr("error", response.data.msg, "Error");
            }
        })
    } else {
        showSwal2("error", "Oops...", "No podemos enviar un formulario vacio")
    }
}

function eliminarOferta(id) {
    var deleteOfertaModal = new bootstrap.Modal(document.getElementById('deleteOfertaModal'), {})
    var baseURL = 'http://localhost/ceunem/admin/oferta/getOferta';
    var url = 'http://localhost/ceunem/admin/';
    const data = { id_ofe: id }
    axios.post(baseURL, data).then((response) => {
        const file = response.data.img_url
        const url2 = url + file

        let imagen = document.getElementById('imagen');
        imagen.src = url2

        document.getElementById('lTit').textContent = response.data.tit;
        document.getElementById('lDescripcion').textContent = response.data.descripcion;
        document.getElementById('id_ofeD').value = response.data.id_ofe;
        document.getElementById('id_usuD').value = response.data.id_usu;
        document.getElementById('img_urlD').value = response.data.img_url;

        deleteOfertaModal.show();
    });
}

function del(event) {
    event.preventDefault();
    var baseURL = 'http://localhost/ceunem/admin/oferta/delOferta';

    let encabezados = new Headers();
    let form = new FormData(this)
    axios.post(baseURL, form, { encabezados }).then((response) => {
        if (response.data.status) {
            showSwal("success", "Eliminación exitosa", "Se eliminaron los datos con exito", response.data.url)
            vaciar();
        } else {
            showToastr("error", response.data.msg, "Error");
        }
    })
}

function estadoOferta(id) {
    var statusOfertaModal = new bootstrap.Modal(document.getElementById('statusOfertaModal'), {})
    var baseURL = 'http://localhost/ceunem/admin/oferta/getOferta';
    var url = 'http://localhost/ceunem/admin/';
    const data = { id_ofe: id }
    axios.post(baseURL, data).then((response) => {
        if (response.data.estado == 1) {
            document.getElementById('titModal').textContent = "¿Deseas dar de baja?, a:";
            document.getElementById('btnStatus').textContent = "Dar de baja";

            document.getElementById('btnStatus').classList.remove('btn-primary');
            document.getElementById('btnStatus').classList.add('btn-dark');
            document.getElementById('divCard').classList.remove('border-primary');
            document.getElementById('divCard').classList.add('border-dark');
        }
        else if (response.data.estado == 0) {
            document.getElementById('titModal').textContent = "¿Deseas dar de alta?, a:";
            document.getElementById('btnStatus').textContent = "Dar de alta";

            document.getElementById('btnStatus').classList.remove('btn-dark');
            document.getElementById('btnStatus').classList.add('btn-primary');
            document.getElementById('divCard').classList.remove('border-dark');
            document.getElementById('divCard').classList.add('border-primary');
        }

        const file = response.data.img_url
        const url2 = url + file

        let imagen = document.getElementById('imagenS');
        imagen.src = url2

        document.getElementById('lTitS').textContent = response.data.tit;
        document.getElementById('lDescripcionS').textContent = response.data.descripcion;
        document.getElementById('id_ofeS').value = response.data.id_ofe;
        document.getElementById('id_usuS').value = response.data.id_usu;
        document.getElementById('estado').value = response.data.estado;

        statusOfertaModal.show();
    });
}

function statusChange(event) {
    event.preventDefault();
    var baseURL = 'http://localhost/ceunem/admin/oferta/statusOferta';
    let encabezados = new Headers();
    let form = new FormData(this)
    axios.post(baseURL, form, { encabezados }).then((response) => {
        if (response.data.status) {
            showSwal("success", "Actualización exitosa", "Se actualizaron los datos con exito", response.data.url)
            vaciar();
        } else {
            showToastr("error", response.data.msg, "Error");
        }
    });
}