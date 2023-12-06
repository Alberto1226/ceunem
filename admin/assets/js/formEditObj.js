document.addEventListener("DOMContentLoaded", function(){
    document.getElementById("formEditObj").addEventListener('submit', update);

    const imgBD = document.getElementById('img_bd');
    baseURL = 'http://localhost/proyectos/ceunem/admin/';
    urlImg = imgBD.value;
    url = baseURL+urlImg;
    showImgObj(url);

    const desc_sec = document.getElementById('desc_sec');
    showInput(desc_sec);

    const inputs = document.querySelectorAll('input');
    inputs.forEach((input) => {
        input.addEventListener('keyup', validEdit);
        input.addEventListener('blur', validEdit);
    });
    const txtAreas = document.querySelectorAll('textarea');
    txtAreas.forEach((input) => {
        input.addEventListener('keyup', validEdit);
        input.addEventListener('blur', validEdit);
    });
});

const validEdit = (e) => {
    switch (e.target.name) {
        case "desc_sec":
            validarCampos(e.target, e.target.name)
            break;
        case "img_sec":
            validarImg(e.target, e.target.name)
            break;
        default:
            break;
    }
}

function update(event) {
    event.preventDefault();
    var baseURL = 'http://localhost/proyectos/ceunem/admin/objetivo/upObj';
    let datos = new FormData(this);
    let encabezados = new Headers();
    axios.post(baseURL, datos, { encabezados }).then((response) => {
        console.log(response.data)
        if(response.data.status){
            showSwal("success", "Actualización exitosa", "Se enviaron los datos con exito", response.data.url)
        }else{
            showToastr("error", response.data.msg, "Error");
        }
    });
}