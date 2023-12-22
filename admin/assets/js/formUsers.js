document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("formUser").addEventListener('submit', validar);
   
    const inputs = document.querySelectorAll('input');
    inputs.forEach((input) => {
        input.addEventListener('keyup', validando);
        input.addEventListener('blur', validando);
    })

    const formUser = document.getElementById('formUser');
});

const exp = {
    nombre: /^[^\s][a-zA-Z\s]{1,50}$/i,
    password: /^.{6,12}$/,
    correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/
}

const campos = {
    nameFull: false,
    email: false,
    pass: false,
    pass2: false,
}

const data = {
    nameFull: "",
    email: "",
    pass: "",
}

const validando = (e) => {
    switch (e.target.name) {
        case "nameFull":
            validarCampos(exp.nombre, e.target, e.target.name);
            break;
        case "email":
            validarCampos(exp.correo, e.target, e.target.name);
            break;
        case "pass":
            validarCampos(exp.password, e.target, e.target.name);
            break;
        case "pass2":
            //validarCampos(exp.password, e.target, e.target.name);
            validarPass();
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

const validarPass = ()=>{
    const pass1 = document.getElementById('pass');
    const pass2 = document.getElementById('pass2');

    if(pass1.value !== pass2.value){
        document.getElementById('pass2').classList.remove('border-primary');
        document.getElementById('pass2').classList.add('border-danger');
        document.getElementById('pass2').classList.add('is-invalid');
        showToastr("error", "Las contraseñas no coinciden", "contraseñas");
        campos[pass2] = false;
    }else{
        document.getElementById('pass2').classList.add('border-success');
        document.getElementById('pass2').classList.remove('border-danger');
        document.getElementById('pass2').classList.remove('is-invalid');
        campos['pass2'] = true;
    }
}

function showToastr(accion, mensaje, titulo) {
    Command: toastr[accion](mensaje, titulo);
}

function showSwal(icono, titulo, mensaje) {
    Swal.fire({
        icon: icono,
        title: titulo,
        text: mensaje,
    });
}

function vaciar() {
    campos.nameFull = false;
    campos.email = false;
    campos.pass = false;
    campos.pass2 = false;
    formUser.reset();
}

function validar(event) {
    event.preventDefault();
    var baseURL = 'http://localhost/ceunem/admin/registrar/addUser';
    let datos = new FormData(this);
    let encabezados = new Headers();
    if (campos.nameFull && campos.email && campos.pass && campos.pass2) {
        const formData = new FormData(formUser);
        axios.post(baseURL, datos, { encabezados }).then((response) => {
            showSwal("success", "Envio exitoso", "Se enviaron los datos con exito")
            vaciar();
        });
    } else {
        showSwal("error", "Oops...", "No podemos enviar un formulario vacio")
    }
}