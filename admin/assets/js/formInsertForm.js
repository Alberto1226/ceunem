document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("formContacto").addEventListener('submit', insert);
    obtenerCheck();
    const inputs = document.querySelectorAll('input[type="checkbox"]');
    inputs.forEach((input) => {
        input.addEventListener('change', mostrarInput);
    });
});

const mostrarInput = (e) => {
    const val = e.target.checked ? 1 : 0;
    const inputName = e.target.name;
    const inputForm = document.getElementById(inputName +"F");
    const labelForm = document.getElementById(inputName +"L");

    if(e.target.checked){
        inputForm.style.display = "block";
        labelForm.style.display = "block";
        campos[inputName] = val;
    }else{
        inputForm.style.display = "none";
        labelForm.style.display = "none";
        campos[inputName] = val;
    }
}

const campos = {
    nCompleto: 0,
    nombre: 0,
    apellidos: 0,
    email: 0,
    tel: 0,
    face: 0,
    mensaje: 0,
    asunto: 0,
    live: 0
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

function insert(event) {
    event.preventDefault();
    const camposUno = Object.values(campos).reduce((acum, valor) => {
        return acum + (valor === 1 ? 1 : 0);
    }, 0);
    if (camposUno > 0) {
        var baseURL = 'http://localhost/ceunem/admin/contacto/addForm';
        let datos = new FormData(this);
        let encabezados = new Headers();
        axios.post(baseURL, datos, { encabezados }).then((response) => {
            if (response.data.status) {
                showSwal("success", "Actualización exitosa", "Se enviaron los datos con exito", response.data.url);
            } else {
                showToastr("error", response.data.msg, "Error");
            }
        })
    } else {
        showSwal2("error", "Oops...", "No podemos enviar un formulario vacio");
    }
}