document.addEventListener("DOMContentLoaded", function () {
    obtenerColores();
    document.getElementById("formEditarColores").addEventListener('submit', editar);
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
    let campo = e.target.name+"2";
    let color = e.target.value;
    const divs = document.getElementById('D'+campo)
    if(campo == 'let_hf2' || campo == 'let_hover2' || 
    campo == 'btn_font2' || campo == 'font2' || 
    campo == 'btn_hfont2'){
        divs.innerHTML='Letra';
        divs.style.fontSize='2vw'
        divs.style.color=color;
      }else{
        divs.style.background=color;
      }
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

function obtenerColores() {
    var baseURL = 'http://localhost/proyectos/ceunem/admin/colores/getColores';
    axios.post(baseURL).then((response) => {
        for (const key in response.data) {
            campos[key] = true;
            const input = document.getElementById(key + "2");
            const div2 = document.getElementById("D"+key+"2");
            input.value = response.data[key];
            
            if(key == 'let_hf' || key == 'let_hover'|| key == 'btn_font' || key == 'font' || key == 'btn_hfont'){
                div2.innerHTML='Letra';
                div2.style.fontSize='2vw';
                div2.style.color=response.data[key];
            }else if(key == 'fondo_hf' || key == 'btn_color'|| key == 'btn_hover' || key == 'background')
            {
              div2.style.background = response.data[key];
            }
        }
    })
}

function editar(event) {
    event.preventDefault();
    var baseURL = 'http://localhost/proyectos/ceunem/admin/colores/upColors';
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