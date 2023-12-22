document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("formInsertColores").addEventListener('submit', insertar);
    const color = document.querySelectorAll('input[type="color"]');
    color.forEach((input) => {
        input.addEventListener('keyup', valid);
        input.addEventListener('blur', valid);
    });

});

const campos = {
    let_hf: false,
    let_hover: false,
    btn_font: false,
    font: false,
    btn_hfont: false,
    fondo_hf: false,
    btn_color: false,
    btn_hover: false,
    background: false,
};

const valid = (e) => {
    let campo = e.target.name
    if (!e.target.value) {
        document.getElementById(`${campo}`).classList.remove('border-success');
        document.getElementById(`${campo}`).classList.add('border-danger');
        showToastr("error", "Verifique que haya seleccionado todos los colores", 'colores');
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
}

function insertar(event) {
    event.preventDefault();
    var baseURL = 'http://localhost/ceunem/admin/colores/addColors';
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