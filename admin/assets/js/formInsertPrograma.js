document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("formInsertPrograma").addEventListener('submit', insert);

    const select = document.querySelectorAll('select');
    select.forEach((select) => {
        select.addEventListener('keyup', valSelect);
        select.addEventListener('blur', valSelect);
    });

    const imagen = document.getElementById('img_url');
    imagen.addEventListener('keyup', valImagen);
    imagen.addEventListener('blur', valImagen);

    const texto = document.querySelectorAll('input[type="text"]');
    texto.forEach((input) => {
        input.addEventListener('keyup', valText);
        input.addEventListener('blur', valText);
    });

    const txtAreas = document.querySelectorAll('textarea');
    txtAreas.forEach((input) => {
        input.addEventListener('keyup', valText);
        input.addEventListener('blur', valText);
    })
   
    const formInsertPrograma = document.getElementById('formInsertPrograma');
});

const valSelect = (e) =>{
    console.log(e.target.name)
}

const valImagen = (e) =>{
    console.log(e.target.name)
}

const valText = (e) =>{
    console.log(e.target.name)
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

function insert(e){
    e.preventDefault();
    showSwal2("error", "Oops...", "Verifique que todos los colores esten seleccionados");
}