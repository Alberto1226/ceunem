document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("formEditMis").addEventListener('submit', update);


    /*recuperar los elementos y mandarlos a las funciones de preview
    recupremos la imagen*/
    const imgBD = document.getElementById('img_bd');
    baseURL = 'http://localhost/proyectos/ceunem/admin/';
    urlImg = imgBD.value;
    url = baseURL+urlImg;
    showImgHeader(url);
    
    /*ecupremos los imputs de texto*/
    const frase = document.getElementById('frase');
    showInputs(frase);
    const autor = document.getElementById('autor');
    showInputs(autor);
    const mision = document.getElementById('mision');
    showInputs(mision);
    
    const inputs = document.querySelectorAll('input');
    inputs.forEach((input) => {
        input.addEventListener('keyup', validEdit);
        input.addEventListener('blur', validEdit);
    })
    const txtAreas = document.querySelectorAll('textarea');
    txtAreas.forEach((input) => {
        input.addEventListener('keyup', validEdit);
        input.addEventListener('blur', validEdit);
    })
    const formEditMis = document.getElementById('formEditMis');
});

const validEdit = (e) => {
    switch (e.target.name) {
        case "frase":
            validarCampos(e.target, e.target.name)
            break;
        case "autor":
            validarCampos(e.target, e.target.name)
            break;
        case "mision":
            validarCampos(e.target, e.target.name)
            break;
        case "img_body":
            validarImg(e.target, e.target.name)
            break;
        default:
            break;
    }
}

function update(event) {
    event.preventDefault();
    var baseURL = 'http://localhost/proyectos/ceunem/admin/mision/upMision';
    let datos = new FormData(this);
    let encabezados = new Headers();
    axios.post(baseURL, datos, { encabezados }).then((response) => {
        console.log(response.data)
        if (response.data.status === false) {
            showToastr("error", response.data.msg, "Error");
        } else {
            showSwal("success", "Envio exitoso", "Se enviaron los datos con exito")
        }
    });
}
