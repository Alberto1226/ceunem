document.addEventListener("DOMContentLoaded", function () {

    const select = document.getElementById('sName');
    select.addEventListener('keyup', showSelect);
    select.addEventListener('blur', showSelect);


    const texto = document.getElementById('tit');
    texto.addEventListener('keyup', showText);
    texto.addEventListener('blur', showText);


    const txtAreas = document.getElementById('descripcion');
    txtAreas.addEventListener('keyup', showText);
    txtAreas.addEventListener('blur', showText);

});

function imgSlider(event, querySelector) {
    const input = event.target;
    $img = document.querySelector(querySelector);
    if (!input.files.length) return
    file = input.files[0];
    url = URL.createObjectURL(file);
    $img.src = url;
}

function showSelect(e) {
    const select = e.target;
    const opcion = select.options[select.selectedIndex];
    const texto = opcion.textContent;
    if(texto !== 'Seleccione una opción'){
        document.getElementById('btnTit').textContent = texto;
        document.getElementById('linkImg').style.display = 'inline'
    }
}

function showText(e) {
    const input = e.target.name;
    const contenido = e.target.value

    if (input == 'tit') {
        document.getElementById('titImg').textContent = contenido;
    } else if (input == 'descripcion') {
        document.getElementById('descImg').textContent = contenido;
    }
}