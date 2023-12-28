document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("formEditTest").addEventListener('submit', update);
    //document.getElementById("formDelOferta").addEventListener('submit', del);
    //document.getElementById("formStatusOferta").addEventListener('submit', statusChange);

    const inputs = document.querySelectorAll('input[type="text"]');
    inputs.forEach((input) => {
        input.addEventListener('focus', valText2);
        input.addEventListener('keyup', valText2);
    });

    const imagen = document.getElementById('img_url');
    imagen.addEventListener('focus', valImagen);
    imagen.addEventListener('change', valImagen);

    const txtAreas = document.getElementById('testimonio');
    txtAreas.addEventListener('focus', valText2);
    txtAreas.addEventListener('keyup', valText2);

});

const valText2 = (e) => {
    var campo = e.target.name;
    var input = e.target;
    var nameCampo = campo;
    var lCapital = nameCampo[0].toUpperCase()
    var restName = nameCampo.slice(1);
    var pretit = lCapital + restName;
    const titulo = pretit.replace(/[0-9]$/, "");

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

function editarTest(id) {
    var editTestModal = new bootstrap.Modal(document.getElementById('editTestModal'), {});
    editTestModal.show();
    /*var baseURL = 'http://localhost/ceunem/admin/testimonio/getOferta';
    const data = { id_ofe: id }
    axios.post(baseURL, data).then((response) => {
        console.log(response.data)
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
        editTestModal.show();
    })*/
}

function update(event) {
    event.preventDefault();
    /* var baseURL = 'http://localhost/ceunem/admin/oferta/upOferta';

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
    } */
}