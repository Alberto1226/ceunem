document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("formLogin").addEventListener('submit', validarLogin);

    const inputs = document.querySelectorAll('input');
    inputs.forEach((input) => {
        input.addEventListener('keyup', validando);
        input.addEventListener('blur', validando);
    })

    const formLogin = document.getElementById('formLogin');
});

const exp = {
    password: /^.{6,12}$/,
    correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/
}

const campos = {
    email: false,
    pass: false
}

const data = {
    email: "",
    pass: ""
}

const validando = (e) => {
    switch (e.target.name) {
        case "email":
            validarCampos(exp.correo, e.target, e.target.name);
            break;
        case "pass":
            validarCampos(exp.password, e.target, e.target.name);
            break;
        default:
            break;
    }
}

const validarCampos = (exp, input, campo) => {
    var nameCampo = campo;
    var lCapital = nameCampo[0].toUpperCase()
    var restName = nameCampo.slice(1);
    var titulo = lCapital + restName;

    if (exp.test(input.value)) {
        document.getElementById(`${campo}`).classList.add('border-success');
        document.getElementById(`${campo}`).classList.remove('border-danger');
        document.getElementById(`${campo}`).classList.remove('is-invalid');
        campos[campo] = true;
        data[campo] = input.value;
    }
    else {
        document.getElementById(`${campo}`).classList.remove('border-primary');
        document.getElementById(`${campo}`).classList.add('border-danger');
        document.getElementById(`${campo}`).classList.add('is-invalid');
        showToastr("error", "Verifique el campo", `${titulo}`);
        campos[campo] = false;
    }
}

function showSwal(icono, titulo, mensaje) {
    Swal.fire({
        icon: icono,
        title: titulo,
        text: mensaje,
    });
}

function showToastr(accion, mensaje, titulo) {
    Command: toastr[accion](mensaje, titulo);
}

function vaciar() {
    campos.email = false;
    campos.pass = false;
    formLogin.reset();
}

function validarLogin(event) {
    event.preventDefault();
    var baseURL = 'http://localhost/ceunem/admin/login/login';
    var urlRedirect ='http://localhost/ceunem/admin/panel';
    let datos = new FormData(this);
    let encabezados = new Headers();
    if (campos.email && campos.pass) {
        const formData = new FormData(formLogin);
        axios.post(baseURL, datos, { encabezados }).then((response) => {
            if(response.data.status == false){
                showSwal("error", "Oops...", response.data.msg);
            }else{
                showSwal("success", "Envio exitoso", "Se enviaron los datos con exito")
                vaciar();
                window.location.replace(urlRedirect);
            }
        });
    } else {
        showSwal("error", "Oops...", "No podemos enviar un formulario vacio")
    }
}